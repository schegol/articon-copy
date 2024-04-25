<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);?>

<?if (!empty($arResult)):?>
    <div class="col-12 col-lg-4">
        <div class="mp-news-block-right">
            <?if (is_array($arResult['PROPERTIES']['GALLERY']['VALUE']) && !empty($arResult['PROPERTIES']['GALLERY']['VALUE'])):?>
                <div class="mp-news-photo-block">
                    <div class="mp-news-photo-title">
                        <?=GetMessage('NEWS_DETAIL_INDEX_MEDIA_PHOTOS_HEADING')?>
                    </div>
                    <div class="mp-news-photo-items-block">
                        <div class="mp-news-photo-items">
                            <?foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $i => $img):
                                if ($i > 2) break;

                                $smallPicArray = CFile::GetFileArray($img);
                                $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 338, 'height' => 338), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                $smallPic = $smallPicData['src'];
                            ?>
                                <div class="mp-news-photo-item-wrapper">
                                    <a class="mp-news-photo-item modal-btn" href="#modal-photos--photo" data-index="<?=$i?>">
                                        <div class="mp-news-photo-item__img">
                                            <img class="image" src="<?=$smallPic?>" alt="<?=GetMessage('NEWS_DETAIL_INDEX_MEDIA_PHOTOS_ALT'.($i + 1))?>">
                                        </div>
                                    </a>
                                </div>
                            <?endforeach?>
                            <?if (count($arResult['PROPERTIES']['GALLERY']['VALUE']) > 3):?>
                                <div class="mp-news-photo-item-wrapper">
                                    <a class="mp-news-photo-item modal-btn" href="#modal-photos--photo" data-index="3">
                                        <div class="mp-news-photo-item-more">
                                            <div class="mp-news-photo-item-more__icon">
                                                <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/mp-news-photo-item-more-icon.svg" alt="<?=GetMessage('NEWS_DETAIL_INDEX_MEDIA_PHOTOS_ICON_ALT')?>">
                                            </div>
                                            <div class="mp-news-photo-item-more__title">
                                                <?=(count($arResult['PROPERTIES']['GALLERY']['VALUE']) - 3).GetMessage('NEWS_DETAIL_INDEX_MEDIA_PHOTOS_MORE_BTN')?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?endif?>
                        </div>
                    </div>
                </div>
            <?endif?>

            <?if (is_array($arResult['PROPERTIES']['YT_VIDEOS']['VALUE']) && !empty($arResult['PROPERTIES']['YT_VIDEOS']['VALUE'])):?>
                <div class="mp-news-video-block">
                    <div class="mp-news-video-top">
                        <div class="mp-news-video-top-title-block">
                            <div class="mp-news-video-top-title">
                                <?=GetMessage('NEWS_DETAIL_INDEX_MEDIA_VIDEOS_HEADING')?>
                            </div>
                        </div>
                        <div class="mp-news-video-top-more-link-block">
                            <a class="more-link" href="#modal-photos--video">
                                <?=GetMessage('NEWS_DETAIL_INDEX_MEDIA_VIDEOS_MODAL_TRIGGER')?>
                            </a>
                        </div>
                    </div>
                    <div class="mp-news-video-wrapper">
                        <div class="mp-news-video-back">
                            <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/mp-news-video-back.svg" alt="<?=GetMessage('NEWS_DETAIL_INDEX_MEDIA_VIDEOS_DECOR')?>">
                        </div>
                        <a data-fancybox class="mp-news-video" href="#modal-photos--video">
                            <div class="video">
                                <div class="video-preview">
                                    <img class="image" src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="<?=GetMessage('NEWS_DETAIL_INDEX_MEDIA_VIDEOS_COVER_IMG_ALT')?>">
                                </div>
                                <div class="video-play-btn">
                                    <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/play-btn.svg" alt="<?=GetMessage('NEWS_DETAIL_INDEX_MEDIA_VIDEOS_PLAY_BTN')?>">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?endif?>
        </div>
    </div>

    <div class="modals">
        <?if (is_array($arResult['PROPERTIES']['GALLERY']['VALUE']) && !empty($arResult['PROPERTIES']['GALLERY']['VALUE'])):?>
            <div class="fb-modal fb-modal--photos" id="modal-photos--photo">
                <div class="fb-modal-inner">
                    <div class="modal-photo-block">
                        <div class="modal-photo-title-block">
                            <div class="h2 modal-photo-title"><?=GetMessage('NEWS_DETAIL_INDEX_MEDIA_PHOTOS_MODAL_HEADING')?></div>
                        </div>
                        <div class="modal-photo-slider-block">
                            <div class="modal-photo-slider modal-photo-slider--course swiper-slider">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        <?foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $i => $img):
                                            $smallPicArray = CFile::GetFileArray($img);
                                            $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 1320, 'height' => 1320), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                            $smallPic = $smallPicData['src'];
                                        ?>
                                            <div class="modal-photo-slide swiper-slide">
                                                <div class="modal-photo-slide-item">
                                                    <div class="modal-photo-slide-img">
                                                        <img class="image" src="<?=$smallPic?>" alt="<?=GetMessage('NEWS_DETAIL_INDEX_MEDIA_PHOTOS_ALT').($i + 1)?>">
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
                                        <?foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $i => $img):
                                            $smallPicArray = CFile::GetFileArray($img);
                                            $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 254, 'height' => 254), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                            $smallPic = $smallPicData['src'];
                                        ?>
                                            <div class="modal-photo-thumb-slide swiper-slide">
                                                <div class="modal-photo-thumb-slide-item">
                                                    <div class="modal-photo-thumb-slide-item-img">
                                                        <img class="image" src="<?=$smallPic?>" alt="<?=GetMessage('NEWS_DETAIL_INDEX_MEDIA_PHOTOS_ALT').($i + 1)?>">
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
        <?endif?>

        <?if (is_array($arResult['PROPERTIES']['YT_VIDEOS']['VALUE']) && !empty($arResult['PROPERTIES']['YT_VIDEOS']['VALUE'])):?>
            <div class="fb-modal fb-modal--videos" id="modal-photos--video">
                <div class="fb-modal-inner">
                    <div class="modal-photo-block">
                        <div class="modal-photo-title-block">
                            <div class="h2 modal-photo-title"><?=GetMessage('NEWS_DETAIL_INDEX_MEDIA_VIDEOS_MODAL_HEADING')?></div>
                        </div>
                        <div class="modal-photo-slider-block">
                            <div class="modal-photo-slider modal-photo-slider--course swiper-slider">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        <?foreach ($arResult['VIDEOS'] as $arVideo):?>
                                            <div class="modal-photo-slide swiper-slide">
                                                <div class="modal-photo-slide-item">
                                                    <div class="modal-photo-slide-video">
                                                        <?=$arVideo['IFRAME']?>
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
                                        <?foreach ($arResult['VIDEOS'] as $arVideo):?>
                                            <div class="modal-photo-thumb-slide swiper-slide">
                                                <div class="modal-photo-thumb-slide-item">
                                                    <div class="modal-photo-thumb-slide-item-img">
                                                        <img class="image" src="<?=$arVideo['THUMB_MQ']?>" alt="<?=GetMessage('NEWS_COURSES_NEWS_DETAIL_DEFAULT_GALLERY_MODAL_IMG_ALT').($i + 1)?>">
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
        <?endif?>
    </div>
<?endif?>