<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?if (!empty($arResult)):?>
    <section class="section-course">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="s-courses-title-block">
                        <h1 class="s-courses-title">
                            <?=$APPLICATION->GetTitle()?>
                        </h1>
                    </div>
                    <div class="course-block">
                        <div class="course-top-block">
                            <div class="course-top course-top--<?=$arResult['PROPERTIES']['BG_COLOR']['VALUE_XML_ID']?>">
                                <div class="row">
                                    <div class="col-12 col-xl-3">
                                        <div class="course-top-left">
                                            <div class="course-top-lecturer">
                                                <div class="course-top-lecturer-top">
                                                    <div class="course-top-lecturer-img">
                                                        <img class="image" src="<?=$arResult['LECTURER_PHOTO']?>" alt="<?=$arResult['LECTURER_NAME']?>">
                                                    </div>
                                                    <div class="course-top-lecturer-name">
                                                        <?=$arResult['LECTURER_NAME']?>
                                                    </div>
                                                </div>
                                                <?if (strlen($arResult['LECTURER_REGALIA'])):?>
                                                    <div class="course-top-lecturer-state">
                                                        <?=$arResult['LECTURER_REGALIA']?>
                                                    </div>
                                                <?endif?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-9">
                                        <div class="course-top-right">
                                            <div class="course-top-info-block">
                                                <div class="course-top-info">
                                                    <div class="course-top-info-left">
                                                        <div class="course-top-info-type">
                                                            <?=GetMessage('NEWS_DIRECTIONS_NEWS_DETAIL_DEFAULT_TYPE_REPLACEMENT')?>
                                                        </div>
                                                        <div class="course-top-info-params-block">
                                                            <div class="course-top-info-params">
                                                                <div class="course-top-info-param">
                                                                    <div class="course-top-info-param__title">
                                                                        <?=GetMessage('NEWS_DIRECTIONS_NEWS_DETAIL_DEFAULT_START_DATE_HEADING')?>
                                                                    </div>
                                                                    <div class="course-top-info-param__value">
                                                                        <?=FormatDate($arParams['ACTIVE_DATE_FORMAT'], MakeTimeStamp($arResult['ACTIVE_FROM']))?>
                                                                    </div>
                                                                </div>
                                                                <div class="course-top-info-param">
                                                                    <div class="course-top-info-param__title">
                                                                        <?=GetMessage('NEWS_DIRECTIONS_NEWS_DETAIL_DEFAULT_DIFFICULTY_LEVEL_HEADING')?>
                                                                    </div>
                                                                    <div class="course-top-info-param__value">
                                                                        <?=GetMessage('NEWS_DIRECTIONS_NEWS_DETAIL_DEFAULT_DIFFICULTY_LEVEL_'.$arResult['PROPERTIES']['DIFFICULTY_LEVEL']['VALUE_XML_ID'])?>
                                                                    </div>
                                                                </div>

                                                                <?if (strlen($arResult['PROPERTIES']['LENGTH']['VALUE'])):?>
                                                                    <div class="course-top-info-param">
                                                                        <div class="course-top-info-param__title"><?=GetMessage('NEWS_DIRECTIONS_NEWS_DETAIL_DEFAULT_LENGTH_HEADING')?></div>
                                                                        <div class="course-top-info-param__value"><?=$arResult['PROPERTIES']['LENGTH']['VALUE']?></div>
                                                                    </div>
                                                                <?endif?>
                                                            </div>
                                                        </div>
                                                        <div class="h3 course-top-info-title">
                                                            <?=$arResult['NAME']?>
                                                        </div>

                                                        <?if (strlen($arResult['PROPERTIES']['INTRO']['VALUE'])):?>
                                                            <div class="course-top-info-descr">
                                                                <?=$arResult['PROPERTIES']['INTRO']['VALUE']?>
                                                            </div>
                                                        <?endif?>

                                                        <?if (is_array($arResult['PROPERTIES']['FEATURES']['VALUE']) && !empty($arResult['PROPERTIES']['FEATURES']['VALUE'])):?>
                                                            <div class="course-top-info-alt-params-block">
                                                                <div class="course-top-info-alt-params">
                                                                    <?foreach ($arResult['PROPERTIES']['FEATURES']['VALUE'] as $feature):?>
                                                                        <div class="course-top-info-alt-param">
                                                                            <?=html_entity_decode($feature)?>
                                                                        </div>
                                                                    <?endforeach?>
                                                                </div>
                                                            </div>
                                                        <?endif?>
                                                    </div>

                                                    <?if (is_array($arResult['PROPERTIES']['GALLERY']['VALUE']) && !empty($arResult['PROPERTIES']['GALLERY']['VALUE'])):?>
                                                        <div class="course-top-info-right">
                                                            <div class="course-top-info-photo-items-block">
                                                                <div class="course-top-info-photo-items">
                                                                    <?foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $i => $img):
                                                                        if ($i > 2) break;

                                                                        $smallPicArray = CFile::GetFileArray($img);
                                                                        $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 213, 'height' => 213), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                                        $smallPic = $smallPicData['src'];
                                                                    ?>
                                                                        <div class="course-top-info-photo-item-wrapper">
                                                                            <a class="course-top-info-photo-item modal-btn" href="#modal-photos--photo" data-index="<?=$i?>">
                                                                                <div class="course-top-info-photo-item__img">
                                                                                    <img class="image" src="<?=$smallPic?>" alt="<?=GetMessage('NEWS_DIRECTIONS_NEWS_DETAIL_DEFAULT_GALLERY_PREVIEW_ALT').($i + 1)?>">
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    <?endforeach?>
                                                                    <?if (count($arResult['PROPERTIES']['GALLERY']['VALUE']) > 3):?>
                                                                        <div class="course-top-info-photo-item-wrapper">
                                                                            <a class="course-top-info-photo-item modal-btn" href="#modal-photos--photo" data-index="3">
                                                                                <div class="course-top-info-photo-item-more">
                                                                                    <div class="course-top-info-photo-item-more__icon">
                                                                                        <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/mp-news-photo-item-more-icon.svg" alt="<?=GetMessage('NEWS_DIRECTIONS_NEWS_DETAIL_DEFAULT_GALLERY_ICON_ALT')?>">
                                                                                    </div>
                                                                                    <div class="course-top-info-photo-item-more__title">
                                                                                        <?=(count($arResult['PROPERTIES']['GALLERY']['VALUE']) - 3).GetMessage('NEWS_DIRECTIONS_NEWS_DETAIL_DEFAULT_GALLERY_COUNTER')?>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    <?endif?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modals">
                                                            <div class="fb-modal fb-modal--photos" id="modal-photos--photo">
                                                                <div class="fb-modal-inner">
                                                                    <div class="modal-photo-block">
                                                                        <div class="modal-photo-title-block">
                                                                            <div class="h2 modal-photo-title"><?=GetMessage('NEWS_DIRECTIONS_NEWS_DETAIL_DEFAULT_GALLERY_MODAL_HEADING')?></div>
                                                                        </div>
                                                                        <div class="modal-photo-slider-block">
                                                                            <div class="modal-photo-slider modal-photo-slider--course swiper-slider">
                                                                                <div class="swiper">
                                                                                    <div class="swiper-wrapper">
                                                                                        <?foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $i => $img):
                                                                                            $smallPicArray = CFile::GetFileArray($img);
                                                                                            $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 1320, 'height' => 1320), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                                                            $smallPic = $smallPicData['src'];
                                                                                        ?>
                                                                                            <div class="modal-photo-slide swiper-slide">
                                                                                                <div class="modal-photo-slide-item">
                                                                                                    <div class="modal-photo-slide-img">
                                                                                                        <img class="image" src="<?=$smallPic?>" alt="<?=GetMessage('NEWS_DIRECTIONS_NEWS_DETAIL_DEFAULT_GALLERY_MODAL_IMG_ALT').($i + 1)?>">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        <?endforeach?>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="swiper-button-prev"></div>
                                                                                <div class="swiper-button-next"></div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="modal-photo-thumb-slider-block">
                                                                            <div class="modal-photo-thumb-slider modal-photo-thumb-slider--course swiper-slider">
                                                                                <div class="swiper">
                                                                                    <div class="swiper-wrapper">
                                                                                        <?foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $i => $img):
                                                                                            $smallPicArray = CFile::GetFileArray($img);
                                                                                            $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 254, 'height' => 254), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                                                            $smallPic = $smallPicData['src'];
                                                                                        ?>
                                                                                            <div class="modal-photo-thumb-slide swiper-slide">
                                                                                                <div class="modal-photo-thumb-slide-item">
                                                                                                    <div class="modal-photo-thumb-slide-item-img">
                                                                                                        <img class="image" src="<?=$smallPic?>" alt="<?=GetMessage('NEWS_DIRECTIONS_NEWS_DETAIL_DEFAULT_GALLERY_MODAL_IMG_ALT').($i + 1)?>">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        <?endforeach?>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="swiper-pagination"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?endif?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="course-info-blocks-block">
                            <div class="row">
                                <div class="col-12 col-xl-3"></div>
                                <div class="col-12 col-xl-9">
                                    <div class="course-info-blocks">
                                        <?if (is_array($arResult['PROPERTIES']['COURSE_FOR']['VALUE']) && !empty($arResult['PROPERTIES']['COURSE_FOR']['VALUE'])):?>
                                            <div class="course-info-block">
                                                <h3 class="course-info-block-title"><?=GetMessage('NEWS_DIRECTIONS_NEWS_DETAIL_DEFAULT_COURSE_FOR_HEADING')?></h3>
                                                <div class="course-info-who-items-block">
                                                    <div class="course-info-items">
                                                        <?foreach ($arResult['PROPERTIES']['COURSE_FOR']['VALUE'] as $for):?>
                                                            <div class="course-info-item-wrapper">
                                                                <div class="course-info-item">
                                                                    <?=$for?>
                                                                </div>
                                                            </div>
                                                        <?endforeach?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?endif?>

                                        <?if (strlen($arResult['PROPERTIES']['RESULT']['VALUE']['TEXT'])):?>
                                            <div class="course-info-block course-info-block--result">
                                                <h3 class="course-info-block-title">
                                                    <?=GetMessage('NEWS_DIRECTIONS_NEWS_DETAIL_DEFAULT_RESULT_HEADING')?>
                                                </h3>
                                                <?=$arResult['PROPERTIES']['RESULT']['~VALUE']['TEXT']?>
                                            </div>
                                        <?endif?>

                                        <?if (strlen($arResult['DETAIL_TEXT'])):?>
                                            <div class="course-info-block">
                                                <h3 class="course-info-block-title course-info-block-title--detail">
                                                    <?=GetMessage('NEWS_DIRECTIONS_NEWS_DETAIL_DEFAULT_COURSE_PROGRAM_HEADING')?>
                                                </h3>
                                                <?=$arResult['~DETAIL_TEXT']?>
                                            </div>
                                        <?endif?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?$APPLICATION->IncludeComponent(
        "pk:form.simple",
        "direction_form",
        Array(
            "IBLOCK_ID" => "19",
            "AJAX" => "Y",
            "LOAD_JS_CSS" => "Y",
            "SOGLASIE" => "Y",
            "SHOW_ERROR" => "Y",
            "DIRECTION_ID" => $arResult["ID"],
        )
    );?>

    <?if (is_array($arResult['PROPERTIES']['SPEAKERS']['VALUE']) && !empty($arResult['PROPERTIES']['SPEAKERS']['VALUE'])):?>
        <?
        global $arrFilterSpeakers;
        $arrFilterSpeakers['ID'] = $arResult['PROPERTIES']['SPEAKERS']['VALUE'];

        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "speakers",
            Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array("NAME", ""),
                "FILTER_NAME" => "arrFilterSpeakers",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => $arResult["PROPERTIES"]["SPEAKERS"]["LINK_IBLOCK_ID"],
                "IBLOCK_TYPE" => "contacts",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "Y",
                "MEDIA_PROPERTY" => "",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "999",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "Новости",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array("*", ""),
                "SEARCH_PAGE" => "/search/",
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SLIDER_PROPERTY" => "",
                "SORT_BY1" => "SORT",
                "SORT_BY2" => "ACTIVE_FROM",
                "SORT_ORDER1" => "ASC",
                "SORT_ORDER2" => "DESC",
                "STRICT_SECTION_CHECK" => "N",
                "TEMPLATE_THEME" => "blue",
                "USE_RATING" => "N",
                "USE_SHARE" => "N",
                "COURSES_IBLOCK_ID" => $arParams["IBLOCK_ID"],
            )
        );
        ?>
    <?endif?>

    <?if (is_array($arResult['REVIEWS']) && !empty($arResult['REVIEWS'])):?>
        <section class="section-course-reviews">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="about-photo-top-block">
                            <h2>
                                <?=GetMessage('NEWS_DIRECTIONS_NEWS_DETAIL_DEFAULT_REVIEWS_HEADING')?>
                            </h2>
                        </div>

                        <div class="course-reviews-block">
                            <div class="course-reviews">
                                <?foreach ($arResult['REVIEWS'] as $arReview):?>
                                    <div class="course-review-wrapper">
                                        <div class="course-review course-review--<?=$arReview['COLOR']?>">
                                            <div class="course-review-inner">
                                                <div class="course-review-date">
                                                    <?=FormatDate('d / m / Y', MakeTimeStamp($arReview['DATE']))?>
                                                </div>
                                                <?if (strlen($arReview['IMG'])):?>
                                                    <div class="course-review-avatar">
                                                        <img class="image" src="<?=$arReview['IMG']?>" alt="<?=$arReview['NAME']?>">
                                                    </div>
                                                <?endif?>
                                                <div class="course-review-title-block">
                                                    <div class="course-review-title">
                                                        <?=$arReview['NAME']?>
                                                    </div>
                                                </div>
                                                <div class="course-review-descr">
                                                    <?=$arReview['TEXT']?>
                                                </div>
                                            </div>
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
<?endif?>
