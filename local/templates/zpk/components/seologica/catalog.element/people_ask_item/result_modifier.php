<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

$arSelect = Array("ID", "NAME", "SHOW_COUNTER");
$arFilter = Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array('SHOW_COUNTER'=>'DESC'), $arFilter, false, Array("nPageSize"=>1), $arSelect);
while($ob = $res->GetNextElement())
{
	$arResult['MAX_SHOW_COUNTER'] = $ob->GetFields()['SHOW_COUNTER'];	
}

$arSelect = Array("ID", "NAME", "SHOW_COUNTER");
$arFilter = Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y",'ID'=>$arResult['ID']);
$res = CIBlockElement::GetList(Array('SHOW_COUNTER'=>'DESC'), $arFilter, false, Array("nPageSize"=>1), $arSelect);
while($ob = $res->GetNextElement())
{
	$arResult['SHOW_COUNTER'] = $ob->GetFields()['SHOW_COUNTER'];	
}