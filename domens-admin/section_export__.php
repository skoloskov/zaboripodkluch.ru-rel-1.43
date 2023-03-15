<?
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
ini_set('display_errors', '1');
ini_set('memory_limit', '1024M');
ini_set('max_execution_time', 3600);
//echo '<pre>'.print_r(ini_get_all(), true).'</pre>';die();
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

require_once $_SERVER['DOCUMENT_ROOT'].'/include/classes/PHPExcel.php';

if (isset($_REQUEST['domain'])){
	if (is_array($_REQUEST['domain']))
	{	
		$domens = $_REQUEST['domain'];
	}
	else{
		$domens = trim($_REQUEST['domain']);
	}
}
else
{
	header('Location: /domens-admin/');
}
//echo __LINE__.' '.date('H:i:s', time()).' START <br/>';
exeption_list_load($domens);

function exeption_list_load($domens)
{
	global $APPLICATION;
	// Create new PHPExcel object
	$objPHPExcel = new PHPExcel();
	// Set document properties
	$objPHPExcel->getProperties()->setCreator("PRICE_LIST")
	->setLastModifiedBy("PRICE_LIST")
	->setTitle("PRICE_LIST")
	->setSubject("PRICE_LIST")
	->setDescription("PRICE_LIST")
	->setKeywords("PRICE_LIST")
	->setCategory("PRICE_LIST");
//echo __LINE__.'<br/>';
//echo __LINE__.' '.date('H:i:s', time()).'<br/>';
	/*Заголовки*/
	$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('A1', 'ID')
	->setCellValue('B1', 'Домен')
	->setCellValue('C1', 'Страница')
	->setCellValue('D1', 'Заголовок(Title)')
	->setCellValue('E1', 'H1')
	->setCellValue('F1', 'Description')
	->setCellValue('G1', 'Keywords')
	->setCellValue('H1', 'Alt/Title логотипа')
	->setCellValue('I1', 'Блок "Цены"')
	->setCellValue('J1', 'О компании')
	->setCellValue('K1', 'Отзывы')
	->setCellValue('L1', 'Copyright')
	->setCellValue('M1', 'TURBO-текст');
	/*Основное*/
//echo __LINE__.'<br/>'.'<pre>'.print_r($_REQUEST, true).'</pre>';//die();
	/* Формирование данных*/
//echo __LINE__.' '.date('H:i:s', time()).'<br/>';
	$cur = $APPLICATION->GetPageProperty('regionSettings');
	if ($_REQUEST['all'] == 'true'){
		$domens = '%'.$cur['UF_DOMAIN'];
	}
		
	$filter=[/*'UF_DOMAIN' => $domens*/];
	if (isset($_REQUEST['page'])){
		$pages = $_REQUEST['page'];
	}
	else
	{
		// Получаем список страниц по sitemap
		$source=file_get_contents('https://'.$cur['UF_DOMAIN'].'/sitemap.xml', true);

		$base_xml = new SimpleXMLElement($source);
		$pages=[];
		foreach ($base_xml as $url_data) {
			$p_url=parse_url((string)$url_data->loc);
			$pages[] = $p_url['path'];
		}
	}
	$filter ['UF_PATH']=$pages;
//echo __LINE__.' '.date('H:i:s', time()).'<br/>';	
	$config = Dev2fun\MultiDomain\Config::getInstance();
	$hl = Dev2fun\MultiDomain\HLHelpers::getInstance();
	$hlDomain = $config->get('highload_domains_seo');
	$perPage = 10000;
	$numPage = 0;
	$count = 2;
	
//echo __LINE__.' '.date('H:i:s', time()).'<br/>';
	if (!is_array($domens)) $domens = [$domens];
	foreach ($domens as $domen)
	{
		$filter['UF_DOMAIN'] = $domen;
	//echo '<pre>'.print_r($filter, true).'</pre>';die();
	
		if ($domains_base = $hl->getElementList($hlDomain, 
			[$filter],//$cur['UF_DOMAIN'],
			['UF_DOMAIN' => 'ASC', 'UF_PATH'=>'ASC'],
			['*'],
			[	
				//'limit' => $perPage,
				//'offset'=> $perPage*$numPage
			]
		)){
		
			//echo $numPage.' '.count($domains_base).' '.date('H:i:s', time()).'<br/>';
			//if ($numPage>10) die();
			$domains=[];
			$numPage++;
			//echo __LINE__.' '.date('H:i:s', time()).'<br/>';
			foreach ($domains_base as $data){
				$domains[$data['UF_DOMAIN']][$data['UF_PATH']]=$data;
			}
			//echo __LINE__.' '.date('H:i:s', time()).'<br/>';
				//echo '<pre>'.print_r(($domains), true).'</pre>';die();
			//
		}
				foreach($pages as $page)
				{
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$count, $domains[$domen][$page]['ID'])
						->setCellValue('B'.$count, $domen)//$domain['UF_DOMAIN'])
						->setCellValue('C'.$count, $page)//$domain['UF_PATH'])
						->setCellValue('D'.$count, $domains[$domen][$page]['UF_TITLE'])
						->setCellValue('E'.$count, $domains[$domen][$page]['UF_H1'])
						->setCellValue('F'.$count, $domains[$domen][$page]['UF_DESCRIPTION'])
						->setCellValue('G'.$count, $domains[$domen][$page]['UF_KEYWORDS'])
						->setCellValue('H'.$count, $domains[$domen][$page]['UF_ALTLOGO'])
						->setCellValue('I'.$count, $domains[$domen][$page]['UF_PRICE'])
						->setCellValue('J'.$count, $domains[$domen][$page]['UF_TEXT'])
						->setCellValue('K'.$count, $domains[$domen][$page]['UF_FEEDBACK'])
						->setCellValue('L'.$count, $domains[$domen][$page]['UF_COPYRIGHT'])
						->setCellValue('M'.$count, $domains[$domen][$page]['UF_TURBO']);
						
						$count++;
				}
			
			//echo __LINE__.' '.date('H:i:s', time()).'<br/>';
			//die();
		
	}
	//echo __LINE__.'<br/>';
	//die();
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
	
	// Rename worksheet
	$objPHPExcel->getActiveSheet()->setTitle('Поддомены');
	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);
	/*$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save(str_replace('.php', '.xlsx', __FILE__));*/
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$file = $_SERVER['DOCUMENT_ROOT'].'/upload/section_export.xls';
	$objWriter->save($file);
	// Echo done
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename='.$_SERVER['HTTP_HOST'].'_sections.xls');
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($file));
	readfile($file);
	
}
?>