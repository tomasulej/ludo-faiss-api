<?php


//error_reporting(E_ALL);
//ini_set('display_errors', '1');

include "../kniznica.php";
include "../../databaza_slova.php";

$mod=$_POST['co'];
$typ = $_POST['ako'];


if ($mod=="hokej") {$tabulka="vogon_hokej";$max_id=57827;$podnadpis="<p><i>(hokej edition)</i></p>";}
if ($mod=="martinus") {$tabulka="vogon_martinus";$max_id=490485;$podnadpis="<p><i>(martinus edition)</i></p>";}

if ($mod=="tehulka") {$tabulka="vogon_tehulka";$max_id=9709;$podnadpis="<p><i>(tehuľka edition)</p></i>";}
if ($mod=="slovencina") {$tabulka="ma";$max_id=3294152;$podnadpis="";}


$co="

   <H1> Pekná krása </H1> 

 krása krásna už pekelne blíži,|1 <BR> 
 krásni ľudia skákali páska,|2 <BR> 
 po víťazstve slnko iba túži,$1 <BR> 
 krásne hviezdy chodili ružu.$2 <BR> 
 
  <BR> 
 
 Joj, Ameriku pekne porazíme,|1 <BR> 
  s nedokonalou láskou si to rozdáme,|2 <BR> 
  ľudí bezhlavo rozprášime$1 <BR> 
  a nad nepeknými Rusmi vyhráme.$2 <BR>  

Hurá! vy nesmierne diaľky! 
 
";

$co1="

 <H1>  </H1> 


 Pozdravujem vás, lesy, hory,|1 <BR> 
 z tej duše pozdravujem vás! <BR> 
 Čo mrcha svet v nás skvári, zmorí,$1 <BR> 
 zrak jeho urknul, zmámila|2 <BR> 
 lož, ohlušila presila:$2 <BR> 
 vy k žitiu privediete zas, <BR> 
 vy vzkriesite, vy zotavíte,|3 <BR> 
 z jatrivých vyliečite rán,|4 <BR> 
 v opravdu priamom, bratskom cite$3 <BR> 
 otvoriac lono dokorán,$4 <BR> 
 a srdečnosť kde odveká,|5 <BR> 
 kde nikdy nevyspela zrada,|6 <BR> 
 bez dotazu, kto on, čo hľadá,$6 <BR> 
 na lono to, hľa, v objem sladký|7 <BR> 
 ramenom láskyplnej matky$7 <BR> 
 pritúli verne človeka$5 <BR> 

";



$co2= "

 Ja sladké túžby, túžby po kráse|1 <BR> 
 spievam peknotou nadšený,|2 <BR> 
 a v tomto duše mojej ohlase$1 <BR> 
 svet môj je celý zavrený;$2 <BR> 
 z výsosti Tatier ona mi svieti,|3 <BR> 
 ona mi z ohňov nebeských letí,$2 <BR> 
 ona mi svety pohýna;|4 <BR> 
 ona mi kýva zo sto životov:|5 <BR> 
 No centrom, živlom, nebom, jednotou$5 <BR> 
 krás mojich moja Marína!$4 <BR> 
";


$co3="

 Jajže, bože, strach veliký|1 <BR> 
 padli Turci na poníky$1 <BR> 
 padli, padli o polnoci:|2 <BR> 
 Jajže, bože, niet pomoci.$2 <BR> 
 <BR> 
 Ľudia boží, utekajte,|3 <BR> 
 zajať Turkom sa nedajte:$3 <BR> 
 a čo mladé — zutekalo,|4 <BR> 
 a čo staré — nevládalo.$4 <BR> 

";


	

if ($typ=="hviezdoslav") {$a_co=explode(" ", $co1);$nadpis="<H1>P.O. Hviezdoslav: Hájnikova žena (vogónska verzia)</H1>";}
if ($typ=="sladkovic") {$a_co=explode(" ", $co2);$nadpis="<H1>Andrej Sládkovič: Marína (vogónska verzia)</H1>";}
if ($typ=="chalupka") {$a_co=explode(" ", $co3);$nadpis="<H1>Samo Chalupka: Turčín Poničan (vogónska verzia)</H1>";}



echo $nadpis;
echo $podnadpis;

$starttime = microtime(true);

//Do your query and stuff here

foreach ($a_co as &$word) {
  if ($word=="<BR>") {echo "<BR>";}
  if ($word=="<H1>") {echo "<H1>";}
  if ($word=="</H1>") {echo "</H1>";}
  
  
  	$word=str_replace(".","",$word);
	$word=str_replace(":","",$word);
	$word=str_replace("?","",$word);
	$word=str_replace("!","",$word);
	$word=str_replace(",","",$word);
	$word=str_replace(";","",$word);
	$word=strtolower($word);
	
	if (strpos($word,"|")>0) {
		list($word,$cislo)=explode("|",$word);
		$hladameKoncovku=true;
	} else {$hladameKoncovku=false;}
  
	
  	if (strpos($word,"$")>0) {
		list($word,$cislo2)=explode("$",$word);
		$koncovka=$rym[$cislo2];	
		//echo "<strong>".$koncovka."</strong>";		
	
		
	} else {$koncovka="";$cislo2=0;}
  
  
  
  unset($slovo);
  
  
  $q=mysql_query("SELECT * FROM ma WHERE word='$word' order by parent_freq LIMIT 1");
  
  
  $slovo_stare=mysql_fetch_object($q);
  
  
if ($slovo_stare->form<>"W")
{  
  mt_rand();
  
  if ($koncovka<>"") {

        
	  	  $random=mt_rand(1, $max_id)-mt_rand(1,20);
	  	  //echo $random;

	  	$sql="SELECT * FROM $tabulka WHERE (form='$slovo_stare->form') AND (koncovka_2='$koncovka') ORDER BY RAND() LIMIT 1";
		//echo "<p>$sql</p>";
		$q2=mysql_query($sql);

  } else {
  		  $random=mt_rand(1, $max_id)-mt_rand(1,20);
          //echo $random;
          
        $sql=sprintf("SELECT * FROM $tabulka WHERE form='%s' ORDER BY RAND() LIMIT 1",$slovo_stare->form);  
  				//echo "<p>$sql</p>";

  		$q2=mysql_query($sql);
	  
	  
  }
  
  

  $slovo_nove=mysql_fetch_object($q2);	 

  echo $slovo_nove->word.' ';
  
  if ($hladameKoncovku) {
	  $rym[$cislo]=substr($slovo_nove->word,-3);
	  //echo "<strong>".$rym[$cislo]."</strong>";		

  }
  
  
}
else {
	echo $word.' ';
	
}  




    
}


$endtime = microtime(true);
$duration = $endtime - $starttime; //calculates total time taken

//echo "<p>Trvalo to <strong>$duration sekúnd</strong>.</p>";	
	
?>	