<?php

//includes
include $_SERVER["DOCUMENT_ROOT"]."/databaza_prislovia.php";

$tmpl_odpoved='
{
   "results" : {
     "prislovie": "%s"
  }
}';



    $q=mysql_query("SELECT * FROM pr_txt WHERE (hlasy>2)  ORDER BY RAND() LIMIT 1");
    $prislovie=mysql_fetch_object($q);
    printf($tmpl_odpoved, preg_replace('~[\r\n]+~', '', strip_tags($prislovie->txt)));



?>


