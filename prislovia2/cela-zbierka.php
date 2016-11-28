<?php
//includes
include $_SERVER["DOCUMENT_ROOT"]."/databaza_prislovia.php";


//error_reporting(E_ALL);
//ini_set('display_errors', '1');

$q=mysql_query("SELECT * FROM pr_kategorie WHERE parent_id=0;");

while ($kategoria=mysql_fetch_object($q)) {

    $q2=null;
    $txt="";
    $q2=mysql_query("SELECT * FROM pr_kategorie WHERE parent_id=$kategoria->id LIMIT 15");
        while ($podkategoria=mysql_fetch_object($q2)) {
            $txt.=sprintf("<a href='kategoria.php?id=%s#%s'>%s</a>, ",$kategoria->id,$podkategoria->id,$podkategoria->txt);
        }

    if ($txt<>"") { $txt=rtrim($txt, ", ")." a ďalšie.";}

    $kategorie[] = array(
        "url" => "kategoria.php?id=".$kategoria->id,
        "img" => "/public/img/ludo-prislovia.png",
        "nazov" => $kategoria->txt,
        "txt" => $txt
    );


}



// nacitanie informacii
require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_prislovia_cela-zbierka.php");

?>