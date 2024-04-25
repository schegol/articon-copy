<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

use Bitrix\Main\Application;

global $APPLICATION;
$APPLICATION->ShowAjaxHead();

$session = Application::getInstance()->getSession();

if (CModule::IncludeModule('iblock')) {
    $context = Application::getInstance()->getContext();
    $request = $context->getRequest();

    global $arrFilterDirections;

    $iBlock = $request['iblock'];
    $section = $request['section'];

    if ((int)$section > 0) {
        $arrFilterDirections['SECTION_ID'] = $section;
    }

    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "directions_ajax",
        array(
            "IBLOCK_TYPE" => "content",
            "IBLOCK_ID" => $iBlock,
            "NEWS_COUNT" => "6",
            "SORT_BY1" => "SORT",
            "SORT_ORDER1" => "ASC",
            "SORT_BY2" => "NAME",
            "SORT_ORDER2" => "ASC",
            "FIELD_CODE" => array(
                "NAME",
                "PREVIEW_TEXT",
                "ACTIVE_FROM",
                "ACTIVE_TO",
            ),
            "PROPERTY_CODE" => array("*"),
            "DETAIL_URL" => "/directions/#ELEMENT_CODE#/",
            "SECTION_URL" => "/directions/",
            "IBLOCK_URL" => "/directions/",
            "DISPLAY_PANEL" => "",
            "SET_TITLE" => "1",
            "SET_LAST_MODIFIED" => "",
            "MESSAGE_404" => "",
            "SET_STATUS_404" => "Y",
            "SHOW_404" => "N",
            "FILE_404" => "",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "36000000",
            "CACHE_FILTER" => "",
            "CACHE_GROUPS" => "Y",
            "DISPLAY_TOP_PAGER" => "",
            "DISPLAY_BOTTOM_PAGER" => "1",
            "PAGER_TITLE" => "Новости",
            "PAGER_TEMPLATE" => "courses",
            "PAGER_SHOW_ALWAYS" => "",
            "PAGER_DESC_NUMBERING" => "",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
            "PAGER_SHOW_ALL" => "",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_BASE_LINK" => "",
            "PAGER_PARAMS_NAME" => "",
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "PREVIEW_TRUNCATE_LEN" => "0",
            "ACTIVE_DATE_FORMAT" => "j F",
            "USE_PERMISSIONS" => "",
            "GROUP_PERMISSIONS" => array(
                "0" => "1",
            ),
            "FILTER_NAME" => "arrFilterDirections",
            "HIDE_LINK_WHEN_NO_DETAIL" => "",
            "CHECK_DATES" => "1",
            "BANNER_IMG" => "",
            "INCLUDE_SUBSECTIONS" => "1",
            "SET_BROWSER_TITLE" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_META_DESCRIPTION" => "N",
            "ADD_SECTIONS_CHAIN" => "1",
            "STRICT_SECTION_CHECK" => "",
            "CHECK_PERMISSIONS" => "1",
        ),
        false
    );
}
