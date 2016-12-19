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

$query="SELECT piesne.id_piesen, piesne.id_nadriadeny, piesne.typ_nadriadeny, piesne.nazov_variant, piesne.id_zbierka, piesne.strana, piesne.nazov_variant, piesne.id_nadriadeny, piesne.identifikator, piesne.nazov_dlhy, piesne.nazov_kratky, piesne.id_zberatel, piesne.source_zberatel, piesne.id_zberatel_miesto, piesne.source_zberatel_miesto, piesne.id_zberatel_vyskyt, piesne.source_zberatel_vyskyt, piesne.datum_zbieranie, piesne.source_datum_zbieranie, piesne.datum_digitalizacia, piesne.id_digitalizator, piesne.id_hudba,piesne.id_tempo, piesne.source_tempo, piesne.id_incipit, piesne.lyrics, piesne.file_png, piesne.file_mp3, piesne.file_pdf, zbierky.nazov as zbierky_nazov, zberatelia.meno as zberatelia_meno, digitalizatori.meno as digitalizatori_meno, hudobnici.meno as hudobnici_meno, tempo.tempo, tempo.bpm FROM piesne LEFT JOIN zbierky ON piesne.id_zbierka=zbierky.id_zbierka LEFT JOIN zberatelia on piesne.id_zberatel=zberatelia.id_zberatel LEFT JOIN digitalizatori ON piesne.id_digitalizator=digitalizatori.id_digitalizator LEFT JOIN hudobnici ON piesne.id_hudba=hudobnici.id_hudba 
LEFT JOIN tempo ON piesne.id_tempo=tempo.id_tempo WHERE piesne.id_piesen=$id";

//echo $query;

$q=mysql_query($query);
$piesen=mysql_fetch_object($q);

//Nemá parenta? Ak hej, vytiahni jeho údaje
if ($piesen->id_nadriadeny<>0) {
    $query2="SELECT piesne.id_piesen, piesne.id_nadriadeny, piesne.typ_nadriadeny, piesne.nazov_variant, piesne.id_zbierka, piesne.strana, piesne.nazov_variant, piesne.id_nadriadeny, piesne.identifikator, piesne.nazov_dlhy, piesne.nazov_kratky, piesne.id_zberatel, piesne.source_zberatel, piesne.id_zberatel_miesto, piesne.source_zberatel_miesto, piesne.id_zberatel_vyskyt, piesne.source_zberatel_vyskyt, piesne.datum_zbieranie, piesne.source_datum_zbieranie, piesne.datum_digitalizacia, piesne.id_digitalizator, piesne.id_hudba,piesne.id_tempo, piesne.source_tempo, piesne.id_incipit, piesne.lyrics, piesne.file_png, piesne.file_mp3, piesne.file_pdf, zbierky.nazov as zbierky_nazov, zberatelia.meno as zberatelia_meno, digitalizatori.meno as digitalizatori_meno, hudobnici.meno as hudobnici_meno, tempo.tempo, tempo.bpm FROM piesne LEFT JOIN zbierky ON piesne.id_zbierka=zbierky.id_zbierka LEFT JOIN zberatelia on piesne.id_zberatel=zberatelia.id_zberatel LEFT JOIN digitalizatori ON piesne.id_digitalizator=digitalizatori.id_digitalizator LEFT JOIN hudobnici ON piesne.id_hudba=hudobnici.id_hudba 
    LEFT JOIN tempo ON piesne.id_tempo=tempo.id_tempo WHERE piesne.id_piesen=$piesen->id_nadriadeny";
    $piesen_nadriadeny=mysql_fetch_object(mysql_query($query2));
    $id_nadriadeny=(int)$piesen->id_nadriadeny;
}


//$objPiesen=$piesen;


