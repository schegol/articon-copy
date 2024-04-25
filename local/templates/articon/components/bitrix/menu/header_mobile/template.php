<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die()?>

<?if (!empty($arResult)):
    $page = $APPLICATION->GetCurPage();
?>
    <div class="shadow-bg"></div>
    <div class="mobile-panel-block">
        <div class="mobile-panel-top-block">
            <div class="mobile-panel-top-left">

            </div>
            <div class="mobile-panel-top-right">
                <a href="#" class="mobile-panel-close-btn"></a>
            </div>
        </div>
        <div class="mobile-panel-block-inner">
            <div class="mobile-panel-menu">
                <div class="mobile-menu">
                    <ul>
                        <?foreach($arResult as $arItem):
                            if ($arParams['MAX_LEVEL'] == 1 && $arItem['DEPTH_LEVEL'] > 1)
                                continue;

                            $current = false;
                            if ($page == $arItem['LINK'])
                                $current = true;
                        ?>
                            <li<?=$current ? ' class="active"' : ''?>>
                                <a<?=$current ? '' : ' href="'.$arItem['LINK'].'"'?>>
                                    <?=$arItem['TEXT']?>
                                </a>
                            </li>
                        <?endforeach?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?endif?>
