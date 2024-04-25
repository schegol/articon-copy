<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
//$this->setFrameMode(true);

$strReturn = '
<section class="section-breadcrumbs">
	<div class="bg-figure-1">
		<img class="image" src="'.SITE_TEMPLATE_PATH.'/images/svg/bg-figure-1.svg" alt="Декоративный элемент">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="s-breadcrumbs-block">
					<div class="breadcrumbs">
						<ul>
';

$i = 1;
$count = count($arResult);

foreach ($arResult as $arItem) {
	$strReturn .= '<li><a'.($i < $count ? ' href="'.$arItem['LINK'].'"' : '').'>'.$arItem['TITLE'].'</a></li>';
	$i++;
}

$strReturn .= '
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
';

return $strReturn;
?>
