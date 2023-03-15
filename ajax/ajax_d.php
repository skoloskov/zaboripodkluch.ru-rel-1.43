<?
//if (strlen($_POST['TITLE']) <= 3) die('error - 1');
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if ($_POST['user'] == false || $_POST['phone'] == false) die('error');
global $APPLICATION, $USER;

$arSend = array(
	"NAME" => htmlspecialchars($_POST['user']),
	"PHONE" => htmlspecialchars($_POST['phone']),
	"MAIL" => htmlspecialchars($_POST['mail']),
	//"TIME" => htmlspecialchars($_POST['time']),
	"DESC" => htmlspecialchars_decode($_POST['desc']),
	"LINK" => htmlspecialchars($_SERVER['HTTP_REFERER']),
	"CITY" => $APPLICATION->GetPageProperty('regionSettings')['UF_NAME'],
	"AREA" => $APPLICATION->GetPageProperty('regionSettings')['UF_AREA'],
	"EMAIL_TO" => 'zakaz@zaboripodkluch.ru, tihom@seologica.ru, tulasg@mail.ru',
				//'tihom@seologica.ru', //htmlspecialchars($_POST['email']),
);

$f=fopen('ajax_d_log.txt','at');
fwrite($f, date('d-m-Y H:i:s',time())."\t".$_SERVER['HTTP_REFERER'].' '.serialize($arSend)."\t".$_SERVER['HTTP_USER_AGENT']."\n");
fclose($f);

CEvent::Send('QUIZ', SITE_ID, $arSend);

?>