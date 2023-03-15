<?
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$data=Dev2fun\MultiDomain\Base::GetCurrentDomain();
$arrContextOptions=array(
      "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    ); 
$res = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
$source=file_get_contents('sitemap-base.xml', true, stream_context_create($arrContextOptions));
$base_xml = new SimpleXMLElement($source);

foreach ($base_xml->sitemap as $key=>$file) {
   $xml_source = file_get_contents($file->loc, true, stream_context_create($arrContextOptions));
   
   $part_xml = new SimpleXMLElement($xml_source);
   foreach ($part_xml as $url_data) {
	   $level = explode('/',$url_data->loc);
	   $res .='<url><loc>'.$url_data->loc.'</loc><lastmod>'.date(DATE_ATOM, time()).'</lastmod><priority>'.number_format( 1-(count($level)-4)/10, 1, '.','').'</priority></url>';
   }
}
$res .="</urlset>";

header('Content-Type: text/xml; charset=UTF-8');
echo str_replace($data['UF_DOMAIN'],$data['UF_SUBDOMAIN'],$res);
//echo $res;
?>