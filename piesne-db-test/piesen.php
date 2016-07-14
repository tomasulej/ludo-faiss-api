<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');



function lyrics2html($lyrics) 
{
				
				
	//slohy
	$nove_lyrics=str_replace("{", "<li class='sloha'>", $lyrics);
	$nove_lyrics=str_replace("}", "</li>", $nove_lyrics);
	$nove_lyrics="<ol>".$nove_lyrics."</ol>";
				


	//nové riadky
	$nove_lyrics=nl2br($nove_lyrics);

	//opakovania
	//$nove_lyrics=str_replace("/:", "<big>&#x1d106;</big>", $nove_lyrics);
	//$nove_lyrics=str_replace(":/", "<big>𝄇</big>", $nove_lyrics);
	

				
	//takty
	$counter=0;
	$needle = "|";
	$lastPos = 0;
	$odkial_strihaj=0;
	$positions = array();
				
	while (($lastPos = strpos($nove_lyrics, $needle, $lastPos))!== false) {
				    //$positions[] = $lastPos;
					
						
		$newPos=$lastPos + strlen($needle);
		$nove_lyrics2.=sprintf("<span id='l%s' class='%s'>%s</span>", 
		   $counter, "slova", substr($nove_lyrics,$odkial_strihaj,$lastPos-$odkial_strihaj));
				    
		$lastPos = $newPos;
		$odkial_strihaj=$lastPos;
		$counter++;
					
	}
					
	return $nove_lyrics2;
}


$id=(int)array_keys($_GET)[0];

include "../databaza_piesne.php";

$q=mysql_query("SELECT piesne.id_piesen, piesne.id_zbierka, piesne.nazov_variant, piesne.id_nadriadeny, piesne.identifikator, piesne.nazov_dlhy, piesne.nazov_kratky, piesne.id_zberatel, piesne.id_zberatel_miesto, piesne.id_zberatel_vyskyt, piesne.datum_zbieranie, piesne.datum_digitalizacia, piesne.datum_digitalizacia, piesne.id_digitalizator, piesne.id_hudba,piesne.id_tempo, piesne.id_incipit, piesne.lyrics, zbierky.nazov as zbierky_nazov, zberatelia.meno as zberatelia_meno, digitalizatori.meno as digitalizatori_meno, hudobnici.meno as hudobnici_meno, lokality.meno as lokality_meno, lokality.meno_original as lokality_meno_original, lokality.area as lokality_area, lokality.typ_id as lokality_typ_id FROM piesne, zbierky, zberatelia, digitalizatori, hudobnici, lokality WHERE (id_piesen=$id AND piesne.id_zbierka=zbierky.id_zbierka AND piesne.id_zberatel=zberatelia.id_zberatel AND piesne.id_digitalizator=digitalizatori.id_digitalizator AND piesne.id_hudba=hudobnici.id_hudba AND piesne.id_zberatel_miesto=lokality.id_lokalita AND piesne.id_zberatel_vyskyt=lokality.id_lokalita)");
$piesen=mysql_fetch_object($q);

//templates load
 $tmpl_piesen=implode('', file('tmpl_piesen.html'));
 $tmpl_mapa=implode('',file('tmpl_mapa.html'));
 $tmpl_mapa_point=implode('',file('tmpl_mapa_point.html'));



