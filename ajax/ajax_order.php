<?
//if (strlen($_POST['TITLE']) <= 3) die('error - 1');
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if ($_POST['name'] == false || $_POST['phone'] == false) die('error');
global $APPLICATION, $USER;

$arSend = array(
    "NAME" => htmlspecialchars($_POST['name']),
    "PHONE" => htmlspecialchars($_POST['phone']),
    "EMAIL" => htmlspecialchars($_POST['email']),
    "TYPE" => htmlspecialchars($_POST['type_fence']),
    "PILLARS" => htmlspecialchars($_POST['pillars']),
    "GATE" => htmlspecialchars($_POST['gate']),
    "DESCRIPT" => htmlspecialchars($_POST['descript']),
    "DATE" => htmlspecialchars($_POST['date_fence']),
    "PLACE" => htmlspecialchars($_POST['place_fence']),
    "HEIGHT" => htmlspecialchars($_POST['height_fence']),
    "LENGHT" => htmlspecialchars($_POST['length_fence']),
    "CITY" => $APPLICATION->GetPageProperty('regionSettings')['UF_NAME'],
    "URL" => htmlspecialchars($_SERVER['HTTP_REFERER']),
    "EMAIL_TO" => 'koloskov.srg@yandex.ru, zakaz@zaboripodkluch.ru',
);

$f=fopen('ajax_order_log.txt','at');
fwrite($f, date('d-m-Y H:i:s',time())."\t".$_SERVER['HTTP_REFERER'].' '.serialize($arSend)."\t".$_SERVER['HTTP_USER_AGENT']."\n");
fclose($f);

CEvent::Send('FENCE_ORDER', SITE_ID, $arSend);

?>
