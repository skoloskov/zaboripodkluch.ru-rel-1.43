<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetAdditionalCSS("/domens-admin/domens-admin.css");
$APPLICATION->SetTitle("Domens Admin");
global $USER;

//if (!$USER->isAdmin()){
//	header('Location: /');
//}

if (isset($_GET['domain']) && trim($_GET['domain'])!=''){
	$domen = htmlspecialcharsbx($_GET['domain']);
}
else
{
	header('Location: /domens-admin/');
}
?>
<div class="container domensadmin">
<h1>Настройка параметров страниц сайта <?=$domen;?></h1>
<br/>

<a href="/domens-admin/">К списку поддоменов</a><br/><br/>
<a href="section_export.php?domain=<?=$domen;?>" class="btn btn-warning">Экспорт в Excel</a>
<a class="btn btn-warning btn-import">Импорт из Excel</a>
<br/><br/><br/>
<div id="import_form">
	<form action="section_import.php" method="POST" enctype="multipart/form-data">
		<label for="importfile">Выберите файл для импорта данных:</label><input type="file" name="import_file" id="importfile"/>
		<input type="submit" class="btn btn-warning" value="Загрузить"/>
	</form>
</div>
<a href="section_export.php?all=true&domain=<?=$domen;?>" class="btn btn-warning">Экспорт страниц всех поддоменов в Excel</a>
<br/><br/><br/>
<?

$cur = $APPLICATION->GetPageProperty('regionSettings');
//echo '<pre>'.print_r($cur, true).'</pre>';

$config = Dev2fun\MultiDomain\Config::getInstance();
$hl = Dev2fun\MultiDomain\HLHelpers::getInstance();
$hlDomain = $config->get('highload_domains_seo');
$domains = $hl->getElementList($hlDomain, 
	['UF_DOMAIN' => $domen],//$cur['UF_DOMAIN'],
	['UF_PATH'=>'ASC']
);
//echo '<pre>'.print_r($domains, true).'</pre>';die();

if (count($domains)){
	echo '<div class="table-responsive">
		<table class="table table-striped table-hover domens_admin">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th >Раздел сайта</th>
					<th>Title</th>
					<th width="200">H1</th>
					<th width="200">Alt логотипа</th>
					<th>SEO-Текст</th>
				</tr>
			</thead>
			<tbody>';
	foreach ($domains as $domain){
		?>
		<tr>
			<td align="center"><?=$domain['ID']?></td>
			<td><a href="/bitrix/admin/highloadblock_row_edit.php?ENTITY_ID=2&ID=<?=$domain['ID']?>&lang=ru" target="_blank"><?=$domain['UF_PATH']?></a></td>
			<td><?=$domain['UF_TITLE']?></td>
			<td><?=$domain['UF_H1']?></td>
			<td><?=$domain['UF_ALTLOGO']?></td>			
			<td><?=$domain['UF_TEXT']?></td>			
		</tr>
		<?
	}
	echo '</tbody></table>
	
	</div>
	';
	
}
else
	echo 'Описания страниц и разделов не созданы';
?>

<br/><br/>
<a href="section_export.php?domain=<?=$domen;?>" class="btn btn-warning">Экспорт в Excel</a>
<a class="btn btn-warning btn-import">Импорт из Excel</a>
<br/><br/><br/>
<div id="import_form">
	<form action="section_import.php" method="POST" enctype="multipart/form-data">
		<label for="importfile">Выберите файл для импорта данных:</label><input type="file" name="import_file" id="importfile"/>
		<input type="submit" class="btn btn-warning" value="Загрузить"/>
	</form>
</div>

<a href="section_export.php?all=true&domain=<?=$domen;?>" class="btn btn-warning">Экспорт страниц всех поддоменов в Excel</a>
<?
//echo '<pre>'.print_r($subdomains, true).'</pre>';
?>

</div>



<script>
$(document).ready(function(){
	$('.btn-import').on('click', function(){
		$("#import_form").show();
		return false;
	});
	
});
</script>









<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>