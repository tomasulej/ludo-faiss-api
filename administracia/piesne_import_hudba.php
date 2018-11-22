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
    $command = "Xvfb :0 -screen 0 1280x768x24& && export DISPLAY=:0 && /usr/bin/mscore $f -o /var/www/html/piesne/import/$f_.xml";
    $vystup = shell_exec($command);
    echo "Spustil som príkaz <i>".$command."</i>, server mi vrátil hlášku: '".$vystup."'.<BR>";
 
}

//$command = escapeshellcmd("/usr/bin/mscore /var/www/html/prekladac/ludevit/examples/www/fetch.py $url -");

?>