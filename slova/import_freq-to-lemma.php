<html>
<head>
  <meta charset="utf-8">
	
</head>	

<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');	
	
	
include "kniznica.php";
include "../databaza_slova.php";

$q=mysql_query("SELECT * FROM ma WHERE ((parent_freq>-1) AND (parent_freq<1)) LIMIT 500000;");

while ($slovo=mysql_fetch_object($q)) {
	$parent_freq=vyskyt_korpus_count($slovo->parent);
	if ($parent_freq==0) {$parent_freq=-1;}
	$sql="UPDATE ma SET parent_freq=$parent_freq WHERE id=$slovo->id";
	$q2=mysql_query($sql);
	//printf("%s --> %s<BR>", $slovo->parent, $parent_freq);
    printf("-- %s --", $slovo->id);
}
?>
</body>
</html>	