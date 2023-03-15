<?
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

require_once $_SERVER['DOCUMENT_ROOT'].'/include/classes/PHPExcel.php';

exeption_list_load();

function exeption_list_load()
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
	->setCellValue('B1', 'Название')
	->setCellValue('C1', 'Поддомен')
	//->setCellValue('D1', 'Заголовок(Title)')
	->setCellValue('D1', 'В городе')
	->setCellValue('E1', 'E-mail')
	->setCellValue('F1', 'Дом. мета-данные')
	//->setCellValue('H1', 'Мета-Description')
	//->setCellValue('I1', 'Мета-Keywords')
	->setCellValue('G1', 'Схема проезда')
	->setCellValue('H1', 'Телефон')
	->setCellValue('I1', 'Адрес')
	->setCellValue('J1', 'Robots.txt')
	->setCellValue('K1', 'Доп. коды счетчиков');
	/*Основное*/
//echo __LINE__.'<br/>';	
	/* Формирование данных*/
	$cur = $APPLICATION->GetPageProperty('regionSettings');
	$domen = Dev2fun\MultiDomain\SubDomain::getInstance();

	$config = Dev2fun\MultiDomain\Config::getInstance();
	$hl = Dev2fun\MultiDomain\HLHelpers::getInstance();
	$hlDomain = $config->get('highload_domains');
	$domains = $hl->getElementList($hlDomain, [
		'UF_DOMAIN' => $cur['UF_DOMAIN'],
	]);

	//echo '<pre>'.print_r($domains, true).'</pre>';die();
	$count = 2;
	foreach ($domains as $domain){
		$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A'.$count, $domain['ID'])
			->setCellValue('B'.$count, $domain['UF_NAME'])
			->setCellValue('C'.$count, $domain['UF_SUBDOMAIN'])
			//->setCellValue('D'.$count, $domain['UF_TITLE'])
			->setCellValue('D'.$count, $domain['UF_INCITY'])
			->setCellValue('E'.$count, $domain['UF_MAIL'])
			->setCellValue('F'.$count, $domain['UF_META'])
			//->setCellValue('H'.$count, $domain['UF_DESCRIPTION'])
			//->setCellValue('I'.$count, $domain['UF_KEYWORDS'])
			->setCellValue('G'.$count, $domain['UF_MAP'])
			->setCellValue('H'.$count, $domain['UF_PHONE'])
			->setCellValue('I'.$count, $domain['UF_ADRESS'])
			->setCellValue('J'.$count, $domain['UF_ROBOTS'])
			->setCellValue('K'.$count, $domain['UF_CODE_COUNTERS']);
			
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
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
	//$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
	//$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
	//$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);

	// Rename worksheet
	$objPHPExcel->getActiveSheet()->setTitle('Поддомены');
	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);
	/*$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save(str_replace('.php', '.xlsx', __FILE__));*/
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$file = $_SERVER['DOCUMENT_ROOT'].'/upload/domens_export.xls';
	$objWriter->save($file);
	// Echo done
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename='.$_SERVER['HTTP_HOST'].'_subdomens.xls');
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($file));
	readfile($file);
	
}
?>