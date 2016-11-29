<?php
//includes
include $_SERVER["DOCUMENT_ROOT"]."/databaza_prislovia.php";

$q=$_GET['q'];

$tmpl_prislovie= "<p id=\"prislovie_%s\"><a class='prislovie' data-toggle=\"popover\"  
data-content=\"<div class='quote-popover'>%s</div>\" href=\"prislovie.php?id=%s\">%s</a></p>";





$response=json_decode(file_get_contents('http://localhost:9200/proverbs/proverb/_search', null, stream_context_create([
    'http' => [
        'method' => 'GET',
        'header' => "Content-Type: application/json\r\n",
        'content' => json_encode([
            'query' => ['fuzzy_like_this' => [
                'fields' => ["proverb", "keywords", "notes", "type", "categories"],
                'like_text' => $q,
                'fuzziness' => 0.7,],],
            'size' => 100,
            'from' => 0,
        ])
    ]
])), true);


foreach ($response["hits"]["hits"] as $prisl) {


    $poznamky="";
    $kategoria="";


    //kategorie
    foreach($prisl["_source"]["categories"] as $kat) {
        $kategoria.=sprintf("-> %s",$kat);
        //echo $kat;
    }


    //klucove slova
    foreach($prisl["_source"]["keywords"] as $keyw) {
        $keywords[$keyw]+=1;
    }



    $kategoria=sprintf("<a href='http://www.ludoslovensky.sk/prislovia/kategoria.php?id=%s'>",katid_from_prislovie_id($prisl["_source"]["id"])).$kategoria."</a>";

    foreach($prisl["_source"]["notes"] as $pozn) {
        $poznamky.=sprintf("<li>%s</li>",$pozn);
    }


    $pozn_box=sprintf("<big>„%s“</big><BR><BR><iframe src='http://www.facebook.com/plugins/like.php?href=http://www.ludoslovensky.sk/prislovia/prislovie.php?id=%s' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:200px;height:30px' allowTransparency='true'></iframe><BR> <small>Viac podobných v: %s</small><hr><small><ul>%s</ul></small>", $prisl["_source"]["proverb"], $prisl["_source"]["id"], $kategoria, $poznamky);

    $obsah.=sprintf($tmpl_prislovie, $prisl["_source"]["id"], $pozn_box, $prisl["_source"]["id"], $prisl["_source"]["proverb"]."<BR>");
    //$obsah.=
}






// nacitanie informacii
require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_prislovia_hladat.php");

?>