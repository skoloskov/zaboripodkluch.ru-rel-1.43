<?
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);

set_time_limit(600);
ini_set('max_execution_time', 600);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

//require_once $_SERVER['DOCUMENT_ROOT'].'/include/classes/PHPExcel.php';
require_once('../vendor/autoload.php');
 
//--use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


exeption_list_upload();

function ddd($line){
	//echo $line.' '.date('H:i:s',time()).'<br/>';
}
function exeption_list_upload()
{
	global $APPLICATION;
	/*сохранение*/
	$filename='section'.time().'.xlsx';
	$temp_dir=$_SERVER['DOCUMENT_ROOT'].'/upload/'.$filename;
	//echo '<pre>'.print_r($_FILES, true).'</pre>';//die();
	//echo '<pre>'.print_r($temp_dir, true).'</pre>';//die();
	ddd(__LINE__);
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
	ddd(__LINE__);
	$cur = $APPLICATION->GetPageProperty('regionSettings');
	//echo __LINE__.'<pre>'.print_r($cur, true).'</pre>';die();
	$domen = Dev2fun\MultiDomain\SubDomain::getInstance();
	ddd(__LINE__);
	$config = Dev2fun\MultiDomain\Config::getInstance();
	$hl = Dev2fun\MultiDomain\HLHelpers::getInstance();
	$hlDomain = $config->get('highload_domains_seo');
	$hlSubDomain = $config->get('highload_domains');
	//$domains = $hl->getElementList($hlDomain, [
	//	'UF_DOMAIN' => $cur['UF_DOMAIN'],
	//]);
	
	ddd(__LINE__);
	/*сохранение*/
	//echo __LINE__.'<br/>';
	//$objPHPExcel = PHPExcel_IOFactory::load($temp_dir);
	//$objPHPExcel->setActiveSheetIndex(0);
	//$aSheet = $objPHPExcel->getActiveSheet();
	$oSpreadsheet = IOFactory::load($temp_dir);
	$oSpreadsheet->setActiveSheetIndex(0);
	$aSheet = $oSpreadsheet->getActiveSheet();
	
	$count=0;
	$err=0;
	ddd(__LINE__);
	//echo __LINE__.'<br/>';
	//получим итератор строки и пройдемся по нему циклом
	$logfile_name = 'import_section_'.time().'.log';
	foreach($aSheet->getRowIterator() as $row)
	{
		ddd(__LINE__);
		//получим итератор ячеек текущей строки
		$cellIterator = $row->getCellIterator();
		$cellIterator->setIterateOnlyExistingCells(false);
		//пройдемся циклом по ячейкам строки
		$vals=array();
		foreach($cellIterator as $cell)
		{
			$vals[]=($cell->getCalculatedValue());
		}
		ddd(__LINE__);
		//echo '<pre>'.print_r($vals, true).'</pre>'; //die();
		if($count!=0)
		{
			$subDomains = $hl->getElementList($hlSubDomain, [
				'UF_DOMAIN' => $cur['UF_DOMAIN'],
				'UF_SUBDOMAIN' => $vals['1'],
			]);
			ddd(__LINE__);
			//echo '<pre>'.print_r($subDomains, true).'</pre>'; die();
			if ($subDomains){
				$data_to_update = [
					'UF_DOMAIN' => $vals['1'],
					'UF_PATH' => $vals['2'],
					'UF_TITLE' => $vals['3'],
					'UF_H1' => $vals['4'],
					'UF_DESCRIPTION' => $vals['5'],
					'UF_KEYWORDS' => $vals['6'],
					'UF_ALTLOGO' => $vals['7'],
					'UF_PRICE' => $vals['8'],
					'UF_TEXT' => $vals['9'],
					'UF_FEEDBACK' => $vals['10'],
					'UF_COPYRIGHT' => $vals['11'],
					'UF_TURBO' => $vals['12'],
					
				];
				ddd(__LINE__);
				$domains = [];
				if ((int)$vals[0]!=0)
				{
					$domains = $hl->getElementList($hlDomain, [
						//'UF_DOMAIN' => $vals['1'],
						'ID'	=> $vals['0']
					]);
				}
				else 
				{
					$domains = $hl->getElementList($hlDomain, [
						'UF_DOMAIN' => $vals['1'],
						'UF_PATH'	=> $vals['2']
					]);
				}
				ddd(__LINE__);
				//echo __LINE__.'<pre>'.print_r($domains, true).'</pre>';die();
				//echo __LINE__.'<pre>'.print_r($data_to_update, true).'</pre>';die();
				if (count($domains)){ // Запись существует, обновляем
					if (!$hl->updateElement($hlDomain, $domains[0]['ID'], $data_to_update))
						echo 'Ошибка обновления записи <pre>'.print_r($data_to_update).'</pre>';
					ddd(__LINE__);
				}
				else // Записи нет, добавляем
				{
					if (!$hl->addElement($hlDomain, $data_to_update))
						echo 'Ошибка добавления записи <pre>'.print_r($data_to_update).'</pre>';
					ddd(__LINE__);
				}
				
				$f=fopen($logfile_name,'at');
				fwrite($f, date('d-m-Y H:i:s', time())."\t".$vals['1']."\t".$vals['2']."\n");
				fclose($f);
				//echo __LINE__.'<pre>'.print_r($data_to_update, true).'</pre>';
				//if ($count>=500) die();
			}
			else
			{
				echo 'Ошибка в строке '.$count.'. Поддомен <b>'.$vals['1'].'</b> не привязан к основному домену <b>'.$cur['UF_DOMAIN'].'</b> в настройках<br/>';
				$err++;
			}
		}
		else
		{
			if ($vals[0]!='ID' || $vals[1]!='Домен' || $vals[2]!='Страница' || $vals[4]!='H1' || count($vals)!=13){ // Проверяем данные, находящиеся в файле
				echo 'Ошибка в формате загружаемого файла. Сделайте экспорт файла с данными, внесите изменения и попробуйте загрузить снова.';
				$err++;
				return 0;
			}
		}
		$count++;
	}
	if (!$err)
		Header("Location: /domens-admin/?import=ok&count=".($count-1));
}
?>