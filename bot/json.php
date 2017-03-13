<?php

//includes
include $_SERVER["DOCUMENT_ROOT"]."/databaza_prislovia.php";

$tmpl_odpoved='{
  "messages": [
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
              "title": "Ďalšie príslovie, prosím!"
            },
            {
              "type": "web_url",
              "url": "https://ludoslovensky.sk/prislovia/prislovie.php?id=%s",
              "title": "Pozrieť toto príslovie na webe"
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
    printf($tmpl_odpoved, $prislovie->txt,$prislovie->id);

}



?>


