<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

$url=$_GET['u'];
$command = escapeshellcmd("/usr/bin/python /var/www/html/prekladac/ludevit/examples/www/fetch.py $url -");

echo $command;

$vystup = shell_exec($command);

printf($vystup);

?>