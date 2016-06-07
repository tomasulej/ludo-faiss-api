

<html>
<head>
  <meta charset="utf-8">
	
</head>	

<body>

<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include "../kniznica.php";
include "../../databaza_slova.php";








$tabulka='vogon_tehulka';
$txt= implode('', file("vogon_tehulka.txt"));

$a_co=explode(" ", $txt);	


//vytvorime si tabulku
$q=mysql_query(sprintf("DROP TABLE %s;", $tabulka));
$sql = sprintf("
CREATE TABLE %s (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
word VARCHAR(256),
koncovka_2 VARCHAR(256),
form VARCHAR(256),
count INT(11),
korpus_count INT(11),
rating INT(11), 
korpus_rating INT(11),
emotion INT(6),
uniq INT(11));", $tabulka);	
	
echo "<li>Vytváram: <pre>".$sql."</pre></li>";
$q=mysql_query($sql);







foreach ($a_co as &$word) {

	$word=str_replace(".","",$word);
	$word=str_replace(":","",$word);
	$word=str_replace("?","",$word);
	$word=str_replace("!","",$word);
	$word=str_replace(",","",$word);
	$word=str_replace(";","",$word);
	$word=strtolower($word);


  echo "<strong>".$word."</strong>: ";
  $q=mysql_query("SELECT * FROM ma WHERE word='$word' LIMIT 1;");
  
  while ($slovo=mysql_fetch_object($q)) {

	  $q_zisti=mysql_query(sprintf("SELECT * FROM '%s' WHERE word='%s'",$tabulka,$slovo->parent));  
	  $cislo=mysql_num_rows($q_zisti);
	  echo "<H1>$cislo</H1>";
	  if ($cislo==0) {	  
	  	$q2=mysql_query(sprintf("SELECT * FROM ma WHERE parent='%s'",$slovo->parent));
	  		while ($slova=mysql_fetch_object($q2)) {
		  		echo $slova->word.'('.$slova->form.') ';
		  		$sql=sprintf("INSERT INTO %s (word,form, koncovka_2) VALUES ('%s','%s','%s');",$tabulka,$slova->word,$slova->form,$slova->koncovka_2);
		  		//echo $sql;
		  		mysql_query($sql);
	  	
		  	} 
	  	  echo "<BR>";  
	 } else {echo "<H1>Už máme $slovo->parent </H1>";}

  }
  echo "<BR>";  
    
}


	
	
?>	

</body>

<html>