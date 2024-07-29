<meta name="yandex-verification" content="6ebc4699553b87e2" /><?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Page\Asset;
$page = $APPLICATION->GetCurPage();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K9GKZNTR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<meta name="yandex-verification" content="6ebc4699553b87e2" />
	<meta name="google-site-verification" content="Mk56HxuzpftjQfc_iYfxgKsndP5Yx9g_dYIWJCHSnec" />
	<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(97890442, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/97890442" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-21L0WHEBBE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-21L0WHEBBE');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K9GKZNTR');</script>
<!-- End Google Tag Manager -->
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
	<meta property="og:type" content="website">
	<meta property="og:title" content="Dental Korzina">
	<meta property="og:description" content="Учебный центр Dental Korzina - это практикующие лекторы высокого уровня, просторные учебные классы, профессиональное оборудование, зоны отдыха и пространства для проведения кофе-брейков и обедов.">
	<meta property="og:url" content="http://dk-edu.com/">
	<meta property="og:image" content="http://dk-edu.com/local/templates/articon/images/logo.png">
	<meta property="og:site_name" content="Dental Korzina">
	<meta property="og:locale" content="ru_RU">
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
