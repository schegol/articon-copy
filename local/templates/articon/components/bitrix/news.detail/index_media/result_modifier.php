<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if (is_array($arResult['PROPERTIES']['YT_VIDEOS']['VALUE']) && !empty($arResult['PROPERTIES']['YT_VIDEOS']['VALUE'])) {
    $videos = [];

    foreach ($arResult['PROPERTIES']['YT_VIDEOS']['VALUE'] as $videoLink) {
        $arrUrl = parse_url($videoLink);

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

        $videos[] = [
            'IFRAME' => '<iframe class="video-iframe" type="text/html" width="100%" height="360" src="https://www.youtube.com/embed/'.$videoID.'"></iframe>',
            'SRC' => 'https://www.youtube.com/watch?v='.$videoID,
            'THUMB_MQ' => 'https://img.youtube.com/vi/'.$videoID.'/mqdefault.jpg',
            'THUMB_HQ' => 'https://img.youtube.com/vi/'.$videoID.'/hqdefault.jpg',
            'THUMB_SD' => 'https://img.youtube.com/vi/'.$videoID.'/sddefault.jpg',
            'THUMB_MAX' => 'https://img.youtube.com/vi/'.$videoID.'/maxresdefault.jpg',
            'ID' => $videoID,
        ];
    }

    $arResult['VIDEOS'] = $videos;
}