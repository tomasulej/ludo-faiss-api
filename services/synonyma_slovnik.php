<?php

require ("simple_html_dom.php");
//error_reporting(E_ALL);
//ini_set('display_errors', '1');


include_once $_SERVER["DOCUMENT_ROOT"]."/databaza_slova.php";


$file = new SplFileObject("synonyma.txt");
while (!$file->eof()) {
    $line=$file->fgets();
    $vyrazy=explode(";", $line);
    if (count($vyrazy)>1) {
        echo $line."<BR>";
        $q=mysql_query(sprintf("INSERT into kviz_words (synonyms,count_synonyms) VALUES ('%s',%s);",$line,count($vyrazy)));
    }
}



/*

//$q=mysql_query("SELECT id, word, form FROM `ma` WHERE form like 'AA%' AND form like '%x%' and form like '%1%' and form like '%s%' AND parent=word group by parent ORDER BY `ma`.`id`   DESC");

$q=mysql_query("SELECT * FROM kviz_words WHERE stav=0 LIMIT 1");




while ($slovo=mysql_fetch_object($q)) {
    //$q2=mysql_query(sprintf("INSERT INTO kviz_words (word) VALUES ('%s')", $slovo->word));
    $page = file_get_html('https://api.proxycrawl.com/?token=8tB7Vs8pVO5rZZM-g424qg&url=http://slovniky.juls.savba.sk/?w=++'.urlencode($slovo->word).'&s=exact&c=H559&d=sss&ie=utf-8&oe=utf-8#');
    $vyraz="";
    $synonyma="";
    foreach ($page->find('em.term') as $term) {


            if ($slovo->word <> $term->plaintext) $synonyma.=$term->plaintext . ";";
    }
    echo $slovo->word.": ".$synonyma."<BR>";
    $q2=mysql_query(sprintf("UPDATE kviz_words SET synonyms='%s', stav=1 WHERE id=%s",$synonyma,$slovo->id));

} */









?>