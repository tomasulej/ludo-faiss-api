<?php
//PIESEN.PHP - vykreslenie piesne
//TODO: $xml_link;$mp3_link;$pdf_link;
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

//includes
include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

//prenos informacii
$id=(int)array_keys($_GET)[0];

//mysql select piesen
//$query="SELECT piesne.id_piesen, piesne.id_zbierka, piesne.nazov_variant, piesne.id_nadriadeny, piesne.identifikator, piesne.nazov_dlhy, piesne.nazov_kratky, piesne.id_zberatel, piesne.id_zberatel_miesto, piesne.id_zberatel_vyskyt, piesne.datum_zbieranie, piesne.datum_digitalizacia, piesne.datum_digitalizacia, piesne.id_digitalizator, piesne.id_hudba,piesne.id_tempo, piesne.id_incipit, piesne.lyrics, zbierky.nazov as zbierky_nazov, zberatelia.meno as zberatelia_meno, digitalizatori.meno as digitalizatori_meno, hudobnici.meno as hudobnici_meno, lokality.meno as lokality_meno, lokality.meno_original as lokality_meno_original, lokality.area as lokality_area, lokality.typ_id as lokality_typ_id, tempo.tempo, tempo.bpm  FROM piesne, zbierky, zberatelia, digitalizatori, hudobnici, lokality, tempo WHERE (id_piesen=$id AND piesne.id_zbierka=zbierky.id_zbierka AND piesne.id_zberatel=zberatelia.id_zberatel AND piesne.id_digitalizator=digitalizatori.id_digitalizator AND piesne.id_hudba=hudobnici.id_hudba AND piesne.id_zberatel_miesto=lokality.id_lokalita AND piesne.id_zberatel_vyskyt=lokality.id_lokalita AND piesne.id_tempo=tempo.id_tempo)";

$query="SELECT piesne.id_piesen, piesne.id_zbierka, piesne.strana, piesne.nazov_variant, piesne.id_nadriadeny, piesne.identifikator, piesne.nazov_dlhy, piesne.nazov_kratky, piesne.id_zberatel, piesne.source_zberatel, piesne.id_zberatel_miesto, piesne.source_zberatel_miesto, piesne.id_zberatel_vyskyt, piesne.source_zberatel_vyskyt, piesne.datum_zbieranie, piesne.source_datum_zbieranie, piesne.datum_digitalizacia, piesne.id_digitalizator, piesne.id_hudba,piesne.id_tempo, piesne.source_tempo, piesne.id_incipit, piesne.lyrics, piesne.file_png, piesne.file_mp3, zbierky.nazov as zbierky_nazov, zberatelia.meno as zberatelia_meno, digitalizatori.meno as digitalizatori_meno, hudobnici.meno as hudobnici_meno, tempo.tempo, tempo.bpm FROM piesne LEFT JOIN zbierky ON piesne.id_zbierka=zbierky.id_zbierka LEFT JOIN zberatelia on piesne.id_zberatel=zberatelia.id_zberatel LEFT JOIN digitalizatori ON piesne.id_digitalizator=digitalizatori.id_digitalizator LEFT JOIN hudobnici ON piesne.id_hudba=hudobnici.id_hudba 
LEFT JOIN tempo ON piesne.id_tempo=tempo.id_tempo WHERE piesne.id_piesen=$id";

//echo $query;

$q=mysql_query($query);
$piesen=mysql_fetch_object($q);


//META
$meta_title=$piesen->nazov_dlhy;
$meta_audio="http://".$_SERVER['SERVER_NAME']."/piesne/data/".
$meta_image="http://".$_SERVER['SERVER_NAME']."/piesne/data/".$piesen->id_piesen."/".$piesen->file_mp3;
$meta_url="http://".$_SERVER['SERVER_NAME']."/piesne/piesen.php?".$piesen->id_piesen;
$meta_desc="Táto pieseň pochádza z Ľuda Slovenského, najväčšej zbierky ľudovej hudby na Slovensku. Pozri si melódiu, noty a všetky informácie o nej. ";


// podobne piesne
$q_podobne=mysql_query(sprintf('SELECT file_mp3, file_png, id_vztahy_piesne, id_vztah, id_piesen1,id_piesen2, txt_piesen2, piesne.nazov_dlhy, piesne.nazov_kratky, piesne.id_piesen FROM vztahy_piesne, piesne WHERE (id_piesen1=%s OR id_piesen2=%s) AND (piesne.id_piesen=id_piesen1 OR piesne.id_piesen=id_piesen2);',(int)$id,(int)$id));


while ($o_podobne=mysql_fetch_object($q_podobne)) {
  if ($o_podobne->txt_piesen2=="")  {
    if ($o_podobne->id_piesen<>(int)$id) { 
        $podobne[] = array(
        "id_piesen" => $o_podobne->id_piesen,
        "nazov_kratky" => $o_podobne->nazov_kratky,
        "file_mp3" => ($o_podobne->file_mp3=="" ? "" : "data/".$o_podobne->id_piesen."/".$o_podobne->file_mp3),
        "file_png" => ($o_podobne->file_png=="" ? "/public/img/ludo_vyrez.png" : "data/".$o_podobne->id_piesen."/".$o_podobne->file_png),
        "id_vztah" => $o_podobne->id_vztah
    );
  }

  } else {
		$podobne_cudzie.=sprintf("%s, ",$o_podobne->txt_piesen2);
		
  }
}


//poznamky
$q_poznamky=mysql_query("SELECT * FROM poznamky WHERE id_piesen=$id");
while ($o_poznamky=mysql_fetch_object($q_poznamky)) {
    $poznamky[] = array(
        "id_druh"=>$o_poznamky->id_druh,
        "txt"=>$o_poznamky->txt);
}


//mapa
$q_mapa=mysql_query(sprintf("SELECT * FROM lokality,lokality_piesne where lokality.id_lokalita=lokality_piesne.id_lokalita AND lokality_piesne.id_piesen=%s",(int)$id));

while ($lokality=mysql_fetch_object($q_mapa)) {
	$c++;
	$p_mapa[]=array(
        "id"=>$lokality->id_lokalita,
        "meno"=>$lokality->meno
    );

	if ($lokality->area<>""){
		$p_mapa_point[]= array(
            "c"=>$c,
            "area"=>$lokality->area
        );
	}
}


$c++;
$q_zberatel_miesto=mysql_query("SELECT * FROM lokality WHERE id_lokalita=$piesen->id_zberatel_miesto");
$zberatel_miesto=mysql_fetch_object($q_zberatel_miesto);    
$q_zberatel_vyskyt=mysql_query("SELECT * FROM lokality WHERE id_lokalita=$piesen->id_zberatel_vyskyt");
$zberatel_vyskyt=mysql_fetch_object($q_zberatel_vyskyt);    



//Mená
$q_mena=mysql_query(sprintf("SELECT mena.id_meno,mena.meno,mena.pohlavie FROM mena, mena_piesne WHERE mena.id_meno=mena_piesne.id_meno AND mena_piesne.id_piesen=%s",(int)$id));
while ($o_mena=mysql_fetch_object($q_mena)) {
   $p_mena[]=array(
    "meno_id"=>$o_mena->id_meno, 
    "pohlavie"=>$o_mena->pohlavie,
    "meno"=>$o_mena->meno
 );
}









// nacitanie informacii
require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_piesen_main.php");

?>