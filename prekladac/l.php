<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

$url=$_GET['url'];
$command = escapeshellcmd("/usr/bin/python /var/www/html/prekladac/ludevit/examples/www/fetch.py $url -");

//echo $command;

$vystup = shell_exec($command);

$vystup = substr($vystup,strpos($vystup, "<!DOCTYPE")+8);

echo $vystup;

?>