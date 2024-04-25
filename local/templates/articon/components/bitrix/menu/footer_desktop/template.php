<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die()?>

<?if (!empty($arResult)):
    $page = $APPLICATION->GetCurPage();
?>
    <div class="footer-content-right">
        <div class="footer-menu">
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
<?endif?>
