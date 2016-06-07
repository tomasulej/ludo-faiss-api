<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');	


$file=$_GET['file'];	
	

echo $file;
 

$command = "sudo -u www-data /usr/bin/python /var/www/html/piesne-db-test/xml2abc.py $file 2>&1";

echo $command;

$output = exec($command);
echo $output;



	
	
	
?>	