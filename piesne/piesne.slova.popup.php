<?php

include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";
$i=0;

$q= (int)$_GET['q'];


//piesne info
$query="SELECT piesne.id_piesen, piesne.nazov_dlhy FROM piesne WHERE (piesne.lyrics like '%$hladane%') AND stav>0) GROUP BY piesne.id_piesen";
//echo $query;
$q_query=mysql_query($query);




while ($piesne=mysql_fetch_object($q_query)) {
    $i++;
    $piesne_txt.=sprintf("<a href='piesen.php?%s'>%s</a><BR>",$piesne->id_piesen, $piesne->nazov_dlhy);
    //echo $piesne_txt;
}



echo "<h1>Nájdené piesne</h1>";

if ($i==0) {echo "Nič tu nie je";} else {echo $piesne_txt;}


?>