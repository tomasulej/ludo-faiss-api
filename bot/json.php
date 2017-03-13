<?php

//includes
include $_SERVER["DOCUMENT_ROOT"]."/databaza_prislovia.php";

$tmpl_odpoved='{
  "messages": [
    {"text": "-----------------"},
    {
      "attachment": {
        "type": "template",
        "payload": {
          "template_type": "button",
          "text": "%s",
          "buttons": [
            {
              "type": "show_block",
              "block_name": "prislovie",
              "title": "Zobraz ďalšiu radu"
            },
            {
              "type": "web_url",
              "url": "https://ludoslovensky.sk/prislovia/prislovie.php?id=%s",
              "title": "Zdieľať s priateľmi"
            }
          ]
        }
      }
    }
  ]
}';


$co=$_GET['co'];

if ($co=='prislovie') {
    $q=mysql_query("SELECT * FROM pr_txt WHERE (hlasy>2)  ORDER BY RAND() LIMIT 1");
    $prislovie=mysql_fetch_object($q);
    printf($tmpl_odpoved, preg_replace('~[\r\n]+~', '', strip_tags($prislovie->txt)),$prislovie->id);

}



?>


