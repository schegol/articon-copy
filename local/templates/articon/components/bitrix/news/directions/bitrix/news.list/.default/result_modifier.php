<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult['ITEMS'] as &$arItem) {
    $lecturersIBlockId = $arItem['PROPERTIES']['LECTURER']['LINK_IBLOCK_ID'];
    $lecturerId = $arItem['PROPERTIES']['LECTURER']['VALUE'];

    $obj = CIBlockElement::GetList(
        array('ID' => 'ASC'),
        array('IBLOCK_ID' => $lecturersIBlockId, 'ID' => $lecturerId),
        false,
        false,
        array('NAME', 'PROPERTY_IMG')
    );

    if ($res = $obj->GetNext()) {
        $arItem['LECTURER_NAME'] = $res['NAME'];

        $smallPicArray = CFile::GetFileArray($res['PROPERTY_IMG_VALUE']);
        $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 100, 'height' => 100), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $smallPic = $smallPicData['src'];
        $arItem['LECTURER_PHOTO'] = $smallPic;
    }
}

/***/

$sections = [];
$coursesIBlock = $arParams['IBLOCK_ID'];

$obj = CIBlockSection::GetList(
    array('SORT' => 'ASC'),
    array(
        'IBLOCK_ID' => $coursesIBlock,
        'ACTIVE' => 'Y',
    ),
    false,
    array('ID', 'NAME'),
    false
);

while ($res = $obj->GetNext()) {
    $sections[$res['ID']] = $res['NAME'];
}

$arResult['FILTER_SECTIONS'] = $sections;