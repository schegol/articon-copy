<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?if (!empty($arResult['ITEMS'])):?>
    <div class="rent-single-photo-block">
        <div class="rent-single-photo-title">
            <?=GetMessage('NEWS_LIST_COFFEEBREAK_ZONE_HEADING')?>
        </div>
        <div class="rent-single-photo-items-block">
            <div class="rent-single-photo-items">
                <?foreach ($arResult['ITEMS'] as $i => $arItem):
                    if ($i > 3) break;

                    $smallPicArray = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width' => 348, 'height' => 348), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                    $smallPic = $smallPicArray['src'];
                ?>
                    <div class="rent-single-photo-item-wrapper">
                        <a class="rent-single-photo-item modal-btn" href="#modal-photos--photo" data-index="<?=$i?>">
                            <div class="rent-single-photo-item-img">
                                <img class="image" src="<?=$smallPic?>" alt="<?=GetMessage('NEWS_LIST_COFFEEBREAK_ZONE_SLIDER_IMG_ALT').($i + 1)?>">
                            </div>
                        </a>
                    </div>
                <?endforeach?>
            </div>
        </div>
    </div>

    <div class="modals">
        <div class="fb-modal fb-modal--photos" id="modal-photos--photo">
            <div class="fb-modal-inner">
                <div class="modal-photo-block">
                    <div class="modal-photo-title-block">
                        <div class="h2 modal-photo-title"><?=GetMessage('NEWS_LIST_COFFEEBREAK_ZONE_MODAL_HEADING')?></div>
                    </div>
                    <div class="modal-photo-slider-block">
                        <div class="modal-photo-slider modal-photo-slider--course swiper-slider">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <?foreach ($arResult['ITEMS'] as $i => $arItem):
                                        $smallPicArray = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width' => 1320, 'height' => 1320), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                        $smallPic = $smallPicArray['src'];
                                    ?>
                                        <div class="modal-photo-slide swiper-slide">
                                            <div class="modal-photo-slide-item">
                                                <div class="modal-photo-slide-img">
                                                    <img class="image" src="<?=$smallPic?>" alt="<?=GetMessage('NEWS_LIST_COFFEEBREAK_ZONE_SLIDER_IMG_ALT').($i + 1)?>">
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
                                    <?foreach ($arResult['ITEMS'] as $i => $arItem):
                                        $smallPicArray = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width' => 254, 'height' => 254), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                        $smallPic = $smallPicArray['src'];
                                    ?>
                                        <div class="modal-photo-thumb-slide swiper-slide">
                                            <div class="modal-photo-thumb-slide-item">
                                                <div class="modal-photo-thumb-slide-item-img">
                                                    <img class="image" src="<?=$smallPic?>" alt="<?=GetMessage('NEWS_LIST_COFFEEBREAK_ZONE_SLIDER_IMG_ALT').($i + 1)?>">
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
<?endif?>
