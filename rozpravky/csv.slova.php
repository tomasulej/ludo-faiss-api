<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/rozpravky/lib.rozpravky.php";
include $_SERVER["DOCUMENT_ROOT"]."/databaza_rozpravky.php";
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
echo "name,count\n";

$q=mysql_query("SELECT r_text FROM rozpravka LIMIT 20;");



    while ($rozpravka=mysql_fetch_object($q)) {
                $slova_dokopy.=strip_tags($rozpravka->r_text);
                
            }


//echo $slova_dokopy;

include $_SERVER["DOCUMENT_ROOT"]."/databaza_slova.php";


$slova_sklon=explode(" ", $slova_dokopy);

    foreach ($slova_sklon as &$slovo) {
       if (form_name(zakladny_tvar_form($slovo))=="podstatné meno") {$slova[zakladny_tvar($slovo)]+=1;}

    }

    foreach ($slova as $key=>$value) {
        if ($value>10) {echo $key.",".$value."\n";}
    }





    ?>