<?
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

//require_once $_SERVER['DOCUMENT_ROOT'].'/include/classes/PHPExcel.php';
header('Content-Type: text/xml; charset=utf-8');
$cur = $APPLICATION->GetPageProperty('regionSettings');

use \Bitrix\Main\Data\Cache;

$cacheId = md5(serialize(['DOMAIN'=>$cur['UF_SUBDOMAIN'],'PAGE_TYPE'=>'TURBO']));
$cache = Cache::createInstance(); // получаем экземпляр класса\Bitrix\Main\Application::getInstance()->getManagedCache(); // получаем экземпляр класса

if ($cache->initCache(86400, $cacheId)) { // проверяем кеш и задаём настройки
	$res = $cache->getVars(); // достаем переменные из кеша
	
}
elseif ($cache->startDataCache()) {
$arrContextOptions=array(
      "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    ); 	
// Получаем список страниц по sitemap
	$source=file_get_contents('http://'.$cur['UF_SUBDOMAIN'].'/sitemap.xml', true, stream_context_create($arrContextOptions));

	$base_xml = new SimpleXMLElement($source);
	$pages=[];
	foreach ($base_xml as $url_data) {
		$p_url=parse_url((string)$url_data->loc);
		//echo '<pre>'.print_r($url_data, true).'</pre>';die();
		$pages_data[$p_url['path']] = [
			'url'=>(string)$url_data->loc,
			'lastmod'=>strtotime((string)$url_data->lastmod)
			];
		$pagesFilter[] = $p_url['path'];
	}
	//echo '<pre>'.print_r($pages_data, true).'</pre>';
	$filter = ['UF_DOMAIN' => $cur['UF_SUBDOMAIN']];
		
	$filter ['UF_PATH']=$pagesFilter;
	$filter ['!UF_TURBO']=false;

	//echo '<pre>'.print_r($filter, true).'</pre>';
	$config = Dev2fun\MultiDomain\Config::getInstance();
	$hl = Dev2fun\MultiDomain\HLHelpers::getInstance();
	$hlDomain = $config->get('highload_domains_seo');
	$domains_base = $hl->getElementList($hlDomain, 
		[$filter],//$cur['UF_DOMAIN'],
		['UF_DOMAIN' => 'ASC', 'UF_PATH'=>'ASC']
	);
	$domains=[];
	foreach ($domains_base as $data){
		$domains[$data['UF_PATH']]=$data;
	}
	//echo count($domains).'<pre>'.print_r(($domains), true).'</pre>';die();


	if (count($domains)>0){
		$res='<?xml version="1.0" encoding="UTF-8"?>
		<rss xmlns:yandex="http://news.yandex.ru"
		xmlns:media="http://search.yahoo.com/mrss/"
		xmlns:turbo="http://turbo.yandex.ru"
		version="2.0">
		<channel>
			<!-- Информация о сайте-источнике -->
			<title>'.city_replace($domains['/']['UF_TITLE']).'</title>
			<link>https://'.$cur['UF_SUBDOMAIN'].'/</link>
			<description>'.city_replace($domains['/']['UF_COPYRIGHT']).'</description>
			<language>ru</language>
		';
		
		// Собираем логотипы компаний
		$company_block='<table>';
		$arSelect = Array("ID", "IBLOCK_ID", "PREVIEW_PICTURE", "*", "PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
		$arFilter = Array("IBLOCK_ID"=>1, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
		$resIcons = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
		$i=0;
		while($ob = $resIcons->GetNextElement()){
			$arFields = $ob->GetFields();
			$c_img = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], array("width" => 120, "height" => 90), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true)['src'];
			
			if ($i==0)
				$company_block.='<tr>';
			$company_block.='<td>
			<img src="https://'.$cur['UF_SUBDOMAIN'].$c_img.'"/>
			</td>';
			$i++;
			if ($i==2){
				$company_block.='</tr>';
				$i=0;
			}
			//print_r($c_img);
		}
		if ($i!=2)
			$company_block.='</tr>';
		$company_block.='</table>';
		//die();
		
		foreach ($domains as $url=>$page_data)
		{
			if ($page_data['UF_TURBO']=='') continue;
			
			$code=explode('/',$url);
			foreach($code as $key=>$section){
				if (trim($section)=='')
					unset($code[$key]);
			}
			// Собираем прайс-листы
			//echo '<pre>'.print_r($code, true).'</pre>';
			$table_price='<table><tr>
						<th>Вид</th>
						<th>Цена</th>
					</tr>';
			if (count($code)>0){ // для внутренних страниц
				$itemCode = array_pop($code);
				
				$arSelect = Array("ID", "IBLOCK_ID", "NAME", "UF_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
				$arFilter = Array("CODE"=>$itemCode, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
				$resIB = CIBlockSection::GetList(Array(), $arFilter, true);//, Array("nPageSize"=>1), $arSelect);
				if ($resIB->SelectedRowsCount()>0){ // текущая страница - раздел каталога
					if($ob = $resIB->GetNextElement()){
						$arFields = $ob->GetFields();
						$top_img = CFile::ResizeImageGet($arFields["PICTURE"], array("width" => 400, "height" => 300), BX_RESIZE_IMAGE_EXACT, true)['src'];
						//print_r($arFields);
						
						$arSelect = Array("ID", "IBLOCK_ID", "NAME", "UF_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
						$arFilter = Array("IBLOCK_ID"=>$arFields['IBLOCK_ID'],"SECTION_ID"=>$arFields['ID'], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
						
						$resSubIB = CIBlockSection::GetList(Array(), $arFilter, false,['UF_*']);//, Array("nPageSize"=>1), $arSelect);
						while($ob = $resSubIB->GetNextElement()){
							$arFields = $ob->GetFields();
							$table_price.='<tr>
								<td>'.$arFields['NAME'].'</td>
								<td>от '.$arFields['UF_PRICE'].' рублей</td>
							</tr>';
							//$arProps = $ob->GetProperties();
							//print_r($arProps);
						}
					}
					else
						$table_price = '';
				}
				else
					$table_price = '';
				//die();
			}
			else{ // для главной страницы
				$top_img = '/domens-admin/glavnaya_turbo.png';
				$price_img = '';
				$table_price = '';
			}
			
			$table_price=($table_price!='')?($table_price.'<table>'):'';
			
			$res .='<item turbo="true">
				<!-- Информация о странице -->
				<link>https://'.$cur['UF_SUBDOMAIN'].$url.'</link>
				<turbo:source></turbo:source>
				<turbo:topic>'.city_replace($page_data['UF_H1']).'</turbo:topic>
				<title>'.city_replace($page_data['UF_H1']).'</title>
				<pubDate>'.date(DATE_RSS, $pages_data[$url]['lastmod']).'</pubDate>
				<author></author>
				<metrics></metrics>
				<yandex:related></yandex:related>
				<turbo:content>
					<![CDATA[
						<header>
							<h1>'.city_replace($page_data['UF_H1']).'. Найдено 18 подрядчиков</h1>
							<figure>
								<img src="https://'.$cur['UF_SUBDOMAIN'].$top_img.'"/>
							</figure>
						</header>
						<p>Разместите заявку по Вашим параметрам на расчет стоимости для сравнения предложений и цены на строительство забора</p>
						'.($price_img!=='' ? '<figure>
								<img src="https://'.$cur['UF_SUBDOMAIN'].$price_img.'"/>
							</figure>':'').
							$table_price
							.'
						<button
							formaction="https://'.$cur['UF_SUBDOMAIN'].$url.'"
							data-background-color="#ff4b4b"
							data-color="white"
							data-primary="true"
							
						>
							Расчет стоимости
						</button>
						<!--button formaction="tel:'.str_replace([' ','-','(',')'],'',$APPLICATION->GetPageProperty('regionSettings')['UF_PHONE']).'" data-background-color="#5B97B0" data-color="white" data-primary="true">Оставить заявку</button-->
						<h2>Лучшие подрядчики</h2>'.
						$company_block.'
						<p>'.city_replace($page_data['UF_TURBO']).'</p>
						<!--form
							data-type="callback"
							data-send-to="'.$APPLICATION->GetPageProperty('regionSettings')['UF_MAIL'].'"							
						>
						</form-->
						
					]]>
				</turbo:content>
			</item>
			';
		}
		
		$res .='	</channel>
	</rss>';
	}
	$cache->endDataCache($res); // записываем в кеш
}
echo $res;
?>