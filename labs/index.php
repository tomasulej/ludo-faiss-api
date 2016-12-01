<?php
//includes
include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";



//META
$meta_type="article";
$meta_title="Ľudo Slovenský: prostonárodné ľudové laboratórium.";
$meta_image="http://www.ludoslovensky.sk/public/img/ludo-labs.png";
$meta_url="http://".$_SERVER['SERVER_NAME']."/labs/";
$meta_desc="Laboratórium prostonárodných ľudových webových stránok. Nože skús.";


// nacitanie informacii
require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_labs_index.php");

?>