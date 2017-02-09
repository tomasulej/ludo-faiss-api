<?php

include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

$query="SELECT lokality.area, lokality.id_lokalita, lokality.id_lokalita FROM lokality WHERE id_nadriadeny IS NULL";
$q_piesne=mysql_query($query);

//META
$meta_type="article";
$meta_title="Ľudo Slovenský: kde sa na Slovensku spievajú ktoré piesne?";
$meta_image="http://www.ludoslovensky.sk/public/img/ludo-music.png";
$meta_url="http://".$_SERVER['SERVER_NAME']."/piesne/slova.php";
$meta_desc="Tisíce rokov Ľudo Slovenský spieva piesne. Sú našim pokladom. Aby sme ho zachovali, postupne zbierame, digitalizujeme, triedime a sprístupňujeme desaťtisíce piesní, ktoré sa počas tisícok rokov spievali na našom území.";





while ($lokality=mysql_fetch_object($q_piesne)) {
	$c++;

	if ($lokality->area<>""){
		$p_mapa_point[]= array(
            "c"=>$c,
            "area"=>$lokality->area,
			"id_lokalita"=>$lokality->id_lokalita
        );
	}
}



require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_piesen_mapa.php");
?>