<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetAdditionalCSS("/domens-admin/domens-admin.css");
$APPLICATION->SetTitle("Domens Admin");
global $USER;

if (!$USER->isAdmin()){
	header('Location: /');
}

if (isset($_GET['domain']) && trim($_GET['domain'])!=''){
	$domen = htmlspecialcharsbx($_GET['domain']);
}
else
{
	header('Location: /domens-admin/');
}

$arrContextOptions=array(
      "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    ); 
$cur = $APPLICATION->GetPageProperty('regionSettings');
//echo '<pre>'.print_r($cur, true).'</pre>';

$config = Dev2fun\MultiDomain\Config::getInstance();
$hl = Dev2fun\MultiDomain\HLHelpers::getInstance();
$hlDomain = $config->get('highload_domains');
$hlDomainSEO = $config->get('highload_domains_seo');

// Получаем список активных поддоменов
$domainsList = $hl->getElementList($hlDomain,
	[/*'UF_ACTIVE' => 1,*/ 'UF_DOMAIN'=>$cur['UF_DOMAIN']],
	['UF_SUBDOMAIN'=>'ASC']
);
//echo '<pre>'.print_r($_SERVER, true).'</pre>';die();
// Получаем список страниц по sitemap
$source=file_get_contents('http://'.$cur['UF_DOMAIN'].'/sitemap.xml', true, stream_context_create($arrContextOptions));

$base_xml = new SimpleXMLElement($source);
$sitemap_urls=[];
foreach ($base_xml as $url_data) {
	$sitemap_urls[] = (string)$url_data->loc;
}
sort($sitemap_urls);
//echo '<pre>'.print_r($sitemap_urls, true).'</pre>';die();
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
<a href="section_export.php?all=true&domain=<?=$domen;?>" class="btn btn-warning btn-export1">Экспорт страниц всех поддоменов в Excel</a>
<br/>
<div id="export_form1">
	<form action="section_export.php" method="POST" enctype="multipart/form-data">
		<?
		//echo '<pre>'.print_r(($domainsList), true).'</pre>';
		if (count($domainsList)>0) // список доменов не пуст
		{
			echo '<h3>Домены для выгрузки</h3>
			<input type="checkbox" name="domain_all" id="domain_all"><label for="domain_all">Все домены</label>
			<table width="100%"><tr>';
			foreach ($domainsList as $num=>$row)
			{
				echo '<td><input type="checkbox" name="domain[]" value="'.$row['UF_SUBDOMAIN'].'" id="domain'.$num.'"><label for="domain'.$num.'">'.$row['UF_SUBDOMAIN'].'</label></td>';
				if ($num % 4 == 3) echo '</tr><tr>';
			}
			echo '</tr></table><br/><hr/><br/>';
			
			if (count($sitemap_urls))
			{				
				echo '<h3>Страницы сайта для выгрузки (на основе Sitemap.xml)</h3>';//<table><tr>';
				echo '<input type="checkbox" name="page_all" id="page_all"><label for="page_all">Все страницы</label><br/>';
				foreach ($sitemap_urls as $num=>$url)
				{
					$p_url = parse_url($url);
					//echo '<pre>'.print_r($p_url, true).'</pre>';
					echo '<input type="checkbox" name="page[]" value="'.$p_url['path'].'" id="page'.$num.'"><label for="page'.$num.'">'.$p_url['path'].'</label><br/>';
					//if ($num % 5 == 4) echo '</tr><tr>';
				}
				//echo '</tr></table>';
			}
		}
		else
		{
			echo 'Необходимо сперва загрузить список доменов!';
		}
		?>
		
		<input type="submit" class="btn btn-warning" value="Выгрузить"/>
	</form>
</div>
<?


$domains = $hl->getElementList($hlDomainSEO, 
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
					<th>SEO-Текст<br/>(О компании)</th>
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

	<a href="section_export.php?all=true&domain=<?=$domen;?>" class="btn btn-warning btn-export">Экспорт страниц всех поддоменов в Excel</a>
	<br/>
	<div id="export_form">
		<form action="section_export.php" method="POST" enctype="multipart/form-data">
			<?
			//echo '<pre>'.print_r(($domainsList), true).'</pre>';
			if (count($domainsList)>0) // список доменов не пуст
			{
				echo '<h3>Домены для выгрузки</h3>
				<input type="checkbox" name="domain_all" id="domain_all"><label for="domain_all">Все домены</label>
				<table width="100%"><tr>';
				foreach ($domainsList as $num=>$row)
				{
					echo '<td><input type="checkbox" name="domain[]" value="'.$row['UF_SUBDOMAIN'].'" id="domain'.$num.'"><label for="domain'.$num.'">'.$row['UF_SUBDOMAIN'].'</label></td>';
					if ($num % 4 == 3) echo '</tr><tr>';
				}
				echo '</tr></table>';
				
				if (count($sitemap_urls))
				{				
					echo '<h3>Страницы сайта для выгрузки (на основе Sitemap.xml)</h3>';//<table><tr>';
					echo '<input type="checkbox" name="page_all" id="page_all"><label for="page_all">Все страницы</label><br/>';
					foreach ($sitemap_urls as $num=>$url)
					{
						$p_url = parse_url($url);
						//echo '<pre>'.print_r($p_url, true).'</pre>';
						echo '<input type="checkbox" name="page[]" value="'.$p_url['path'].'" id="page'.$num.'"><label for="page'.$num.'">'.$p_url['path'].'</label><br/>';
						//if ($num % 5 == 4) echo '</tr><tr>';
					}
					//echo '</tr></table>';
				}
			}
			else
			{
				echo 'Необходимо сперва загрузить список доменов!';
			}
			?>
			
			<input type="submit" class="btn btn-warning" value="Выгрузить"/>
		</form>
	</div>
	<?
}
else
	echo '<br/>Описания страниц и разделов не созданы<br/><br/>';
?>

<?
//echo '<pre>'.print_r($subdomains, true).'</pre>';
?>

</div>




<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>