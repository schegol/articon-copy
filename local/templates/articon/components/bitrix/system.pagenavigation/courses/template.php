<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->createFrame()->begin('Загрузка навигации');

if (!$arResult['NavShowAlways']) {
    if ($arResult['NavRecordCount'] == 0 || ($arResult['NavPageCount'] == 1 && $arResult['NavShowAll'] == false))
        return;
}

$arResult['sUrlPath'] = '/courses/';

$strNavQueryString = ($arResult['NavQueryString'] != '' ? $arResult['NavQueryString'].'&amp;' : '');
$strNavQueryStringFull = ($arResult['NavQueryString'] != '' ? '?'.$arResult['NavQueryString'] : '');

$totalPages = $arResult['NavPageCount'];
$firstVisiblePage = $arResult['nEndPage'] - $arResult['nPageWindow'] + 1;
$lastVisiblePage = $arResult['nEndPage'];
?>

<div class="pagination">
    <ul>
        <?if ($firstVisiblePage > 1):?>
            <?if (($firstVisiblePage - 1) > 1):?>
                <li><a href="<?=$arResult['sUrlPath']?>">1</a></li>
                <li><span>...</span></li>
            <?else:?>
                <li><a href="<?=$arResult['sUrlPath']?>">1</a></li>
            <?endif?>
        <?endif?>

        <?if($arResult['bDescPageNumbering'] === true):?>
            <?while($arResult['nStartPage'] >= $arResult['nEndPage']):?>
                <?$NavRecordGroupPrint = $arResult['NavPageCount'] - $arResult['nStartPage'] + 1;?>

                <?if ($arResult['nStartPage'] == $arResult['NavPageNomer']):?>
                    <li class="active"><a><?=$NavRecordGroupPrint?></a></li>
                <?elseif($arResult['nStartPage'] == $arResult['NavPageCount'] && $arResult['bSavePage'] == false):?>
                    <li><a href="<?=$arResult['sUrlPath']?><?=$strNavQueryStringFull?>"><?=$NavRecordGroupPrint?></a></li>
                <?else:?>
                    <li><a href="<?=$arResult['sUrlPath']?>?<?=$strNavQueryString?>PAGEN_<?=$arResult['NavNum']?>=<?=$arResult['nStartPage']?>"><?=$NavRecordGroupPrint?></a></li>
                <?endif?>

                <?$arResult['nStartPage']--?>
            <?endwhile?>
        <?else:?>
            <?while($arResult['nStartPage'] <= $arResult['nEndPage']):?>
                <?if ($arResult['nStartPage'] == $arResult['NavPageNomer']):?>
                    <li class="active"><a><?=$arResult['nStartPage']?></a></li>
                <?elseif($arResult['nStartPage'] == 1 && $arResult['bSavePage'] == false):?>
                    <li><a href="<?=$arResult['sUrlPath']?><?=$strNavQueryStringFull?>"><?=$arResult['nStartPage']?></a></li>
                <?else:?>
                    <li><a href="<?=$arResult['sUrlPath']?>?<?=$strNavQueryString?>PAGEN_<?=$arResult['NavNum']?>=<?=$arResult['nStartPage']?>"><?=$arResult['nStartPage']?></a></li>
                <?endif?>
                <?$arResult['nStartPage']++?>
            <?endwhile?>
        <?endif?>

        <?if ($totalPages > $lastVisiblePage):?>
            <?if ($totalPages - $lastVisiblePage > 1):?>
                <li><span>...</span></li>
                <li><a href="<?=$arResult['sUrlPath']?>?<?=$strNavQueryString?>PAGEN_<?=$arResult['NavNum']?>=<?=$arResult['NavPageCount']?>"><?=$arResult['NavPageCount']?></a></li>
            <?else:?>
                <li><a href="<?=$arResult['sUrlPath']?>?<?=$strNavQueryString?>PAGEN_<?=$arResult['NavNum']?>=<?=$arResult['NavPageCount']?>"><?=$arResult['NavPageCount']?></a></li>
            <?endif?>
        <?endif?>
    </ul>
</div>
