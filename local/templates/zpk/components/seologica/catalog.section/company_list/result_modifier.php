<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();


// рейтинг
$arSelect = Array("ID", "NAME", "SHOW_COUNTER");
$arFilter = Array("IBLOCK_ID"=>1, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array('ID'=>'DESC'), $arFilter, false, Array("nPageSize"=>500), $arSelect);

$maxRating=0;

while($ob = $res->GetNextElement())
{
	$fields = $ob->GetFields();
	
	foreach ($arResult['ITEMS'] as $num=>$item)
	if ($fields['ID'] == $item['ID']){
		$arResult['ITEMS'][$num]['SHOW_COUNTER']= $fields['SHOW_COUNTER'];
	}
	if ($fields['SHOW_COUNTER']>$maxRating){
		$maxRating = $fields['SHOW_COUNTER'];
	}
}
$arResult['MAX_SHOW_COUNTER'] = $maxRating;


//отзывы
foreach ($arResult['ITEMS'] as &$item){
	$arSelect = Array("ID", "NAME", "*","PROPERTY_*");
	$arFilter = Array("IBLOCK_ID"=>2, "ACTIVE"=>"Y",'PROPERTY_COMPANY'=>$item['ID']);
	$res = CIBlockElement::GetList(Array('ID'=>'DESC'), $arFilter, false, Array("nPageSize"=>50), $arSelect);
	$ratings=[];
	while($ob = $res->GetNextElement())
	{
		$review = $ob->GetFields();
		$review['PROPERTIES'] = $ob->GetProperties();
		$ratings[]=$review['PROPERTIES']['RATING']['VALUE'];
		$item['PROPERTIES']['REVIEWS'][] = $review;
	}
	if (count($ratings)>0)
		$item['PROPERTIES']['MAX_RATING'] = round(array_sum($ratings)/count($ratings), 2);
}

// примеры работ
foreach ($arResult['ITEMS'] as &$item){
	$arSelect = Array("ID", "NAME", "*","PROPERTY_*");
	$arFilter = Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y",'PROPERTY_COMPANY'=>$item['ID']);
	$res = CIBlockElement::GetList(Array('ID'=>'DESC'), $arFilter, false, Array("nPageSize"=>50), $arSelect);
	while($ob = $res->GetNextElement())
	{
		$review = $ob->GetFields();
		$review['PROPERTIES'] = $ob->GetProperties();
		$item['PROPERTIES']['OBJECTS'][] = $review;
	}
}

//echo '<pre>'.print_r($arResult['ITEMS'], true).'</pre>';