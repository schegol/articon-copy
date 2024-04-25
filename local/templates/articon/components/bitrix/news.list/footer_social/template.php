<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?if (!empty($arResult['ITEMS'])):?>
    <div class="footer-soc-block">
        <div class="footer-soc">
            <?foreach ($arResult['ITEMS'] as $arItem):?>
                <a class="footer-soc-link footer-soc-link--<?=$arItem['PROPERTIES']['ICON_CLASS_MODIFIER']['VALUE']?>" href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>" target="_blank"></a>
            <?endforeach?>
        </div>
    </div>
<?endif?>