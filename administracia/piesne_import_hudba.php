<?php

	error_reporting(E_ALL);
	ini_set('display_errors', '1');

//nacitaj subory do spravneho priecinka

//vezmi xml
$fileList = glob('/var/www/html/piesne/import/*.mscz');

foreach($fileList as $f){
    //Simply print them out onto the screen.
    echo "Našiel som súbor <B>".$f."</B><br>"; 
    $f_= pathinfo($f, PATHINFO_FILENAME);
    //Generujem k nemu xml,
    $command = escapeshellcmd("/usr/bin/mscore $f -o $f_.xml");
    $vystup = shell_exec($command);
    echo "Pokúsil som sa k nemu vygenerovať XML, server mi vrátil hlášku: '".$vystup."'.<BR>";
 
}

//$command = escapeshellcmd("/usr/bin/mscore /var/www/html/prekladac/ludevit/examples/www/fetch.py $url -");

?>