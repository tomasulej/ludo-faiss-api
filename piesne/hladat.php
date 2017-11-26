<?php
//includes

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

include $_SERVER["DOCUMENT_ROOT"]."/databaza_prislovia.php";
include "kategoria.inc.php";






$q=$_GET['q'];

$tmpl_prislovie= "<p id=\"prislovie_%s\"><a class='prislovie' data-toggle=\"popover\"  
data-content=\"<div class='quote-popover'>%s</div>\" href=\"prislovie.php?id=%s\">%s</a></p>";


//META
$meta_type="article";
$meta_title="Ľudo Slovenský: hľadať v najväčšej digitálnej zbierke ľudovej hudby";
$meta_image="http://www.ludoslovensky.sk/public/img/ludo-music.png";
$meta_url="http://".$_SERVER['SERVER_NAME']."/piesne/hladat2.php";
$meta_desc="Tisíce rokov Ľudo Slovenský spieva piesne. Sú našim pokladom. Aby sme ho zachovali, postupne zbierame, digitalizujeme, triedime a sprístupňujeme desaťtisíce piesní, ktoré sa počas tisícok rokov spievali na našom území.";





// nacitanie informacii
require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_piesen_hladat.php");

?>