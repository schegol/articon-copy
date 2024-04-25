<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult['ITEMS'] as &$arItem) {
    $authorIBlockId = $arItem['PROPERTIES']['AUTHOR']['LINK_IBLOCK_ID'];
    $authorId = $arItem['PROPERTIES']['AUTHOR']['VALUE'];

    $obj = CIBlockElement::GetList(
        array('ID' => 'ASC'),
        array('IBLOCK_ID' => $authorIBlockId, 'ID' => $authorId),
        false,
        false,
        array('NAME', 'PROPERTY_IMG')
    );

    if ($res = $obj->GetNext()) {
        $arItem['AUTHOR_NAME'] = $res['NAME'];

        $smallPicArray = CFile::GetFileArray($res['PROPERTY_IMG_VALUE']);
        $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 64, 'height' => 64), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $smallPic = $smallPicData['src'];
        $arItem['AUTHOR_PHOTO'] = $smallPic;
    }
}
