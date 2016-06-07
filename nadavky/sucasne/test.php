<?php
	
  ini_set('E_ERROR', E_ALL);
  ini_set('display_errors', true);	
	
	
include "../../databaza_nadavky.php";

//$q=mysql_query("INSERT INTO kategoria (txt) VALUES ('Pohlavné orgány');");
	
//$q=mysql_query("INSERT INTO zdroj (txt) VALUES ('Najkratší slovník slovenského jazyka');");	

$q=mysql_query("DELETE FROM kategoria WHERE id=5;");

	
?>	