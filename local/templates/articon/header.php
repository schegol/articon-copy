<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Page\Asset;
$page = $APPLICATION->GetCurPage();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <?
    $APPLICATION->ShowHead();

    CJSCore::Init();

    Asset::getInstance()->addString('<meta charset="utf-8">');
    Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">');
    Asset::getInstance()->addString('<link rel="icon" href="'.SITE_TEMPLATE_PATH.'/images/favicon.png">');
    Asset::getInstance()->addString('<meta property="og:image" content="'.SITE_TEMPLATE_PATH.'/images/preview.jpg">');

    //Asset::getInstance()->addJs('https://api-maps.yandex.ru/2.1/?lang=ru_RU');
    //Asset::getInstance()->addJs('https://api-maps.yandex.ru/2.1/?apikey=6ef172ee-88c5-4e71-b501-6d2b7099dca7&lang=ru_RU');

    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/libs/jquery/jquery-3.6.0.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/libs/bootstrap/js/bootstrap.bundle.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/libs/imask/dist/imask.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/libs/swiper/swiper-bundle.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/libs/fancybox-3.5.7/dist/jquery.fancybox.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/common.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/custom.js');

    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/libs/bootstrap/css/bootstrap.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/libs/swiper/swiper-bundle.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/libs/fancybox-3.5.7/dist/jquery.fancybox.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/main.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/media.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/custom.css');
    ?>

    <title><?$APPLICATION->ShowTitle()?></title>
</head>

<body class="page page--main">
    <?$APPLICATION->ShowPanel()?>

    <div class="page-inner">
        <?$APPLICATION->IncludeComponent(
            "bitrix:menu",
            "header_mobile",
            Array(
                "ALLOW_MULTI_SELECT" => "N",
                "CHILD_MENU_TYPE" => "left",
                "DELAY" => "N",
                "MAX_LEVEL" => "1",
                "MENU_CACHE_GET_VARS" => array(""),
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "ROOT_MENU_TYPE" => "main",
                "USE_EXT" => "N"
            )
        );?>

        <header>
            <div class="topline-block">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="topline">
                                <div class="topline-left">
                                    <div class="logo-wrapper">
                                        <a class="logo"<?=$page == '/' ? '' : ' href="/"'?>>
                                            <div class="logo-img">
                                                <?$APPLICATION->IncludeComponent(
                                                    "bitrix:main.include",
                                                    "",
                                                    Array(
                                                        "AREA_FILE_SHOW" => "file",
                                                        "AREA_FILE_SUFFIX" => "",
                                                        "EDIT_TEMPLATE" => "",
                                                        "PATH" => "/include/site_logo.php"
                                                    )
                                                );?>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:menu",
                                    "header_desktop",
                                    Array(
                                        "ALLOW_MULTI_SELECT" => "N",
                                        "CHILD_MENU_TYPE" => "left",
                                        "DELAY" => "N",
                                        "MAX_LEVEL" => "1",
                                        "MENU_CACHE_GET_VARS" => array(""),
                                        "MENU_CACHE_TIME" => "3600",
                                        "MENU_CACHE_TYPE" => "N",
                                        "MENU_CACHE_USE_GROUPS" => "Y",
                                        "ROOT_MENU_TYPE" => "main",
                                        "USE_EXT" => "N"
                                    )
                                );?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <?if ($page != '/'):?>
            <?$APPLICATION->IncludeComponent(
                "bitrix:breadcrumb",
                "",
                Array(
                    "COMPOSITE_FRAME_MODE" => "A",
                    "COMPOSITE_FRAME_TYPE" => "AUTO",
                    "PATH" => "",
                    "SITE_ID" => "s1",
                    "START_FROM" => "0"
                )
            );?>
        <?endif?>
