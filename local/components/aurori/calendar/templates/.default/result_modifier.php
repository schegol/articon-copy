<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult['MONTHS'] as &$arMonth) {
    foreach ($arMonth['DAYS'] as &$arDay) {
        if (empty($arDay['EVENT']))
            continue;

        $srcDirectionIBlockId = $arResult['DIRECTIONS_IBLOCK_ID'];
        $srcDirectionId = $arDay['EVENT']['PROPERTY_DIRECTION_VALUE'];

        $obSrc = CIBlockElement::GetList(
            array('ID' => 'ASC'),
            array('IBLOCK_ID' => $srcDirectionIBlockId, 'ID' => $srcDirectionId),
            false,
            false,
            array('IBLOCK_ID')
        );

        if ($resSrc = $obSrc->GetNextElement()) {
            $props = $resSrc->getProperties();

            $arDay['EVENT']['PROPERTY_BG_COLOR_XML_ID'] = $props['BG_COLOR']['VALUE_XML_ID'];

            /***/

            $lecturersIBlockId = $props['LECTURER']['LINK_IBLOCK_ID'];
            $lecturerId = $props['LECTURER']['VALUE'];

            $oLecturer = CIBlockElement::GetList(
                array('ID' => 'ASC'),
                array('IBLOCK_ID' => $lecturersIBlockId, 'ID' => $lecturerId),
                false,
                false,
                array('NAME', 'PROPERTY_IMG')
            );

            if ($arLecturer = $oLecturer->GetNext()) {
                $arDay['EVENT']['LECTURER_DATA']['NAME'] = $arLecturer['NAME'];

                $smallPicArray = CFile::GetFileArray($arLecturer['PROPERTY_IMG_VALUE']);
                $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 60, 'height' => 60), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                $smallPic = $smallPicData['src'];
                $arDay['EVENT']['LECTURER_DATA']['AVATAR'] = $smallPic;
            }

        }
    }
}