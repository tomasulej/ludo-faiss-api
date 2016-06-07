<html>
<head>
  <meta charset="utf-8">
	
</head>	

<body>




<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include "../../databaza_slova.php";

$q=mysql_query("SELECT * FROM ma WHERE koncovka_2='' LIMIT 500000");

while ($slovo=mysql_fetch_object($q)) {
	$koncovka_2=substr($slovo->word,-3);
	$sql=sprintf("UPDATE ma SET koncovka_2='%s' WHERE id=%s;",$koncovka_2,$slovo->id);
	$q2=mysql_query($sql);
	//echo $sql."<BR>";
	
	
}






?>


</body>

<html>