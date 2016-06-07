<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

include "../databaza_slova.php";


function sklonovanie($slovo) {
	$q=mysql_query("SELECT * FROM `ma` WHERE `parent`='$slovo'");
	$vysledok="";
	
	while ($slovo=mysql_fetch_object($q)) {
		switch($slovo->form) {
			case "SSms1": 
			  $rod="mužský rod";
			  $pad="nominatív";
			  $cislo="jednotné";
			  $pad2="kto čo";
              $vysledok.= "Rod: $rod $pad $cislo $pad2";
			break;
		}
	
	
	
	
	
		$vysledok.=printf("%s (%s - %s) <BR>", $slovo->word, $slovo->parent, $slovo->form);
	}


return $vysledok;  
}

//-----------------------------

function emotion_value($word) {

$word=str_replace(".","",$word);
$word=str_replace(":","",$word);
$word=str_replace("?","",$word);
$word=str_replace("!","",$word);
$word=str_replace(",","",$word);
$word=str_replace(";","",$word);
$word=strtolower($word);

	$q=mysql_query("SELECT * FROM `ma` WHERE `word`='$word'");
    while ($slovo=mysql_fetch_object($q)) {
	   $emotion=$slovo->emotion; 
    }	

   return $emotion;	
}


function zakladny_tvar($word) {
	
	$word=str_replace(".","",$word);
	$word=str_replace(":","",$word);
	$word=str_replace("?","",$word);
	$word=str_replace("!","",$word);
	$word=str_replace(",","",$word);
	$word=str_replace(";","",$word);
	$word=str_replace("*","",$word);
	$word=strtolower($word);
	//echo $word;
	
   	$q=mysql_query("SELECT * FROM `ma` WHERE ((`word`='$word') AND (`form`<>'W'))  ORDER BY `parent_freq` DESC LIMIT 1");
   	
   	while ($slovo=mysql_fetch_object($q)) {
	   	
	  if ($slovo->parent<>"") {return $slovo->parent;} else {return $word;}
		   	
	}
 }


function zakladny_tvar_form($word) {
	
	$word=str_replace(".","",$word);
	$word=str_replace(":","",$word);
	$word=str_replace("?","",$word);
	$word=str_replace("!","",$word);
	$word=str_replace(",","",$word);
	$word=str_replace(";","",$word);
	$word=str_replace("*","",$word);
	$word=strtolower($word);
	//echo $word;
	
   	$q=mysql_query("SELECT * FROM `ma` WHERE `word`='$word' ORDER BY `parent_freq` DESC LIMIT 1");
   	
   	while ($slovo=mysql_fetch_object($q)) {
	   	
	  if ($slovo->parent<>"") {return $slovo->form;} else {return $word;}
		   	
	}
 }




function vyskyt_korpus_rating($word) {
	$word=str_replace(".","",$word);
	$word=str_replace(":","",$word);
	$word=str_replace("?","",$word);
	$word=str_replace("!","",$word);
	$word=str_replace(",","",$word);
	$word=str_replace("*","",$word);

	$word=str_replace(";","",$word);
	$word=strtolower($word);
	
	$q=mysql_query("SELECT * FROM `freq` WHERE `word`='$word'");
	
	while ($slovo=mysql_fetch_object($q)) {
		
	  return $slovo->id;
	}
}
	
	
function vyskyt_korpus_count($word) {
	$word=str_replace(".","",$word);
	$word=str_replace(":","",$word);
	$word=str_replace("?","",$word);
	$word=str_replace("!","",$word);
	$word=str_replace(",","",$word);
	$word=str_replace("*","",$word);

	$word=str_replace(";","",$word);
	$word=strtolower($word);
	
	$q=mysql_query("SELECT * FROM `freq` WHERE `word`='$word'");
	
	while ($slovo=mysql_fetch_object($q)) {
		
	  return $slovo->count;
	}
}	


	
function emocia($word) {
	$word=str_replace(".","",$word);
	$word=str_replace(":","",$word);
	$word=str_replace("?","",$word);
	$word=str_replace("!","",$word);
	$word=str_replace(",","",$word);
	$word=str_replace("*","",$word);

	$word=str_replace(";","",$word);
	$word=strtolower($word);
	
	$q=mysql_query("SELECT * FROM `ma` WHERE `parent`='$word'");
	
	while ($slovo=mysql_fetch_object($q)) {
		
	  return $slovo->emotion;
	}
}	






function form_name($form) {
	if(substr($form, 0, 1) == "S") {$str="podstatné meno";};
	if(substr($form, 0, 1) == "A") {$str="prídavné meno";};
	if(substr($form, 0, 1) == "P") {$str="zámeno";};
	if(substr($form, 0, 1) == "N") {$str="číslovka";};
	if(substr($form, 0, 1) == "V") {$str="sloveso";};
	if(substr($form, 0, 1) == "G") {$str="príčastie";};
	if(substr($form, 0, 1) == "D") {$str="príslovka";};
	if(substr($form, 0, 1) == "E") {$str="predložka";};
	if(substr($form, 0, 1) == "O") {$str="spojka";};
	if(substr($form, 0, 1) == "T") {$str="častica";};
	if(substr($form, 0, 1) == "J") {$str="citoslovce";};
	if(substr($form, 0, 1) == "R") {$str="reflexívum";};
	if(substr($form, 0, 1) == "Y") {$str="kondicionálová morféma";};
	if(substr($form, 0, 1) == "Z") {$str="interpunkcia";};
	if(substr($form, 0, 1) == "#") {$str="neslovný element";};
	if(substr($form, 0, 1) == "0") {$str="číslica";};
	if(substr($form, 0, 1) == "W") {$str="skratky";};

	
	if ($str<>"") {return $str;} else {return $form;}
}


function emotion_name($form) {
    if ($form==-3) {$str="Extrémne negatívne";}
    if ($form==-2) {$str="Veľmi negatívne";}
    if ($form==-1) {$str="Mierne negatívne";}
    if ($form==1) {$str="Mierne pozitívne";}
    if ($form==2) {$str="Veľmi pozitívne";}
    if ($form==3) {$str="Extrémne pozitívne";}
	
	if ($str<>"") {return $str;} else {return $form;}
}





function je_plnovyznamove($form) {
	$a=false;
	
	if(substr($form, 0, 1) == "S") {$a=true;};
	if(substr($form, 0, 1) == "A") {$a=true;};
	if(substr($form, 0, 1) == "P") {$a=true;};
	if(substr($form, 0, 1) == "N") {$a=true;};
	if(substr($form, 0, 1) == "V") {$a=true;};
	if(substr($form, 0, 1) == "G") {$a=true;};
	if(substr($form, 0, 1) == "D") {$a=false;};
	if(substr($form, 0, 1) == "E") {$a=false;};
	if(substr($form, 0, 1) == "O") {$a=false;};
	if(substr($form, 0, 1) == "T") {$a=false;};
	if(substr($form, 0, 1) == "J") {$a=false;};
	if(substr($form, 0, 1) == "R") {$a=false;};
	if(substr($form, 0, 1) == "Y") {$a=false;};
	if(substr($form, 0, 1) == "Z") {$a=false;};
	if(substr($form, 0, 1) == "#") {$a=false;};
	if(substr($form, 0, 1) == "0") {$a=false;};
	if(substr($form, 0, 1) == "W") {$a=false;};
	
	return $a;
}





?>