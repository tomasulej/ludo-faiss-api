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
$meta_title="Ľudové piesne na tému '".$q."' | Ludoslovensky.sk";
$meta_image="http://www.ludoslovensky.sk/public/img/ludo-music.png";
$meta_url="http://".$_SERVER['SERVER_NAME']."/piesne/hladat.php";
$meta_desc="Zbierame, digitalizujeme, a sprístupňujeme slovenské ľudové piesne. Pozrite si tie na tému '".$q."'";





// nacitanie informacii
require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_piesen_hladat.php");

?>