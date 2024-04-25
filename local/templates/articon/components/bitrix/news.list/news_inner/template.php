<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?if (!empty($arResult['ITEMS'])):?>
    <section class="section-news-same">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="news-same-top-block">
                        <h2>
                            <?=GetMessage('NEWS_LIST_NEWS_INNER_HEADING')?>
                        </h2>
                    </div>

                    <div class="news-items-block">
                        <div class="news-items">
                            <div class="row">
                                <?foreach ($arResult['ITEMS'] as $i => $arItem):
                                    switch ($i) {
                                        case 0:
                                            $color = 'purple';
                                            break;

                                        case 1:
                                            $color = 'green';
                                            break;

                                        case 2:
                                        default:
                                            $color = 'grey';
                                    }
                                ?>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="news-item news-item--<?=$color?>">
                                            <div class="news-item-date">
                                                <?=FormatDate($arParams['ACTIVE_DATE_FORMAT'], MakeTimeStamp($arItem['ACTIVE_FROM']))?>
                                            </div>

                                            <?if (strlen($arItem['PREVIEW_PICTURE']['SRC'])):
                                                $smallPicArray = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width' => 492, 'height' => 492), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                $smallPic = $smallPicArray['src'];
                                            ?>
                                                <a class="news-item-img" href="<?=$arItem['DETAIL_PAGE_URL']?>">
                                                    <img class="image" src="<?=$smallPic?>" alt="<?=$arItem['NAME']?>">
                                                </a>
                                            <?endif?>

                                            <div class="news-item-title-block">
                                                <a class="news-item-title" href="<?=$arItem['DETAIL_PAGE_URL']?>">
                                                    <?=$arItem['NAME']?>
                                                </a>
                                            </div>

                                            <?if (strlen($arItem['PREVIEW_TEXT'])):?>
                                                <div class="news-item-descr">
                                                    <?=$arItem['PREVIEW_TEXT']?>
                                                </div>
                                            <?endif?>

                                            <div class="news-item-more-link-block">
                                                <a class="more-link" href="<?=$arItem['DETAIL_PAGE_URL']?>">
                                                    <?=GetMessage('NEWS_LIST_NEWS_INNER_DETAIL_LINK')?>
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
