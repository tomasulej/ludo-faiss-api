<?php

//includes
include $_SERVER["DOCUMENT_ROOT"]."/databaza_prislovia.php";

$tmpl_odpoved='{
  "messages": [
    {"text": "%s"},
    {
      "attachment": {
        "type": "template",
        "payload": {
          "template_type": "button",
          "text": "Hello!",
          "buttons": [
            {
              "type": "show_block",
              "block_name": "some block name",
              "title": "Show the block!"
            },
            {
              "type": "web_url",
              "url": "https://petersapparel.parseapp.com/buy_item?item_id=%s",
              "title": "Buy Item"
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


