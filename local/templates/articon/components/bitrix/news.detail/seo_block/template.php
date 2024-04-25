<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);?>

<?if (!empty($arResult)):?>
    <section class="section-seo">
        <div class="bg-figure-2">
            <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/bg-figure-2.svg" alt="<?=GetMessage('NEWS_DETAIL_SEO_BLOCK_DECORATIVE_IMG_ALT')?>">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="s-seo-block">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="s-seo-block-left">
                                    <div class="s-seo-title-block">
                                        <?if (strlen($arResult['PROPERTIES']['HEADING_TOP']['VALUE'])):?>
                                            <div class="s-seo-label-wrapper">
                                                <div class="s-seo-label">
                                                    <?=$arResult['PROPERTIES']['HEADING_TOP']['VALUE']?>
                                                </div>
                                                <?if (strlen($arResult['PROPERTIES']['HEADING_BOTTOM']['VALUE'])):?>
                                                    <div class="s-seo-label-bridge"></div>
                                                <?endif?>
                                            </div>
                                        <?endif?>
                                        <?if (strlen($arResult['PROPERTIES']['HEADING_BOTTOM']['VALUE'])):?>
                                            <h2 class="s-seo-title">
                                                <?=$arResult['PROPERTIES']['HEADING_BOTTOM']['VALUE']?>
                                            </h2>
                                        <?endif?>
                                    </div>

                                    <?if (strlen($arResult['PROPERTIES']['TEXT']['~VALUE']['TEXT'])):?>
                                        <div class="s-seo-descr">
                                            <?=$arResult['PROPERTIES']['TEXT']['~VALUE']['TEXT']?>
                                        </div>
                                   <?endif?>
                                </div>
                            </div>
                            <?if (strlen($arResult['PROPERTIES']['IMG']['VALUE'])):
                                $smallPicArray = CFile::GetFileArray($arResult['PROPERTIES']['IMG']['VALUE']);
                                $smallPicData = CFile::ResizeImageGet($smallPicArray, array('width' => 506, 'height' => 506), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                $smallPic = $smallPicData['src'];
                            ?>
                                <div class="col-12 col-lg-4">
                                    <div class="s-seo-block-right">
                                        <div class="s-seo-img-block">
                                            <div class="s-seo-img">
                                                <img class="image" src="<?=$smallPic?>" alt="<?=strlen($arResult['PROPERTIES']['HEADING_BOTTOM']['VALUE']) ? $arResult['PROPERTIES']['HEADING_BOTTOM']['VALUE'] : $arResult['PROPERTIES']['HEADING_TOP']['VALUE']?>">
                                            </div>
                                            <div class="s-seo-learning-center">
                                                <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/s-seo-learning-center.svg" alt="<?=GetMessage('NEWS_DETAIL_SEO_BLOCK_COMPANY_STAMP_ALT')?>">
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