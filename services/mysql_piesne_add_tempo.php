<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

  include ($_SERVER["DOCUMENT_ROOT"].'/databaza_piesne.php');

  $q=mysql_query("SELECT * FROM piesne WHERE tempo_bpm IS NULL AND stav=1");

  while ($piesen=mysql_fetch_object($q)) {
    $id=$piesen->id_piesen;
    $xml=simplexml_load_file($_SERVER["DOCUMENT_ROOT"]."/piesne/data/".$piesen->id_piesen."/".$piesen->file_xml);  
    $tempo_bpm=$xml->part[0]->measure[0]->direction->sound['tempo'];  
    //echo "ID: $piesen->id_piesen ==>".$xml->part[0]->measure[0]->direction->sound['tempo'].'<BR>';
    if (!is_null($tempo_bpm)){
      $q_update=mysql_query("UPDATE piesne SET tempo_bpm=$tempo_bpm WHERE id_piesen=$id");
    }
  }





?>