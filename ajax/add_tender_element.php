<?

//https://bazarow.ru/blog-note/2449/

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

    //Создаем объект Элемента
    $newElement = new CIBlockElement;
    $iblock_id = 4;

    //Определяем раздел для элемента и формируем тип забора для названия
    $iblock_section_id = false;
    $type_fence_text = false;
    $type_fence = $_POST['type_fence'];
    switch ($type_fence) {
        case 'Профнастил':
            $iblock_section_id = 88;
            $type_fence_text = 'Забор из профнастила';
            break;
        case 'Сетка-рабица':
            $iblock_section_id = 89;
            $type_fence_text = 'Забор из сетки-рабицы';
            break;
        case 'Металоштакетник':
            $iblock_section_id = 90;
            $type_fence_text = 'Забор из металоштакетника';
            break;
        case 'Поликарбонат':
            $iblock_section_id = 91;
            $type_fence_text = 'Забор из поликарбоната';
            break;
        case 'Сварные':
            $iblock_section_id = 92;
            $type_fence_text = 'Сварной забор';
            break;
        case 'Шумозащитные':
            $iblock_section_id = 93;
            $type_fence_text = 'Шумозащитный забор';
            break;
        case '3D':
            $iblock_section_id = 94;
            $type_fence_text = '3D забор';
            break;
    }

    //Формируем основание забора для названия
    $pillars_text = false;
    $pillars = $_POST['pillars'];
    switch ($pillars) {
        case 'Забивные столбы':
            $pillars_text = 'на забивных столбах';
            break;
        case 'Утрамбовка щебнем':
            $pillars_text = 'с утрамбовкой щебня';
            break;
        case 'Бетонирование столбов':
            $pillars_text = 'с бетонированием столбов';
            break;
        case 'Ленточный фундамент':
            $pillars_text = 'на ленточном фундаменте';
            break;
        case 'Кирпичные столбы':
            $pillars_text = 'на крипичных столбах';
            break;
    }

    //Формируем вид воро для названия
    $vorota_text = false;
    $vorota = $_POST['gate'];
    switch ($vorota) {
        case 'Не нужны':
            $vorota_text = 'без ворот';
            break;
        case 'Откатные':
            $vorota_text = 'с откатными воротами';
            break;
        case 'Откатные с автоматикой':
            $vorota_text = 'с автоматическими откатными воротами';
            break;
        case 'Распашные':
            $vorota_text = 'с распашными воротами';
            break;
        case 'Распашные с автоматикой':
            $vorota_text = 'с автоматическими распашными воротами';
            break;
    }

    //Формируем название элемента
    $elementName = $type_fence_text . ' ' . $pillars_text . ' ' . $vorota_text . ' высотой ' . $_POST['height_fence'] . 'м длиной ' . $_POST['length_fence'] . 'м (' . $_POST['place_fence'] . ')';

    //Свойства
    $PROP = array();

    $PROP['VID_ZABORA'] = $type_fence; //Вид забора
    $PROP['OSNOVANIE_ZABORA'] = $pillars; //Тип основания
    $PROP['VOROTA'] = $vorota; //Ворота
    //$PROP['DATA_USTANOVKI'] = $_POST['date_fence']; //Дата установки
    $PROP['VYSOTA_ZABORA'] = htmlspecialchars($_POST['height_fence']); //Высота
    $PROP['DLINA_ZABORA'] = htmlspecialchars($_POST['length_fence']); //Длина
    $PROP['VASHE_IMYA'] = strip_tags($_POST['name']); //Имя клиента
    $PROP['NOMER_TELEFONA'] = htmlspecialchars($_POST['phone']); //Телефон
    $PROP['E_MAIL'] = htmlspecialchars($_POST['email']); //E-mail
    $PROP['MESTO_USTANOVKI'] = htmlspecialchars($_POST['place_fence']); //Место установки


    //Основные поля элемента
    $fields = array(
        "IBLOCK_ID" => $iblock_id, //ID информационного блока он 4-ый
        "IBLOCK_SECTION_ID" => $iblock_section_id, //ID раздела
        "NAME" => $elementName, //Название элемента
        "ACTIVE" => "N", //поумолчанию делаем неактивным или ставим Y для включения поумолчанию
        "DETAIL_TEXT" => strip_tags($_POST['descript']),
        "PROPERTY_VALUES" => $PROP, // Передаем массив значении для свойств
    );

    //Результат в конце отработки
    if ($PRODUCT_ID = $newElement->Add($fields)) {
        echo "New ID: " . $PRODUCT_ID;
    } else {
        echo "Error: " . $newElement->LAST_ERROR;
    }
}
?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>