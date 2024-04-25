<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

if (!CModule::IncludeModule('iblock')) {
    return false;
}

$dbIBlocks = CIBlock::GetList(
    array('SORT' => 'ASC'),
    array('ACTIVE' => 'Y')
);
while ($arIBlocks = $dbIBlocks->GetNext()) {
    $paramIBlocks[$arIBlocks['ID']] = '[' . $arIBlocks['ID'] . '] ' . $arIBlocks['NAME'];
}

$arComponentParameters = array(
    'GROUPS' => array(),
    'PARAMETERS' => array(
        'IBLOCK_ID' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('PARAMETERS_AURORI_CALENDAR_IBLOCK_ID'),
            'TYPE' => 'LIST',
            'VALUES' =>  $paramIBlocks,
            'REFRESH' =>  'Y',
            'MULTIPLE' =>  'N',

        ),
        'DIRECTIONS_IBLOCK_ID' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('PARAMETERS_AURORI_CALENDAR_DIRECTIONS_IBLOCK_ID'),
            'TYPE' => 'LIST',
            'VALUES' =>  $paramIBlocks,
            'REFRESH' =>  'Y',
            'MULTIPLE' =>  'N',

        ),
        'MONTHS' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('PARAMETERS_AURORI_CALENDAR_MONTHS'),
            'TYPE' => 'STRING',
            'MULTIPLE' => 'Y',
            'DEFAULT' => '3',
        ),
    ),
);
?>
