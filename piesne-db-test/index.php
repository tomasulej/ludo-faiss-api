<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

$tmpl_piesen=implode('', file('tmpl_piesen.html'));

include "../databaza_piesne.php";

$q=mysql_query("SELECT * FROM piesne WHERE stav=1");


while ($piesne=mysql_fetch_object($q)) {
    $zoznam.=sprintf("<H1><a href='piesen.php?%s'>%s</a>",$piesne->id_piesen,$piesne->nazov_dlhy);    
    
}






//vypis
$vypis=sprintf($tmpl_piesen,  "ZOZNAM VSETKYCH PIESNI", "", "", "", "", "", "", "", "", $zoznam, "", "", "", "", "", "", "");

echo $vypis;


?>