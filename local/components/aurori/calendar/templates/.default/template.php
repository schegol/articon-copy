<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<?if (!empty($arResult['MONTHS'])):?>
    <section class="section-mp-calendar">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mp-calendar-top">
                        <div class="mp-calendar-top-left">
                            <div class="mp-calendar-top-title-block">
                                <div class="mp-calendar-top-year-wrapper">
                                    <div class="mp-calendar-top-year" id="calendarYear">
                                        <?=date('Y').GetMessage('AURORI_CALENDAR_DEFAULT_YEAR')?>
                                    </div>
                                    <div class="mp-calendar-top-year-bridge"></div>
                                </div>
                                <h2 class="mp-calendar-top-title">
                                    <?=GetMessage('AURORI_CALENDAR_DEFAULT_HEADING')?>
                                </h2>
                            </div>
                        </div>
                        <div class="mp-calendar-top-center">
                            <div class="mp-calendar-top-bridge"></div>
                        </div>
                        <div class="mp-calendar-top-right">
                            <div class="mp-calendar-top-slider-block">
                                <div class="mp-calendar-top-slider swiper-slider">
                                    <div class="swiper">
                                        <div class="swiper-wrapper">
                                            <?foreach ($arResult['MONTHS'] as $arMonth):?>
                                                <div class="mp-calendar-top-slide swiper-slide">
                                                    <div class="mp-calendar-top-slide-item">
                                                        <?=$arMonth['MONTH_NAME']?>
                                                    </div>
                                                </div>
                                            <?endforeach?>
                                        </div>
                                    </div>

                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mp-calendar-block swiper">
                        <div class="mp-calendar-list swiper-wrapper">
                            <?foreach ($arResult['MONTHS'] as $arMonth):?>
                                <div class="mp-calendar swiper-slide" data-year="<?=$arMonth['YEAR_NUM']?>">
                                    <div class="mp-calendar-heading">
                                        <div class="mp-calendar-h-col-wrapper">
                                            <div class="mp-calendar-h-col">
                                                <?=GetMessage('AURORI_CALENDAR_DEFAULT_WEEKDAY_MON')?>
                                            </div>
                                        </div>
                                        <div class="mp-calendar-h-col-wrapper">
                                            <div class="mp-calendar-h-col">
                                                <?=GetMessage('AURORI_CALENDAR_DEFAULT_WEEKDAY_TUE')?>
                                            </div>
                                        </div>
                                        <div class="mp-calendar-h-col-wrapper">
                                            <div class="mp-calendar-h-col">
                                                <?=GetMessage('AURORI_CALENDAR_DEFAULT_WEEKDAY_WEN')?>
                                            </div>
                                        </div>
                                        <div class="mp-calendar-h-col-wrapper">
                                            <div class="mp-calendar-h-col">
                                                <?=GetMessage('AURORI_CALENDAR_DEFAULT_WEEKDAY_THU')?>
                                            </div>
                                        </div>
                                        <div class="mp-calendar-h-col-wrapper">
                                            <div class="mp-calendar-h-col">
                                                <?=GetMessage('AURORI_CALENDAR_DEFAULT_WEEKDAY_FRI')?>
                                            </div>
                                        </div>
                                        <div class="mp-calendar-h-col-wrapper">
                                            <div class="mp-calendar-h-col mp-calendar-h-col--weekend">
                                                <?=GetMessage('AURORI_CALENDAR_DEFAULT_WEEKDAY_SAT')?>
                                            </div>
                                        </div>
                                        <div class="mp-calendar-h-col-wrapper">
                                            <div class="mp-calendar-h-col mp-calendar-h-col--weekend">
                                                <?=GetMessage('AURORI_CALENDAR_DEFAULT_WEEKDAY_SUN')?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mp-calendar-items">
                                        <?foreach ($arMonth['DAYS'] as $arDay):?>
                                            <?if ($arDay['EMPTY'] == 'Y'):?>
                                                <div class="mp-calendar-item-wrapper"></div>
                                            <?else:?>
                                                <?if (empty($arDay['EVENT'])):?>
                                                    <div class="mp-calendar-item-wrapper">
                                                        <div class="mp-calendar-item<?=$arDay['IS_WEEKEND'] == 'Y' ? ' mp-calendar-item--weekend' : ''?>">
                                                            <div class="mp-calendar-item__day">
                                                                <?=$arDay['DAY_NUM']?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?else:
                                                    if ($arDay['SUBDUED'] == 'Y' && $arDay['DAY_NUM'] > 1) {
                                                        continue;
                                                    } elseif ($arDay['SUBDUED'] == 'Y' && $arDay['DAY_NUM'] == 1) {
                                                        $arDay['EVENT']['DAYS_LENGTH'] = $arDay['EVENT']['DAYS_LEFT'];
                                                    }

                                                    $lenVariable = strlen($arDay['EVENT']['DAYS_LEFT_THIS_MONTH']) ? $arDay['EVENT']['DAYS_LEFT_THIS_MONTH'] : $arDay['EVENT']['DAYS_LENGTH'];

                                                    $lenClass = '';
                                                    if ($lenVariable == 2) {
                                                        $lenClass = ' mp-calendar-item-wrapper--two-days';
                                                    } elseif ($lenVariable == 3) {
                                                        $lenClass = ' mp-calendar-item-wrapper--three-days';
                                                    } elseif ($lenVariable == 4) {
                                                        $lenClass = ' mp-calendar-item-wrapper--four-days';
                                                    }
                                                ?>
                                                    <div class="mp-calendar-item-wrapper<?=$lenClass?>">
                                                        <a class="mp-calendar-item mp-calendar-item--<?=$arDay['EVENT']['PROPERTY_BG_COLOR_XML_ID']?>" href="<?=$arDay['EVENT']['DETAIL_PAGE_URL']?>">
                                                            <div class="mp-calendar-item__day">
                                                                <?if ($arDay['EVENT']['DAYS_LENGTH'] == 1):?>
                                                                    <?if ($arDay['IS_WEEKEND'] == 'Y'):?>
                                                                        <span><?=$arDay['DAY_NUM']?></span>
                                                                    <?else:?>
                                                                        <?=$arDay['DAY_NUM']?>
                                                                    <?endif?>
                                                                <?else:?>
                                                                    <?=$arDay['EVENT']['DATE_WINDOW']?>
                                                                <?endif?>
                                                            </div>
                                                            <div class="mp-calendar-item__avatar">
                                                                <img class="image" src="<?=$arDay['EVENT']['LECTURER_DATA']['AVATAR']?>" alt="<?=$arDay['EVENT']['LECTURER_DATA']['NAME']?>">
                                                            </div>
                                                            <?if (strlen($arDay['EVENT']['PROPERTY_CITY_VALUE'])):?>
                                                                <div class="mp-calendar-item__city mp-calendar-item__descr">
                                                                    <?=$arDay['EVENT']['PROPERTY_CITY_VALUE']?>
                                                                </div>
                                                            <?endif?>
                                                            <div class="mp-calendar-item__descr">
                                                                <?=$arDay['EVENT']['NAME']?>
                                                            </div>
                                                            <div class="mp-calendar-item__arrow">
                                                                <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/mp-calendar-item-arrow.svg" alt="<?=GetMessage('AURORI_CALENDAR_DEFAULT_ARROW_ICON_ALT')?>">
                                                            </div>
                                                        </a>
                                                    </div>
                                                <?endif?>
                                            <?endif?>
                                        <?endforeach?>
                                    </div>
                                </div>
                            <?endforeach?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?endif?>