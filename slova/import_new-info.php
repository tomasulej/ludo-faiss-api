<html>
<head>
  <meta charset="utf-8">
	
</head>	

<body>



<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');


ini_set('memory_limit', '-1');

include "kniznica.php";
include "../databaza_slova.php";



$subor='matkin.txt';
$nazov='matkin_nie_na_usta';
$rnd=rand(2,200);
$tabulka="newinfo_".$nazov."_".$rnd;

//vytvorime si tabulku
$q=mysql_query(sprintf("DROP TABLE %s;", $tabulka));
$sql = sprintf("
CREATE TABLE %s (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
word VARCHAR(256),
parent VARCHAR(256),
absolut_pos INT(11),
newinfo_pos INT(11));", $tabulka);	
	
echo "<li>Vytváram: <pre>".$sql."</pre></li>";
$q=mysql_query($sql);



//vytiahnut z txt a dostat slova do zakladneho tvaru
$absolut_pos=0;
$c1=0;
$txt= implode('', file($subor));
$slova_sklon=explode(" ", $txt);	    
foreach ($slova_sklon as &$word) {
	$word=$word;
	$parent=zakladny_tvar($word);
    $absolut_pos++;
	
	//zistit ci to slovo uz nemame v databaze
	$q=mysql_query("SELECT * FROM $tabulka WHERE parent='$parent' ORDER by id ASC LIMIT 1;");
	//echo mysql_num_rows($q)."---<BR>";
	if (mysql_num_rows($q)>0) {
		$vysledok=mysql_fetch_object($q);
		$newinfo_pos=$vysledok->newinfo_pos;
		//echo $newinfo_pos;
	} else {
		//ak nemáme, zistíme najväčšie číslo a pridáme 1
		$q=mysql_query("SELECT newinfo_pos FROM $tabulka ORDER BY newinfo_pos DESC limit 1;");
		$vysledok=mysql_fetch_object($q);
		if (mysql_num_rows($q)>0) {$newinfo_pos=$vysledok->newinfo_pos+1;} else {$newinfo_pos=1;};
	}	
	$sql="INSERT INTO $tabulka (word,parent,absolut_pos,newinfo_pos) VALUES ('$word','$parent', $absolut_pos, $newinfo_pos);";
	echo $sql."<BR>";
	$q=mysql_query($sql);			

}	





	
?>	

</body>

<html>
