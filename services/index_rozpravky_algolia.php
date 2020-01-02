<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

  require_once($_SERVER["DOCUMENT_ROOT"].'/public/php/algolia/algoliasearch.php');

        include_once $_SERVER["DOCUMENT_ROOT"]."/databaza_slova.php";

  include ($_SERVER["DOCUMENT_ROOT"].'/databaza_rozpravky.php');
  include $_SERVER["DOCUMENT_ROOT"]."/rozpravky/lib.rozpravky.php";



$client = new \AlgoliaSearch\Client("35TGB7A4IL", "588386ed04fbcb8d39903d7e71c62126");
$index = $client->initIndex('rozpravky');

mysql_select_db("rozpravky");
$query=mysql_query("SELECT * from rozpravka");



while ($r=mysql_fetch_object($query)) {
    

    $a_slova=explode(";", $r->r_slova);
    $a_slova=array_unique($a_slova); 

        $oneDim = array();
            foreach($a_slova as $i) {
                $oneDim[] = $i;
        }
        //$slova=array();
        $a_slova=$oneDim;


   //tempa
   if ($r->r_time>0) {
    if ($r->r_time<=5) {$r_time_kat="Do päť minút";} else if ($r->r_time<=10){$r_time_kat="Do desať minút";} else if ($r->r_time<=20){$r_time_kat="Do dvadsať minút";} else if ($r->r_time<=30){$r_time_kat="Do polhodiny";} else {$r_time_kat="Viac ako polhodinu";}
   } 



      $index->addObject(
        [
            'id' => $r->id,
            'zf_book_title' => $r->zf_book_title,
            'pp_author' => str_replace("   "," ",str_replace(".","",$r->pp_author)),
            'pp_title' => $r->pp_title,
            'pp_date' => $r->pp_date,
            'pp_publisher' => $r->pp_publisher,
            'pp_city' => $r->pp_city,
            'r_nazov' => $r->r_nazov,
            'r_text' => $r->r_text,
            'r_snippet' => $r->r_snippet,
            'r_time' => $r->r_time,
            'r_time_kat' => $r_time_kat,
            'a_slova' => $a_slova


        ]
    ); 

    

}












?>