$piesen_info=sprintf('
<strong>Dlhý názov</strong>: %s<BR>
<strong>Krátky názov</strong>: %s<BR>
<strong>Zbierka</strong>: %s <BR>
<strong>Identifikátor</strong>: %s <BR>
<strong>Zberateľ</strong>: %s<BR>
<strong>Digitalizátor</strong>: %s<BR>
<strong>Hudba</strong>: %s<BR>
<strong>Tempo</strong>: %s<BR>
<strong>Dátum zozbierania</strong>: %s<BR>
<strong>Dátum digitalizácie</strong>: %s<BR>
<strong>Lokality:</strong>: %s (%s)<BR>


', $piesen->nazov_dlhy, $piesen->nazov_kratky, $piesen->zbierky_nazov, $piesen->identifikator, $piesen->zberatelia_meno, $piesen->digitalizatori_meno, $piesen->hudobnici->meno, $piesen->tempo, $piesen->datum_zbieranie, $piesen->datum_digitalizacia, $piesen->lokality_meno,$piesen->lokality_meno_original);



//poznamky

$q_poznamky=mysql_query("SELECT * FROM poznamky WHERE id_piesen=$id");

$poznamky="<ol>";
while ($o_poznamky=mysql_fetch_object($q_poznamky)) {
	$poznamky.=sprintf("<li>%s</li>",$o_poznamky->txt);
	
}
$poznamky.="</ol>";



// podobne piesne
$tmpl_podobne='<div class="row">
<h4>Podobné piesne:</h4>
%s
</div>';
$tmpl_podobne_card='  <div class="col-sm-4">
    <div class="card">


  <div class="card-block">

    <h4 class="card-title"><a href="piesen.php?%s">%s</a></h4>
  <div style="height:120px;width:120px"><a href="piesen.php?%s" class="btn btn-sm btn-primary">&#9654;
<img src="%s/%s" class="img-fluid" style="position:absolute;"></a></div>

  </div>
</div>
  </div>';



$q_podobne=mysql_query(sprintf('SELECT file_mp3, id_vztahy_piesne, id_piesen1,id_piesen2, txt_piesen2, piesne.nazov_dlhy, piesne.id_piesen FROM vztahy_piesne, piesne WHERE (id_piesen1=%s OR id_piesen2=%s) AND (piesne.id_piesen=id_piesen1 OR piesne.id_piesen=id_piesen2);',(int)$id,(int)$id));

while ($o_podobne=mysql_fetch_object($q_podobne)) {
	
	if ($o_podobne->txt_piesen2=="")  {
		if ($o_podobne->id_piesen<>(int)$id) { 
			//$podobne.=sprintf("<a href='piesen.php?%s'>%s</a>, ",$o_podobne->id_piesen,$o_podobne->nazov_dlhy);
			$podobne.=sprintf($tmpl_podobne_card,$o_podobne->id_piesen, $o_podobne->nazov_dlhy,$o_podobne->id_piesen, $o_podobne->id_piesen, str_replace("mp3", "png",$o_podobne->file_mp3)); 
		}

	} else {
		//$podobne.=sprintf("<a href='#'>%s</a>, ",$o_podobne->txt_piesen2);
		
	}

}

//$search = ',';
//$replace = ' a';
//$podobne=substr($podobne, 0, strlen($podobne) - 2);
//$podobne=strrev(implode(strrev($replace), explode(strrev($search), strrev($podobne), 2))); //output: bourbon, scotch, and beer

$podobne=sprintf($tmpl_podobne,$podobne);





//mapa

$q_mapa=mysql_query(sprintf("SELECT * FROM lokality,lokality_piesne where lokality.id_lokalita=lokality_piesne.id_lokalita AND lokality_piesne.id_piesen=%s",(int)$id));

while ($lokality=mysql_fetch_object($q_mapa)) {
	$c++;
	$txt_lok.=sprintf("<a href='lok.php?id=%s'>%s</a>, ",$lokality->id_lokalita,$lokality->meno);
	if ($lokality->area<>""){
		$js_add_point.=sprintf($tmpl_mapa_point,"p_".$c,$lokality->area,"p_".$c,"p_".$c);
	}
}



$txt_lok=substr($txt_lok, 0, strlen($txt_lok) - 2);

$txt_lok=strrev(implode(strrev($replace), explode(strrev($search), strrev($txt_lok), 2))); //output: bourbon, scotch, and beer
$zbieranie=sprintf("<a href='lok.php?id=%s'>%s</a>",$piesen->lokalita_id,$piesen->lokality_meno);


if (($piesen->lokality_area<>"") OR ($txt_lok<>"")) {
	$mapa=sprintf($tmpl_mapa,$zbieranie,$txt_lok, $piesen->lokality_area,$js_add_point);
	//echo $mapa;
}









//vypis
$vypis=sprintf($tmpl_piesen,  $piesen->nazov_dlhy, $piesen->zberatel_id, $piesen->zberatelia_meno, $piesen->id_digitalizator, $piesen->digitalizatori_meno, lyrics2html($piesen->lyrics), $podobne, $poznamky, $piesen_info, $mapa);

echo $vypis;

?>

