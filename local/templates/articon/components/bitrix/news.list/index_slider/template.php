<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?if (!empty($arResult['ITEMS'])):?>
    <section class="section-mp-one">
        <div class="bg-figure-1">
            <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/bg-figure-1.svg" alt="<?=GetMessage('NEWS_LIST_INDEX_SLIDER_DECORATION_ALT')?>">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mp-one-slider-block">
                        <div class="mp-one-slider">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <?foreach ($arResult['ITEMS'] as $arItem):?>
                                        <div class="mp-one-slide swiper-slide">
                                            <div class="mp-one-slide-item<?=!strlen($arItem['PROPERTIES']['MAIN_IMG']['VALUE']) && strlen($arItem['PROPERTIES']['VIDEO']['VALUE']) ? ' mp-one-slide-item--video' : ''?>">
                                                <?if (strlen($arItem['PROPERTIES']['BG_IMG']['VALUE'])):?>
                                                    <div class="mp-one-slide-item__bg">
                                                        <img class="image" src="<?=CFile::GetPath($arItem['PROPERTIES']['BG_IMG']['VALUE'])?>" alt="<?=GetMessage('NEWS_LIST_INDEX_SLIDER_BG_ALT')?>">
                                                    </div>
                                                <?endif?>

                                                <?if (strlen($arItem['PROPERTIES']['TEXT']['VALUE'])):?>
                                                    <div class="h1 mp-one-slide-item__title<?=$arItem['PROPERTIES']['WHITE_HEADING']['VALUE'] == 'Y' ? ' mp-one-slide-item__title--white' : ''?>">
                                                        <?=$arItem['PROPERTIES']['TEXT']['VALUE']?>
                                                    </div>
                                                <?endif?>

                                                <?if (strlen($arItem['PROPERTIES']['MAIN_IMG']['VALUE'])):
                                                    $smallPicArray = CFile::GetFileArray($arItem['PROPERTIES']['MAIN_IMG']['VALUE']);
                                                    $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 840, 'height' => 840), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                    $smallPic = $smallPicData['src'];
                                                ?>
                                                    <div class="mp-one-slide-item__image">
                                                        <img class="image" src="<?=$smallPic?>" alt="<?=$arItem['PROPERTIES']['TEXT']['VALUE']?>">
                                                    </div>
                                                <?elseif (strlen($arItem['PROPERTIES']['VIDEO']['VALUE'])):?>
                                                    <div class="mp-one-slide-item__video">
                                                        <video class="mainscreen__video" autoplay loop muted<?// data-was-processed="true"?>>
                                                            <source src="<?=CFile::GetPath($arItem['PROPERTIES']['VIDEO']['VALUE'])?>"<?// data-src="video/fuelet_nft_1600x1600_05.mp4"?>>
                                                        </video>
                                                    </div>
                                                <?endif?>
                                            </div>
                                        </div>
                                    <?endforeach?>
                                </div>
                            </div>

                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>

                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?endif?>

