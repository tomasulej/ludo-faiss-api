<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include "../databaza_nadavky.php";


$q=mysql_query("SELECT * FROM nadavka WHERE google=0 ORDER by id LIMIT 1;");
$slovo=mysql_fetch_object($q);


$url=sprintf("http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=%s&key=AIzaSyDYO8CwNlJkbXiJ0FphRUG_tddes7U17-w",urlencode($slovo->slovo.' site:.sk'));
$json=file_get_contents($url);
//$obj = json_decode($url);

$str_pos=strpos($json,'estimatedResultCount":')+strlen('estimatedResultCount":')+1;
$str_pos2=strpos($json,'"',$str_pos);

$cislo=substr($json, $str_pos,$str_pos2-$str_pos);

printf("Pozerám na slovo <strong>%s (%s)</strong> a odpoveď je: %s",$slovo->slovo, $slovo->id, $cislo);

echo $json;

$cislo2=intval($cislo);
$id=$slovo->id;


if ($cislo2>0) {
	$q3=mysql_query("UPDATE nadavka SET google=$cislo2 WHERE id=$id");
	
}

if ($cislo=='lts') {
	$q3=mysql_query("UPDATE nadavka SET google=1 WHERE id=$id");
	
	
}


?>