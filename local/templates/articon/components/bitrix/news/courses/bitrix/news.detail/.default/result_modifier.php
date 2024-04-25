<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$srcDirectionIBlockId = $arResult['PROPERTIES']['DIRECTION']['LINK_IBLOCK_ID'];
$srcDirectionId = $arResult['PROPERTIES']['DIRECTION']['VALUE'];

$obSrc = CIBlockElement::GetList(
    array('ID' => 'ASC'),
    array('IBLOCK_ID' => $srcDirectionIBlockId, 'ID' => $srcDirectionId),
    false,
    false,
    array('*', 'PROPERTY_*')
);

while ($resSrc = $obSrc->GetNextElement()) {
    $fields = $resSrc->getFields();
    $props = $resSrc->getProperties();

    $arResult['DIRECTION_DATA']['FIELDS'] = $fields;
    $arResult['DIRECTION_DATA']['PROPS'] = $props;
}

/***/

$lecturersIBlockId = $arResult['DIRECTION_DATA']['PROPS']['LECTURER']['LINK_IBLOCK_ID'];
$lecturerId = $arResult['DIRECTION_DATA']['PROPS']['LECTURER']['VALUE'];
$lecturerRegalia = '';

$obj = CIBlockElement::GetList(
    array('ID' => 'ASC'),
    array('IBLOCK_ID' => $lecturersIBlockId, 'ID' => $lecturerId),
    false,
    false,
    array('NAME', 'PROPERTY_IMG', 'PROPERTY_REGALIA')
);

while ($res = $obj->GetNext()) {
    $arResult['LECTURER_NAME'] = $res['NAME'];

    $smallPicArray = CFile::GetFileArray($res['PROPERTY_IMG_VALUE']);
    $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 100, 'height' => 100), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $smallPic = $smallPicData['src'];
    $arResult['LECTURER_PHOTO'] = $smallPic;

    $lecturerRegalia .= $res['PROPERTY_REGALIA_VALUE'].' ';
}

$arResult['LECTURER_REGALIA'] = $lecturerRegalia;

/***/

if (is_array($arResult['DIRECTION_DATA']['PROPS']['REVIEWS']['VALUE']) && !empty($arResult['DIRECTION_DATA']['PROPS']['REVIEWS']['VALUE'])) {
    $reviews = $colors = [];
    $reviewsIBlockId = $arResult['DIRECTION_DATA']['PROPS']['REVIEWS']['LINK_IBLOCK_ID'];
    $ids = $arResult['DIRECTION_DATA']['PROPS']['REVIEWS']['VALUE'];

    $colorsObj = CIBlockPropertyEnum::GetList(
        array('SORT' => 'ASC'),
        array('IBLOCK_ID' => $reviewsIBlockId, 'CODE' => 'BG_COLOR')
    );

    while ($colorsArray = $colorsObj->GetNext()) {
        $colors[$colorsArray['ID']] = $colorsArray['XML_ID'];
    }

    $obj = CIBlockElement::GetList(
        array('SORT' => 'ASC', 'ACTIVE_FROM' => 'DESC'),
        array(
            'IBLOCK_ID' => $reviewsIBlockId,
            'ID' => $ids,
            'ACTIVE' => 'Y',
        ),
        false,
        false,
        array('ID', 'NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE', 'DATE_ACTIVE_FROM', 'PROPERTY_BG_COLOR')
    );

    while ($res = $obj->GetNext()) {
        $smallPicArray = CFile::GetFileArray($res['PREVIEW_PICTURE']);
        $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 64, 'height' => 64), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $smallPic = $smallPicData['src'];

        $reviews[$res['ID']] = array(
            'NAME' => $res['NAME'],
            'DATE' => $res['DATE_ACTIVE_FROM'],
            'COLOR' => $colors[$res['PROPERTY_BG_COLOR_ENUM_ID']],
            'TEXT' => $res['~PREVIEW_TEXT'],
            'IMG' => $smallPic,
        );
    }

    $arResult['REVIEWS'] = $reviews;
}