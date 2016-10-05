<?php

include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

$query="SELECT lokality.area, lokality.id_lokalita FROM lokality";
$q_piesne=mysql_query($query);



while ($lokality=mysql_fetch_object($q_piesne)) {
	$c++;

	if ($lokality->area<>""){
		$p_mapa_point[]= array(
            "c"=>$c,
            "area"=>$lokality->area
        );
	}
}



require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_piesen_mapa.php");
?>