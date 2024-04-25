<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?if (!empty($arResult['ITEMS'])):?>
    <section class="section-course-speakers">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="s-course-speakers-title-block">
                        <div class="section-title-block">
                            <div class="section-title-label-wrapper">
                                <div class="section-title-label">
                                    <?=GetMessage('NEWS_LIST_SPEAKERS_HEADING_TOP')?>
                                </div>
                                <div class="section-title-label-bridge"></div>
                            </div>
                            <h2 class="section-title">
                                <?=GetMessage('NEWS_LIST_SPEAKERS_HEADING_BOTTOM')?>
                            </h2>
                        </div>
                    </div>

                    <div class="lecturer-items-block">
                        <div class="lecturer-items">
                            <div class="row">
                                <?foreach ($arResult['ITEMS'] as $arItem):
                                    $smallPicArray = CFile::GetFileArray($arItem['PROPERTIES']['IMG']['VALUE']);
                                    $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 190, 'height' => 190), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                    $smallPic = $smallPicData['src'];
                                ?>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <a class="lecturer-item modal-gallery-btn" href="#modal-lecturer-<?=$arItem['ID']?>" data-fancybox="lecturer-gallery">
                                            <div class="lecturer-item-img">
                                                <img class="image" src="<?=$smallPic?>" alt="<?=$arItem['NAME']?>">
                                            </div>
                                            <div class="lecturer-item-info">
                                                <div class="lecturer-item-name-wrapper">
                                                    <div class="h4 lecturer-item-name">
                                                        <?=$arItem['NAME']?>
                                                    </div>
                                                </div>
                                                <div class="lecturer-item-state-wrapper">
                                                    <div class="lecturer-item-state-bridge"></div>
                                                    <div class="lecturer-item-state">
                                                        <?=$arItem['PROPERTIES']['POSITION']['VALUE']?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?endforeach?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modals">
        <?foreach ($arResult['ITEMS'] as $arItem):
            $smallPicArray = CFile::GetFileArray($arItem['PROPERTIES']['IMG']['VALUE']);
            $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 190, 'height' => 190), BX_RESIZE_IMAGE_PROPORTIONAL, true);
            $smallPic = $smallPicData['src'];
            ?>
            <div class="fb-modal fb-modal--lecturer" id="modal-lecturer-<?=$arItem['ID']?>">
                <div class="fb-modal-inner">
                    <div class="lecturer-item">
                        <div class="lecturer-item-img">
                            <img class="image" src="<?=$smallPic?>" alt="<?=$arItem['NAME']?>">
                        </div>
                        <div class="lecturer-item-info">
                            <div class="lecturer-item-name-wrapper">
                                <div class="h4 lecturer-item-name">
                                    <?=$arItem['NAME']?>
                                </div>
                            </div>
                            <div class="lecturer-item-state-wrapper">
                                <div class="lecturer-item-state-bridge"></div>
                                <div class="lecturer-item-state">
                                    <?=$arItem['PROPERTIES']['POSITION']['VALUE']?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?if (is_array($arItem['PROPERTIES']['REGALIA']['VALUE']) && !empty($arItem['PROPERTIES']['REGALIA']['VALUE'])):?>
                        <div class="lecturer-param-items">
                            <?foreach ($arItem['PROPERTIES']['REGALIA']['VALUE'] as $regalia):?>
                                <div class="lecturer-param-item">
                                    <?=$regalia?>
                                </div>
                            <?endforeach?>
                        </div>
                    <?endif?>

                    <?if (is_array($arItem['COURSES']) && !empty($arItem['COURSES'])):?>
                        <div class="lecturer-course-slider-block">
                            <div class="h3"><?=GetMessage('NEWS_LIST_LECTURERS_COURSES_HEADING')?></div>
                            <div class="lecturer-course-slider">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        <?foreach ($arItem['COURSES'] as $i => $arCourse):
                                            if ($i % 3 == 0)
                                                $color = 'green';
                                            elseif ($i % 3 == 1)
                                                $color = 'purple';
                                            else
                                                $color = 'black';
                                        ?>
                                            <div class="lecturer-course-slide swiper-slide">
                                                <a class="lecturer-course-slide-item lecturer-course-slide-item--<?=$color?>" href="<?=$arCourse['DETAIL_PAGE_URL']?>">
                                                    <div class="lecturer-course-slide-item-title"><?=$arCourse['NAME']?></div>
                                                </a>
                                            </div>
                                        <?endforeach?>
                                    </div>
                                </div>

                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>

                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    <?endif?>
                </div>
            </div>
        <?endforeach?>
    </div>
<?endif?>