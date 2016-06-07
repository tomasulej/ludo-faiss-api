<html>
<head>
  <meta charset="utf-8">
	
</head>	
<?php

include "kniznica.php";
include "../databaza_slova.php";
error_reporting(E_ALL);
ini_set('display_errors', '1');



$subor='newton_fico_vsetko_sprac.txt';
$nazov='harry_potter_dary_smrti';


//vytiahnut z txt a dostat slova do zakladneho tvaru
$txt= implode('', file($subor));
$slova_sklon=explode(" ", $txt);
$slova_zaklad=array_count_values($slova_sklon);
arsort($slova_zaklad);

	    
foreach ($slova_zaklad as $word => &$count) {
	printf("%s (%s)--> %s<BR>", $word, $count, zakladny_tvar($word));
}	
?>	
</html>