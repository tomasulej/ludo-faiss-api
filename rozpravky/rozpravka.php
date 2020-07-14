<?php



function str_lreplace($search, $replace, $subject)
{
    return preg_replace('~(.*)' . preg_quote($search, '~') . '~', '$1' . $replace, $subject, 1);
}


//META
$meta_type="article";
$meta_title="Ľudo Slovenský - Najväčšia digitálna zbierka kultúrneho dedičstva Slovenska";
$meta_image="http://www.ludoslovensky.sk/public/img/ludo.png";
$meta_url="http://".$_SERVER['SERVER_NAME'];
$meta_desc="Ahojte, ja som Ľudo Slovenský! Tisíc rokov píšem rozprávky, tvorím príslovia, porekadlá, nadávam, kľajem a spievam. Som najplodnejší autorom Slovenska a tu je celá moja tvorba.";



include $_SERVER["DOCUMENT_ROOT"]."/databaza_rozpravky.php";
$id=$_GET['id'];
$q1=mysql_query("SELECT * FROM rozpravka WHERE id=$id");

$rozpravka=mysql_fetch_object($q1);









$telo=$rozpravka->r_text; 


$lavy_stlpec.=sprintf('<p class="lead"> %s: %s </p>', str_lreplace(".","",$rozpravka->pp_author),str_lreplace(".","",$rozpravka->pp_title));
$lavy_stlpec.=sprintf('<p class="small">%s<BR>%s</p>',$rozpravka->zf_copyright,
$rozpravka->zf_digitalizatori);

require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_tales_tale.php");

?>