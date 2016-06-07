<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

include "kniznica.php";
include "../databaza_slova.php";

$co=$_POST['co'];
$tabulka=$_POST['tabulka'];


$a_co=explode(" ", $co);	
echo "<p class='lead'>Ľudo Slovenský:</p>";

foreach ($a_co as &$word) {
  if ($word=="<BR>") {echo "<BR>";}
  
  	$word=str_replace(".","",$word);
	$word=str_replace(":","",$word);
	$word=str_replace("?","",$word);
	$word=str_replace("!","",$word);
	$word=str_replace(",","",$word);
	$word=str_replace(";","",$word);
	$word=strtolower($word);
	
	if (strpos($word,"|")>0) {
		list($word,$cislo)=explode("|",$word);
		$hladameKoncovku=true;
	} else {$hladameKoncovku=false;}
  
	
  	if (strpos($word,"$")>0) {
		list($word,$cislo2)=explode("$",$word);
		$koncovka=$rym[$cislo2];	
		//echo "<strong>".$koncovka."</strong>";		
	
		
	} else {$koncovka="";$cislo2=0;}
  
  
  
  unset($slovo);
  
  
  $q=mysql_query("SELECT * FROM ma WHERE word='$word' order by parent_freq LIMIT 1");
  
  
  $slovo_stare=mysql_fetch_object($q);
  
  
if ($slovo_stare->form<>"W")
{  
  if ($koncovka<>"") {

	  	$sql="SELECT * FROM vogon_hokej WHERE (form='$slovo_stare->form') AND (word LIKE '%$koncovka') ORDER BY RAND() LIMIT 1";
	  	//echo $sql;
  		$q2=mysql_query($sql);

  } else {
  		$q2=mysql_query(sprintf("SELECT * FROM vogon_hokej WHERE form='%s' ORDER BY RAND() LIMIT 1",$slovo_stare->form));
	  
	  
  }

  $slovo_nove=mysql_fetch_object($q2);	 

  echo $slovo_nove->word.' ';
  
  if ($hladameKoncovku) {
	  $rym[$cislo]=substr($slovo_nove->word,-3);
	  //echo "<strong>".$rym[$cislo]."</strong>";		

  }
  
  
}
else {
	echo $word.' ';
	
}  

    
}


	
	
?>	