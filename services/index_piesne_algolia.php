<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

  require_once($_SERVER["DOCUMENT_ROOT"].'/public/php/algolia/algoliasearch.php');

        include_once $_SERVER["DOCUMENT_ROOT"]."/databaza_slova.php";

  include ($_SERVER["DOCUMENT_ROOT"].'/databaza_piesne.php');
  include $_SERVER["DOCUMENT_ROOT"]."/piesne/lib.piesne.php";



$client = new \AlgoliaSearch\Client("35TGB7A4IL", "588386ed04fbcb8d39903d7e71c62126");
$index = $client->initIndex('piesne');

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
    include_once $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";
    
        $slova=array();
        $miesta=array();
        $miesta_lokality=array();
        $mena=array();

        $id=(int)$piesen->id_piesen;
    //mena
    mysql_connect("localhost","piesne","LudoLudoVedMaNeser");
    mysql_select_db("piesne");
    $q_mena=mysql_query("SELECT mena.id_meno,mena.meno,mena.pohlavie FROM mena, mena_piesne WHERE mena.id_meno=mena_piesne.id_meno AND mena_piesne.id_piesen=$id");
        while ($o_mena=mysql_fetch_object($q_mena)) {
            $mena[]=$o_mena->meno;
        }  
    //miesta
    mysql_connect("localhost","piesne","LudoLudoVedMaNeser");
    mysql_select_db("piesne");
    $q_mapa=mysql_query(sprintf("SELECT * FROM lokality,lokality_piesne where lokality.id_lokalita=lokality_piesne.id_lokalita AND lokality_piesne.id_piesen=%s",(int)$id));
        while ($lokality=mysql_fetch_object($q_mapa)) {
            $miesta[]=$lokality->meno;
            $miesta_lokality[]=$lokality->meno;
        }


        mysql_connect("localhost","piesne","LudoLudoVedMaNeser");
        mysql_select_db("piesne");
        
        $q_zberatel_miesto=mysql_query("SELECT * FROM lokality WHERE id_lokalita=$piesen->id_zberatel_miesto");
        $zberatel_miesto=mysql_fetch_object($q_zberatel_miesto);
        
        if (!is_null($zberatel_miesto->id_nadriadeny>0)) {
            $q_zberatel_miesto=mysql_query("SELECT * FROM lokality WHERE id_lokalita=$zberatel_miesto->id_nadriadeny");
            $zberatel_miesto=mysql_fetch_object($q_zberatel_miesto);
        }    
        
        $miesta[].=$zberatel_miesto->meno;
        mysql_connect("localhost","piesne","LudoLudoVedMaNeser");
        mysql_select_db("piesne");
        
        $q_zberatel_vyskyt=mysql_query("SELECT * FROM lokality WHERE id_lokalita=$piesen->id_zberatel_vyskyt");
        $zberatel_vyskyt=mysql_fetch_object($q_zberatel_vyskyt);
        
        if (!is_null($zberatel_vyskyt->id_nadriadeny)) {
            $q_zberatel_vyskyt=mysql_query("SELECT * FROM lokality WHERE id_lokalita=$zberatel_vyskyt->id_nadriadeny");
            $zberatel_vyskyt=mysql_fetch_object($q_zberatel_vyskyt);
            
        } 
        $miesta[].=$zberatel_vyskyt->meno;
    
     if (mysql_num_rows($q_zberatel_miesto)==0 AND mysql_num_rows($q_zberatel_vyskyt)==0) {$miesta[]="(Neuvedené)";}




    //slova
        //include_once $_SERVER["DOCUMENT_ROOT"]."/databaza_slova.php";
        mysql_connect("localhost","slova","LudoLudoVedMaNeser");
        mysql_select_db("slova");
        $slova_sklon=explode(" ", cleanlyrics_words($piesen->lyrics));
        //print_r($slova_sklon);
        foreach ($slova_sklon as &$word) {
            $word_zakl=zakladny_tvar($word);
 

            if (je_plnovyznamove(zakladny_tvar_form($word))) {
                $slova[]=$word_zakl;
            }  
        }
        $slova=array_unique($slova); 

        $oneDim = array();
            foreach($slova as $i) {
                $oneDim[] = $i;
        }
        //$slova=array();
        $slova=$oneDim;

print_r($miesta);

    //tempa
    if ($piesen->tempo_bpm>0) {
        if ($piesen->tempo_bpm<60) {$tempo_kategoria="Pomalé";} else if ($piesen->tempo_bpm<150){$tempo_kategoria="Stredne rýchle";} else {$tempo_kategoria="Rýchle";}
    }


      $index->addObject(
        [
            'objectID' => $piesen->id_piesen,
            'id_piesen' => $piesen->id_piesen,
            'nazov_dlhy' => $piesen->nazov_dlhy,
            'zbierka_nazov' => $piesen->zbierky_nazov,
            'identifikator' => $piesen->identifikator,
            'strana' => $piesen->strana,
            'zberatelia_meno' => $piesen->zberatelia_meno,
            'datum_zbieranie'=>$piesen->datum_zbieranie,
            'datum_digitalizacia' => $piesen->datum_digitalizacia,
            'digitalizatori' => array($piesen->digitalizatori_meno, $piesen->digitalizatori2_meno),
            'hudobnici_meno' => $piesen->hudobnici_meno,
            'tempo' => array($piesen->tempo1,$piesen->tempo2),
            'lyrics_snippet' => cleanlyrics($piesen->lyrics),
            'lyrics_full' => cleanlyrics_words($piesen->lyrics),
            'file_png' => $piesen->file_png,
            'file_mp3' => $piesen->file_mp3,
            'krsne_mena' => $mena, 
            'miesta'=>$miesta, //xxx
            'zberatel_miesto'=>$zberatel_miesto->meno,
            'zberatel_vyskyt'=>$zberatel_vyskyt->meno,
            'nazvy_v_texte'=>$miesta_lokality,
            'slova'=>$slova, 
            'tempo_bpm'=>(int)$piesen->tempo_bpm,
            'tempo_kategoria'=>$tempo_kategoria

        ]
    ); 

    

}












?>
