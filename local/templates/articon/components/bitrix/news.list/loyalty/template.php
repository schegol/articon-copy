<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?if (!empty($arResult['ITEMS'])):?>
    <section class="section-loyalty">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="s-top-title-block s-top-title-block--loyalty">
                        <div class="section-title-block">
                            <div class="section-title-label-wrapper">
                                <div class="section-title-label">
                                    <?=GetMessage('NEWS_LIST_LOYALTY_HEADING_TOP')?>
                                </div>
                                <div class="section-title-label-bridge"></div>
                            </div>
                            <h1 class="section-title">
                                <?=$APPLICATION->GetTitle()?>
                            </h1>
                        </div>
                    </div>
                    <div class="loyalty-items-block">
                        <div class="loyalty-items">
                            <?foreach ($arResult['ITEMS'] as $arItem):?>
                                <div class="loyalty-item">
                                    <?if (strlen($arItem['PROPERTIES']['ICON']['VALUE'])):?>
                                        <div class="loyalty-item__icon">
                                            <img class="image" src="<?=CFile::GetPath($arItem['PROPERTIES']['ICON']['VALUE'])?>" alt="<?=$arItem['NAME']?>">
                                        </div>
                                    <?endif?>

                                    <div class="loyalty-item__content">
                                        <div class="h4 loyalty-item__title">
                                            <?=$arItem['NAME']?>
                                        </div>

                                        <?if (strlen($arItem['PROPERTIES']['TEXT']['VALUE'])):?>
                                            <div class="loyalty-item__descr">
                                                <?=$arItem['PROPERTIES']['TEXT']['VALUE']?>
                                            </div>
                                        <?endif?>
                                    </div>
                                </div>
                            <?endforeach?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?endif?>