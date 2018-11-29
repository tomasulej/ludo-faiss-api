<?php

	error_reporting(E_ALL);
	ini_set('display_errors', '1');
    include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

    //vezmi xml
    $fileList = glob($_SERVER["DOCUMENT_ROOT"].'/piesne/import/*.mscz');



foreach($fileList as $f){
    echo "<HR>";
    echo "Našiel som súbor <B>".$f."</B><br>"; 
    $f_= pathinfo($f, PATHINFO_FILENAME);
    $f__=pathinfo($f,PATHINFO_BASENAME);
    $fArr = explode("_", $f__);
    $fId = $fArr[0]; 
    echo "V názve súboru som identifikoval identifikátor $fId.<BR>";
    $query="SELECT * FROM piesne WHERE identifikator='$fId'";
    $q=mysql_query($query);
    $piesen=mysql_fetch_object($q);
    echo "Identifikoval som pieseň, jej ide je $piesen->id_piesen a možno viem aj názov - '$piesen->nazov_dlhy'.<BR>";
    $nf=$_SERVER["DOCUMENT_ROOT"].'/piesne/data/'.$piesen->id_piesen.'/'.$fArr[1];
    mkdir($_SERVER["DOCUMENT_ROOT"].'/piesne/data/'.$piesen->id_piesen.'/', 0700);
    array_map('unlink', array_filter((array) glob($_SERVER["DOCUMENT_ROOT"].'/piesne/data/'.$piesen->id_piesen.'/*')));
    echo "Pokúšam sa ho presunúť do adresára ".$nf.".<BR>";
    if (!rename($f,$nf)) {
        echo "Kopírovanie súboru sa nepodarilo. <BR>";}  
        else {echo "Kopírovanie súboru sa podarilo.";}   
    echo "Posúvam službu skriptu piesne_generovanie.php, ktoré to dokončí.";    
    $id_piesen=$piesen->id_piesen;
    include $_SERVER["DOCUMENT_ROOT"]."/administracia/piesne_generovanie.php";    
}


?>