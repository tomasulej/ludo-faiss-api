<?php
//includes
include $_SERVER["DOCUMENT_ROOT"]."/databaza_prislovia.php";

//META
$meta_type="article";
$meta_title="Ľudo Slovenský: najväčšia zbierka ľudových prísloví a porekadiel";
$meta_image="http://www.ludoslovensky.sk/public/img/ludo-prislovia.png";
$meta_url="http://".$_SERVER['SERVER_NAME']."/prislovia/";
$meta_desc="Rady ako žiť, krátke povzdychy, prirovnania - všetky spája jediné spojívko: už stovky rokov ich hovoria rodičia deťom a šíria ako mor, vírus medzi ďalšie generácie. Viac ako 12-tisíc z nich sme vzali, zdigitalizovali a roztriedili podľa tém, aby navždy slúžili nám všetkým. Užívaj ich v zdraví, Ľudo internetový a šír medzi svojimi!";





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