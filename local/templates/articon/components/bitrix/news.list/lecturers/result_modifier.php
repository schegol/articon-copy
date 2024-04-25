<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$coursesIBlockId = $arParams['COURSES_IBLOCK_ID'];
foreach ($arResult['ITEMS'] as &$arItem) {
    $coursesData = [];

    $obj = CIBlockELement::GetList(
        array('ACTIVE_FROM' => 'ASC'),
        array('IBLOCK_ID' => $coursesIBlockId, '=PROPERTY_LECTURER' => $arItem['ID']),
        false,
        false,
        array('NAME', 'DETAIL_PAGE_URL', 'PROPERTY_BG_COLOR')
    );

    while ($res = $obj->GetNext()) {
        $arItem['COURSES'][] = $res;
    }
}