<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
global $USER;
if (!$USER->isAdmin()){
	die();
}
if (isset($_GET{'ID'}) && isset($_POST['NAME'])){
//echo '<pre>'.print_r($_POST, true).'</pre>';die();
	$el = new CIBlockElement;

	$arLoadProductArray = Array(
	  "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
	  "IBLOCK_SECTION" => false,          // элемент лежит в корне раздела
	  "NAME"           => $_POST['NAME'],
	  );
	  
	
	$PRODUCT_ID = $_GET{'ID'};  // изменяем элемент с кодом (ID) 2
	if ($res = $el->Update($PRODUCT_ID, $arLoadProductArray)){
		echo 'Параметры сохранены <br/>';
	}
	
	$PROP = array();
	$PROP['CITY'] = $_POST['CITY'];  
	$PROP['PHONE'] = $_POST['PHONE'];  
	if (CIBlockElement::SetPropertyValuesEx($PRODUCT_ID, false, $PROP)){
		echo 'Свойства сохранены <br/>';
	}
}

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

$entity_data_class = GetEntityDataClass(1);
$rsData = $entity_data_class::getList(array(
   'select' => array('UF_*'),
   'order' => array('UF_AREA' => 'ASC','UF_NAME' => 'ASC',),
   'limit' => '1000',//ограничиваем выборку 10-ю элементами
   'filter' => array('UF_ACTIVE' => '1')
));

while($el = $rsData->fetch()){
    $domens_list[$el['UF_XML_ID']] = $el;
}

// Параметры компании
$APPLICATION->SetTitle("Админ панель");
$arSelect = Array("ID", "NAME", "*","PROPERTY_*");
$arFilter = Array("IBLOCK_ID"=>1, "ACTIVE"=>"Y",'ID'=>$_REQUEST['ID']);
$res = CIBlockElement::GetList(Array('SHOW_COUNTER'=>'DESC'), $arFilter, false, Array("nPageSize"=>30), $arSelect);
if($ob = $res->GetNextElement())
{
	$object = $ob->GetFields();
	$object['PROPERTIES'] = $ob->GetProperties();
}
// Список секций каталога заборов
$arSelect = Array("ID", "NAME", "*", "UF_*");
$arFilter = Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y");
$res = CIBlockSection::GetList(Array('left_margin'=>'ASC'), $arFilter, true);//, $arSelect);
$sections = [];
while($ob = $res->GetNext())
{
	$sections[$ob['ID']] = $ob;
}
//echo '<pre>'.print_r($domens_list, true).'</pre>';

?>
<section class="admin-panel">
    <div class="container admin-panel__container">
	<form method="POST">
		<table width="100%">
			<tr>
				<td width="25%">Название</td>
				<td><input type="text" name="NAME" value="<?=$object['NAME']?>"/></td>
			</tr>
			<tr>
				<td>Телефон</td>
				<td><input type="text" name="PHONE" value="<?=$object['PROPERTIES']['PHONE']['VALUE']?>"/></td>
			</tr>
			<?/*<tr>
				<td>Симв.код</td>
				<td><input type="text" name="CODE" value="<?=$object['CODE']?>"/></td>
			</tr>
			<tr>
				<td>Описание</td>
				<td><textarea name="DETAIL_TEXT" rows="10" cols="80"><?=$object['DETAIL_TEXT']?></textarea></td>
			</tr>			
			<tr>
				<td>Свободных бригад</td>
				<td><input type="text" name="COMMANDS" value="<?=$object['PROPERTIES']['COMMANDS']['VALUE']?>"/></td>
			</tr>		
			<tr>
				<td>Услуги</td>
				<td>
					<table>
						<thead>
							<tr><th>Услуга</th><th>Цена</th>
							</tr>
						</thead>
						<tbody>
						<?foreach ($object['PROPERTIES']['SERVICES']['VALUE'] as $key=>$service){
							?>
							<tr>
								<td><input type="text" name="service[]" value="<?=$service?>"></td>
								<td><input type="text" name="prices[]" value="<?=$object['PROPERTIES']['SERVICES']['DESCRIPTION'][$key]?>"></td>
							</tr>
							<?
						}?>
						</tbody>
					</table>
					
				</td>
			</tr>*/?>
			<tr>
				<td>Города<br/>
				<small>Для выбора нескольких значений <br/>зажмите CTRL</small></td>
				<td>
					<select multiple name="CITY[]" size="10" style="height:auto;">
						<?foreach ($domens_list as $xml_id=>$city_data){
							?>
							<option value="<?=$city_data['UF_XML_ID']?>" <?=in_array($city_data['UF_XML_ID'],$object['PROPERTIES']['CITY']['VALUE'])?'selected':''?>><?=$city_data['UF_NAME'].' ('.$city_data['UF_AREA'].' обл.)'?></option>
							<?
						}?>
					</select>
				</td>
			</tr>
		</table>
		<input type="submit" value="Сохранить">
		<a href="/admin-panel/">Назад</a>
	</form>
	</div>
</section>
<?
//echo '<pre>'.print_r($object, true).'</pre>';
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>