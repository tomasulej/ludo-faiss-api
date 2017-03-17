<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";
$id_piesen=$_GET['id_piesen'];
$q=mysql_query("SELECT * FROM piesne WHERE id_piesen=$id_piesen;");
$piesen=mysql_fetch_object($q);

$command = escapeshellcmd('/usr/bin/python /var/www/html/piesne/analyze/contour.py /var/www/html/piesne/data/'.$piesen->id_piesen.'/'.$piesen->file_xml);
echo $command;

$output = shell_exec($command);
echo $output;

?>