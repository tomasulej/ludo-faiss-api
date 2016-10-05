<?php
include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

$query="SELECT piesne.id_piesen, piesne.nazov_dlhy, lokality.area, lokality.id_lokalita FROM piesne	LEFT JOIN lokality ON lokality.id_lokalita=piesne.id_zberatel_miesto OR lokality.id_lokalita=piesne.id_zberatel_vyskyt WHERE piesne.stav<>0";
$q_piesne=mysql_query($query);


while ($piesne=mysql_fetch_object($q_piesne)) {
    echo $piesne->area."<BR>"; 
}



?>