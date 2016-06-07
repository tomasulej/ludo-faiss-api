<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');



function lyrics2html($lyrics) 
	{


//slohy
$nove_lyrics=str_replace("{", "<li class='sloha'>", $lyrics);
$nove_lyrics=str_replace("}", "</li>", $nove_lyrics);
$nove_lyrics="<ol>".$nove_lyrics."</ol>";



//takty
$counter=0;
$needle = "|";
$lastPos = 0;
$odkial_strihaj=0;
$positions = array();



//echo $lyrics;

while (($lastPos = strpos($nove_lyrics, $needle, $lastPos))!== false) {
    //$positions[] = $lastPos;
	
		
	$newPos=$lastPos + strlen($needle);
    $nove_lyrics2.=sprintf("<span id='l%s' class='%s'>%s</span>", $counter, "slova", substr($nove_lyrics,$odkial_strihaj,$lastPos-$odkial_strihaj));
    
    $lastPos = $newPos;
	$odkial_strihaj=$lastPos;
	$counter++;
	
}









	
	return $nove_lyrics2;
	}


$id=array_keys($_GET)[0];

include "../databaza_piesne.php";

$q=mysql_query("SELECT * FROM piesne, zbierky, zberatelia, digitalizatori, hudobnici WHERE (id_piesen=$id AND piesne.id_zbierka=zbierky.id_zbierka AND piesne.id_zberatel=zberatelia.id_zberatel AND piesne.id_digitalizator=digitalizatori.id_digitalizator AND piesne.id_hudba=hudobnici.id_hudba)");
$piesen=mysql_fetch_object($q);


 $tmpl_piesen=implode('', file('tmpl_piesen.html'));




$piesen_info=sprintf('
<strong>Dlhý názov</strong>: %s<BR>
<strong>Krátky názov</strong>: %s<BR>
<strong>Zbierka</strong>: <BR>
<strong>Identifikátor</strong>: <BR>
<strong>Zberateľ</strong>: <BR>
<strong>Digitalizátor</strong>: <BR>
<strong>Hudba</strong>: <BR>
<strong>Tempo</strong>: <BR>
<strong>Dátum zozbierania</strong>: <BR>
<strong>Dátum digitalizácie</strong>: <BR>

', $piesen->nazov_dlhy, $piesen->nazov_kratky);



$q_poznamky=mysql_query("SELECT * FROM poznamky WHERE id_piesen=$id");

$poznamky="<ol>";
while ($o_poznamky=mysql_fetch_object($q_poznamky)) {
	$poznamky.=sprintf("<li>%s</li>",$o_poznamky->txt);
	
}
$poznamky.="</ol>";

//echo $piesen->lyrics;


$vypis=sprintf($tmpl_piesen, $piesen->nazov_dlhy, lyrics2html($piesen->lyrics), $poznamky, $piesen_info);

echo $vypis;

?>

