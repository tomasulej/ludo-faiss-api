<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');


include "kniznica.php";
include $_SERVER["DOCUMENT_ROOT"]."/databaza_slova.php";


function rndString($str) {
    $max_id=9709;
    $tabulka="vogon_tehulka";
    $a_str=explode(" ",$str);

    foreach ($a_str as &$word) {
        $word=str_replace(".","",$word);
        $word=str_replace(":","",$word);
        $word=str_replace("?","",$word);
        $word=str_replace("!","",$word);
        $word=str_replace(",","",$word);
        $word=str_replace(";","",$word);
        $word=strtolower($word);

        $q=mysql_query("SELECT * FROM ma WHERE word='$word' order by parent_freq LIMIT 1");


        $slovo_stare=mysql_fetch_object($q);

        $random=mt_rand(1, $max_id)-mt_rand(1,20);

        $sql=sprintf("SELECT * FROM $tabulka WHERE form='%s' ORDER BY RAND() LIMIT 1",$slovo_stare->form);

        $q2=mysql_query($sql);
        $slovo_nove=mysql_fetch_object($q2);

        $navrat.=$slovo_nove->word.' ';

    }
    return $navrat;
}




$tmplProduct=implode('', file('tmplProduct.html'));

$tmplNazov="Veľká vojna snov";
$tmplPodnadpis="Slovo dalo slovu";
$tmplAutor="Tomáš Tomáš";
$tmplPopisok="Mama má Emu. Slobodné mamičky rozťahujú svoje nožičky. Darmo sa snažia uniknúť, láska je kľúč.";






for ($i = 1; $i <= 10; $i++) {
     printf($tmplProduct,ucfirst(rndString($tmplNazov)),ucfirst(rndString($tmplPodnadpis)),"Marry E. Shalley","Táto kniha ponúka množstvo skvelých návodov, ako prežiť krásne a plodné detstvo. Odporúčame všetkým rodičom, ktorí by chceli zistiť čo stojí za to preskúmať so svojimi ratolesťami.");
}



?>