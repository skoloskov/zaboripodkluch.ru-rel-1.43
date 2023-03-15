<?
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);

set_time_limit(300);
ini_set('max_execution_time', 300);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

require_once $_SERVER['DOCUMENT_ROOT'].'/include/classes/PHPExcel.php';

exeption_list_upload();

function exeption_list_upload()
{
	global $APPLICATION;
	/*сохранение*/
	$filename='domens'.time().'.xls';
	$temp_dir=$_SERVER['DOCUMENT_ROOT'].'/upload/'.$filename;
	//echo '<pre>'.print_r($_FILES, true).'</pre>';//die();
	//echo '<pre>'.print_r($temp_dir, true).'</pre>';//die();
	if(isset($_FILES) && !empty($_FILES))
	{
		
		if(is_uploaded_file($_FILES['import_file']['tmp_name']))
		{
			if(file_exists($temp_dir)) unlink($temp_dir); 
			if(!move_uploaded_file($_FILES['import_file']['tmp_name'],$temp_dir))
				die();
		}
	}
	else die();
	
	$cur = $APPLICATION->GetPageProperty('regionSettings');
	$domen = Dev2fun\MultiDomain\SubDomain::getInstance();
	
	$config = Dev2fun\MultiDomain\Config::getInstance();
	$hl = Dev2fun\MultiDomain\HLHelpers::getInstance();
	$hlDomain = $config->get('highload_domains');
	//$domains = $hl->getElementList($hlDomain, [
	//	'UF_DOMAIN' => $cur['UF_DOMAIN'],
	//]);
	
	
	/*сохранение*/
	//echo __LINE__.'<br/>';
	$objPHPExcel = PHPExcel_IOFactory::load($temp_dir);
	$objPHPExcel->setActiveSheetIndex(0);
	$aSheet = $objPHPExcel->getActiveSheet();
	$count=0;
	//echo __LINE__.'<br/>';
	//получим итератор строки и пройдемся по нему циклом
	foreach($aSheet->getRowIterator() as $row)
	{
		//получим итератор ячеек текущей строки
		$cellIterator = $row->getCellIterator();
		$cellIterator->setIterateOnlyExistingCells(false);
		//пройдемся циклом по ячейкам строки
		$vals=array();
		foreach($cellIterator as $cell)
		{
			$vals[]=($cell->getCalculatedValue());
		}
		//echo '<pre>'.print_r($vals, true).'</pre>'; //die();
		if($count!=0)
		{
			$data_to_update = [
				'UF_NAME' => $vals['1'],
				'UF_DOMAIN' => $cur['UF_DOMAIN'],
				'UF_SUBDOMAIN' => $vals['2'],
				'UF_INCITY' => $vals['3'],
				'UF_MAIL' => $vals['4'],
				'UF_META' => $vals['5'],
				//'UF_DESCRIPTION' => $vals['7'],
				//'UF_KEYWORDS' => $vals['8'],
				'UF_MAP' => $vals['6'],
				'UF_PHONE' => $vals['7'],
				'UF_ADRESS' => $vals['8'],
				'UF_ROBOTS' => $vals['9'],
				'UF_CODE_COUNTERS' => $vals['10'],
			];
			$domains = [];
			if ((int)$vals[0]!=0)
			{
				$domains = $hl->getElementList($hlDomain, [
					'UF_DOMAIN' => $cur['UF_DOMAIN'],
					'ID'		=> $vals[0]
				]);
			}
			//echo '<pre>'.print_r($domains, true).'</pre>';
			if (count($domains)){ // Запись существует, обновляем
				if (!$hl->updateElement($hlDomain, $vals[0], $data_to_update))
					echo 'Ошибка обновления записи <pre>'.print_r($data_to_update).'</pre>';
			}
			else // Записи нет, добавляем
			{
				if (!$hl->addElement($hlDomain, $data_to_update))
					echo 'Ошибка добавления записи <pre>'.print_r($data_to_update).'</pre>';
			}
		}
		else
		{
			if ($vals[0]!='ID' || $vals[1]!='Название' || $vals[2]!='Поддомен' || $vals[4]!='E-mail' || count($vals)!=11){ // Проверяем данные, находящиеся в файле
				echo 'Ошибка в формате загружаемого файла. Сделайте экспорт файла с данными, внесите изменения и попробуйте загрузить снова.';
				return 0;
			}
		}
		$count++;
	}
	Header("Location: /domens-admin/?import=ok&count=".($count-1));
}
?>