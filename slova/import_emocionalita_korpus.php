<?php
ini_set('memory_limit', '-1');
include "kniznica.php";
include "../databaza_slova.php";
error_reporting(E_ALL);
ini_set('display_errors', '1');

$file = new SplFileObject("happiness_zdroje/adj.slx");
while (!$file->eof()) {
    $pocitadlo++;
    $line=$file->fgets();
	$riadok_a=explode(" ", $line);	    
    $sql=sprintf("UPDATE freq SET emotion=%s WHERE word='%s'",$riadok_a[1],$riadok_a[0]);
    printf($sql."<BR>");    
	$q=mysql_query($sql);
}


?>