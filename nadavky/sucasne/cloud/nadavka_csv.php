<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');


header('Content-Type: text/csv; charset=utf-8');

include "../../../databaza_nadavky.php";

if ($_GET['co']==1) {
	
	$q=mysql_query("SELECT * FROM nadavka WHERE ((google>5) AND (zdroj<4))");
	
	
} else if ($_GET['co']==2) {
  //echo "kokot!!!!!!<BR><BR>";	
  $q=mysql_query("SELECT * FROM nadavka WHERE slovo like '%jeb%'");
} else if ($_GET['co']==3) {
    $q=mysql_query("SELECT * FROM nadavka WHERE slovo like '%prd%'");
} else if ($_GET['co']==4) { 
  	$q=mysql_query("SELECT * FROM nadavka WHERE ((google>10) AND (zdroj=4))");

} else if ($_GET['co']==5) { 
  	$q=mysql_query("SELECT * FROM nadavka WHERE slovo like '%ser%' or slovo like '%sra%' or slovo like '%srá%'");

} else if ($_GET['co']==6) { 
  	$q=mysql_query("SELECT * FROM nadavka WHERE slovo like '%mrd%'");
  	
} else if ($_GET['co']==7) { 
  	$q=mysql_query("SELECT * FROM nadavka WHERE slovo like '%drb%'");
  	
}
else {

	$q=mysql_query("SELECT * FROM nadavka WHERE google>20");
}

echo "name,word,count\n";
while ($slovo=mysql_fetch_object($q)) {
	printf("\"%s\",\"%s\",%s\n",$slovo->slovo,$slovo->slovo,$slovo->google);
}


?>