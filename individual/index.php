<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Индивидуальное обучение");
?>

<section class="section-learning-info">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="s-learning-info-left">
                    <div class="s-top-title-block s-top-title-block--learning-info">
                        <div class="section-title-block">
                            <h1>
                                <?=$APPLICATION->GetTitle()?>
                            </h1>
                        </div>
                    </div>
                    <div class="s-learning-info-descr">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/individual_text.php"
                            )
                        );?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="s-learning-info-right">
                    <div class="s-learning-info-img">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/individual_img.php"
                            )
                        );?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "directions_lite",
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
        "FIELD_CODE" => array("NAME", "DETAIL_PAGE_URL"),
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "9",
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
        "SORT_BY2" => "NAME",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N",
        "TEMPLATE_THEME" => "blue",
        "USE_RATING" => "N",
        "USE_SHARE" => "N"
    )
);?>

<?$APPLICATION->IncludeComponent(
    "pk:form.simple",
    "individual_form",
    Array(
        "IBLOCK_ID" => "12",
        "AJAX" => "Y",
        "LOAD_JS_CSS" => "Y",
        "SOGLASIE" => "Y",
        "SHOW_ERROR" => "Y",
    )
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>