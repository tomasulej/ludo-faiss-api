<?php

	error_reporting(E_ALL);
	ini_set('display_errors', '1');
    include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";


    if ($id_piesen=='') {$id_piesen=$_GET['$id_piesen'];}

    //vezmi xml
    $fileList = glob($_SERVER["DOCUMENT_ROOT"].'/piesne/data/'.$id_piesen.'/*.mscz');


foreach($fileList as $f){

    echo "Našiel som súbor <B>".$f."</B><br>"; 
    $f_= pathinfo($f, PATHINFO_FILENAME);
    $x = shell_exec("sudo sh /var/www/html/administracia/musescore.sh $f /var/www/html/piesne/data/$id_piesen/$f_");
    //$fArr = explode("_", $_);
    //$fId = $fArr[0]; 
    //$q=mysql_query("SELECT * piesne WHERE id=$fId");
    echo "Pokúsil som vygenerovať všetky potrebné súbory.<BR>";
    $abc=file_get_contents($_SERVER["DOCUMENT_ROOT"]."/piesne/data/".$id_piesen."/".$f_.".abc");
    echo "Ak všetko prebehlo ok, tu dole vidíš obsah abc súboru.<BR>";
    echo "<blockquote><pre>$abc</pre></blockquote><BR>";    
    //Todo zapísanie do databázy;
    $query="UPDATE piesne SET abc='$abc', file_xml='$f_.xml', file_mp3='$f_.mp3', stav=1000 WHERE id_piesen='$id_piesen';";
    echo $query;
    $q=mysql_query($query);
    //echo "Snažím sa do databázy zapísať query: $query; 

    //TODO PNG

}


?>