$arrPiesen = array(
        "id_piesen" => $piesen->id_piesen,
        "nazov_dlhy"=> (!empty($piesen->nazov_dlhy))?$piesen->nazov_dlhy:$piesen_nadriadeny->nazov_dlhy,
        "nazov_kratky" => (!empty($piesen->nazov_kratky))?$piesen->nazov_kratky:$piesen->nazov_kratky,
        "id_zbierka" => (!empty($piesen->id_zbierka))?$piesen->id_zbierka:$piesen_nadriadeny->id_zbierka,
        "strana" => (!empty($piesen->strana))?$piesen->strana:$piesen_nadriadeny->strana,
        "identifikator" => (!empty($piesen->identifikator))?$piesen->identifikator:$piesen_nadriadeny->identifikator,
        "nazov_kratky" => (!empty($piesen->nazov_kratky))?$piesen->nazov_kratky:$piesen_nadriadeny->nazov_kratky,
        "id_zberatel" => (!empty($piesen->id_zberatel))?$piesen->id_zberatel:$piesen_nadriadeny->id_zberatel,
        "source_zberatel" => (!empty($piesen->source_zberatel))?$piesen->source_zberatel:$piesen_nadriadeny->source_zberatel,
        "id_zberatel_miesto" => (!empty($piesen->id_zberatel_miesto))?$piesen->id_zberatel_miesto:$piesen_nadriadeny->id_zberatel_miesto,
        "source_zberatel_miesto" => (!empty($piesen->source_zberatel_miesto))?$piesen->source_zberatel_miesto:$piesen_nadriadeny->source_zberatel_miesto,
        "id_zberatel_vyskyt" => (!empty($piesen->id_zberatel_vyskyt))?$piesen->id_zberatel_vyskyt:$piesen_nadriadeny->id_zberatel_vyskyt,
        "datum_zbieranie" => (!empty($piesen->datum_zbieranie))?$piesen->datum_zbieranie:$piesen_nadriadeny->datum_zbieranie,
        "source_datum_zbieranie" => (!empty($piesen->source_datum_zbieranie))?$piesen->source_datum_zbieranie:$piesen_nadriadeny->source_datum_zbieranie,
        "datum_digitalizacia" => (!empty($piesen->datum_digitalizacia))?$piesen->datum_digitalizacia:$piesen_nadriadeny->datum_digitalizacia,
        "id_digitalizator" => (!empty($piesen->id_digitalizator))?$piesen->id_digitalizator:$piesen_nadriadeny->id_digitalizator,
        "id_hudba" => (!empty($piesen->id_hudba))?$piesen->id_hudba:$piesen_nadriadeny->id_hudba,
        "id_tempo" => (!empty($piesen->id_tempo))?$piesen->id_tempo:$piesen_nadriadeny->id_tempo,
        "source_tempo" => (!empty($piesen->source_tempo))?$piesen->source_tempo:$piesen_nadriadeny->source_tempo,
        "id_incipit" => (!empty($piesen->id_incipit))?$piesen->id_incipit:$piesen_nadriadeny->id_incipit,
        "lyrics" => (!empty($piesen->lyrics))?$piesen->lyrics:$piesen_nadriadeny->lyrics,
        "file_png" => (!empty($piesen->file_png))?$piesen->file_png:$piesen_nadriadeny->file_png,
        "file_mp3" => (!empty($piesen->file_mp3))?$piesen->file_mp3:$piesen_nadriadeny->file_mp3,
        "file_pdf" => (!empty($piesen->file_pdf))?$piesen->file_pdf:$piesen_nadriadeny->file_pdf,
        "zbierky_nazov" => (!empty($piesen->zbierky_nazov))?$piesen->zbierky_nazov:$piesen_nadriadeny->zbierky_nazov,
        "zberatelia_meno" => (!empty($piesen->zberatelia_meno))?$piesen->zberatelia_meno:$piesen_nadriadeny->zberatelia_meno,
        "digitalizatori_meno" => (!empty($piesen->digitalizatori_meno))?$piesen->digitalizatori_meno:$piesen_nadriadeny->digitalizatori_meno,
        "hudobnici_meno" => (!empty($piesen->hudobnici_meno))?$piesen->hudobnici_meno:$piesen_nadriadeny->hudobnici_meno,
        "tempo" => (!empty($piesen->tempo))?$piesen->tempo:$piesen_nadriadeny->tempo,
        "pdf_link" => (!empty($piesen->file_pdf))?"stiahnut.php?id=".$piesen->id_piesen."format=pdf":"stiahnut.php?id=".$piesen_nadriadeny->id_piesen."format=pdf",
        "xml_link" => (!empty($piesen->file_xml))?"stiahnut.php?id=".$piesen->id_piesen."format=xml":"stiahnut.php?id=".$piesen_nadriadeny->id_piesen."format=xml",
        "mp3_link" => (!empty($piesen->file_mp3))?"stiahnut.php?id=".$piesen->id_piesen."format=mp3":"stiahnut.php?id=".$piesen_nadriadeny->id_piesen."format=mp3"

);  


