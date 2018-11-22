<?php

	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');

//nacitaj subory do spravneho priecinka

//vezmi xml
$fileList = glob('/var/www/html/piesne/import/*.mscz');

foreach($fileList as $f){
    //Simply print them out onto the screen.

    echo shell_exec("whoami")."PHP hovori: ".get_current_user()."<BR>";

    echo "Našiel som súbor <B>".$f."</B><br><BR>"; 
    $f_= pathinfo($f, PATHINFO_FILENAME);
    //Generujem k nemu xml,

    $x=exec("Xvfb :0 -screen 0 1280x768x24& 2>&1",$vystup);
    echo "Xvfb :0 -screen 0 1280x768x24& vrátilo <u>".var_dump($vystup).var_dump($x)."</u><BR>";
    $x=exec("export DISPLAY=:0 2>&1",$vystup);
    echo print_r($vystup);

    //echo "export DISPLAY=:0 vrátilo".var_dump($vystup).var_dump($x)."<BR>";
    $command = exec(escapeshellcmd("/usr/bin/mscore $f -o /var/www/html/piesne/import/$f_.xml 2>&1"), $vystup);
    echo "Spustil som príkaz <i>/usr/bin/mscore $f -o /var/www/html/piesne/import/$f_.xml</i>, server mi vrátil hlášku:".$command.print_r($vystup)."'.<BR>";
 
}

//$command = escapeshellcmd("/usr/bin/mscore /var/www/html/prekladac/ludevit/examples/www/fetch.py $url -");

?>