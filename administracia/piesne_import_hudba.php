<?php

	error_reporting(E_ALL);
	ini_set('display_errors', '1');

//nacitaj subory do spravneho priecinka

//vezmi xml
$fileList = glob('/var/www/html/piesne/import/*.mscz');

foreach($fileList as $f){
    //Simply print them out onto the screen.

    //echo shell_exec("whoami");

    echo "Našiel som súbor <B>".$f."</B><br><BR>"; 
    $f_= pathinfo($f, PATHINFO_FILENAME);
    //Generujem k nemu xml,

    $x=exec("sudo Xvfb :0 -screen 0 1280x768x24&",$vystup);
    echo "sudo Xvfb :0 -screen 0 1280x768x24& vrátilo <u>".var_dump($vystup)."</u><BR>";
    $x=exec("export DISPLAY=:0",$vystup);
    echo "export DISPLAY=:0 vrátilo".var_dump($vystup)."<BR>";
    $command = "/usr/bin/mscore $f -o /var/www/html/piesne/import/$f_.xml";
    $vystup = exec($command, $co);
    echo "Spustil som príkaz <i>".$command."</i>, server mi vrátil hlášku:".var_dump($vystup)."xx".var_dump($co)."'.<BR>";
 
}

//$command = escapeshellcmd("/usr/bin/mscore /var/www/html/prekladac/ludevit/examples/www/fetch.py $url -");

?>