<?
use Bitrix\Main\Loader; 
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;

Loader::includeModule("highloadblock"); 

//Напишем функцию получения экземпляра класса:
function GetEntityDataClass($HlBlockId) 
{
    if (empty($HlBlockId) || $HlBlockId < 1)
    {
        return false;
    }
    $hlblock = HLBT::getById($HlBlockId)->fetch();
    $entity = HLBT::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();
    return $entity_data_class;
}

$arSelect = Array("ID", "NAME", "*", "UF_*");
$arFilter = Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y");
$res = CIBlockSection::GetList(Array('left_margin'=>'ASC'), $arFilter, true);//, $arSelect);
while($ob = $res->GetNext())
{
	$section = $ob;
	//$section['PROPERTIES'] = $ob->GetProperties();
	$arResult['SECTION_LIST'][$section['ID']] = $section;	
}

$entity_data_class = GetEntityDataClass(1);
$rsData = $entity_data_class::getList(array(
   'select' => array('UF_*'),
   'order' => array('UF_NAME' => 'ASC'),
   'limit' => '1000',//ограничиваем выборку 10-ю элементами
   'filter' => array('UF_ACTIVE' => '1')
));

while($el = $rsData->fetch()){
    $arResult['DOMENS_LIST'][$el['UF_XML_ID']] = $el;
}
