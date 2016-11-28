<?php
//includes
include $_SERVER["DOCUMENT_ROOT"]."/databaza_prislovia.php";


$q=mysql_query("SELECT * FROM pr_txt ORDER BY hlasy DESC LIMIT 6");

while ($prislovie=mysql_fetch_object($q)) {
    $prislovia[] = array(
        "url" => "prislovie.php?id=".$prislovie->id,
        "img" => "/public/img/ludo_tvar.png",
        "text" => $prislovie->txt,
    );



}



// nacitanie informacii
require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_prislovia_index.php");

?>