<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

$command = escapeshellcmd('/usr/bin/python /var/www/html/piesne/analyze/contour.py /var/www/html/piesne/data/'.$piesen->id_piesen.'/'.$piesen->file_xml);
echo $command;

$output = shell_exec($command);
echo $output;

?>