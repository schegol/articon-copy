<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);?>

<?if (!empty($arResult['ITEMS'])):?>
    <section class="section-rent">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="s-rent-title-block">
                        <div class="section-title-block">
                            <h1 class="section-title">
                                <?=$APPLICATION->GetTitle()?>
                            </h1>
                        </div>
                    </div>
                    <div class="rent-items-block">
                        <div class="rent-items">
                            <div class="row">
                                <?foreach ($arResult['ITEMS'] as $i => $arItem):?>
                                    <div class="col-12 col-lg-6 order-<?=($i + 1)?> order-lg-<?=strlen($arResult['DESCRIPTION']) ? ($i == 0 ? '0' : ($i + 1)) : ($i + 1)?>">
                                        <div class="rent-item-wrapper">
                                            <div class="rent-item rent-item--<?=$arItem['PROPERTIES']['BG_COLOR']['VALUE_XML_ID']?>">
                                                <div class="rent-item-left">
                                                    <div class="h3 rent-item-title">
                                                        <?=strlen($arItem['PROPERTIES']['LIST_HEADING']['VALUE']['TEXT']) ? $arItem['PROPERTIES']['LIST_HEADING']['~VALUE']['TEXT'] : $arItem['NAME']?>
                                                    </div>

                                                    <?if (strlen($arItem['PROPERTIES']['CAPACITY']['VALUE'])):?>
                                                        <div class="rent-item-capacity">
                                                            <?=$arItem['PROPERTIES']['CAPACITY']['VALUE']?>
                                                        </div>
                                                    <?endif?>

                                                    <?if (
                                                        strlen($arItem['PROPERTIES']['PRICES_ROW_1_COL_1']['VALUE'])
                                                        || strlen($arItem['PROPERTIES']['PRICES_ROW_1_COL_2']['VALUE'])
                                                        || strlen($arItem['PROPERTIES']['PRICES_ROW_2_COL_1']['VALUE'])
                                                        || strlen($arItem['PROPERTIES']['PRICES_ROW_2_COL_2']['VALUE'])
                                                    ):?>
                                                        <div class="rent-item-price-table">
                                                            <div class="rent-item-price-table-heading">
                                                                <div class="rent-item-price-table-h-col rent-item-price-table-h-col--day"></div>
                                                                <div class="rent-item-price-table-h-col rent-item-price-table-h-col--price">
                                                                    <?=$arItem['PROPERTIES']['PRICES_COL_1_HEADING']['VALUE']?>
                                                                </div>
                                                                <div class="rent-item-price-table-h-col rent-item-price-table-h-col--price">
                                                                    <?=$arItem['PROPERTIES']['PRICES_COL_2_HEADING']['VALUE']?>
                                                                </div>
                                                            </div>
                                                            <div class="rent-item-price-t-items">
                                                                <div class="rent-item-price-t-item">
                                                                    <div class="rent-item-price-t-item-col rent-item-price-t-item-col--day">
                                                                        <?=GetMessage('NEWS_RENT_NEWS_LIST_DEFAULT_PRICE_TABLE_WEEKDAY')?>
                                                                    </div>
                                                                    <div class="rent-item-price-t-item-col rent-item-price-t-item-col--price">
                                                                        <?=$arItem['PROPERTIES']['PRICES_ROW_1_COL_1']['VALUE']?>
                                                                    </div>
                                                                    <div class="rent-item-price-t-item-col rent-item-price-t-item-col--price">
                                                                        <?=$arItem['PROPERTIES']['PRICES_ROW_1_COL_2']['VALUE']?>
                                                                    </div>
                                                                </div>
                                                                <div class="rent-item-price-t-item">
                                                                    <div class="rent-item-price-t-item-col rent-item-price-t-item-col--day">
                                                                        <?=GetMessage('NEWS_RENT_NEWS_LIST_DEFAULT_PRICE_TABLE_WEEKEND')?>
                                                                    </div>
                                                                    <div class="rent-item-price-t-item-col rent-item-price-t-item-col--price">
                                                                        <?=$arItem['PROPERTIES']['PRICES_ROW_2_COL_1']['VALUE']?>
                                                                    </div>
                                                                    <div class="rent-item-price-t-item-col rent-item-price-t-item-col--price">
                                                                        <?=$arItem['PROPERTIES']['PRICES_ROW_2_COL_2']['VALUE']?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?endif?>
                                                </div>
                                                <div class="rent-item-right">
                                                    <?if (is_array($arItem['PREVIEW_PICTURE']) && !empty($arItem['PREVIEW_PICTURE'])):
                                                        $smallPicArray = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width' => 660, 'height' => 660), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                        $smallPic = $smallPicArray['src'];
                                                    ?>
                                                        <div class="rent-item-img">
                                                            <img class="image" src="<?=$smallPic?>" alt="<?=$arItem['NAME']?>">
                                                        </div>
                                                    <?endif?>
                                                    <div class="rent-item-more-link-block">
                                                        <a class="more-link" href="<?=$arItem['DETAIL_PAGE_URL']?>">
                                                            <?=GetMessage('NEWS_RENT_NEWS_LIST_DEFAULT_DETAIL_LINK')?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?if (strlen($arResult['DESCRIPTION']) && $i == 0):?>
                                        <div class="col-12 col-lg-6 order-0 order-lg-1">
                                            <div class="rent-info-wrapper">
                                                <div class="rent-info">
                                                    <?=$arResult['~DESCRIPTION']?>
                                                </div>
                                            </div>
                                        </div>
                                    <?endif?>
                                <?endforeach?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?endif?>