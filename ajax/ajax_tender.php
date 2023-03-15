<?php
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


if ($_POST['name'] == false || $_POST['phone'] == false) die('error');
global $APPLICATION, $USER;

CModule::IncludeModule('iblock');

//Создаем объект Элемента
$newElement = new CIBlockElement;
$iblock_id = 4;

//Определяем раздел для элемента и формируем тип забора для названия
$iblock_section_id = false;
$type_fence_text = false;
$type_fence = $_POST['type_fence'];
switch ($type_fence) {
    case 108:
        $iblock_section_id = 137;
        $type_fence_text = 'Забор из профнастила';
        break;
    case 109:
        $iblock_section_id = 138;
        $type_fence_text = 'Забор из сетки-рабицы';
        break;
    case 110:
        $iblock_section_id = 139;
        $type_fence_text = 'Забор из металоштакетника';
        break;
    case 111:
        $iblock_section_id = 140;
        $type_fence_text = 'Забор из поликарбоната';
        break;
    case 112:
        $iblock_section_id = 141;
        $type_fence_text = 'Сварной забор';
        break;
    case 113:
        $iblock_section_id = 142;
        $type_fence_text = 'Шумозащитный забор';
        break;
    case 114:
        $iblock_section_id = 143;
        $type_fence_text = '3D забор';
        break;
}

//Формируем основание забора для названия
$pillars_text = false;
$pillars = $_POST['pillars'];
switch ($pillars) {
    case 115:
        $pillars_text = 'на забивных столбах';
        break;
    case 116:
        $pillars_text = 'с утрамбовкой щебня';
        break;
    case 117:
        $pillars_text = 'с бетонированием столбов';
        break;
    case 118:
        $pillars_text = 'на ленточном фундаменте';
        break;
    case 119:
        $pillars_text = 'на крипичных столбах';
        break;
}

//Формируем вид ворот для названия
$gate_text = false;
$gate = $_POST['gate'];
switch ($gate) {
    case 120:
        $gate_text = 'без ворот';
        break;
    case 121:
        $gate_text = 'с откатными воротами';
        break;
    case 122:
        $gate_text = 'с автоматическими откатными воротами';
        break;
    case 123:
        $gate_text = 'с распашными воротами';
        break;
    case 124:
        $gate_text = 'с автоматическими распашными воротами';
        break;
}

//Переделываем форма даты
$date_work = explode('-', $_POST['date_fence']);
$format_date = $date_work[2] . '.' . $date_work[1] . '.' . $date_work[0];


//Формируем название элемента
$elementName = $type_fence_text . ' ' . $pillars_text . ' ' . $gate_text . ' высотой ' . $_POST['height_fence'] . 'м длиной ' . $_POST['length_fence'] . 'м';

//Свойства
$PROP = array();

$PROP['TYPE_FENCE'] = $type_fence; //Вид забора
$PROP['PILLARS'] = $pillars; //Тип основания
$PROP['GATE'] = $gate; //Ворота
$PROP['DATE_FENCE'] = $format_date; //Дата установки
$PROP['HEIGHT_FENCE'] = htmlspecialchars($_POST['height_fence']); //Высота
$PROP['LENGTH_FENCE'] = htmlspecialchars($_POST['length_fence']); //Длина
$PROP['NAME'] = strip_tags($_POST['name']); //Имя клиента
$PROP['PHONE'] = htmlspecialchars($_POST['phone']); //Телефон
$PROP['E_MAIL'] = htmlspecialchars($_POST['email']); //E-mail
$PROP['PLACE_FENCE'] = htmlspecialchars($_POST['place_fence']); //Место установки
$PROP['CUSTOMER_TYPE'] = $_POST['customer_type']; //Тип заказчика
$PROP['STATUS'] = 109; //Статус заказа


//Основные поля элемента
$fields = array(
    "IBLOCK_ID" => $iblock_id, //ID информационного блока он 4-ый
    "IBLOCK_SECTION_ID" => $iblock_section_id, //ID раздела
    "NAME" => $elementName, //Название элемента
    "CODE" => $elementName, // Символьный код элемента
    "ACTIVE" => "N", //поумолчанию делаем неактивным или ставим Y для включения поумолчанию
    "DETAIL_TEXT" => strip_tags($_POST['descript']),
    "PROPERTY_VALUES" => $PROP, // Передаем массив значении для свойств
);

$PRODUCT_ID = $newElement->Add($fields);

$customer_type_text = false;
switch ($_POST['customer_type']) {
    case 112:
        $customer_type_text = 'физ. лицо';
        break;
    case 113:
        $customer_type_text = 'юр лицо';
        break;
}

$arSend = array(
    "NAME" => htmlspecialchars($_POST['name']),
    "PHONE" => htmlspecialchars($_POST['phone']),
    "EMAIL" => htmlspecialchars($_POST['email']),
    "CUSTOMER_TYPE" => $customer_type_text,
    "TYPE" => $type_fence_text,
    "PILLARS" => $pillars_text,
    "GATE" => $gate_text,
    "DESCRIPT" => htmlspecialchars($_POST['descript']),
    "DATE" => htmlspecialchars($_POST['date_fence']),
    "PLACE" => htmlspecialchars($_POST['place_fence']),
    "HEIGHT" => htmlspecialchars($_POST['height_fence']),
    "LENGTH" => htmlspecialchars($_POST['length_fence']),
    "CITY" => $APPLICATION->GetPageProperty('regionSettings')['UF_NAME'],
    "URL" => htmlspecialchars($_SERVER['HTTP_REFERER']),
    "EMAIL_TO" => 'koloskov.srg@yandex.ru, zakaz@zaboripodkluch.ru',
);

$f=fopen('ajax_tender_log.txt','at');
fwrite($f, date('d-m-Y H:i:s',time())."\t".$_SERVER['HTTP_REFERER'].' '.serialize($arSend)."\t".$_SERVER['HTTP_USER_AGENT']."\n");
fclose($f);

CEvent::Send('FENCE_TENDER', SITE_ID, $arSend);

?>