$objPiesen=(object)$arrPiesen;


//variantový pruh

if ($piesen->id_nadriadeny==0) { //tato piesen je hlavna, potom pridaj seba + jej varianty
    $q3=mysql_query("SELECT id_piesen, id_nadriadeny, typ_nadriadeny, nazov_variant FROM piesne WHERE (id_nadriadeny=$id OR id_piesen=$id)");



    while ($varianty_piesen=mysql_fetch_object($q3)) {
        $arrVarianty[]= array(
            "id_piesen" => $varianty_piesen->id_piesen,
            "id_nadriadeny" => $varianty_piesen->id_nadriadeny,
            "typ_nadriadeny" => $varianty_piesen->typ_nadriadeny,
            "nazov_variant" => $varianty_piesen->nazov_variant,
            "aktualna_piesen" => ($piesen->id_piesen==$varianty_piesen->id_piesen)?true:false
        );
    }



} else { //tato piesen je variant, potom pridaj varianty jej nadriadeneho (teda aj seba)
     $q3=mysql_query("SELECT id_piesen, id_nadriadeny, typ_nadriadeny, nazov_variant FROM piesne WHERE (id_nadriadeny=$id_nadriadeny OR id_piesen=$id_nadriadeny)");
    
    
    
    while ($varianty_piesen=mysql_fetch_object($q3)) {
        $arrVarianty[]= array(
            "id_piesen" => $varianty_piesen->id_piesen,
            "id_nadriadeny" => $varianty_piesen->id_nadriadeny,
            "typ_nadriadeny" => $varianty_piesen->typ_nadriadeny,
            "nazov_variant" => ($piesen->id_nadriadeny!=$varianty_piesen->id_piesen)?$varianty_piesen->nazov_variant:"Originál",
            "aktualna_piesen" => ($piesen->id_piesen==$varianty_piesen->id_piesen)?true:false
        );
    }



}


//print_r($arrVarianty);

//META
 $meta_type="article";
 $meta_desc="Táto pieseň pochádza z Ľuda Slovenského, najväčšej zbierky ľudovej hudby na Slovensku. Pozri si melódiu, noty a všetky informácie o nej. ";
 $meta_url="http://".$_SERVER['SERVER_NAME']."/piesne/piesen.php?".$piesen->id_piesen;

if ($piesen->id_nadriadeny==0) {
 $meta_title=$piesen->nazov_dlhy." ♬ ";
 //$meta_audio="http://".$_SERVER['SERVER_NAME']."/piesne/data/".$piesen->id_piesen."/".$piesen->file_mp3;
 $meta_image="http://".$_SERVER['SERVER_NAME']."/piesne/data/".$piesen->id_piesen."/".$piesen->file_png;
} else {
  $meta_title=(!empty($piesen->nazov_dlhy))?$piesen->nazov_dlhy." ♬ ":$piesen_nadriadeny->nazov_dlhy." ♬ ";
  //$meta_audio="http://".$_SERVER['SERVER_NAME']."/piesne/data/".$piesen->id_piesen."/".$piesen->file_mp3;
  $meta_image=(!empty($piesen->file_png))?"http://".$_SERVER['SERVER_NAME']."/piesne/data/".$piesen->id_piesen."/".$piesen->file_png:"http://".$_SERVER['SERVER_NAME']."/piesne/data/".$piesen_nadriadeny->id_piesen."/".$piesen_nadriadeny->file_png;
}

