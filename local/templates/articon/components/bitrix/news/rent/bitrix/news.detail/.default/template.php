<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?if (!empty($arResult)):?>
    <section class="section-rent-single">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="s-top-title-block s-top-title-block--rent-single">
                        <div class="section-title-block">
                            <div class="section-title-label-wrapper">
                                <div class="section-title-label">
                                    <?=GetMessage('NEWS_RENT_NEWS_DETAIL_DEFAULT_HEADING_TOP')?>
                                </div>
                                <div class="section-title-label-bridge"></div>
                            </div>
                            <h1 class="section-title">
                                <?=$arResult['NAME']?>
                            </h1>
                        </div>
                    </div>

                    <?if (is_array($arResult['PROPERTIES']['GALLERY']['VALUE']) && !empty($arResult['PROPERTIES']['GALLERY']['VALUE'])):?>
                        <div class="rent-single-top-slider-block">
                            <div class="rent-single-top-slider">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        <?foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $i => $slide):
                                            $smallPicArray = CFile::GetFileArray($slide);
                                            $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 1410, 'height' => 1410), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                            $smallPic = $smallPicData['src'];
                                        ?>
                                            <div class="rent-single-top-slide swiper-slide">
                                                <div class="rent-single-top-slide-item">
                                                    <div class="rent-single-top-slide-item-image">
                                                        <img class="image" src="<?=$smallPic?>" alt="<?=GetMessage('NEWS_RENT_NEWS_DETAIL_DEFAULT_SLIDER_IMG_ALT').($i + 1)?>">
                                                    </div>
                                                </div>
                                            </div>
                                        <?endforeach?>
                                    </div>
                                </div>

                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>

                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    <?endif?>

                    <div class="rent-single-info-block">
                        <div class="rent-single-info">
                            <div class="row">
                                <div class="col-12 col-lg-6 order-1 order-lg-0">
                                    <div class="rent-single-info-left">
                                        <div class="rent-single-info-items">
                                            <?if (strlen($arResult['PROPERTIES']['RENT_INCLUDES']['VALUE']['TEXT'])):?>
                                                <div class="rent-single-info-item">
                                                    <div class="h4 rent-single-info-item-title">
                                                        <?=$arResult['PROPERTIES']['RENT_INCLUDES']['NAME']?>
                                                    </div>
                                                    <div class="rent-single-info-item-content">
                                                        <?=$arResult['PROPERTIES']['RENT_INCLUDES']['~VALUE']['TEXT']?>
                                                    </div>
                                                </div>
                                            <?endif?>

                                            <?if (strlen($arResult['PROPERTIES']['RENT_SEPARATE']['VALUE']['TEXT'])):?>
                                                <div class="rent-single-info-item">
                                                    <div class="h4 rent-single-info-item-title">
                                                        <?=$arResult['PROPERTIES']['RENT_SEPARATE']['NAME']?>
                                                    </div>
                                                    <div class="rent-single-info-item-content">
                                                        <?=$arResult['PROPERTIES']['RENT_SEPARATE']['~VALUE']['TEXT']?>
                                                    </div>
                                                </div>
                                            <?endif?>

                                            <?if (strlen($arResult['PROPERTIES']['PHONE']['VALUE'])):
                                                $phone = clearPhone($arResult['PROPERTIES']['PHONE']['VALUE']);
                                            ?>
                                                <div class="rent-single-info-item">
                                                    <div class="h4 rent-single-info-item-title">
                                                        <?=GetMessage('NEWS_RENT_NEWS_DETAIL_DEFAULT_PHONE_HEADING')?>
                                                    </div>
                                                    <div class="rent-single-info-item-content">
                                                        <div class="rent-single-info-phone-block">
                                                            <a class="rent-single-info-phone" href="tel:<?=$phone?>">
                                                                <?=$arResult['PROPERTIES']['PHONE']['VALUE']?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?endif?>
                                        </div>
                                        <div class="rent-single-info-btn-block">
                                            <a href="#section-feedback" class="rent-single-info-btn green-btn">
                                                <?=GetMessage('NEWS_RENT_NEWS_DETAIL_DEFAULT_FORM_ANCHOR')?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 order-0 order-lg-1">
                                    <div class="rent-single-info-right">
                                        <?if (
                                            strlen($arResult['PROPERTIES']['PRICES_ROW_1_COL_1']['VALUE'])
                                            || strlen($arResult['PROPERTIES']['PRICES_ROW_1_COL_2']['VALUE'])
                                            || strlen($arResult['PROPERTIES']['PRICES_ROW_1_COL_3_MAIN']['VALUE'])
                                            || strlen($arResult['PROPERTIES']['PRICES_ROW_2_COL_1']['VALUE'])
                                            || strlen($arResult['PROPERTIES']['PRICES_ROW_2_COL_2']['VALUE'])
                                            || strlen($arResult['PROPERTIES']['PRICES_ROW_2_COL_3_MAIN']['VALUE'])
                                        ):?>
                                            <div class="rent-single-info-table">
                                                <div class="rent-single-info-t-heading">
                                                    <div class="rent-single-info-t-h-col rent-single-info-t-h-col--day"></div>
                                                    <div class="rent-single-info-t-h-col rent-single-info-t-h-col--price">
                                                        <?=$arResult['PROPERTIES']['PRICES_COL_1_HEADING']['VALUE']?>
                                                    </div>
                                                    <div class="rent-single-info-t-h-col rent-single-info-t-h-col--price">
                                                        <?=$arResult['PROPERTIES']['PRICES_COL_2_HEADING']['VALUE']?>
                                                    </div>
                                                    <div class="rent-single-info-t-h-col rent-single-info-t-h-col--add">
                                                        <?=$arResult['PROPERTIES']['PRICES_COL_3_HEADING']['VALUE']?>
                                                    </div>
                                                </div>
                                                <div class="rent-single-info-t-items">
                                                    <div class="rent-single-info-t-item">
                                                        <div class="rent-single-info-t-item-col rent-single-info-t-item-col--day">
                                                            <?=GetMessage('NEWS_RENT_NEWS_DETAIL_DEFAULT_PRICE_TABLE_WEEKDAY')?>
                                                        </div>
                                                        <div class="rent-single-info-t-item-col rent-single-info-t-item-col--price">
                                                            <?=$arResult['PROPERTIES']['PRICES_ROW_1_COL_1']['VALUE']?>
                                                        </div>
                                                        <div class="rent-single-info-t-item-col rent-single-info-t-item-col--price">
                                                            <?=$arResult['PROPERTIES']['PRICES_ROW_1_COL_2']['VALUE']?>
                                                        </div>
                                                        <div class="rent-single-info-t-item-col rent-single-info-t-item-col--add">
                                                            <div class="rent-single-info-t-item-hour-price">
                                                                <?=html_entity_decode($arResult['PROPERTIES']['PRICES_ROW_1_COL_3_MAIN']['VALUE'])?>
                                                            </div>
                                                            <?if (strlen($arResult['PROPERTIES']['PRICES_ROW_1_COL_3_ADD']['VALUE'])):?>
                                                                <div class="rent-single-info-t-item-hour-time">
                                                                    <?=$arResult['PROPERTIES']['PRICES_ROW_1_COL_3_ADD']['VALUE']?>
                                                                </div>
                                                            <?endif?>
                                                        </div>
                                                    </div>
                                                    <div class="rent-single-info-t-item">
                                                        <div class="rent-single-info-t-item-col rent-single-info-t-item-col--day">
                                                            <?=GetMessage('NEWS_RENT_NEWS_DETAIL_DEFAULT_PRICE_TABLE_WEEKEND')?>
                                                        </div>
                                                        <div class="rent-single-info-t-item-col rent-single-info-t-item-col--price">
                                                            <?=$arResult['PROPERTIES']['PRICES_ROW_2_COL_1']['VALUE']?>
                                                        </div>
                                                        <div class="rent-single-info-t-item-col rent-single-info-t-item-col--price">
                                                            <?=$arResult['PROPERTIES']['PRICES_ROW_2_COL_2']['VALUE']?>
                                                        </div>
                                                        <div class="rent-single-info-t-item-col rent-single-info-t-item-col--add">
                                                            <div class="rent-single-info-t-item-hour-price">
                                                                <?=html_entity_decode($arResult['PROPERTIES']['PRICES_ROW_2_COL_3_MAIN']['VALUE'])?>
                                                            </div>
                                                            <?if (strlen($arResult['PROPERTIES']['PRICES_ROW_2_COL_3_ADD']['VALUE'])):?>
                                                                <div class="rent-single-info-t-item-hour-time">
                                                                    <?=$arResult['PROPERTIES']['PRICES_ROW_2_COL_3_ADD']['VALUE']?>
                                                                </div>
                                                            <?endif?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?endif?>

                                        <?if (strlen($arResult['PROPERTIES']['YT_VIDEO']['VALUE'])):?>
                                            <div class="rent-single-info-video-block">
                                                <div class="rent-single-info-video">
                                                    <a class="video modal-btn" href="#modal-photos--video">
                                                        <div class="video-preview">
                                                            <?if (strlen($arResult['PROPERTIES']['YT_VIDEO_POSTER']['VALUE'])):
                                                                $smallPicArray = CFile::GetFileArray($arResult['PROPERTIES']['YT_VIDEO_POSTER']['VALUE']);
                                                                $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 710, 'height' => 710), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                                $smallPic = $smallPicData['src'];
                                                            ?>
                                                                <img class="image" src="<?=$smallPic?>" alt="<?=GetMessage('NEWS_RENT_NEWS_DETAIL_DEFAULT_VIDEO_POSTER_ALT')?>">
                                                            <?endif?>
                                                        </div>
                                                        <div class="video-play-btn">
                                                            <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/play-btn.svg" alt="<?=GetMessage('NEWS_RENT_NEWS_DETAIL_DEFAULT_VIDEO_PLAY_BTN_ALT')?>">
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="modals">
                                                <div class="fb-modal fb-modal--photos" id="modal-photos--video">
                                                    <div class="fb-modal-inner">
                                                        <div class="modal-photo-block">
                                                            <div class="modal-photo-title-block">
                                                                <div class="h2 modal-photo-title">
                                                                    <?=GetMessage('NEWS_RENT_NEWS_DETAIL_DEFAULT_VIDEO_MODAL_HEADING')?>
                                                                </div>
                                                            </div>
                                                            <div class="modal-photo-slider-block">
                                                                <div class="video-iframe-wrapper">
                                                                    <?=$arResult['YT_VIDEO_IFRAME']?>
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

                    <?if (strlen($arParams['COFFEEBREAK_ZONE_IBLOCK_ID']) && (int)$arParams['COFFEEBREAK_ZONE_IBLOCK_ID'] > 0):?>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:news.list",
                            "coffeebreak_zone",
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
                                "FIELD_CODE" => array("PREVIEW_PICTURE", ""),
                                "FILTER_NAME" => "",
                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                "IBLOCK_ID" => $arParams['COFFEEBREAK_ZONE_IBLOCK_ID'],
                                "IBLOCK_TYPE" => "content",
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
                                "PROPERTY_CODE" => array("", ""),
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
                            )
                        );?>
                    <?endif?>
                </div>
            </div>
        </div>
    </section>

    <section class="section-feedback" id="section-feedback">
        <?$APPLICATION->IncludeComponent(
            "pk:form.simple",
            "rent_form",
            Array(
                "IBLOCK_ID" => "14",
                "AJAX" => "Y",
                "LOAD_JS_CSS" => "Y",
                "SOGLASIE" => "Y",
                "SHOW_ERROR" => "Y",
                "CLASS_ID" => $arResult["ID"],
            )
        );?>
    </section>
<?endif?>
