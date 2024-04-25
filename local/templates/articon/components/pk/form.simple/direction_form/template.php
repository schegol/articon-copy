<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Page\Asset;
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/jquery.inputmask.min.js');
?>

<section class="section-feedback simpleform-wrapper">
    <div class="container">
        <div class="row">
            <?if ($arResult['result'] > 0):?>
                <a class="form-success-btn" id="directionFormSuccessTrigger" href="#directionFormSuccess"></a>
                <div class="d-none">
                    <div class="fb-modal fb-modal--form-success" id="directionFormSuccess">
                        <div class="fb-modal-inner">
                            <p><?=GetMessage('PK_FORM_SIMPLE_DIRECTION_FORM_SUCCESS_MESSAGE')?></p>
                        </div>
                    </div>
                </div>
                <script>
                    $('body').click();
                    $('body').find('#directionFormSuccessTrigger').click().click();
                </script>
            <?endif?>

            <div class="col-12 col-lg-10 col-xl-8 offset-0 offset-lg-1 offset-xl-2">
                <h2><?=GetMessage('PK_FORM_SIMPLE_DIRECTION_FORM_HEADING')?></h2>
                <div class="feedback-form-block">
                    <form class="form feedback-form simpleform simpleform-reload" method="post" enctype="multipart/form-data" action="#">
                        <input type="hidden" name="component" value="form.simple">
                        <input type="hidden" name="component_path" value="<?=$component->getPath();?>">
                        <input type="hidden" name="template" value="direction_form">
                        <input type="hidden" name="IBLOCK_ID" value="<?=$arParams['IBLOCK_ID']?>">
                        <input type="hidden" name="DIRECTION" value="<?=$arParams['DIRECTION_ID']?>">

                        <div class="feedback-form-row">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="field field--input<?=$arResult['error']['NAME'] ? ' field--error' : ''?>">
                                        <input type="text" name="NAME" placeholder="<?=$arResult['formFields']['NAME']['NAME']?>" value="<?=$arResult['data']['property']['NAME']?>" autocomplete="off">
                                    </div>
                                    <div class="field field--input<?=$arResult['error']['PHONE'] ? ' field--error' : ''?>">
                                        <input type="text" name="PHONE" placeholder="<?=$arResult['formFields']['PHONE']['NAME']?>" value="<?=$arResult['data']['property']['PHONE']?>" autocomplete="off">
                                    </div>
                                    <div class="field field--input field--input-email<?=$arResult['error']['EMAIL'] ? ' field--error' : ''?>">
                                        <input type="email" name="EMAIL" placeholder="<?=$arResult['formFields']['EMAIL']['NAME']?>" value="<?=$arResult['data']['property']['EMAIL']?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="field field--textarea<?=$arResult['error']['MESSAGE'] ? ' field--error' : ''?>">
                                        <div class="field-title">
                                            <?=$arResult['formFields']['MESSAGE']['NAME']?>
                                        </div>
                                        <textarea name="MESSAGE"><?=$arResult['data']['property']['MESSAGE']?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?if ($arParams['SOGLASIE']):?>
                            <div class="field field--checkbox">
                                <label class="custom-checkbox-label<?=$arResult['error']['req_SOGLASIE'] ? ' custom-checkbox-label--error' : ''?>">
                                    <input class="checkbox" type="checkbox" name="SOGLASIE" value="Y" id="ff<?=$arParams['IBLOCK_ID']?>"<?=$arResult['data']['SOGLASIE'] == 'Y' ? ' checked' : ''?>>
                                    <span class="custom-checkbox">
                                        <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/checkbox-check.svg" alt="<?=GetMessage('PK_FORM_SIMPLE_DIRECTION_FORM_AGREEMENT_CHECKBOX_IMG_ALT')?>">
                                    </span>
                                    <span class="custom-checkbox-text-label"><?=GetMessage('PK_FORM_SIMPLE_DIRECTION_FORM_AGREEMENT_TEXT')?></span>
                                </label>
                            </div>
                        <?endif?>

                        <div class="btn-wrapper">
                            <button type="submit" class="green-btn"><?=GetMessage('PK_FORM_SIMPLE_DIRECTION_FORM_SUBMIT_BTN')?></button>
                        </div>
                    </form>

                    <?php
                    $signer = new Bitrix\Main\Security\Sign\Signer;
                    $signedParams = $signer->sign(base64_encode(serialize($arParams)), 'form.simple');
                    ?>
                    <script>
                        if (typeof(signedParamsStringFS) == 'undefined')
                            var signedParamsStringFS = {};
                        signedParamsStringFS[<?=$arParams['IBLOCK_ID']?>] ='<?=urlencode($signedParams)?>';
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(function () {
        $('input[name="PHONE"], input[name="phone"]').inputmask({
            mask: '+7 (999) 999-99-99',
            clearIncomplete: true,
            greedy: false,
            showMaskOnHover: false,
        });
    });
</script>
