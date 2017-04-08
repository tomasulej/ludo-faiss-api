<?php
$url=$_GET['u'];
$command = escapeshellcmd("/usr/bin/python /var/www/html/prekladac/ludevit/examples/www/fetch.py $url -");

$vystup = shell_exec($command);

printf($vystup);

?>