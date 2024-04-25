<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?if (!empty($arResult['ITEMS'])):?>
    <section class="section-contacts">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="s-top-title-block">
                        <h2><?=$APPLICATION->GetTitle()?></h2>
                    </div>
                    <?foreach ($arResult['ITEMS'] as $arItem):?>
                        <div class="contacts-block contacts-block--<?=$arItem['PROPERTIES']['BG_COLOR']['VALUE_XML_ID']?>">
                            <div class="contacts-block-city">
                                <?=$arItem['NAME']?>
                            </div>
                            <div class="contacts-block-left">
                                <div class="contact-items-block">
                                    <div class="contact-items">
                                        <?if (strlen($arItem['PROPERTIES']['ADDRESS']['VALUE']['TEXT'])):?>
                                            <div class="contact-item contact-item-address">
                                                <div class="contact-item__icon">
                                                    <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/map-pin.svg" alt="<?=GetMessage('NEWS_LIST_CONTACTS_ICON_ADDRESS')?>">
                                                </div>
                                                <div class="contact-item__content">
                                                    <?=$arItem['PROPERTIES']['ADDRESS']['~VALUE']['TEXT']?>
                                                </div>
                                            </div>
                                        <?endif?>

                                        <?if (strlen($arItem['PROPERTIES']['SCHEDULE']['VALUE']['TEXT'])):?>
                                            <div class="contact-item contact-item--time">
                                                <div class="contact-item__icon">
                                                    <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/clock.svg" alt="<?=GetMessage('NEWS_LIST_CONTACTS_ICON_SCHEDULE')?>">
                                                </div>
                                                <div class="contact-item__content">
                                                    <?=$arItem['PROPERTIES']['SCHEDULE']['~VALUE']['TEXT']?>
                                                </div>
                                            </div>
                                        <?endif?>

                                        <?if (strlen($arItem['PROPERTIES']['PHONE']['VALUE']['TEXT'])):?>
                                            <div class="contact-item contact-item--phone">
                                                <div class="contact-item__icon">
                                                    <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/phone.svg" alt="<?=GetMessage('NEWS_LIST_CONTACTS_ICON_PHONE')?>">
                                                </div>
                                                <div class="contact-item__content">
                                                    <?=$arItem['PROPERTIES']['PHONE']['~VALUE']['TEXT']?>
                                                </div>
                                            </div>
                                        <?endif?>

                                        <?if (strlen($arItem['PROPERTIES']['EMAIL']['VALUE']['TEXT'])):?>
                                            <div class="contact-item  contact-item--mail">
                                                <div class="contact-item__icon">
                                                    <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/mail.svg" alt="<?=GetMessage('NEWS_LIST_CONTACTS_ICON_EMAIL')?>">
                                                </div>
                                                <div class="contact-item__content">
                                                    <?=$arItem['PROPERTIES']['EMAIL']['~VALUE']['TEXT']?>
                                                </div>
                                            </div>
                                        <?endif?>

                                        <?if (strlen($arItem['PROPERTIES']['WEBSITE']['VALUE']['TEXT'])):?>
                                            <div class="contact-item contact-item--website">
                                                <div class="contact-item__icon">
                                                    <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/svg/internet.svg" alt="<?=GetMessage('NEWS_LIST_CONTACTS_ICON_WEBSITE')?>">
                                                </div>
                                                <div class="contact-item__content">
                                                    <?=$arItem['PROPERTIES']['WEBSITE']['~VALUE']['TEXT']?>
                                                </div>
                                            </div>
                                        <?endif?>
                                    </div>
                                </div>
                            </div>

                            <?if (strlen($arItem['PROPERTIES']['MAP']['VALUE'])):?>
                                <?
                                $map = explode(',', $arItem['PROPERTIES']['MAP']['VALUE']);
                                $lat = $map[0];
                                $lon = $map[1];
                                if ($i == 0) {
                                    $mapLat = $lat;
                                    $mapLon = $lon;
                                }
                                $arPlacemarks[] = array('LON' => $lon, 'LAT' => $lat, 'TEXT' => '');
                                ?>

                                <div class="contacts-block-right">
                                    <div class="contact-map" id="map-<?=$arItem['ID']?>">
                                        <?$APPLICATION->IncludeComponent(
                                            "bitrix:map.yandex.view",
                                            "",
                                            Array(
                                                "API_KEY" => "6ef172ee-88c5-4e71-b501-6d2b7099dca7",
                                                "CONTROLS" => array(""),
                                                "INIT_MAP_TYPE" => "MAP",
                                                "MAP_DATA" => serialize(
                                                    array(
                                                        "yandex_lat" => $mapLat,
                                                        "yandex_lon" => $mapLon,
                                                        "yandex_scale" => 16,
                                                        "PLACEMARKS" => $arPlacemarks
                                                    ),
                                                ),
                                                "MAP_HEIGHT" => "355",
                                                "MAP_ID" => "contacts-map-".$arItem["ID"],
                                                "MAP_WIDTH" => "100%",
                                                "OPTIONS" => array(
                                                    "DISABLE_SCROLL_ZOOM",
                                                    "ENABLE_DBLCLICK_ZOOM",
                                                    "ENABLE_DRAGGING",
                                                ),
                                            )
                                        );?>
                                    </div>
                                </div>
                            <?endif?>
                        </div>
                    <?endforeach?>
                </div>
            </div>
        </div>
    </section>
<?endif?>

<section class="section-reqs">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-4">
                <div class="s-top-title-block s-top-title-block--reqs">
                    <div class="section-title-block">
                        <div class="section-title-label-wrapper">
                            <div class="section-title-label">
                                <?=GetMessage('NEWS_LIST_CONTACTS_REQUISITES_HEADING_TOP')?>
                            </div>
                            <div class="section-title-label-bridge"></div>
                        </div>
                        <h2 class="section-title">
                            <?=GetMessage('NEWS_LIST_CONTACTS_REQUISITES_HEADING_BOTTOM')?>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-2">
                <div class="reqs-text-block">
                    <div class="reqs-text">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/contacts_requisites_left.php"
                            )
                        );?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="reqs-text-block reqs-text-block--alt">
                    <div class="reqs-text">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/contacts_requisites_right.php"
                            )
                        );?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?$APPLICATION->IncludeComponent(
    "pk:form.simple",
    "contacts_form",
    Array(
        "IBLOCK_ID" => "7",
        "AJAX" => "Y",
        "LOAD_JS_CSS" => "Y",
        "SOGLASIE" => "Y",
        "SHOW_ERROR" => "Y",
    )
);?>