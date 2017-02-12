<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/piesne/lib.piesne.php";
include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
echo "name,count\n";

$q=mysql_query("SELECT lyrics FROM piesne WHERE stav<>0;");



    while ($lyrics=mysql_fetch_object($q)) {
                $slova_dokopy.=cleanlyrics_words($lyrics->lyrics);
    }


include $_SERVER["DOCUMENT_ROOT"]."/databaza_slova.php";


$slova_sklon=explode(" ", $slova_dokopy);

    foreach ($slova_sklon as &$slovo) {
       if (je_plnovyznamove(zakladny_tvar_form($slovo))) {$slova[zakladny_tvar($slovo)]+=1;}

    }

    foreach ($slova as $key=>$value) {
        if ($value>4) {echo $key.",".$value."\n";}
    }





    ?>