// podobne piesne TODO: nadriadeny
if ($piesen->id_nadriadeny==0) {
    $q_podobne=mysql_query(sprintf('SELECT file_mp3, file_png, id_vztahy_piesne, id_vztah, id_piesen1,id_piesen2, txt_piesen2, piesne.nazov_dlhy, piesne.nazov_kratky, piesne.id_piesen FROM vztahy_piesne, piesne WHERE (id_piesen1=%s OR id_piesen2=%s) AND (piesne.id_piesen=id_piesen1 OR piesne.id_piesen=id_piesen2);',(int)$id,(int)$id));
} else {
        $q_podobne=mysql_query(sprintf('SELECT file_mp3, file_png, id_vztahy_piesne, id_vztah, id_piesen1,id_piesen2, txt_piesen2, piesne.nazov_dlhy, piesne.nazov_kratky, piesne.id_piesen FROM vztahy_piesne, piesne WHERE (id_piesen1=%s OR id_piesen2=%s) AND (piesne.id_piesen=id_piesen1 OR piesne.id_piesen=id_piesen2);',$piesen->id_nadriadeny, $piesen->id_nadriadeny));
}


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

// odporucane piesne 
$query_odporucane=mysql_query("SELECT log.id_piesen, piesne.nazov_dlhy, piesne.file_mp3, piesne.file_png, piesne.nazov_kratky, sum(log.pocet) as videnia FROM log LEFT JOIN piesne ON piesne.id_piesen=log.id_piesen GROUP BY id_piesen ORDER BY videnia DESC LIMIT 10");
while ($o_odporucane=mysql_fetch_object($query_odporucane)) {
            $odporucane[] = array(
                "id_piesen" => $o_odporucane->id_piesen,
                "nazov_kratky" => $o_odporucane->nazov_kratky,
                "file_mp3" => ($o_odporucane->file_mp3=="" ? "" : "data/".$o_odporucane->id_piesen."/".$o_odporucane->file_mp3),
                "file_png" => ($o_odporucane->file_png=="" ? "/public/img/ludo_vyrez.png" : "data/".$o_odporucane->id_piesen."/".$o_odporucane->file_png)
            );


}





//poznamky

if ($piesen->id_nadriadeny==0) {
    $q_poznamky=mysql_query("SELECT * FROM poznamky WHERE id_piesen=$id");
} else {
    $q_poznamky=mysql_query("SELECT * FROM poznamky WHERE id_piesen=$piesen->id_nadriadeny");

}


while ($o_poznamky=mysql_fetch_object($q_poznamky)) {
    $poznamky[] = array(
        "id_druh"=>$o_poznamky->id_druh,
        "txt"=>$o_poznamky->txt);
}


//mapa

if ($piesen->id_nadriadeny==0) {

    $q_mapa=mysql_query(sprintf("SELECT * FROM lokality,lokality_piesne where lokality.id_lokalita=lokality_piesne.id_lokalita AND lokality_piesne.id_piesen=%s",(int)$id));
} else {
        $q_mapa=mysql_query(sprintf("SELECT * FROM lokality,lokality_piesne where lokality.id_lokalita=lokality_piesne.id_lokalita AND lokality_piesne.id_piesen=%s",(int)$piesen->id_nadriadeny));
}  



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


//klucove slova
/*
require_once $_SERVER["DOCUMENT_ROOT"]."/piesne/lib.piesne.php";
include $_SERVER["DOCUMENT_ROOT"]."/databaza_slova.php";

$slova_sklon=explode(" ", cleanlyrics_words($piesen->lyrics));

print_r($slova_sklon);

//print_r($slova_sklon);
foreach ($slova_sklon as &$word) {
    $word_zakl=zakladny_tvar($word);
    //echo $word."xxx";
   $klucove_slova[]=$word_zakl."(".zakladny_tvar_form($word).")";
}

$klucove_slova=array_unique($klucove_slova); */


//log reading
$datumcas = date('Y-m-d H:00:00');
$q_log=mysql_query("INSERT INTO log SET id_piesen = $piesen->id_piesen, datumcas = '$datumcas', pocet = 1 ON DUPLICATE KEY UPDATE pocet = pocet + 1");




// nacitanie informacii
require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_piesen_main.php");

?>