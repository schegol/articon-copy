<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?if (!empty($arResult['ITEMS'])):?>
    <section class="section-learning-directions">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="s-top-title-block s-top-title-block--directions">
                        <div class="section-title-block">
                            <div class="section-title-label-wrapper">
                                <div class="section-title-label">
                                    <?=GetMessage('NEWS_LIST_DIRECTIONS_LITE_HEADING_TOP')?>
                                </div>
                                <div class="section-title-label-bridge"></div>
                            </div>
                            <h2 class="section-title">
                                <?=GetMessage('NEWS_LIST_DIRECTIONS_LITE_HEADING_BOTTOM')?>
                            </h2>
                        </div>
                    </div>
                    <div class="learning-direction-items-block">
                        <div class="learning-direction-items">
                            <div class="row">
                                <?foreach ($arResult['ITEMS'] as $i => $arItem):
                                    $modulo = $i % 8;

                                    switch ($modulo) {
                                        case '0':
                                        case '5':
                                            $class = 'green';
                                            break;

                                        case '1':
                                        case '4':
                                            $class = 'purple';
                                            break;

                                        case '2':
                                        case '7':
                                            $class = 'black';
                                            break;

                                        case '3':
                                        case '6':
                                        default:
                                            $class = 'grey';
                                    }
                                ?>
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <div class="learning-direction-item learning-direction-item--<?=$class?>">
                                            <div class="h3 learning-direction-item-title">
                                                <?=$arItem['NAME']?>
                                            </div>
                                            <div class="learning-direction-item-link-block">
                                                <a class="more-link" href="<?=$arItem['DETAIL_PAGE_URL']?>">
                                                    <?=GetMessage('NEWS_LIST_DIRECTIONS_LITE_DETAIL_LINK')?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?endforeach?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?endif?>