<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?if (!empty($arResult['ITEMS'])):?>
    <div class="calendar-events fb-modal">
        <div class="fb-modal-inner fb-modal-inner--calendar">
            <?foreach ($arResult['ITEMS'] as $arItem):?>
                <a class="calendar-events__event" href="<?=$arItem['DETAIL_PAGE_URL']?>">
                    <p class="calendar-events__event-info">
                        <span class="calendar-events__event-city"><?=$arItem['PROPERTIES']['CITY']['VALUE']?></span>
                        <span class="calendar-events__event-name"><?=$arItem['NAME']?></span>
                    </p>

                    <span class="calendar-events__event-dates">
                        <?if ($arItem['DATE_ACTIVE_FROM'] == $arItem['DATE_ACTIVE_TO'] || $arItem['DATE_ACTIVE_TO'] == ''):?>
                            <?=FormatDate('d.m', MakeTimeStamp($arItem['DATE_ACTIVE_FROM']))?>
                        <?else:?>
                            <?=FormatDate('d.m', MakeTimeStamp($arItem['DATE_ACTIVE_FROM']))?>-<?=FormatDate('d.m', MakeTimeStamp($arItem['DATE_ACTIVE_TO']))?>
                        <?endif?>
                    </span>
                </a>
            <?endforeach?>
        </div>
    </div>
<?endif?>