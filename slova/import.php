<?php
ini_set('memory_limit', '-1');
include "kniznica.php";
include "../databaza_slova.php";
//error_reporting(E_ALL);
//ini_set('display_errors', '1');



$subor='matkin.txt';
$nazov='matkin_nie_na_usta';
$rnd=rand(2,200);
$tabulka="freq2_".$nazov."_".$rnd;

//vytvorime si tabulku
$q=mysql_query(sprintf("DROP TABLE %s;", $tabulka));
$sql = sprintf("
CREATE TABLE %s (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
word VARCHAR(256),
form VARCHAR(256),
count INT(11),
korpus_count INT(11),
rating INT(11), 
korpus_rating INT(11),
emotion INT(6),
uniq INT(11));", $tabulka);	
	
echo "<li>Vytváram: <pre>".$sql."</pre></li>";
$q=mysql_query($sql);



//vytiahnut z txt a dostat slova do zakladneho tvaru
$txt= implode('', file($subor));
$slova_sklon=explode(" ", $txt);	    
foreach ($slova_sklon as &$word) {
	$slova_zaklad[]=zakladny_tvar($word);
}	
$slova_zaklad_stats = array_count_values($slova_zaklad);
arsort($slova_zaklad_stats);


//dostat do tabulky vsetky mozne udaje
$rating=0;
foreach ($slova_zaklad_stats as $word => &$count) {
   $rating++;
   $form=zakladny_tvar_form($word);
   $korpus_count=vyskyt_korpus_count($word);
   $korpus_rating=vyskyt_korpus_rating($word);
   $uniq=$korpus_rating-$rating;
   $emotion=emocia($word);
   $sql="INSERT INTO $tabulka (word,form,count,korpus_count,rating,korpus_rating, emotion, uniq) VALUES ('$word','$form',$count,$korpus_count,$rating,$korpus_rating, $emotion, $uniq);";
   echo "<pre>$sql</pre>";
   $q=mysql_query($sql);   
}
	
?>	