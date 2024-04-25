<?
if (!function_exists('getSeoBlock')) {
    function getSeoBlock() {
        if (CModule::IncludeModule('iblock')) {
            global $APPLICATION;
            $block = null;
            $seoTextsIBlockId = 3;
            $page = $APPLICATION->GetCurPage();
            if (defined('ERROR_404') && ERROR_404 == 'Y')
                $page = '/404/';

            $obj = CIBlockElement::GetList(
                array(
                    'SORT' => 'ASC',
                    'CREATED' => 'ASC'
                ),
                array(
                    'IBLOCK_ID' => $seoTextsIBlockId,
                    'PROPERTY_PAGES' => $page,
                    'ACTIVE' => 'Y',
                ),
                false,
                array(
                    'nTopCount' => 1,
                ),
                array('ID')
            );

            $resultCount = $obj->SelectedRowsCount();
            if ($resultCount == 0) return;

            if ($arr = $obj->GetNext()) {
                $block = $arr['ID'];
            }

            if ($block !== null) {
                $APPLICATION->IncludeComponent(
                    "bitrix:news.detail",
                    "seo_block",
                    Array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "ADD_ELEMENT_CHAIN" => "N",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "BROWSER_TITLE" => "-",
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
                        "ELEMENT_CODE" => "",
                        "ELEMENT_ID" => $block,
                        "FIELD_CODE" => array("ID", ""),
                        "IBLOCK_ID" => "3",
                        "IBLOCK_TYPE" => "content",
                        "IBLOCK_URL" => "",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "MESSAGE_404" => "",
                        "META_DESCRIPTION" => "-",
                        "META_KEYWORDS" => "-",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Страница",
                        "PROPERTY_CODE" => array(
                            "HEADING_TOP",
                            "HEADING_BOTTOM",
                            "TEXT",
                            "IMG",
                            "",
                        ),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_CANONICAL_URL" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "STRICT_SECTION_CHECK" => "N",
                        "USE_PERMISSIONS" => "N",
                        "USE_SHARE" => "N"
                    )
                );
            }
        }
    }
}

if (!function_exists('clearPhone')) {
    function clearPhone($phone) {
        if (!strlen($phone))
            return false;

        $unwantedChars = array('(', ')', '-', ' ');
        $clearPhone = str_replace($unwantedChars, '', $phone);

        return $clearPhone;
    }
}


//if (!function_exists('nonDynamicPageMarkup')) {
//    function nonDynamicPageMarkup() {
//        global $APPLICATION;
//        ob_start();
//
//        if ($APPLICATION->GetProperty('dynamicPage') == 'Y') {
//            echo '';
//        } else {
//            $markup = '';
//            $markup .= '<div class="section-static">';
//            echo $markup;
//        }
//
//        $result = ob_get_contents();
//        ob_end_clean();
//        return $result;
//    }
//}
