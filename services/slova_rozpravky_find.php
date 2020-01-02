<?php


require_once $_SERVER["DOCUMENT_ROOT"]."/rozpravky/lib.rozpravky.php";
include $_SERVER["DOCUMENT_ROOT"]."/databaza_rozpravky.php";
error_reporting(E_ALL);
ini_set('display_errors', '1');
require ($_SERVER["DOCUMENT_ROOT"]."/services/simple_html_dom.php");

$query=mysql_query("SELECT * from rozpravka WHERE r_time=0 LIMIT 10");

while ($rozpravka=mysql_fetch_object($query)) {
    $slova_dokopy=strip_tags($rozpravka->r_text);
    $slova_sklon=explode(" ", $slova_dokopy);


    //time
    $r_time=round(count($slova_sklon)/160);

    //snippet    
    $h = str_get_html($rozpravka->r_text);
    $r_snippet=$h->find('p',3)->plaintext;
    //echo $r_snippet;

   

    



    //slova
    include $_SERVER["DOCUMENT_ROOT"]."/databaza_slova.php";

        foreach ($slova_sklon as &$slovo) {
           if (je_plnovyznamove(zakladny_tvar_form($slovo))) {$slova.=zakladny_tvar($slovo).";";}
    
        }



    
    //spachaj kverinu
    mysql_select_db("rozpravky");

    $kverina="UPDATE rozpravka SET r_slova='$slova', r_snippet='$r_snippet', r_time=$r_time WHERE id=$rozpravka->id";    
    //echo $kverina;
    $q2=mysql_query($kverina);    
    $slova="";




    }




?>