<?
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

//require_once $_SERVER['DOCUMENT_ROOT'].'/include/classes/PHPExcel.php';


require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet; // Работа со структурой документа
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; // Запись в нужный формат. Если мы говорим только об excel то там может быть ещё Xls
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing; // Встроенные методы для работы с картинками.

exeption_list_load();

function exeption_list_load()
{
	global $APPLICATION;
	// Create new PHPExcel object
	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	
	//$objPHPExcel = new PHPExcel();
	// Set document properties
	$spreadsheet->getProperties()->setCreator("PRICE_LIST")
	->setLastModifiedBy("PRICE_LIST")
	->setTitle("PRICE_LIST")
	->setSubject("PRICE_LIST")
	->setDescription("PRICE_LIST")
	->setKeywords("PRICE_LIST")
	->setCategory("PRICE_LIST");
//echo __LINE__.'<br/>';

	/*Заголовки*/
	$sheet
	->setCellValue('A1', 'ID')
	->setCellValue('B1', 'Название')
	->setCellValue('C1', 'Поддомен')
	->setCellValue('D1', 'Область')
	->setCellValue('E1', 'В городе')
	->setCellValue('F1', 'E-mail')
	->setCellValue('G1', 'Дом. мета-данные')
	//->setCellValue('H1', 'Мета-Description')
	//->setCellValue('I1', 'Мета-Keywords')
	->setCellValue('H1', 'Схема проезда')
	->setCellValue('I1', 'Телефон')
	->setCellValue('J1', 'Адрес')
	->setCellValue('K1', 'Robots.txt')
	->setCellValue('L1', 'Доп. коды счетчиков');
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
		$sheet
			->setCellValue('A'.$count, $domain['ID'])
			->setCellValue('B'.$count, $domain['UF_NAME'])
			->setCellValue('C'.$count, $domain['UF_SUBDOMAIN'])
			->setCellValue('D'.$count, $domain['UF_AREA'])
			->setCellValue('E'.$count, $domain['UF_INCITY'])
			->setCellValue('F'.$count, $domain['UF_MAIL'])
			->setCellValue('G'.$count, $domain['UF_META'])
			//->setCellValue('H'.$count, $domain['UF_DESCRIPTION'])
			//->setCellValue('I'.$count, $domain['UF_KEYWORDS'])
			->setCellValue('H'.$count, $domain['UF_MAP'])
			->setCellValue('I'.$count, $domain['UF_PHONE'])
			->setCellValue('J'.$count, $domain['UF_ADRESS'])
			->setCellValue('K'.$count, $domain['UF_ROBOTS'])
			->setCellValue('L'.$count, $domain['UF_CODE_COUNTERS']);
			
			$count++;
	}
	//die();

	$sheet->getColumnDimension('A')->setAutoSize(true);
	$sheet->getColumnDimension('B')->setAutoSize(true);
	$sheet->getColumnDimension('C')->setAutoSize(true);
	$sheet->getColumnDimension('D')->setAutoSize(true);
	$sheet->getColumnDimension('E')->setAutoSize(true);
	$sheet->getColumnDimension('F')->setAutoSize(true);
	$sheet->getColumnDimension('G')->setAutoSize(true);
	$sheet->getColumnDimension('H')->setAutoSize(true);
	$sheet->getColumnDimension('I')->setAutoSize(true);
	$sheet->getColumnDimension('J')->setAutoSize(true);
	$sheet->getColumnDimension('K')->setAutoSize(true);
	$sheet->getColumnDimension('L')->setAutoSize(true);
	//$sheet->getColumnDimension('M')->setAutoSize(true);
	//$sheet->getColumnDimension('N')->setAutoSize(true);

	// Rename worksheet
	$sheet->setTitle('Поддомены');
	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	//$objPHPExcel->setActiveSheetIndex(0);
	/*$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save(str_replace('.php', '.xlsx', __FILE__));*/
	//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$file = $_SERVER['DOCUMENT_ROOT'].'/upload/domens_export.xlsx';
	//$objWriter->save($file);
	try {
		$writer = new Xlsx($spreadsheet);
		$writer->save($file);

	} catch (PhpOffice\PhpSpreadsheet\Writer\Exception $e) {
		echo $e->getMessage();
	}
	// Echo done
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename='.$_SERVER['HTTP_HOST'].'_subdomens.xlsx');
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($file));
	readfile($file);
	
}
?>