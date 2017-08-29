
<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');




    include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";
    require_once $_SERVER["DOCUMENT_ROOT"]."/piesne/lib.piesne.php";
    
    $id1=$_GET['id_piesen1'];
    $id2=$_GET['id_piesen2'];
    


    $q1=mysql_query("SELECT lyrics FROM piesne WHERE id_piesen=$id1");
    $objPiesen1=mysql_fetch_object($q1);

    $q2=mysql_query("SELECT lyrics FROM piesne WHERE id_piesen=$id2");
    $objPiesen2=mysql_fetch_object($q2);


        echo lyrics2html_diff($objPiesen1->lyrics, $objPiesen2->lyrics);


?>

