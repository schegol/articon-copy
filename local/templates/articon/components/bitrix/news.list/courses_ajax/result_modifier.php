<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult['ITEMS'] as &$arItem) {
    $srcDirectionIBlockId = $arItem['PROPERTIES']['DIRECTION']['LINK_IBLOCK_ID'];
    $srcDirectionId = $arItem['PROPERTIES']['DIRECTION']['VALUE'];

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

        $arItem['DIRECTION_DATA']['FIELDS'] = $fields;
        $arItem['DIRECTION_DATA']['PROPS'] = $props;
    }

    /***/

    $lecturersIBlockId = $arItem['DIRECTION_DATA']['PROPS']['LECTURER']['LINK_IBLOCK_ID'];
    $lecturerId = $arItem['DIRECTION_DATA']['PROPS']['LECTURER']['VALUE'];

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
