<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/rozpravky/lib.rozpravky.php";
include $_SERVER["DOCUMENT_ROOT"]."/databaza_rozpravky.php";
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
echo "name,count\n";

$q=mysql_query("SELECT r_slova FROM rozpravka LIMIT 20;");



    while ($rozpravka=mysql_fetch_object($q)) {
                $slova_dokopy.=$rozpravka->r_slova;
                
    }





$slova_sklon=explode(";", $slova_dokopy);

    foreach ($slova_sklon as &$slovo) {
      $slova[$slovo]+=1;

    }

    foreach ($slova as $key=>$value) {
        if ($value<15 AND $value>9) {echo $key.",".$value."\n";}
    }





    ?>