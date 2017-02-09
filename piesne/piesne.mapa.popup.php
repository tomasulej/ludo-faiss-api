<?php

include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";
$i=0;
$piesne_txt="";

$id_lokalita= (int)$_GET['id_lokalita'];


// zoznam ideciek lokalit, ktorych sa to tyka
$q=mysql_query("SELECT id_lokalita FROM lokality WHERE id_lokalita=$id_lokalita OR id_nadriadeny=$id_lokalita");

while ($oids=mysql_fetch_object($q)) {
    $ids.=sprintf("%s,", $oids->id_lokalita);
}

$ids=sprintf("(%s)",substr($ids,0,-1));


//piesne info
//$query="SELECT piesne.id_piesen, piesne.nazov_dlhy FROM piesne WHERE ((id_zberatel_miesto=$id_lokalita OR id_zberatel_vyskyt=$id_lokalita) AND stav>0) GROUP BY piesne.id_piesen";
//echo $query;
$query=sprintf("SELECT piesne.id_piesen, piesne.nazov_dlhy FROM piesne WHERE ((id_zberatel_miesto IN %s)  OR (id_zberatel_vyskyt IN %s)) AND stav>0 GROUP BY piesne.id_piesen"
    , $ids, $ids);

$q_query=mysql_query($query);









while ($piesne=mysql_fetch_object($q_query)) {
    $i++;
   $piesne_txt.=sprintf("<a href='piesen.php?%s'>%s</a><BR>",$piesne->id_piesen, $piesne->nazov_dlhy); 
   //echo $piesne_txt;
}









//prepojenia s lokalitami

$q_lokality=mysql_query("SELECT lokality_piesne.id_piesen, lokality_piesne.id_lokalita, piesne.nazov_dlhy FROM lokality_piesne LEFT JOIN piesne ON lokality_piesne.id_piesen=piesne.id_piesen WHERE lokality_piesne.id_lokalita=$id_lokalita");

while ($lokality=mysql_fetch_object($q_lokality)) {
    $i++;
    $piesne_txt.=sprintf("<a href='piesen.php?%s'>%s</a><BR>",$lokality->id_piesen, $lokality->nazov_dlhy); 

}


//info o lokalite;
$q_query2=mysql_query("SELECT * FROM lokality WHERE id_lokalita=$id_lokalita");
$lokalita=mysql_fetch_object($q_query2);


echo "<h1>".$lokalita->meno."</h1>";

if ($i==0) {echo "Nič tu nie je";} else {echo $piesne_txt;}


?>