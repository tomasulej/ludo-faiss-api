<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

Header("content-type: application/x-javascript");


include "../../databaza_slova.php";

$id=$_GET['id'];
$pismeno=$_GET['utvary'];
$rebricek_count_end=$_GET['count'];

if ($id==""){$id=1;}



$q=mysql_query("SELECT * FROM freq_table WHERE id=$id;");
$sada=mysql_fetch_object($q);

//konstanty
 $tabulka=$sada->table_name;


if ($pismeno<>"all") {$sql="SELECT * FROM $tabulka WHERE (emotion=$pismeno) ORDER BY rating LIMIT $rebricek_count_end";}
  else {$sql="SELECT * FROM $tabulka WHERE emotion<>0 ORDER BY rating LIMIT $rebricek_count_end";};	
	$p=0;
$q=mysql_query($sql);
	while ($slovo=mysql_fetch_object($q)) {
		//printf("%s,%s,%s\n", $slovo->word,$slovo->form,$slovo->count);
		$js[$p]["key"]=$slovo->word;
		$js[$p]["value"]=(int)$slovo->count;
		$p++;
	}

	printf("var tags = %s;", json_encode($js));




	
	
	
?>	
	
	
	