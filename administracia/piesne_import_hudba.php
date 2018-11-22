<?php

	error_reporting(E_ALL);
	ini_set('display_errors', '1');

//nacitaj subory do spravneho priecinka

//vezmi xml
$fileList = glob('/var/www/html/piesne/import/*.mscz');

foreach($fileList as $f){
    //Simply print them out onto the screen.

    echo shell_exec("whoami");

    echo "Našiel som súbor <B>".$f."</B><br>"; 
    $f_= pathinfo($f, PATHINFO_FILENAME);
    //Generujem k nemu xml,

    echo shell_exec("sudo Xvfb :0 -screen 0 1280x768x24&");
    echo shell_exec("export DISPLAY=:0");
    $command = "/usr/bin/mscore $f -o /var/www/html/piesne/import/$f_.xml 2>&1";
    $vystup = exec($command, $co);
    echo "Spustil som príkaz <i>".$command."</i>, server mi vrátil hlášku:".var_dump($vystup)."xx".var_dump($co)."'.<BR>";
 
}

//$command = escapeshellcmd("/usr/bin/mscore /var/www/html/prekladac/ludevit/examples/www/fetch.py $url -");

?>