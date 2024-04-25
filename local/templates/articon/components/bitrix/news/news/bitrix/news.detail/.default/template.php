<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?if (!empty($arResult)):?>
    <section class="section-news-single">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?if (strlen($arResult['DETAIL_PICTURE']['SRC'])):
                        $smallPicArray = CFile::ResizeImageGet($arResult['DETAIL_PICTURE'], array('width' => 1360, 'height' => 1360), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                        $smallPic = $smallPicArray['src'];
                    ?>
                        <div class="news-single-top-img-block">
                            <div class="news-single-top-img">
                                <img class="image" src="<?=$smallPic?>" alt="<?=$arResult['NAME']?>">
                            </div>
                        </div>
                    <?endif?>
                    <div class="news-single-content-block">
                        <div class="row">
                            <div class="col-12 col-lg-7 col-xxl-7">
                                <div class="news-single-content-block-left">
                                    <div class="news-single-content-top">
                                        <div class="news-single-content-top-left">
                                            <div class="news-single-date">
                                                <?=FormatDate($arParams['ACTIVE_DATE_FORMAT'], MakeTimeStamp($arResult['ACTIVE_FROM']))?>
                                            </div>
                                        </div>
                                        <div class="news-single-content-top-right">
                                            <div class="news-single-share-block">
                                                <a class="news-single-share-dropdown-link  dropdown-toggle" role="button" data-bs-toggle="dropdown" href="#">
                                                    <?=GetMessage('NEWS_NEWS_NEWS_DETAIL_SHARE')?>
                                                </a>
                                                <div class="news-single-share-menu dropdown-menu">
                                                    <div class="news-single-share-menu-item">
                                                        <a class="news-single-share-menu-link news-single-share-menu-link--copy" href="#" data-link="<?=$arResult['CURRENT_LINK']?>">
                                                            <?=GetMessage('NEWS_NEWS_NEWS_DETAIL_SHARE_COPY')?>
                                                        </a>
                                                    </div>
                                                    <div class="news-single-share-menu-item">
                                                        <a class="news-single-share-menu-link news-single-share-menu-link--vk" href="<?=$arResult['VK_SHARE_LINK']?>" target="_blank">
                                                            <?=GetMessage('NEWS_NEWS_NEWS_DETAIL_SHARE_VK')?>
                                                        </a>
                                                    </div>
                                                    <div class="news-single-share-menu-item">
                                                        <a class="news-single-share-menu-link news-single-share-menu-link--tg" href="<?=$arResult['TELEGRAM_SHARE_LINK']?>" target="_blank">
                                                            <?=GetMessage('NEWS_NEWS_NEWS_DETAIL_SHARE_TG')?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="news-single-content">
                                        <h1 class="h2">
                                            <?=$arResult['NAME']?>
                                        </h1>

                                        <?if (strlen($arResult['PROPERTIES']['AUTHOR']['VALUE']) && (int)$arResult['PROPERTIES']['AUTHOR']['VALUE'] > 0):?>
                                            <div class="news-single-author">
                                                <div class="news-single-author-img">
                                                    <img class="image" src="<?=$arResult['AUTHOR_PHOTO']?>" alt="<?=$arResult['AUTHOR_NAME']?>">
                                                </div>
                                                <div class="news-single-author-info">
                                                    <div class="news-single-author-state-wrapper">

                                                        <div class="news-single-author-state">
                                                            <?=$arResult['AUTHOR_POSITION']?>
                                                        </div>
                                                        <div class="news-single-author-state-bridge"></div>
                                                    </div>
                                                    <div class="news-single-author-name-wrapper">
                                                        <div class="h4 news-single-author-name">
                                                            <?=$arResult['AUTHOR_NAME']?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?endif?>

                                        <?if (strlen($arResult['PROPERTIES']['DETAIL_INTRO']['VALUE']['TEXT'])):?>
                                            <div class="news-single-content-descr">
                                                <?=$arResult['PROPERTIES']['DETAIL_INTRO']['~VALUE']['TEXT']?>
                                            </div>
                                        <?endif?>

                                        <div class="news-single-content-text-block">
                                            <?=$arResult['~DETAIL_TEXT']?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?if (strlen($arResult['PROPERTIES']['AUTHOR']['VALUE']) && (int)$arResult['PROPERTIES']['AUTHOR']['VALUE'] > 0):?>
                                <div class="col-12 col-lg-4 col-xxl-3 d-none d-lg-block">
                                    <div class="news-single-content-block-right">
                                        <div class="news-single-author">
                                            <div class="news-single-author-img">
                                                <img class="image" src="<?=$arResult['AUTHOR_PHOTO']?>" alt="<?=$arResult['AUTHOR_NAME']?>">
                                            </div>
                                            <div class="news-single-author-info">
                                                <div class="news-single-author-state-wrapper">

                                                    <div class="news-single-author-state">
                                                        <?=$arResult['AUTHOR_POSITION']?>
                                                    </div>
                                                    <div class="news-single-author-state-bridge"></div>
                                                </div>
                                                <div class="news-single-author-name-wrapper">
                                                    <div class="h4 news-single-author-name">
                                                        <?=$arResult['AUTHOR_NAME']?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?endif?>
                        </div>
                    </div>

                    <?if (is_array($arResult['PROPERTIES']['GALLERY']['VALUE']) && !empty($arResult['PROPERTIES']['GALLERY']['VALUE'])):?>
                        <div class="news-single-images-slider-block">
                            <div class="news-single-img-slider-block">
                                <div class="news-single-img-slider swiper-slider">
                                    <div class="swiper">
                                        <div class="swiper-wrapper">
                                            <?foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $i => $slide):
                                                $smallPicArray = CFile::GetFileArray($slide);
                                                $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 1400, 'height' => 1400), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                $smallPic = $smallPicData['src'];
                                            ?>
                                                <div class="news-single-img-slide swiper-slide">
                                                    <div class="news-single-img-slide-item">
                                                        <div class="news-single-img-slide-img">
                                                            <img class="image" src="<?=$smallPic?>" alt="<?=GetMessage('NEWS_NEWS_NEWS_DETAIL_SLIDER_IMG_ALT').($i + 1)?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?endforeach?>
                                        </div>
                                    </div>

                                    <div class="swiper-pagination"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                            <div class="news-single-img-thumb-slider-block">
                                <div class="news-single-img-thumb-slider swiper-slider">
                                    <div class="swiper">
                                        <div class="swiper-wrapper">
                                            <?foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $i => $slide):
                                                $smallPicArray = CFile::GetFileArray($slide);
                                                $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 216, 'height' => 216), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                $smallPic = $smallPicData['src'];
                                            ?>
                                                <div class="news-single-img-thumb-slide swiper-slide">
                                                    <div class="news-single-img-thumb-slide-item">
                                                        <div class="news-single-img-thumb-slide-item-img">
                                                            <img class="image" src="<?=$smallPic?>" alt="<?=GetMessage('NEWS_NEWS_NEWS_DETAIL_SLIDER_IMG_ALT').($i + 1)?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?endforeach?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?endif?>
                </div>
            </div>
        </div>
    </section>

    <?
    global $arrFilterLine;
    $arrFilterLine['!ID'] = $arResult['ID'];

    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "news_inner",
        Array(
            "ACTIVE_DATE_FORMAT" => $arParams["ACTIVE_DATE_FORMAT"],
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
            "FIELD_CODE" => array("NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE", "ACTIVE_FROM", ""),
            "FILTER_NAME" => "arrFilterLine",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => $arResult["IBLOCK_ID"],
            "IBLOCK_TYPE" => "content",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
            "MEDIA_PROPERTY" => "",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "3",
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
            "SORT_BY1" => "ACTIVE_FROM",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "DESC",
            "SORT_ORDER2" => "ASC",
            "STRICT_SECTION_CHECK" => "N",
            "TEMPLATE_THEME" => "blue",
            "USE_RATING" => "N",
            "USE_SHARE" => "N",
        )
    );?>
<?endif?>
