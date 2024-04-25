<?include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus('404 Not Found');
@define('ERROR_404', 'Y');

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');

$APPLICATION->SetTitle('Страница не найдена');
$APPLICATION->AddChainItem('404', '');
?>

<section class="section-404">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="s-404-block">
                    <div class="s-404-img">
                        <img class="image" src="<?=SITE_TEMPLATE_PATH?>/images/page-404/page-404-img.png" alt="404">
                    </div>
                    <div class="s-404-btn-block">
                        <a href="/" class="s-404-btn green-btn">Вернуться на главную</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>