<?php

require ("simple_html_dom.php");
$q=$_GET['q'];
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

$page = file_get_html('http://slovniky.juls.savba.sk/?w='.$q.'&s=exact&c=sdea&d=sss&ie=utf-8&oe=utf-8#');
$i=0;

foreach ($page->find('em.term') as $term) {

    //if ($term->find('em.term',0)->plaintext==$q) {
        if (($_GET['q'] <> $term->plaintext) && ($i<6))
            echo $term->plaintext . ";";
    //}
//$i++;


}

/*include_once $_SERVER["DOCUMENT_ROOT"]."/databaza_slova.php";


$q=mysql_query("SELECT id, word, form FROM `ma` WHERE form like 'AA%' AND form like '%x%' and form like '%1%' and form like '%s%' AND parent=word group by parent ORDER BY `ma`.`id`   DESC");


while ($slovo=mysql_fetch_object($q)) {
    echo $slovo->word."<BR>";
}*/




?>