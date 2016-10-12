<?php


include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

$query="SELECT piesne.id_piesen, piesne.id_zbierka, piesne.nazov_variant, piesne.id_nadriadeny, piesne.identifikator, piesne.nazov_dlhy, piesne.nazov_kratky, piesne.id_zberatel, piesne.id_zberatel_miesto, piesne.id_zberatel_vyskyt, piesne.datum_zbieranie, piesne.datum_digitalizacia, piesne.datum_digitalizacia, piesne.id_digitalizator, piesne.id_hudba,piesne.id_tempo, piesne.id_incipit, piesne.lyrics, zbierky.nazov as zbierky_nazov, zberatelia.meno as zberatelia_meno, digitalizatori.meno as digitalizatori_meno, hudobnici.meno as hudobnici_meno, tempo.tempo, tempo.bpm, piesne.file_mp3, piesne.file_png FROM piesne LEFT JOIN zbierky ON piesne.id_zbierka=zbierky.id_zbierka LEFT JOIN zberatelia on piesne.id_zberatel=zberatelia.id_zberatel LEFT JOIN digitalizatori ON piesne.id_digitalizator=digitalizatori.id_digitalizator LEFT JOIN hudobnici ON piesne.id_hudba=hudobnici.id_hudba 
LEFT JOIN tempo ON piesne.id_tempo=tempo.id_tempo WHERE piesne.stav<>0";
$q_piesne=mysql_query($query);

$piesne=array();
while ( $riadok = mysql_fetch_array($q_piesne)) {
  array_push($piesne, $riadok);
}


$query2=mysql_query("SELECT * FROM piesne WHERE piesne.stav<>0");

$pocet_piesni=mysql_num_rows($query2);


// nacitanie informacii
require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_piesen_home.php");
?>