<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');


require ($_SERVER["DOCUMENT_ROOT"]."/services/simple_html_dom.php");
include_once $_SERVER["DOCUMENT_ROOT"]."/databaza_rozpravky.php";


// Create DOM from URL or file
$html = file_get_html($_SERVER["DOCUMENT_ROOT"].'/services/rozpravky/6_francisci-jan_poviedky-pre-dietky_txt.html');

// Find bibliography

$zf_copyright=$html->find('p[class=copyright]',0)->innertext;
$zf_legalnotice=$html->find('div[class=legalnotice]',0)->plaintext;
$zf_digitalizatori=$html->find('p[class=othercredit]',0)->innertext;
$zf_book_title=$html->find('h1[class=title]',0)->plaintext;

$pp_author=$html->find('div[class=biblioentry]',0)->find('span[class=author]',0)->plaintext;
$pp_title=$html->find('div[class=biblioentry]',0)->find('span[class=title]',0)->plaintext;
$pp_date=$html->find('div[class=biblioentry]',0)->find('span[class=pubdate]',0)->plaintext;
$pp_publisher=$html->find('div[class=biblioentry]',0)->find('span[class=publisher]',0)->plaintext;
$pp_city=$html->find('div[class=biblioentry]',0)->find('span[class=city]',0)->plaintext;


echo "(C):".$zf_copyright."<BR>"."(LN):".$zf_legalnotice."<BR>"."(Digi):".$zf_digitalizatori."<BR>"."(Booktitle):".$zf_book_title."<BR>"."(pp_author):".$pp_author."<BR>"."(pp_title):".$pp_title."<BR>"."(datum):".$pp_date."<BR>"."(publisher):".$pp_publisher."<BR>"."(mesto):".$pp_city;

//echo "<BR><BR><BR>";

// Find chapters
foreach ($html->find('div[class=chapter]') as $element) {
    $r_nazov=$element->find('h2[class=title]',0)->plaintext;
    $r_text=$element->innertext;
    echo $r_nazov."<BR>";

    $sql=sprintf("INSERT INTO rozpravka (zf_copyright, zf_legalnotice, zf_digitalizatori, zf_book_title, pp_author, pp_title, pp_date, pp_publisher, pp_city, r_nazov, r_text) 
VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
$zf_copyright,
$zf_legalnotice,
$zf_digitalizatori,
$zf_book_title,
$pp_author,
$pp_title,
$pp_date,
$pp_publisher,
$pp_city,
$r_nazov,
$r_text);
//echo $sql;


$q=mysql_query($sql);

 
}










?>