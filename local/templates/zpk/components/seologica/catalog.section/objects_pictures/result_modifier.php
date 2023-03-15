<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();
$CompanyList = $APPLICATION->GetPageProperty('CompanyList');

$arSelect = Array("ID", "NAME", "SHOW_COUNTER");
$arFilter = Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array('SHOW_COUNTER'=>'DESC'), $arFilter, false, Array("nPageSize"=>1), $arSelect);
while($ob = $res->GetNextElement())
{
	$arResult['MAX_SHOW_COUNTER'] = $ob->GetFields()['SHOW_COUNTER'];	
}

$arSelect = Array("ID", "NAME", "*", "UF_*");
$arFilter = Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y");//, 'PROPERTY'=>['COMPANY'=>$CompanyList],'ELEMENT_SUBSECTIONS'=>'Y');
$res = CIBlockSection::GetList(Array('left_margin'=>'ASC'), $arFilter, true);//, $arSelect);
while($ob = $res->GetNext())
{
	$section = $ob;
	//$section['PROPERTIES'] = $ob->GetProperties();
	$arResult['PROPERTIES']['SECTIONS'][] = $section;
	
}

//echo '<pre>'.print_r($arResult['PROPERTIES']['SECTIONS'], true).'</pre>';die();