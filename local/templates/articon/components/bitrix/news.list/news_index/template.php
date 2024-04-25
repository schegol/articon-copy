<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?if (!empty($arResult['ITEMS'])):?>
    <div class="mp-news-block-left">
        <div class="mp-news-top">
            <h2 class="mp-news-top-title">
                <?=GetMessage('NEWS_LIST_NEWS_INDEX_HEADING')?>
            </h2>

            <?if (strlen($arParams['ALL_LINK'])):?>
                <div class="mp-news-top-link-block">
                    <a class="more-link" href="<?=$arParams['ALL_LINK']?>">
                        <?=GetMessage('NEWS_LIST_NEWS_INDEX_ALL_LINK')?>
                    </a>
                </div>
            <?endif?>
        </div>
        <div class="mp-news-items-block">
            <div class="mp-news-items">
                <?foreach ($arResult['ITEMS'] as $i => $arItem):
                    if ($i == 0)
                        $color = 'green';
                    else
                        $color = 'purple';
                ?>
                    <div class="mp-news-item-wrapper">
                        <div class="mp-news-item mp-news-item--<?=$color?>">
                            <div class="mp-news-item-inner">
                                <div class="mp-news-item-date">
                                    <?=FormatDate($arParams['ACTIVE_DATE_FORMAT'], MakeTimeStamp($arItem['ACTIVE_FROM']))?>
                                </div>
                                <div class="mp-news-item-avatar">
                                    <img class="image" src="<?=$arItem['AUTHOR_PHOTO']?>" alt="<?=$arItem['AUTHOR_NAME']?>">
                                </div>
                                <div class="mp-news-item-title-block">
                                    <div class="mp-news-item-title">
                                        <?=$arItem['NAME']?>
                                    </div>
                                </div>

                                <?if (strlen($arItem['PREVIEW_TEXT'])):?>
                                    <div class="mp-news-item-descr">
                                        <?=$arItem['PREVIEW_TEXT']?>
                                    </div>
                                <?endif?>

                                <div class="mp-news-item-more-link-block">
                                    <a class="more-link" href="<?=$arItem['DETAIL_PAGE_URL']?>">
                                        <?=GetMessage('NEWS_LIST_NEWS_INDEX_DETAIL_LINK')?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?endforeach?>
            </div>
        </div>
    </div>
<?endif?>
