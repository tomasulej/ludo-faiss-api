

<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

Header("content-type: application/x-javascript");


include "../../databaza_slova.php";

$id=$_GET['id'];


$radenie=$_GET['radenie'];
$pismeno=$_GET['utvary'];
$rebricek_count_end=$_GET['count'];
$unique_count_limit=$_GET['uniq'];

if ($id==""){$id=1;}



$q=mysql_query("SELECT * FROM freq_table WHERE id=$id;");
$sada=mysql_fetch_object($q);

//konstanty
 $tabulka=$sada->table_name;


if ($radenie=="top") {
	if ($pismeno<>"all") {$q=mysql_query("SELECT * FROM $tabulka WHERE (substr(form,1,1)='$pismeno') ORDER BY rating LIMIT $rebricek_count_end");} else 
	{$q=mysql_query("SELECT * FROM $tabulka ORDER BY rating LIMIT $rebricek_count_end");};
	$p=0;

	while ($slovo=mysql_fetch_object($q)) {
		//printf("%s,%s,%s\n", $slovo->word,$slovo->form,$slovo->count);
		$js[$p]["key"]=$slovo->word;
		$js[$p]["value"]=(int)$slovo->count;
		$p++;
	}

	printf("var tags = %s;", json_encode($js));
}



if ($radenie=="unique") {
	
if ($pismeno<>"all") {$sql="SELECT * FROM $tabulka WHERE (count>$unique_count_limit) AND (uniq>0) AND (korpus_rating>2000) AND  (substr(form,1,1)='$pismeno') ORDER BY uniq DESC LIMIT $rebricek_count_end";} else {$sql="SELECT * FROM $tabulka WHERE (count>$unique_count_limit) AND (uniq>0) AND (korpus_rating>2000) ORDER BY uniq DESC LIMIT $rebricek_count_end";};
	$q=mysql_query($sql);
	//echo $sql;
	$p=0;

	while ($slovo=mysql_fetch_object($q)) {
		//printf("%s,%s,%s\n", $slovo->word,$slovo->form,$slovo->count);
		$js[$p]["key"]=$slovo->word;
		$js[$p]["value"]=(int)$slovo->count;
		$p++;
	}

	printf("var tags = %s;", json_encode($js));
	
	
	
}



	
	
	
?>	
	
	
	