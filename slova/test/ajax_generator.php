<?php
	include "../../databaza_slova.php";
	include "../../kniznica.php";

error_reporting(E_ALL);
ini_set('display_errors', '1');	

	$slova=$_GET['slova'];
	//echo $slova;
	
	$slova_array=explode(" ", $slova);
	
	foreach ($slova_array as &$word) {
		$q_slovo=mysql_query("SELECT * FROM ma WHERE word='$word' LIMIT 1");
		
			$oSlovo=mysql_fetch_object($q_slovo); 
			$forma=$oSlovo->form;
			
			$q_podobne=mysql_query("SELECT * FROM ma WHERE form='$forma' order by RAND() LIMIT 1");
			$pSlovo=mysql_fetch_object($q_podobne);
			
			echo $pSlovo->word;
		
	}	



?>