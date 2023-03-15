<?

//https://bazarow.ru/blog-note/2449/?ysclid=lecpmltud8512046379

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
?>

<?
if (!empty($_REQUEST['name'])) {

    CModule::IncludeModule('iblock');

    echo 'Вот такие данные мы передали';
    echo '<pre>';
    print_r($_POST);
    echo '<pre>';

    //Погнали
    $el = new CIBlockElement;
    $iblock_id = 4;
    $section_id = 88;

    //Свойства
    $PROP = array();

    //Основные поля элемента
    $fields = array(
        "MODIFIED_BY" => $USER->GetID(),
        "IBLOCK_SECTION_ID" => 88, //ID разделов
        "IBLOCK_ID" => 4, //ID информационного блока он 4-ый
        "PROPERTY_VALUES" => $PROP, // Передаем массив значении для свойств
        "NAME" => strip_tags($_POST['name']),
        "ACTIVE" => "Y", //поумолчанию делаем активным или ставим N для отключении поумолчанию
	   );

	   //Результат в конце отработки
	   if ($PRODUCT_ID = $el->Add($fields)) {
           echo "New ID: ".$PRODUCT_ID;
       } else {
           echo "Error: ".$el->LAST_ERROR;
       }
	 }
?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>