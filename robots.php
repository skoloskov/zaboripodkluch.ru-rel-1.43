<?
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");



$data=Dev2fun\MultiDomain\Base::GetCurrentDomain();

header('Content-Type: text/plain; charset=UTF-8');

//echo '<pre>'.print_r($data,true).'</pre>';
if ($data['UF_ROBOTS']!='')
{
	echo $data['UF_ROBOTS'];
}
else
{
	
	$source=file_get_contents('robots_base.txt', true);
	echo str_replace($data['UF_DOMAIN'],$data['UF_SUBDOMAIN'],$source);
}

?>