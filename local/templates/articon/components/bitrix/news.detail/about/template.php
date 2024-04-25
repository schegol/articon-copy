<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);?>

<?if (!empty($arResult)):?>
    <section class="section-about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="s-about-block">
                        <div class="row">
                            <div class="col-12 col-lg-<?=strlen($arResult['PROPERTIES']['TEXT_BLOCK_1_IMG']['VALUE']) ? '6' : '12'?>">
                                <div class="s-about-left">
                                    <div class="section-title-block">
                                        <h1 class="section-title">
                                            <?=$APPLICATION->GetTitle()?>
                                        </h1>
                                    </div>
                                    <?if (strlen($arResult['PROPERTIES']['TEXT_BLOCK_1_HEADING']['VALUE']) || strlen($arResult['PROPERTIES']['TEXT_BLOCK_1_TEXT']['VALUE']['TEXT'])):?>
                                        <div class="s-about-text-block">
                                            <?if (strlen($arResult['PROPERTIES']['TEXT_BLOCK_1_HEADING']['VALUE'])):?>
                                                <div class="s-about-text-title">
                                                    <?=$arResult['PROPERTIES']['TEXT_BLOCK_1_HEADING']['VALUE']?>
                                                </div>
                                            <?endif?>

                                            <?if (strlen($arResult['PROPERTIES']['TEXT_BLOCK_1_TEXT']['VALUE']['TEXT'])):?>
                                                <div class="s-about-text">
                                                    <?if ($arResult['PROPERTIES']['TEXT_BLOCK_1_TEXT']['VALUE']['TYPE'] == 'text'):?>
                                                        <p>
                                                            <?=$arResult['PROPERTIES']['TEXT_BLOCK_1_TEXT']['VALUE']['TEXT']?>
                                                        </p>
                                                    <?else:?>
                                                        <?=$arResult['PROPERTIES']['TEXT_BLOCK_1_TEXT']['~VALUE']['TEXT']?>
                                                    <?endif?>
                                                </div>
                                            <?endif?>
                                        </div>
                                    <?endif?>
                                </div>
                            </div>
                            <?if (strlen($arResult['PROPERTIES']['TEXT_BLOCK_1_IMG']['VALUE'])):
                                $smallPicArray = CFile::GetFileArray($arResult['PROPERTIES']['TEXT_BLOCK_1_IMG']['VALUE']);
                                $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 710, 'height' => 710), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                $smallPic = $smallPicData['src'];
                            ?>
                                <div class="col-12 col-lg-6">
                                    <div class="s-about-right">
                                        <div class="s-about-img">
                                            <img class="image" src="<?=$smallPic?>" alt="<?=$arResult['PROPERTIES']['TEXT_BLOCK_1_HEADING']['VALUE']?>">
                                        </div>
                                    </div>
                                </div>
                            <?endif?>
                        </div>
                    </div>
                    <div class="about-mission-block">
                        <div class="row">
                            <div class="col-12 col-lg-4 col-xxl-3">
                                <div class="about-mission-left">
                                    <div class="about-mission-info">
                                        <?if (strlen($arResult['PROPERTIES']['TEXT_BLOCK_2_HEADING']['VALUE'])):?>
                                            <div class="h3 about-mission-info-title">
                                                <?=$arResult['PROPERTIES']['TEXT_BLOCK_2_HEADING']['VALUE']?>
                                            </div>
                                        <?endif?>

                                        <?if (strlen($arResult['PROPERTIES']['TEXT_BLOCK_2_TEXT_TOP']['VALUE']['TEXT'])):?>
                                            <div class="about-mission-info-descr">
                                                <?if ($arResult['PROPERTIES']['TEXT_BLOCK_2_TEXT_TOP']['VALUE']['TYPE'] == 'text'):?>
                                                    <p>
                                                        <?=$arResult['PROPERTIES']['TEXT_BLOCK_2_TEXT_TOP']['VALUE']['TEXT']?>
                                                    </p>
                                                <?else:?>
                                                    <?=$arResult['PROPERTIES']['TEXT_BLOCK_2_TEXT_TOP']['~VALUE']['TEXT']?>
                                                <?endif?>
                                            </div>
                                        <?endif?>
                                    </div>

                                    <?if (strlen($arResult['PROPERTIES']['DIRECTIOR_PHOTO']['VALUE']) || strlen($arResult['PROPERTIES']['DIRECTIOR_POSITION']['VALUE']['TEXT']) || strlen($arResult['PROPERTIES']['DIRECTIOR_NAME']['VALUE'])):?>
                                        <div class="about-mission-admin">
                                            <?if (strlen($arResult['PROPERTIES']['DIRECTIOR_PHOTO']['VALUE'])):
                                                $smallPicArray = CFile::GetFileArray($arResult['PROPERTIES']['DIRECTIOR_PHOTO']['VALUE']);
                                                $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 190, 'height' => 190), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                $smallPic = $smallPicData['src'];
                                            ?>
                                                <div class="about-mission-admin-img">
                                                    <img class="image" src="<?=$smallPic?>" alt="<?=$arResult['PROPERTIES']['DIRECTIOR_NAME']['VALUE']?>">
                                                </div>
                                            <?endif?>

                                            <div class="about-mission-admin-info">
                                                <?if (strlen($arResult['PROPERTIES']['DIRECTIOR_POSITION']['VALUE']['TEXT'])):?>
                                                    <div class="about-mission-admin-state-wrapper">
                                                        <div class="about-mission-admin-state">
                                                            <?=$arResult['PROPERTIES']['DIRECTIOR_POSITION']['~VALUE']['TEXT']?>
                                                        </div>
                                                        <?if (strlen($arResult['PROPERTIES']['DIRECTIOR_NAME']['VALUE'])):?>
                                                            <div class="about-mission-admin-state-bridge"></div>
                                                        <?endif?>
                                                    </div>
                                                <?endif?>

                                                <?if (strlen($arResult['PROPERTIES']['DIRECTIOR_NAME']['VALUE'])):?>
                                                    <div class="about-mission-admin-name-wrapper">
                                                        <div class="h4 about-mission-admin-name">
                                                            <?=$arResult['PROPERTIES']['DIRECTIOR_NAME']['VALUE']?>
                                                        </div>
                                                    </div>
                                                <?endif?>
                                            </div>
                                        </div>
                                    <?endif?>
                                </div>
                            </div>
                            <div class="col-12 col-lg-8 col-xxl-9">
                                <div class="about-mission-right">
                                    <div class="about-mission-info">
                                        <?if (strlen($arResult['PROPERTIES']['TEXT_BLOCK_2_HEADING']['VALUE'])):?>
                                            <div class="h3 about-mission-info-title d-none d-lg-block">
                                                <?=$arResult['PROPERTIES']['TEXT_BLOCK_2_HEADING']['VALUE']?>
                                            </div>
                                        <?endif?>
                                        <?if (strlen($arResult['PROPERTIES']['TEXT_BLOCK_2_TEXT_TOP']['VALUE']['TEXT']) || strlen($arResult['PROPERTIES']['TEXT_BLOCK_2_TEXT_BOTTOM']['VALUE']['TEXT'])):?>
                                            <div class="about-mission-info-descr">
                                                <?if (strlen($arResult['PROPERTIES']['TEXT_BLOCK_2_TEXT_TOP']['VALUE']['TEXT'])):?>
                                                    <div class="d-none d-lg-block">
                                                        <?if ($arResult['PROPERTIES']['TEXT_BLOCK_2_TEXT_TOP']['VALUE']['TYPE'] == 'text'):?>
                                                            <p>
                                                                <?=$arResult['PROPERTIES']['TEXT_BLOCK_2_TEXT_TOP']['VALUE']['TEXT']?>
                                                            </p>
                                                        <?else:?>
                                                            <?=$arResult['PROPERTIES']['TEXT_BLOCK_2_TEXT_TOP']['~VALUE']['TEXT']?>
                                                        <?endif?>
                                                    </div>
                                                <?endif?>

                                                <?if (strlen($arResult['PROPERTIES']['TEXT_BLOCK_2_TEXT_BOTTOM']['VALUE']['TEXT'])):?>
                                                    <?if ($arResult['PROPERTIES']['TEXT_BLOCK_2_TEXT_BOTTOM']['VALUE']['TYPE'] == 'text'):?>
                                                        <p>
                                                            <?=$arResult['PROPERTIES']['TEXT_BLOCK_2_TEXT_BOTTOM']['VALUE']['TEXT']?>
                                                        </p>
                                                    <?else:?>
                                                        <?=$arResult['PROPERTIES']['TEXT_BLOCK_2_TEXT_BOTTOM']['~VALUE']['TEXT']?>
                                                    <?endif?>
                                                <?endif?>
                                            </div>
                                        <?endif?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?if (
        is_array($arResult['PROPERTIES']['GALLERY_1_PHOTOS']['VALUE']) && !empty($arResult['PROPERTIES']['GALLERY_1_PHOTOS']['VALUE'])
        || is_array($arResult['PROPERTIES']['GALLERY_2_PHOTOS']['VALUE']) && !empty($arResult['PROPERTIES']['GALLERY_2_PHOTOS']['VALUE'])
        || is_array($arResult['PROPERTIES']['GALLERY_3_PHOTOS']['VALUE']) && !empty($arResult['PROPERTIES']['GALLERY_3_PHOTOS']['VALUE'])
        || is_array($arResult['PROPERTIES']['GALLERY_4_PHOTOS']['VALUE']) && !empty($arResult['PROPERTIES']['GALLERY_4_PHOTOS']['VALUE'])
    ):?>
        <section class="section-about-photo">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="about-photo-top-block">
                            <h2><?=GetMessage('NEWS_DETAIL_ABOUT_GALLERIES_HEADING')?></h2>
                        </div>
                        <div class="about-photo-items-block">
                            <div class="about-photo-items">
                                <?if (is_array($arResult['PROPERTIES']['GALLERY_1_PHOTOS']['VALUE']) && !empty($arResult['PROPERTIES']['GALLERY_1_PHOTOS']['VALUE'])):?>
                                    <div class="about-photo-item-wrapper about-photo-item-wrapper--1">
                                        <div class="about-photo-item about-photo-item--purple">
                                            <div class="about-photo-item-inner">
                                                <?if (strlen($arResult['PROPERTIES']['GALLERY_1_HEADING']['VALUE'])):?>
                                                    <div class="about-photo-item-title h4">
                                                        <?=$arResult['PROPERTIES']['GALLERY_1_HEADING']['VALUE']?>
                                                    </div>
                                                <?endif?>

                                                <?if (strlen($arResult['PROPERTIES']['GALLERY_1_COVER']['VALUE'])):
                                                    $smallPicArray = CFile::GetFileArray($arResult['PROPERTIES']['GALLERY_1_COVER']['VALUE']);
                                                    $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 540, 'height' => 540), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                    $smallPic = $smallPicData['src'];
                                                ?>
                                                    <div class="about-photo-item-img-block">
                                                        <div class="about-photo-item-img-back">
                                                            <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/about-photo-item-img-back.svg" alt="<?=GetMessage('NEWS_DETAIL_ABOUT_GALLERY_DECORATION_IMG')?>">
                                                        </div>
                                                        <div class="about-photo-item-img">
                                                            <img class="image" src="<?=$smallPic?>" alt="<?=$arResult['PROPERTIES']['GALLERY_1_HEADING']['VALUE']?>">
                                                        </div>
                                                    </div>
                                                <?endif?>

                                                <div class="about-photo-item-more-link-block">
                                                    <a class="more-link modal-btn" href="#modal-photos--1">
                                                        <?=GetMessage('NEWS_DETAIL_ABOUT_GALLERY_TRIGGER')?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-none">
                                            <div class="fb-modal fb-modal--photos" id="modal-photos--1">
                                                <div class="fb-modal-inner">
                                                    <div class="modal-photo-block">
                                                        <?if (strlen($arResult['PROPERTIES']['GALLERY_1_HEADING']['VALUE'])):?>
                                                            <div class="modal-photo-title-block">
                                                                <div class="h2 modal-photo-title">
                                                                    <?=$arResult['PROPERTIES']['GALLERY_1_HEADING']['VALUE']?>
                                                                </div>
                                                            </div>
                                                        <?endif?>

                                                        <div class="modal-photo-slider-block">
                                                            <div class="modal-photo-slider modal-photo-slider--1 swiper-slider">
                                                                <div class="swiper">
                                                                    <div class="swiper-wrapper">
                                                                        <?foreach ($arResult['PROPERTIES']['GALLERY_1_PHOTOS']['VALUE'] as $i => $slide):?>
                                                                            <div class="modal-photo-slide swiper-slide">
                                                                                <div class="modal-photo-slide-item">
                                                                                    <div class="modal-photo-slide-img">
                                                                                        <img class="image" src="<?=CFile::GetPath($slide)?>" alt="<?=GetMessage('NEWS_DETAIL_ABOUT_GALLERY_IMG_ALT', array('#HEADING#' => $arResult['PROPERTIES']['GALLERY_1_HEADING']['VALUE'], '#NUMBER#' => ($i+1)))?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?endforeach?>
                                                                    </div>
                                                                </div>

                                                                <div class="swiper-button-prev"></div>
                                                                <div class="swiper-button-next"></div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-photo-thumb-slider-block">
                                                            <div class="modal-photo-thumb-slider modal-photo-thumb-slider--course swiper-slider">
                                                                <div class="swiper">
                                                                    <div class="swiper-wrapper">
                                                                        <?foreach ($arResult['PROPERTIES']['GALLERY_1_PHOTOS']['VALUE'] as $i => $slide):
                                                                            $smallPicArray = CFile::GetFileArray($slide);
                                                                            $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 254, 'height' => 254), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                                            $smallPic = $smallPicData['src'];
                                                                        ?>
                                                                            <div class="modal-photo-thumb-slide swiper-slide">
                                                                                <div class="modal-photo-thumb-slide-item">
                                                                                    <div class="modal-photo-thumb-slide-item-img">
                                                                                        <img class="image" src="<?=$smallPic?>" alt="<?=GetMessage('NEWS_DETAIL_ABOUT_GALLERY_IMG_ALT', array('#HEADING#' => $arResult['PROPERTIES']['GALLERY_1_HEADING']['VALUE'], '#NUMBER#' => ($i+1)))?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?endforeach?>
                                                                    </div>
                                                                </div>

                                                                <div class="swiper-pagination"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?endif?>

                                <?if (is_array($arResult['PROPERTIES']['GALLERY_2_PHOTOS']['VALUE']) && !empty($arResult['PROPERTIES']['GALLERY_2_PHOTOS']['VALUE'])):?>
                                    <div class="about-photo-item-wrapper about-photo-item-wrapper--2">
                                        <div class="about-photo-item about-photo-item--purple">
                                            <div class="about-photo-item-inner">
                                                <?if (strlen($arResult['PROPERTIES']['GALLERY_2_HEADING']['VALUE'])):?>
                                                    <div class="about-photo-item-title h4">
                                                        <?=$arResult['PROPERTIES']['GALLERY_2_HEADING']['VALUE']?>
                                                    </div>
                                                <?endif?>

                                                <?if (strlen($arResult['PROPERTIES']['GALLERY_2_COVER']['VALUE'])):
                                                    $smallPicArray = CFile::GetFileArray($arResult['PROPERTIES']['GALLERY_2_COVER']['VALUE']);
                                                    $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 540, 'height' => 540), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                    $smallPic = $smallPicData['src'];
                                                    ?>
                                                    <div class="about-photo-item-img-block">
                                                        <div class="about-photo-item-img-back">
                                                            <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/about-photo-item-img-back.svg" alt="<?=GetMessage('NEWS_DETAIL_ABOUT_GALLERY_DECORATION_IMG')?>">
                                                        </div>
                                                        <div class="about-photo-item-img">
                                                            <img class="image" src="<?=$smallPic?>" alt="<?=$arResult['PROPERTIES']['GALLERY_2_HEADING']['VALUE']?>">
                                                        </div>
                                                    </div>
                                                <?endif?>

                                                <div class="about-photo-item-more-link-block">
                                                    <a class="more-link modal-btn" href="#modal-photos--2">
                                                        <?=GetMessage('NEWS_DETAIL_ABOUT_GALLERY_TRIGGER')?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-none">
                                            <div class="fb-modal fb-modal--photos" id="modal-photos--2">
                                                <div class="fb-modal-inner">
                                                    <div class="modal-photo-block">
                                                        <?if (strlen($arResult['PROPERTIES']['GALLERY_2_HEADING']['VALUE'])):?>
                                                            <div class="modal-photo-title-block">
                                                                <div class="h2 modal-photo-title">
                                                                    <?=$arResult['PROPERTIES']['GALLERY_2_HEADING']['VALUE']?>
                                                                </div>
                                                            </div>
                                                        <?endif?>

                                                        <div class="modal-photo-slider-block">
                                                            <div class="modal-photo-slider modal-photo-slider--2 swiper-slider">
                                                                <div class="swiper">
                                                                    <div class="swiper-wrapper">
                                                                        <?foreach ($arResult['PROPERTIES']['GALLERY_2_PHOTOS']['VALUE'] as $i => $slide):?>
                                                                            <div class="modal-photo-slide swiper-slide">
                                                                                <div class="modal-photo-slide-item">
                                                                                    <div class="modal-photo-slide-img">
                                                                                        <img class="image" src="<?=CFile::GetPath($slide)?>" alt="<?=GetMessage('NEWS_DETAIL_ABOUT_GALLERY_IMG_ALT', array('#HEADING#' => $arResult['PROPERTIES']['GALLERY_2_HEADING']['VALUE'], '#NUMBER#' => ($i+1)))?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?endforeach?>
                                                                    </div>
                                                                </div>

                                                                <div class="swiper-button-prev"></div>
                                                                <div class="swiper-button-next"></div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-photo-thumb-slider-block">
                                                            <div class="modal-photo-thumb-slider modal-photo-thumb-slider--course swiper-slider">
                                                                <div class="swiper">
                                                                    <div class="swiper-wrapper">
                                                                        <?foreach ($arResult['PROPERTIES']['GALLERY_2_PHOTOS']['VALUE'] as $i => $slide):
                                                                            $smallPicArray = CFile::GetFileArray($slide);
                                                                            $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 254, 'height' => 254), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                                            $smallPic = $smallPicData['src'];
                                                                            ?>
                                                                            <div class="modal-photo-thumb-slide swiper-slide">
                                                                                <div class="modal-photo-thumb-slide-item">
                                                                                    <div class="modal-photo-thumb-slide-item-img">
                                                                                        <img class="image" src="<?=$smallPic?>" alt="<?=GetMessage('NEWS_DETAIL_ABOUT_GALLERY_IMG_ALT', array('#HEADING#' => $arResult['PROPERTIES']['GALLERY_2_HEADING']['VALUE'], '#NUMBER#' => ($i+1)))?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?endforeach?>
                                                                    </div>
                                                                </div>

                                                                <div class="swiper-pagination"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?endif?>

                                <?if (is_array($arResult['PROPERTIES']['GALLERY_3_PHOTOS']['VALUE']) && !empty($arResult['PROPERTIES']['GALLERY_3_PHOTOS']['VALUE'])):?>
                                    <div class="about-photo-item-wrapper about-photo-item-wrapper--3">
                                        <div class="about-photo-item about-photo-item--purple">
                                            <div class="about-photo-item-inner">
                                                <?if (strlen($arResult['PROPERTIES']['GALLERY_3_HEADING']['VALUE'])):?>
                                                    <div class="about-photo-item-title h4">
                                                        <?=$arResult['PROPERTIES']['GALLERY_3_HEADING']['VALUE']?>
                                                    </div>
                                                <?endif?>

                                                <?if (strlen($arResult['PROPERTIES']['GALLERY_3_COVER']['VALUE'])):
                                                    $smallPicArray = CFile::GetFileArray($arResult['PROPERTIES']['GALLERY_3_COVER']['VALUE']);
                                                    $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 540, 'height' => 540), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                    $smallPic = $smallPicData['src'];
                                                    ?>
                                                    <div class="about-photo-item-img-block">
                                                        <div class="about-photo-item-img-back">
                                                            <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/about-photo-item-img-back.svg" alt="<?=GetMessage('NEWS_DETAIL_ABOUT_GALLERY_DECORATION_IMG')?>">
                                                        </div>
                                                        <div class="about-photo-item-img">
                                                            <img class="image" src="<?=$smallPic?>" alt="<?=$arResult['PROPERTIES']['GALLERY_3_HEADING']['VALUE']?>">
                                                        </div>
                                                    </div>
                                                <?endif?>

                                                <div class="about-photo-item-more-link-block">
                                                    <a class="more-link modal-btn" href="#modal-photos--3">
                                                        <?=GetMessage('NEWS_DETAIL_ABOUT_GALLERY_TRIGGER')?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-none">
                                            <div class="fb-modal fb-modal--photos" id="modal-photos--3">
                                                <div class="fb-modal-inner">
                                                    <div class="modal-photo-block">
                                                        <?if (strlen($arResult['PROPERTIES']['GALLERY_3_HEADING']['VALUE'])):?>
                                                            <div class="modal-photo-title-block">
                                                                <div class="h2 modal-photo-title">
                                                                    <?=$arResult['PROPERTIES']['GALLERY_3_HEADING']['VALUE']?>
                                                                </div>
                                                            </div>
                                                        <?endif?>

                                                        <div class="modal-photo-slider-block">
                                                            <div class="modal-photo-slider modal-photo-slider--3 swiper-slider">
                                                                <div class="swiper">
                                                                    <div class="swiper-wrapper">
                                                                        <?foreach ($arResult['PROPERTIES']['GALLERY_3_PHOTOS']['VALUE'] as $i => $slide):?>
                                                                            <div class="modal-photo-slide swiper-slide">
                                                                                <div class="modal-photo-slide-item">
                                                                                    <div class="modal-photo-slide-img">
                                                                                        <img class="image" src="<?=CFile::GetPath($slide)?>" alt="<?=GetMessage('NEWS_DETAIL_ABOUT_GALLERY_IMG_ALT', array('#HEADING#' => $arResult['PROPERTIES']['GALLERY_3_HEADING']['VALUE'], '#NUMBER#' => ($i+1)))?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?endforeach?>
                                                                    </div>
                                                                </div>

                                                                <div class="swiper-button-prev"></div>
                                                                <div class="swiper-button-next"></div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-photo-thumb-slider-block">
                                                            <div class="modal-photo-thumb-slider modal-photo-thumb-slider--course swiper-slider">
                                                                <div class="swiper">
                                                                    <div class="swiper-wrapper">
                                                                        <?foreach ($arResult['PROPERTIES']['GALLERY_3_PHOTOS']['VALUE'] as $i => $slide):
                                                                            $smallPicArray = CFile::GetFileArray($slide);
                                                                            $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 254, 'height' => 254), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                                            $smallPic = $smallPicData['src'];
                                                                            ?>
                                                                            <div class="modal-photo-thumb-slide swiper-slide">
                                                                                <div class="modal-photo-thumb-slide-item">
                                                                                    <div class="modal-photo-thumb-slide-item-img">
                                                                                        <img class="image" src="<?=$smallPic?>" alt="<?=GetMessage('NEWS_DETAIL_ABOUT_GALLERY_IMG_ALT', array('#HEADING#' => $arResult['PROPERTIES']['GALLERY_3_HEADING']['VALUE'], '#NUMBER#' => ($i+1)))?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?endforeach?>
                                                                    </div>
                                                                </div>

                                                                <div class="swiper-pagination"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?endif?>

                                <?if (is_array($arResult['PROPERTIES']['GALLERY_4_PHOTOS']['VALUE']) && !empty($arResult['PROPERTIES']['GALLERY_4_PHOTOS']['VALUE'])):?>
                                    <div class="about-photo-item-wrapper about-photo-item-wrapper--4">
                                        <div class="about-photo-item about-photo-item--purple">
                                            <div class="about-photo-item-inner">
                                                <?if (strlen($arResult['PROPERTIES']['GALLERY_4_HEADING']['VALUE'])):?>
                                                    <div class="about-photo-item-title h4">
                                                        <?=$arResult['PROPERTIES']['GALLERY_4_HEADING']['VALUE']?>
                                                    </div>
                                                <?endif?>

                                                <?if (strlen($arResult['PROPERTIES']['GALLERY_4_COVER']['VALUE'])):
                                                    $smallPicArray = CFile::GetFileArray($arResult['PROPERTIES']['GALLERY_4_COVER']['VALUE']);
                                                    $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 540, 'height' => 540), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                    $smallPic = $smallPicData['src'];
                                                    ?>
                                                    <div class="about-photo-item-img-block">
                                                        <div class="about-photo-item-img-back">
                                                            <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/about-photo-item-img-back.svg" alt="<?=GetMessage('NEWS_DETAIL_ABOUT_GALLERY_DECORATION_IMG')?>">
                                                        </div>
                                                        <div class="about-photo-item-img">
                                                            <img class="image" src="<?=$smallPic?>" alt="<?=$arResult['PROPERTIES']['GALLERY_4_HEADING']['VALUE']?>">
                                                        </div>
                                                    </div>
                                                <?endif?>

                                                <div class="about-photo-item-more-link-block">
                                                    <a class="more-link modal-btn" href="#modal-photos--4">
                                                        <?=GetMessage('NEWS_DETAIL_ABOUT_GALLERY_TRIGGER')?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-none">
                                            <div class="fb-modal fb-modal--photos" id="modal-photos--4">
                                                <div class="fb-modal-inner">
                                                    <div class="modal-photo-block">
                                                        <?if (strlen($arResult['PROPERTIES']['GALLERY_4_HEADING']['VALUE'])):?>
                                                            <div class="modal-photo-title-block">
                                                                <div class="h2 modal-photo-title">
                                                                    <?=$arResult['PROPERTIES']['GALLERY_4_HEADING']['VALUE']?>
                                                                </div>
                                                            </div>
                                                        <?endif?>

                                                        <div class="modal-photo-slider-block">
                                                            <div class="modal-photo-slider modal-photo-slider--4 swiper-slider">
                                                                <div class="swiper">
                                                                    <div class="swiper-wrapper">
                                                                        <?foreach ($arResult['PROPERTIES']['GALLERY_4_PHOTOS']['VALUE'] as $i => $slide):?>
                                                                            <div class="modal-photo-slide swiper-slide">
                                                                                <div class="modal-photo-slide-item">
                                                                                    <div class="modal-photo-slide-img">
                                                                                        <img class="image" src="<?=CFile::GetPath($slide)?>" alt="<?=GetMessage('NEWS_DETAIL_ABOUT_GALLERY_IMG_ALT', array('#HEADING#' => $arResult['PROPERTIES']['GALLERY_4_HEADING']['VALUE'], '#NUMBER#' => ($i+1)))?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?endforeach?>
                                                                    </div>
                                                                </div>

                                                                <div class="swiper-button-prev"></div>
                                                                <div class="swiper-button-next"></div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-photo-thumb-slider-block">
                                                            <div class="modal-photo-thumb-slider modal-photo-thumb-slider--course swiper-slider">
                                                                <div class="swiper">
                                                                    <div class="swiper-wrapper">
                                                                        <?foreach ($arResult['PROPERTIES']['GALLERY_4_PHOTOS']['VALUE'] as $i => $slide):
                                                                            $smallPicArray = CFile::GetFileArray($slide);
                                                                            $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 254, 'height' => 254), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                                            $smallPic = $smallPicData['src'];
                                                                            ?>
                                                                            <div class="modal-photo-thumb-slide swiper-slide">
                                                                                <div class="modal-photo-thumb-slide-item">
                                                                                    <div class="modal-photo-thumb-slide-item-img">
                                                                                        <img class="image" src="<?=$smallPic?>" alt="<?=GetMessage('NEWS_DETAIL_ABOUT_GALLERY_IMG_ALT', array('#HEADING#' => $arResult['PROPERTIES']['GALLERY_4_HEADING']['VALUE'], '#NUMBER#' => ($i+1)))?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?endforeach?>
                                                                    </div>
                                                                </div>

                                                                <div class="swiper-pagination"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?endif?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?endif?>
<?endif?>