<?php
//includes
include $_SERVER["DOCUMENT_ROOT"]."/databaza_prislovia.php";

//META
$meta_type="article";
$meta_title="Ľudo Slovenský: najpopulárnejšie príslovia a porekadlá";
$meta_image="http://www.ludoslovensky.sk/public/img/ludo-prislovia.png";
$meta_url="http://".$_SERVER['SERVER_NAME']."/prislovie/najpopularnejsie.php";
$meta_desc="Ľudo slovenský radí a poradí aj Tebe. Príď sa pozrieť na 12-tisíc jeho porekadiel a prísloví";





$q=mysql_query("SELECT * FROM pr_txt ORDER BY hlasy DESC LIMIT 20");

while ($prislovie=mysql_fetch_object($q)) {
    $prislovia[] = array(
        "url" => "prislovie.php?id=".$prislovie->id,
        "img" => "/public/img/ludo_tvar.png",
        "text" => $prislovie->txt,
    );


}



// nacitanie informacii
require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_prislovia_najpopularnejsie.php");

?>