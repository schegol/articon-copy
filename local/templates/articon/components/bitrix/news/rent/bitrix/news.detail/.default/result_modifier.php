<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if (strlen($arResult['PROPERTIES']['YT_VIDEO']['VALUE'])) {
    $arrUrl = parse_url($arResult['PROPERTIES']['YT_VIDEO']['VALUE']);

    if (isset($arrUrl['query'])) {
        $arrUrlGet = explode('&', $arrUrl['query']);
        foreach ($arrUrlGet as $value) {
            $arrGetParam = explode('=', $value);
            if (!strcmp(array_shift($arrGetParam), 'v')) {
                $videoID = array_pop($arrGetParam);
                break;
            }
        }
        if (empty($videoID)) {
            $videoID = array_pop(explode('/', $arrUrl['path']));
        }
    } else {
        $videoID = array_pop(explode('/', $url));
    }

    $arResult['YT_VIDEO_IFRAME'] = '<iframe class="video-iframe" id="ytplayer" type="text/html" width="100%" height="360" src="https://www.youtube.com/embed/'.$videoID.'"></iframe>';
}