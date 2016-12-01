<?php
//HLADAT.PHP - vyhladavanie v piesnach
//TODO: $xml_link;$mp3_link;$pdf_link;
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

//includes
include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";


//META
$meta_type="article";
$meta_title="Ľudo Slovenský: hľadať v najväčšej digitálnej zbierke ľudovej hudby";
$meta_image="http://www.ludoslovensky.sk/public/img/ludo-music.png";
$meta_url="http://".$_SERVER['SERVER_NAME']."/piesne/hladat.php";
$meta_desc="Tisíce rokov Ľudo Slovenský spieva piesne. Sú našim pokladom. Aby sme ho zachovali, postupne zbierame, digitalizujeme, triedime a sprístupňujeme desaťtisíce piesní, ktoré sa počas tisícok rokov spievali na našom území.";




$hladane=$_GET['q'];
if ($hladane<>"") {
  $query =
      "SELECT piesne.id_piesen, piesne.id_zbierka, piesne.nazov_variant, piesne.id_nadriadeny, piesne.identifikator, piesne.nazov_dlhy, 
piesne.nazov_kratky, piesne.id_zberatel, piesne.id_zberatel_miesto, piesne.id_zberatel_vyskyt, piesne.datum_zbieranie, piesne.datum_digitalizacia, piesne.datum_digitalizacia, piesne.id_digitalizator, piesne.id_hudba,piesne.id_tempo, piesne.id_incipit, piesne.lyrics, zbierky.nazov as zbierky_nazov, zberatelia.meno as zberatelia_meno, digitalizatori.meno as digitalizatori_meno, hudobnici.meno as hudobnici_meno, tempo.tempo, tempo.bpm, piesne.file_mp3, piesne.file_png FROM piesne LEFT JOIN zbierky ON piesne.id_zbierka=zbierky.id_zbierka LEFT JOIN zberatelia on piesne.id_zberatel=zberatelia.id_zberatel LEFT JOIN digitalizatori ON piesne.id_digitalizator=digitalizatori.id_digitalizator LEFT JOIN hudobnici ON piesne.id_hudba=hudobnici.id_hudba 
LEFT JOIN tempo ON piesne.id_tempo=tempo.id_tempo WHERE (piesne.stav<>0) AND (piesne.lyrics like '%$hladane%')";


} else {

  $query =
      "SELECT piesne.id_piesen, piesne.id_zbierka, piesne.nazov_variant, piesne.id_nadriadeny, piesne.identifikator, piesne.nazov_dlhy, 
piesne.nazov_kratky, piesne.id_zberatel, piesne.id_zberatel_miesto, piesne.id_zberatel_vyskyt, piesne.datum_zbieranie, piesne.datum_digitalizacia, piesne.datum_digitalizacia, piesne.id_digitalizator, piesne.id_hudba,piesne.id_tempo, piesne.id_incipit, piesne.lyrics, zbierky.nazov as zbierky_nazov, zberatelia.meno as zberatelia_meno, digitalizatori.meno as digitalizatori_meno, hudobnici.meno as hudobnici_meno, tempo.tempo, tempo.bpm, piesne.file_mp3, piesne.file_png FROM piesne LEFT JOIN zbierky ON piesne.id_zbierka=zbierky.id_zbierka LEFT JOIN zberatelia on piesne.id_zberatel=zberatelia.id_zberatel LEFT JOIN digitalizatori ON piesne.id_digitalizator=digitalizatori.id_digitalizator LEFT JOIN hudobnici ON piesne.id_hudba=hudobnici.id_hudba 
LEFT JOIN tempo ON piesne.id_tempo=tempo.id_tempo WHERE piesne.stav<>0";
}



$q_piesne=mysql_query($query);

$pocet_piesni=mysql_num_rows($q_piesne);


$piesne=array();
while ( $riadok = mysql_fetch_array($q_piesne)) {
  array_push($piesne, $riadok);
}

// nacitanie informacii
require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_piesen_hladat.php");


?>
