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
$meta_title="Ľudo Slovenský: príslovia a porekadlá na tému ".$q;
$meta_image="http://www.ludoslovensky.sk/public/img/ludo-prislovia.png";
$meta_url="http://".$_SERVER['SERVER_NAME']."/prislovia/hladat.php?".$_GET['q'];
$meta_desc="Ľudo slovenský radí a poradí aj Tebe. Príď sa pozrieť na 12-tisíc jeho porekadiel a prísloví";




// nacitanie informacii
require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_prislovia_hladat.php");

?>