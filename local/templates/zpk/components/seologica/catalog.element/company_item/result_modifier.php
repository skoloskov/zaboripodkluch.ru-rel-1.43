<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();



$arSelect = Array("ID", "NAME", "SHOW_COUNTER");
$arFilter = Array("IBLOCK_ID"=>1, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array('ID'=>'DESC'), $arFilter, false, Array("nPageSize"=>500), $arSelect);

$maxRating=0;

while($ob = $res->GetNextElement())
{
	$fields = $ob->GetFields();
	
	if ($fields['ID'] == $arResult['ID']){
		$arResult['SHOW_COUNTER']= $fields['SHOW_COUNTER'];
	}
	if ($fields['SHOW_COUNTER']>$maxRating){
		$maxRating = $fields['SHOW_COUNTER'];
	}
}
$arResult['MAX_SHOW_COUNTER'] = $maxRating;


$arSelect = Array("ID", "NAME", "*","PROPERTY_*");
$arFilter = Array("IBLOCK_ID"=>2, "ACTIVE"=>"Y",'PROPERTY_COMPANY'=>$arResult['ID']);
$res = CIBlockElement::GetList(Array('ID'=>'DESC'), $arFilter, false, Array("nPageSize"=>30), $arSelect);
while($ob = $res->GetNextElement())
{
	$review = $ob->GetFields();
	$review['PROPERTIES'] = $ob->GetProperties();
	$arResult['PROPERTIES']['REVIEWS'][] = $review;
}

$activeSections=[];
$arSelect = Array("ID", "NAME", "*", "UF_*");
$arFilter = Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y", '!ELEMENT_CNT'=>0,'PROPERTY'=>['COMPANY'=>$arResult['ID']]);
$res = CIBlockSection::GetList(Array('left_margin'=>'ASC'), $arFilter, true);//, $arSelect);
while($ob = $res->GetNext())
{
	$section = $ob;
	//$section['PROPERTIES'] = $ob->GetProperties();
	$arResult['PROPERTIES']['SECTIONS'][] = $section;
	$activeSections[]=$section['ID'];
	
}



$sections = [];
$arSelect = Array("ID", "NAME", "*","PROPERTY_*");
$arFilter = Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y",'PROPERTY_COMPANY'=>$arResult['ID'],'IBLOCK_SECTION_ID'=>$activeSections);
$res = CIBlockElement::GetList(Array('SHOW_COUNTER'=>'DESC'), $arFilter, false, Array("nPageSize"=>30), $arSelect);
while($ob = $res->GetNextElement())
{
	$object = $ob->GetFields();
	$object['PROPERTIES'] = $ob->GetProperties();
	$arResult['PROPERTIES']['OBJECTS'][] = $object;
	$sections[$object['IBLOCK_SECTION_ID']]++;
}
$arResult['SECTIONS_COUNT']=$sections;

//echo '<pre>'.print_r($arResult['PROPERTIES']['OBJECTS'], true).'</pre>';die();
