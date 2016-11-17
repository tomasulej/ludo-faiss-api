<?php


//error_reporting(E_ALL);
//ini_set('display_errors', '1');

//includes
include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

//get
    $id_piesen=(int)$_GET['id'];
    $format=$_GET['format'];

//log download
$datumcas = date('Y-m-d H:00:00');
$q_log=mysql_query("INSERT INTO log_stiahnut SET id_piesen = $id_piesen, datumcas = '$datumcas', pocet = 1 ON DUPLICATE KEY UPDATE pocet = pocet + 1");




//mysql
$q=mysql_query(sprintf("SELECT id_piesen, file_xml, file_mp3, file_pdf FROM piesne WHERE id_piesen=%s",$id_piesen));
$piesen=mysql_fetch_object($q);

//directory
$directory=$_SERVER["DOCUMENT_ROOT"]."/piesne/data/".$id_piesen."/";


    if ($format=='mp3') {
        $filename=$piesen->file_mp3;
        $file=$directory.$piesen->file_mp3;
        header('Content-Type: audio/mpeg');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        echo file_get_contents($file);
        exit();

    } else if ($format=='xml') {
        $filename=$piesen->file_xml;
        $file=$directory.$piesen->file_xml;
        header('Content-type: text/xml');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        echo file_get_contents($file);
        exit();

    } else if ($format=='pdf') {
        $filename=$piesen->file_pdf;
        $file=$directory.$piesen->file_pdf;
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        echo file_get_contents($file);
        exit();



    } else {
        echo "Ale bisťu, tento formát Ľudo nepodporovaným zhľadal. Radšej borovičky ulej (tm), nach túto galibu nejak spolu prekúsneme.";
    }








?>