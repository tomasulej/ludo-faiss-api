<?php


include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";


//piesne najpopularnejsie

$datum=date('Y-m-d', strtotime('-31 days'))." 00:00:00";
$query3=mysql_query("SELECT log.id_piesen, piesne.nazov_dlhy, piesne.file_png, sum(log.pocet) as videnia FROM log LEFT JOIN piesne ON piesne.id_piesen=log.id_piesen WHERE datumcas > '$datum' AND id_nadriadeny=0 GROUP BY id_piesen ORDER BY videnia DESC LIMIT 20");
$piesne_top=array();
while ( $riadok = mysql_fetch_array($query3)) {
    array_push($piesne_top, $riadok);

}


//piesne najnovsie
$query="SELECT piesne.id_piesen, piesne.id_zbierka, piesne.nazov_variant, piesne.id_nadriadeny, piesne.identifikator, piesne.nazov_dlhy, piesne.nazov_kratky, piesne.id_zberatel, piesne.id_zberatel_miesto, piesne.id_zberatel_vyskyt, piesne.datum_zbieranie, piesne.datum_digitalizacia, piesne.datum_digitalizacia, piesne.id_digitalizator, piesne.id_hudba,piesne.id_tempo, piesne.id_incipit, piesne.lyrics, zbierky.nazov as zbierky_nazov, zberatelia.meno as zberatelia_meno, digitalizatori.meno as digitalizatori_meno, hudobnici.meno as hudobnici_meno, tempo.tempo, tempo.bpm, piesne.file_mp3, piesne.file_png FROM piesne LEFT JOIN zbierky ON piesne.id_zbierka=zbierky.id_zbierka LEFT JOIN zberatelia on piesne.id_zberatel=zberatelia.id_zberatel LEFT JOIN digitalizatori ON piesne.id_digitalizator=digitalizatori.id_digitalizator LEFT JOIN hudobnici ON piesne.id_hudba=hudobnici.id_hudba 
LEFT JOIN tempo ON piesne.id_tempo=tempo.id_tempo WHERE piesne.stav<>0  AND (id_nadriadeny=0) ORDER BY datum_digitalizacia DESC LIMIT 5";
$q_piesne=mysql_query($query);

$piesne=array();
while ( $riadok = mysql_fetch_array($q_piesne)) {
    array_push($piesne, $riadok);
}

require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_newsletter.php");


?>