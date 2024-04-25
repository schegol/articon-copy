<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = 'https://';
else
    $url = 'http://';

$url .= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

$arResult['CURRENT_LINK'] = $url;
$arResult['TELEGRAM_SHARE_LINK'] = 'https://t.me/share/url?url='.$url;
$arResult['VK_SHARE_LINK'] = 'https://vk.com/share.php?url='.$url;

/***/

if (strlen($arResult['PROPERTIES']['AUTHOR']['VALUE']) && (int)$arResult['PROPERTIES']['AUTHOR']['VALUE'] > 0) {
    $authorIBlockId = $arResult['PROPERTIES']['AUTHOR']['LINK_IBLOCK_ID'];
    $authorId = $arResult['PROPERTIES']['AUTHOR']['VALUE'];

    $obj = CIBlockElement::GetList(
        array('ID' => 'ASC'),
        array('IBLOCK_ID' => $authorIBlockId, 'ID' => $authorId),
        false,
        false,
        array('NAME', 'PROPERTY_IMG', 'PROPERTY_POSITION')
    );

    if ($res = $obj->GetNext()) {
        $arResult['AUTHOR_NAME'] = $res['NAME'];

        $arResult['AUTHOR_POSITION'] = html_entity_decode($res['PROPERTY_POSITION_VALUE']);

        $smallPicArray = CFile::GetFileArray($res['PROPERTY_IMG_VALUE']);
        $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 130, 'height' => 130), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $smallPic = $smallPicData['src'];
        $arResult['AUTHOR_PHOTO'] = $smallPic;
    }
}
