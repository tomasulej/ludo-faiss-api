<?php

include ($_SERVER["DOCUMENT_ROOT"].'/databaza_piesne.php');


mysql_select_db("piesne");
$query=mysql_query("SELECT piesne.id_piesen, piesne.tempo_bpm, piesne.id_nadriadeny, piesne.typ_nadriadeny, piesne.nazov_variant, piesne.id_zbierka, piesne.strana, piesne.nazov_variant, piesne.id_nadriadeny, piesne.identifikator, piesne.nazov_dlhy, piesne.nazov_kratky, piesne.id_zberatel, piesne.source_zberatel, piesne.id_zberatel_miesto, piesne.source_zberatel_miesto, piesne.id_zberatel_vyskyt, piesne.source_zberatel_vyskyt, piesne.datum_zbieranie, piesne.source_datum_zbieranie, piesne.datum_digitalizacia, piesne.id_digitalizator, piesne.id_digitalizator2, piesne.id_hudba,piesne.id_tempo, piesne.id_tempo2, piesne.source_tempo, piesne.source_tempo2, piesne.id_incipit, piesne.lyrics, piesne.file_xml, piesne.file_png, piesne.file_mp3, piesne.file_pdf, zbierky.nazov as zbierky_nazov, zberatelia.meno as zberatelia_meno, 
digitalizatori.meno as digitalizatori_meno, digitalizatori2.meno as digitalizatori2_meno,  hudobnici.meno as hudobnici_meno, t1.tempo as tempo1, t2.tempo as tempo2, t1.bpm as bpm1, t2.bpm as bpm2 FROM piesne LEFT JOIN zbierky ON piesne.id_zbierka=zbierky.id_zbierka LEFT JOIN zberatelia on piesne.id_zberatel=zberatelia.id_zberatel
LEFT JOIN digitalizatori AS digitalizatori ON piesne.id_digitalizator = digitalizatori.id_digitalizator
LEFT JOIN digitalizatori AS digitalizatori2 ON piesne.id_digitalizator2 = digitalizatori2.id_digitalizator

LEFT JOIN hudobnici ON piesne.id_hudba=hudobnici.id_hudba
LEFT JOIN tempo AS t1 ON piesne.id_tempo <=> t1.id_tempo
LEFT JOIN tempo AS t2 ON piesne.id_tempo2 <=> t2.id_tempo

WHERE piesne.stav<>0 AND id_nadriadeny=0 ORDER BY datum_digitalizacia DESC");

while ($piesen=mysql_fetch_object($query)) {
    printf('http://www.ludoslovensky.sk/piesne/piesen.php?%s',$piesen->id_piesen.PHP_EOL);
}



?>