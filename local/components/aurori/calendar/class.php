<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Application;
use Bitrix\Main\Loader;
Loader::includeModule('iblock');

class CAuroriCalendar extends CBitrixComponent {
    public function onPrepareComponentParams($arParams) {
        return $arParams;
    }

    public function executeComponent() {
        if (!$this->arParams['IBLOCK_ID']) {
            ShowError(GetMessage('CLASS_AURORI_CALENDAR_NO_IBLOCK_SPECIFIED'));
            return;
        }

        if (!$this->arParams['DIRECTIONS_IBLOCK_ID']) {
            ShowError(GetMessage('CLASS_AURORI_CALENDAR_NO_DIRECTIONS_IBLOCK_SPECIFIED'));
            return;
        }

        if (!is_int((int)$this->arParams['MONTHS']) || (int)$this->arParams['MONTHS'] <= 0) {
            ShowError(GetMessage('CLASS_AURORI_CALENDAR_MONTHS_WRONG_TYPE'));
            return;
        }

        $paramsIBlock = $this->arParams['IBLOCK_ID'];
        $paramsMonths = $this->arParams['MONTHS'];

        $arResult = [];
        $arResult['MONTHS'] = [];
        $arResult['DIRECTIONS_IBLOCK_ID'] = $this->arParams['DIRECTIONS_IBLOCK_ID'];

        $today = time();
        $todayFormatted = date('d.m.Y', $today);
        $initialMonth = intval(date('n', $today));
        $initialYear = intval(date('Y', $today));

        /***/
        $eventsSelection = [];
        $objEventsSelection = CIBlockElement::GetList(
            array(
                'ACTIVE_FROM' => 'ASC',
                'SORT' => 'ASC',
                'NAME' => 'ASC',
            ),
            array(
                'IBLOCK_ID' => $paramsIBlock,
                array(
                    'LOGIC' => 'AND',
                    '>=DATE_ACTIVE_FROM' => $todayFormatted,
                    '<=DATE_ACTIVE_FROM' => $this->lastSelectionDate($todayFormatted, $paramsMonths),
                ),
            ),
            false,
            false,
            array(
                'NAME',
                'DATE_ACTIVE_FROM',
                'DATE_ACTIVE_TO',
                'PROPERTY_DIRECTION',
                'PROPERTY_CITY',
            )
        );
        while ($arrEventsSelection = $objEventsSelection->GetNext()) {
            $dateStart = new DateTime($arrEventsSelection['DATE_ACTIVE_FROM']);
            $dateEnd = new DateTime($arrEventsSelection['DATE_ACTIVE_TO']);
            $daysLen  = $dateEnd->diff($dateStart)->format('%a');
            $arrEventsSelection['DAYS_LENGTH'] = $daysLen + 1;

            if ($arrEventsSelection['DAYS_LENGTH'] > 1) {
                $dateStartShort = FormatDate('j', MakeTimeStamp($arrEventsSelection['DATE_ACTIVE_FROM']));
                $dateStartIsWeekend = in_array(date('w', strtotime($arrEventsSelection['DATE_ACTIVE_FROM'])), [0, 6]);
                $dateEndShort = FormatDate('j', MakeTimeStamp($arrEventsSelection['DATE_ACTIVE_TO']));
                $dateEndIsWeekend = in_array(date('w', strtotime($arrEventsSelection['DATE_ACTIVE_TO'])), [0, 6]);

                if ($dateStartIsWeekend && $dateEndIsWeekend) {
                    $dateWindow = '<span>'.$dateStartShort.'-'.$dateEndShort.'</span>';
                } elseif (!$dateStartIsWeekend && !$dateEndIsWeekend) {
                    $dateWindow = $dateStartShort.'-'.$dateEndShort;
                } elseif (!$dateStartIsWeekend && $dateEndIsWeekend) {
                    $dateWindow = $dateStartShort.'-<span>'.$dateEndShort.'</span>';
                } else {
                    $dateWindow = '<span>'.$dateStartShort.'</span>-'.$dateEndShort;
                }

                $arrEventsSelection['DATE_WINDOW'] = $dateWindow;
            }

            $eventsSelection[$arrEventsSelection['DATE_ACTIVE_FROM']][] = $arrEventsSelection;
        }
        /***/

        $processedEvent = null;

        for ($i = 0; $i < $paramsMonths; $i++) {
            $processedMonth = [];
            $processedMonth['MONTH_NUM'] = $initialMonth;
            $processedMonth['MONTH_FULL'] = $initialMonth > 9 ? (string)$initialMonth : '0'.$initialMonth;
            $processedMonth['MONTH_NAME'] = GetMessage('CLASS_AURORI_CALENDAR_MONTH_NAME_'.$initialMonth);
            $processedMonth['YEAR_NUM'] = $initialYear;
            $processedMonth['LAST_DAY'] = $this->daysInMonth($initialMonth, $initialYear);
            $processedMonth['FIRST_WEEKDAY'] = date('w', strtotime('01.'.$processedMonth['MONTH_FULL'].'.'.$initialYear));

            $emptyDaysToAdd = 0;
            if ($processedMonth['FIRST_WEEKDAY'] > 1) {
                $emptyDaysToAdd = $processedMonth['FIRST_WEEKDAY'] - 1;
            } elseif ($processedMonth['FIRST_WEEKDAY'] == 0) {
                $emptyDaysToAdd = 6;
            }

            if ($emptyDaysToAdd > 0) {
                for ($emptyDaysToAdd; $emptyDaysToAdd > 0 ; $emptyDaysToAdd--) {
                    $processedMonth['DAYS'][] = array(
                        'EMPTY' => 'Y',
                    );
                }
            }

            for ($j = 1; $j <= $processedMonth['LAST_DAY']; $j++) {
                $dayFullNum = (string)$j;
                if ($j < 10) {
                    $dayFullNum = '0'.$j;
                }
                $dayFullDate = $dayFullNum.'.'.$processedMonth['MONTH_FULL'].'.'.$processedMonth['YEAR_NUM'];
                $weekday = date('w', strtotime($dayFullDate));

                $subdued = 'N';
                if ($processedEvent !== null) {
                    $event = $processedEvent;
                    $subdued = 'Y';

                    if ($processedEvent['DAYS_LEFT'] - 1 == 0) {
                        $processedEvent = null;
                    } else {
                        $processedEvent['DAYS_LEFT']--;
                    }
                } else {
                    if (is_array($eventsSelection[$dayFullDate]) && !empty(is_array($eventsSelection[$dayFullDate]))) {
                        $event = $eventsSelection[$dayFullDate][0];

                        if ($event['DAYS_LENGTH'] > 1) {
                            $daysLeft = $event['DAYS_LENGTH'] - 1;
                            $processedEvent = $event;
                            $processedEvent['DAYS_LEFT'] = $daysLeft;

                            if (($processedMonth['LAST_DAY'] - $j) + 1 < $event['DAYS_LENGTH']) {
                                $event['DAYS_LEFT_THIS_MONTH'] = (($processedMonth['LAST_DAY'] - $j) + 1);
                            }
                        }
                    } else {
                        $event = [];
                    }
                }

                $dayArray = array(
                    'EMPTY' => 'N',
                    'DAY_NUM' => $j,
                    'FULL_DATE' => $dayFullDate,
                    'IS_WEEKEND' => in_array($weekday, [0, 6]) ? 'Y' : 'N',
                    'SUBDUED' => $subdued,
                    'EVENT' => $event,
                );

                $processedMonth['DAYS'][] = $dayArray;
            }

            if ($initialMonth == 12) {
                $initialMonth = 1;
                $initialYear++;
            } else {
                $initialMonth++;
            }

            $arResult['MONTHS'][] = $processedMonth;
        }

        $this->arResult = $arResult;
        $this->includeComponentTemplate();
    }

    public function daysInMonth($month, $year) {
        return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
    }

    public function lastSelectionDate($today, $monthsLen) {
        if (($monthsLen - 1) > 1) {
            $monthsText = 'months';
        } else {
            $monthsText = 'month';
        }

        $todayInst = new DateTime($today);
        $lastSelectionInst = $todayInst->modify('last day of +'.($monthsLen - 1).' '.$monthsText);
        $lastSelectionDate = $lastSelectionInst->format('d.m.Y');

        return $lastSelectionDate;
    }
}
?>