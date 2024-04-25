<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);?>

<?if (!empty($arResult['ITEMS'])):?>
    <div class="courses-tabs-content-block">
        <div class="courses-tabs-content">
            <div class="courses-tab-content">
                <div class="course-items-block">
                    <div class="course-items">
                        <div class="row">
                            <?foreach ($arResult['ITEMS'] as $arItem):?>
                                <div class="col-12 col-lg-6">
                                    <div class="course-item course-item--<?=$arItem['PROPERTIES']['BG_COLOR']['VALUE_XML_ID']?>">
                                        <div class="course-item-inner">
                                            <div class="course-item-type">
                                                <?=GetMessage('NEWS_LIST_DIRECTIONS_AJAX_TYPE_REPLACEMENT')?>
                                            </div>
                                            <div class="course-item-left">
                                                <div class="course-item-speaker-img">
                                                    <img class="image" src="<?=$arItem['LECTURER_PHOTO']?>" alt="<?=$arItem['LECTURER_NAME']?>">
                                                </div>
                                                <div class="course-item-speaker-name-wrapper">
                                                    <div class="course-item-speaker-name">
                                                        <?=$arItem['LECTURER_NAME']?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="course-item-right">
                                                <h3 class="course-item-title">
                                                    <?=$arItem['NAME']?>
                                                </h3>
                                                <div class="course-item-descr">
                                                    <?=$arItem['PREVIEW_TEXT']?>
                                                </div>
                                                <div class="course-item-params">
                                                    <div class="course-item-param course-item-param--level">
                                                        <?=GetMessage('NEWS_LIST_DIRECTIONS_AJAX_DIFFICULTY_'.$arItem['PROPERTIES']['DIFFICULTY_LEVEL']['VALUE_XML_ID'])?>
                                                    </div>
                                                    <div class="course-item-param course-item-param--price">
                                                        <?=$arItem['PROPERTIES']['PRICE']['VALUE']?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="course-item-more-link-block">
                                            <a class="more-link" href="<?=$arItem['DETAIL_PAGE_URL']?>">
                                                <?=GetMessage('NEWS_LIST_DIRECTIONS_AJAX_DETAIL_LINK')?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?endforeach?>
                        </div>
                    </div>

                    <?=$arResult['NAV_STRING']?>
                </div>
            </div>
        </div>
    </div>
<?endif?>