<?php

	error_reporting(E_ALL);
	ini_set('display_errors', '1');

//nacitaj subory do spravneho priecinka

function background($Command, $Priority = 0){
    if($Priority)
        $PID = shell_exec("nohup nice -n $Priority $Command > /dev/null & echo $!");
    else
        $PID = shell_exec("nohup $Command > /dev/null & echo $!");
    return($PID);
}

function print_r2($val){
    echo '<pre>';
    print_r($val);
    echo  '</pre>';
}

//vezmi xml
$fileList = glob('/var/www/html/piesne/import/*.mscz');

foreach($fileList as $f){
    //Simply print them out onto the screen.

    //echo shell_exec("whoami")."PHP hovori: ".get_current_user()."<BR>";

    echo "Našiel som súbor <B>".$f."</B><br><BR>"; 
    $f_= pathinfo($f, PATHINFO_FILENAME);

    
    $x = shell_exec("sudo sh /var/www/html/administracia/musescore.sh $f /var/www/html/piesne/import/$f_");
    //echo shell_exec(escapeshellcmd("sudo /usr/bin/python /var/www/html/public/py/xml2abc.py /var/www/html/piesne/import/$f_ 2>&1"));
    //echo "<pre>".$abc."</pre>";

    
}


?>