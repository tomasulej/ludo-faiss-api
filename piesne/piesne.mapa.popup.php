<?php

include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";
$i=0;
$piesne_txt="";

$id_lokalita= (int)$_GET['id_lokalita'];


//piesne
$query="SELECT piesne.id_piesen, piesne.nazov_dlhy FROM piesne WHERE ((id_zberatel_miesto=$id_lokalita OR id_zberatel_vyskyt=$id_lokalita) AND stav=1) GROUP BY piesne.id_piesen";
//echo $query;
$q_query=mysql_query($query);



while ($piesne=mysql_fetch_object($q_query)) {
    $i++;
   $piesne_txt.=sprintf("<a href='piesen.php?%s'>%s</a><BR>",$piesne->id_piesen, $piesne->nazov_dlhy); 
   //echo $piesne_txt;
}


//info o lokalite;
$q_query2=mysql_query("SELECT * FROM lokality WHERE id_lokalita=$id_lokalita");
$lokalita=mysql_fetch_object($q_query2);


echo "<h1>".$lokalita->meno."</h1>";

if ($i==0) {echo "Nič tu nie je";} else {echo $piesne_txt;}


?>