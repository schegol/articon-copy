<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$cities = [];
foreach ($arResult['ITEMS'] as $arItem) {
    if (is_array($arItem['PROPERTIES']['CITY']['VALUE']) && !empty($arItem['PROPERTIES']['CITY']['VALUE'])) {
        foreach ($arItem['PROPERTIES']['CITY']['VALUE'] as $i => $val) {
            $cities[$val][] = $arItem;
        }
    }
}
$arResult['CITY_ITEMS'] = $cities;