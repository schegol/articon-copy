<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
//$this->addExternalJS($componentPath."/script.js");
?>
<div class="preload-ajax">
    <div class="h2"><?=$arResult['FORM_NAME'];?></div>
    <? if ($arParams['SHOW_ERROR'] == 'Y' and count($arResult['error']) > 0) { ?>
        <p class="error_add_form">
            <?=implode("<br>", $arResult['error']);?>
        </p>
    <? } ?>
    <p><?=$arResult['FORM_DESCRIPTION'];?></p>
    <? if($arResult['result'] >0) { ?>
        <p class="success_add_form">Ваша заявка отправлена</p>
    <? } ?>
    <form action="" method="post" enctype="multipart/form-data" class="simpleform simpleform-reload">
        <input type="hidden" name="component" value="<?=$component->getName();?>">
        <input type="hidden" name="component_path" value="<?=$component->getPath();?>">
        <input type="hidden" name="template" value="<?=$templateName;?>">
        <input type="hidden" name="IBLOCK_ID" value="<?=$arParams['IBLOCK_ID'];?>">
        <? foreach ($arResult['formFields'] as $key => $field) { ?>
        <div class="fld_row">
            <label><?=$field['NAME'];?><? if ($field['IS_REQUIRED'] == 'Y') { ?><span class="fld_req">*</span><? } ?></label>
            <?php
            switch ($field['PROPERTY_TYPE']) {
                case "L":
                case "LP":
                    ?>
                    <select name="<?=$key;?>" class="modal__elem">
                        <option value="">Выберите</option>
                        <? foreach ($field['VALUES'] as $val_k => $val) { ?>
                            <option value="<?=$val_k;?>"<? if ($val_k == $arResult['data']['property'][$key]) { ?> selected<? } ?>><?=$val;?></option>
                        <? } ?>
                    </select>
                    <? break;
                case "LK":
                    ?>
                        <? foreach ($field['VALUES'] as $val_k => $val) { ?>
                    <input type="radio" name="<?=$key;?>" value="<?=$val_k;?>"<? if($arResult['data']['property'][$key] == $val_k) { ?> checked<? }?> id="ff<?=$key;?><?=$val_k;?>"><label class="fld_radio" for="ff<?=$key;?><?=$val_k;?>">
                        <?=$val;?>
                    </label>
                        <? } ?>

                    <? break;
                case "LF":
                    ?>
                    <input type="checkbox" name="<?=$key;?>" value="Y"<? if($arResult['data']['property'][$key] == 'Y') { ?> checked<? }?> id="ff<?=$key;?>"><label class="fld_checkbox" for="ff<?=$key;?>">
                    <?=$field['NAME'];?>
                </label>
                    <? break;
                case "F":
                    ?>
                    <label class="webform-field-upload" id="mfi-FORM6_FIELD_DOCS-button">
                    <span class="btn btn-primary webform-small-button webform-button-upload">
                        Добавить файл
                        <svg style="margin-left: 10px" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M10.3916 4.13009L7.32905 0.630094C7.24593 0.535594 7.12605 0.480469 7.00005 0.480469C6.87405 0.480469 6.75418 0.535594 6.67105 0.630094L3.60855 4.13009C3.49568 4.25959 3.46768 4.44247 3.53943 4.59909C3.6103 4.75484 3.76605 4.85547 3.93755 4.85547H5.68755V10.543C5.68755 10.7845 5.88355 10.9805 6.12505 10.9805H7.87505C8.11655 10.9805 8.31255 10.7845 8.31255 10.543V4.85547H10.0626C10.2341 4.85547 10.3898 4.75572 10.4607 4.59909C10.5316 4.44247 10.5053 4.25872 10.3916 4.13009Z" fill="#1E1E1E"></path>
                          <path d="M11.8125 10.1055V12.7305H2.1875V10.1055H0.4375V13.6055C0.4375 14.0893 0.8295 14.4805 1.3125 14.4805H12.6875C13.1714 14.4805 13.5625 14.0893 13.5625 13.6055V10.1055H11.8125Z" fill="#1E1E1E"></path>
                        </svg>
        </span><input type="file" id="file_input_FORM6_FIELD_DOCS" multiple="multiple" name="<?=$key;?>" style1="display: none;"></label>
                    <? break;
                case "S":
                default:
                    if ($field['USER_TYPE'] == 'HTML') { ?>
                        <textarea name="<?=$key;?>" class="<?=($arResult['error'][$key]?" input_error":"");?>"><?=$arResult['data']['property'][$key]['VALUE']['TEXT'];?></textarea>
                    <? } else { ?>
                        <input placeholder="<?=$field['HINT'];?>"<?=($field['notedit']=="Y"?"  readonly=\"readonly\"":"");?> type="text" name="<?=$key;?>" value="<?=$arResult['data']['property'][$key];?>" class="<?=($arResult['error'][$key]?" input_error":"");?>">
                    <? } ?>
                    <? break; ?>
                <? } ?>
        </div>
        <? } ?>
        <? if ($arParams['SOGLASIE']) { ?>
        <div class="fld_row">
            <input type="checkbox" name="SOGLASIE" value="Y"<? if($arResult['data']['SOGLASIE'] == 'Y') { ?> checked<? }?> id="ff<?=$arParams['IBLOCK_ID'];?>"><label class="fld_checkbox" for="ff<?=$arParams['IBLOCK_ID'];?>">
                Я ознакомился с соглашением сервиса и согласен с условиями пре­до­ста­вле­ния услуг
            </label>
            <? if ($arResult['error']['req_SOGLASIE']) { ?><span class="input_error_text"><?=$arResult['error']['req_SOGLASIE'];?></span><? } ?>
        </div>
        <? } ?>
        <div class="fld_row">
            <input type="submit" class="btn" value="Заказать">
        </div>
    </form>
    <?php
    $signer = new Bitrix\Main\Security\Sign\Signer;
    $signedParams = $signer->sign(base64_encode(serialize($arParams)), 'form.simple');
    ?>
    <script>
        if (typeof(signedParamsStringFS) == "undefined")
            var signedParamsStringFS = {};
        signedParamsStringFS[<?=$arParams['IBLOCK_ID'];?>] ='<?=urlencode($signedParams)?>';
    </script>

</div>
<script>
   /* jQuery(document).ready(function () {
        jQuery("input[name='PHONE']").mask("+7 (999) 999-99-99");
    })*/
</script>