<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
    return;

$arIBlocks=array();
$db_iblock = CIBlock::GetList(array("SORT"=>"ASC"), array("SITE_ID"=>$_REQUEST["site"], "TYPE" => "pk_forms"));
while($arRes = $db_iblock->Fetch())
    $arIBlocks[$arRes["ID"]] = "[".$arRes["ID"]."] ".$arRes["NAME"];

$arComponentParameters = array(
    "PARAMETERS" => array(
        "IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => "Инфоблок",
            "TYPE" => "LIST",
            "VALUES" => $arIBlocks,
            "REFRESH" => "Y",
        ),
        "AJAX" => array(
            "PARENT" => "BASE",
            "NAME" => "Использовать Ajax",
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
        ),
        "LOAD_JS_CSS" => array(
            "PARENT" => "BASE",
            "NAME" => "Подключать js и css",
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
        ),
        "SOGLASIE" => array(
            "PARENT" => "BASE",
            "NAME" => "Показывать пункт о согласии",
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
        ),
        "SHOW_ERROR" => array(
            "PARENT" => "BASE",
            "NAME" => "Показывать текст ошибок",
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
        ),
    )
);

?>