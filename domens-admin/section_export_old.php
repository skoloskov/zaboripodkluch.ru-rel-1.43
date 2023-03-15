<?
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

require_once $_SERVER['DOCUMENT_ROOT'].'/include/classes/PHPExcel.php';

if (isset($_GET['domain']) && trim($_GET['domain'])!=''){
	$domen = trim($_GET['domain']);
}
else
{
	header('Location: /domens-admin/');
}

exeption_list_load($domen);

function exeption_list_load($domen)
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
	->setCellValue('L1', 'Copyright');
	/*Основное*/
//echo __LINE__.'<br/>';	
	/* Формирование данных*/
	if ($_GET['all'] == 'true'){
		$cur = $APPLICATION->GetPageProperty('regionSettings');
		$domen = '%'.$cur['UF_DOMAIN'];
	}
	$config = Dev2fun\MultiDomain\Config::getInstance();
	$hl = Dev2fun\MultiDomain\HLHelpers::getInstance();
	$hlDomain = $config->get('highload_domains_seo');
	$domains = $hl->getElementList($hlDomain, 
		['UF_DOMAIN' => $domen,],//$cur['UF_DOMAIN'],
		['UF_DOMAIN' => 'ASC', 'UF_PATH'=>'ASC']
	);

	//echo '<pre>'.print_r(count($domains), true).'</pre>';die();
	$count = 2;
	foreach ($domains as $domain){
		$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A'.$count, $domain['ID'])
			->setCellValue('B'.$count, $domain['UF_DOMAIN'])
			->setCellValue('C'.$count, $domain['UF_PATH'])
			->setCellValue('D'.$count, $domain['UF_TITLE'])
			->setCellValue('E'.$count, $domain['UF_H1'])
			->setCellValue('F'.$count, $domain['UF_DESCRIPTION'])
			->setCellValue('G'.$count, $domain['UF_KEYWORDS'])
			->setCellValue('H'.$count, $domain['UF_ALTLOGO'])
			->setCellValue('I'.$count, $domain['UF_PRICE'])
			->setCellValue('J'.$count, $domain['UF_TEXT'])
			->setCellValue('K'.$count, $domain['UF_FEEDBACK'])
			->setCellValue('L'.$count, $domain['UF_COPYRIGHT']);
			
			$count++;
	}
	//die();

	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
	//$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
	//$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
	
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