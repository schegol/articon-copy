<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;

?>
        <?getSeoBlock()?>

        <footer>
            <div class="footer-content-block">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-content">
                                <div class="footer-content-left">
                                    <div class="logo-wrapper">
                                        <a class="logo"<?=$page == '/' ? '' : ' href="/"'?>>
                                            <div class="logo-img">
                                                <?$APPLICATION->IncludeComponent(
                                                    "bitrix:main.include",
                                                    "",
                                                    Array(
                                                        "AREA_FILE_SHOW" => "file",
                                                        "AREA_FILE_SUFFIX" => "",
                                                        "EDIT_TEMPLATE" => "",
                                                        "PATH" => "/include/site_logo.php"
                                                    )
                                                );?>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:menu",
                                    "footer_desktop",
                                    Array(
                                        "ALLOW_MULTI_SELECT" => "N",
                                        "CHILD_MENU_TYPE" => "left",
                                        "DELAY" => "N",
                                        "MAX_LEVEL" => "1",
                                        "MENU_CACHE_GET_VARS" => array(""),
                                        "MENU_CACHE_TIME" => "3600",
                                        "MENU_CACHE_TYPE" => "N",
                                        "MENU_CACHE_USE_GROUPS" => "Y",
                                        "ROOT_MENU_TYPE" => "main",
                                        "USE_EXT" => "N"
                                    )
                                );?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-block">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-bottom">
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:menu",
                                    "footer_mobile",
                                    Array(
                                        "ALLOW_MULTI_SELECT" => "N",
                                        "CHILD_MENU_TYPE" => "left",
                                        "DELAY" => "N",
                                        "MAX_LEVEL" => "1",
                                        "MENU_CACHE_GET_VARS" => array(""),
                                        "MENU_CACHE_TIME" => "3600",
                                        "MENU_CACHE_TYPE" => "N",
                                        "MENU_CACHE_USE_GROUPS" => "Y",
                                        "ROOT_MENU_TYPE" => "main",
                                        "USE_EXT" => "N"
                                    )
                                );?>
                                <div class="footer-bottom-left">
                                    <div class="copy">
                                        <?$APPLICATION->IncludeComponent(
                                            "bitrix:main.include",
                                            "",
                                            Array(
                                                "AREA_FILE_SHOW" => "file",
                                                "AREA_FILE_SUFFIX" => "",
                                                "EDIT_TEMPLATE" => "",
                                                "PATH" => "/include/footer_copyright.php"
                                            )
                                        );?>
                                    </div>
                                </div>
                                <div class="footer-bottom-right">
                                    <?$APPLICATION->IncludeComponent(
                                        "bitrix:news.list",
                                        "footer_social",
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
                                            "FIELD_CODE" => array("", ""),
                                            "FILTER_NAME" => "",
                                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                            "IBLOCK_ID" => "1",
                                            "IBLOCK_TYPE" => "contacts",
                                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                            "INCLUDE_SUBSECTIONS" => "Y",
                                            "MEDIA_PROPERTY" => "",
                                            "MESSAGE_404" => "",
                                            "NEWS_COUNT" => "20",
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
                                            "USE_SHARE" => "N"
                                        )
                                    );?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>