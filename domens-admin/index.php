<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetAdditionalCSS("/domens-admin/domens-admin.css");
$APPLICATION->SetTitle("Domens Admin");
global $USER;

if (!$USER->isAdmin()){
	header('Location: /');
}
?>
<div class="container domensadmin">
<h1>Настройка поддоменов сайта</h1>
<br/>

<?

$cur = $APPLICATION->GetPageProperty('regionSettings');
//echo '<pre>'.print_r($cur, true).'</pre>';
if (isset($_GET['import']) && $_GET['import']=='ok'){
	echo '<span style="color:green;">Импорт успешно завершен</span>. Обработано '.htmlspecialcharsbx($_GET['count']).' записи(ей)<br/>';
}

if (isset($cur['UF_DOMAIN']) && trim($cur['UF_DOMAIN'])!='')
{
	$config = Dev2fun\MultiDomain\Config::getInstance();
	$hl = Dev2fun\MultiDomain\HLHelpers::getInstance();
	$hlDomain = $config->get('highload_domains');
	$domains = $hl->getElementList($hlDomain, [
		'UF_DOMAIN' => $cur['UF_DOMAIN'],
	]);

	if (count($domains)){
		echo '<div class="table-responsive">
			<table class="table table-striped table-hover domens_admin">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th width="200">Поддомен</th>
						<th>Название (Город)</th>
						<th>В городе (предл.падеж)</th>
						<th width="150">Эл. почта</th>
						<th width="150">Телефон</th>
						<th>Адрес</th>
					</tr>
				</thead>
				<tbody>';
		foreach ($domains as $domain){
			?>
			<tr>
				<td align="center"><?=$domain['ID']?></td>
				<td><a href="sections.php?domain=<?=$domain['UF_SUBDOMAIN']?>"><?=$domain['UF_SUBDOMAIN']?></a></td>
				<td><a href="/bitrix/admin/highloadblock_row_edit.php?ENTITY_ID=1&ID=<?=$domain['ID']?>&lang=ru" target="_blank"><?=$domain['UF_NAME']?></a></td>
				<td><?=$domain['UF_INCITY']?></td>
				<td><?=$domain['UF_MAIL']?></td>
				<td align="center"><?=$domain['UF_PHONE']?></td>
				<td><?=$domain['UF_ADRESS']?></td>
				
			</tr>
			<?
		}
		echo '</tbody></table>
		
		</div>';
		
	}
	else
		echo 'Домены не созданы';
	?>
	<br/><br/>
	<?//if (file_exists($_SERVER['DOCUMENT_ROOT'].'/include/classes/PHPExcel.php'))
	//{?>
	<a href="domens_export.php" class="btn btn-warning">Экспорт в Excel</a>
	<a class="btn btn-warning btn-import">Импорт из Excel</a>
	

	<br/><br/><br/>
	<div id="import_form">
		<form action="domens_import.php" method="POST" enctype="multipart/form-data">
			<label for="importfile">Выберите файл для импорта данных:</label><input type="file" name="import_file" id="importfile"/>
			<input type="submit" class="btn btn-warning" value="Загрузить"/>
		</form>
	</div>
	
	<?
	//}
	//else echo 'Не найдена библиотека PHPExcel. '.$_SERVER['DOCUMENT_ROOT'].'/include/classes/PHPExcel.php';
	//echo '<pre>'.print_r($subdomains, true).'</pre>';
}
else{
	echo 'Для текущего домена параметры не заданы. Добавьте домен в <a href="/bitrix/admin/highloadblock_rows_list.php?ENTITY_ID=1&lang=ru">настройках сайта</a>';
}
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