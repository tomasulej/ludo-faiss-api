<?php
  ini_set('E_ERROR', E_ALL);
  ini_set('display_errors', true);

include "databaza.php";
include "prislovia.inc.php";

$tmpl_kategoria= implode('', file('tmpl_kategoria.html'));
$tmpl_prislovie= implode('', file('tmpl_prislovie.html'));
$tmpl_hlavicka= implode('', file('tmpl_hlavicka.html'));



$kat= kat_make_array();
$arrkat=kat_id_array2($_GET['id'], $kat); //ID prislusnych kapitol do ARRAY

$arrtxt=txt_id_array($arrkat); //ID prislusnych prislovi do ARRAY



//POZNAMKY
$poznamky=array();
$q_poznamky=mysql_query(make_call($arrtxt, "*", "pr_poznamky", "txt_id"));
  while ($poznamka=mysql_fetch_object($q_poznamky)) {
     $poznamky[$poznamka->txt_id].=sprintf('<li>%s</li>', $poznamka->txt);  
  }

//UTVARY
$utvary=array();
$q_utvary=mysql_query("SELECT * FROM pr_utvary");
  while ($utvar=mysql_fetch_object($q_utvary)) {
     $utvary[$utvar->id]=$utvar->txt;  
  }





//VOLANIE PRISLOVI
$query= make_call($arrkat,"*", "pr_txt", "kap_id");
$q=mysql_query($query);
    $kluc_slova=array();
    $kapitoly=array();
 while ($prislovie=mysql_fetch_object($q)) {
    //Skompilujeme poznamky do $poznamky_all
    if ($poznamky[$prislovie->id]<>"") {
       $poznamky_all=sprintf('%s', $poznamky[$prislovie->id]);
    } else {$poznamky_all="";} 
    
    //Ak ma kluc_slovo, zoradime pod klucove slovo, inac dame do pola prislovi

    if ($prislovie->klu_id>0) {
       //if (is_int(($prislovie->zat_id)/10)) {
       //$vypis_cislo=$prislovie->zat_id;
       //} else {$vypis_cislo="";}; 


       //útvar
       if ($aktUtvar<>$prislovie->utv_id) {
	    $kluc_slova[$prislovie->klu_id].=sprintf('<div class="row riadok"><div class="col-md-1"></div><div class="col-md-10"><p class="utvar">%s</div></div>',$utvary[$prislovie->utv_id]);    
      }
        $aktUtvar=$prislovie->utv_id;






       $kluc_slova[$prislovie->klu_id].=sprintf($tmpl_prislovie, $prislovie->id, $prislovie->id, $prislovie->id, $prislovie->txt);
       
       
    } else {
              //if (is_int(($prislovie->zat_id)/10)) {
              //$vypis_cislo=$prislovie->zat_id;
              //} else {$vypis_cislo="";}; 
              
              
              //útvar
       if ($aktUtvar<>$prislovie->utv_id) {
	    $kluc_slova[$prislovie->klu_id].=sprintf('<div class="row riadok"><div class="col-md-1"></div><div class="col-md-10"><p class="utvar">%s</div></div>',$utvary[$prislovie->utv_id]);    
      }
        $aktUtvar=$prislovie->utv_id;       

       $kapitoly[$prislovie->kap_id].=sprintf($tmpl_prislovie, $prislovie->id, $prislovie->id, $prislovie->id, $prislovie->txt);    
    }
    
 }



//VOLANIE KLUC SLOV
$kluc_kap=array();
$q_kluc=mysql_query(make_call($arrkat, "*", "pr_kluc", "kap_id"));
  while ($kluc=mysql_fetch_object($q_kluc)) {
     
     $kluc_kap[$kluc->kap_id].=sprintf('
<div class="row riadok"><div class="col-md-1"></div><div class="col-md-11"><p class="klucove_slovo">%s</p></div></div>
%s', $kluc->txt, $kluc_slova[$kluc->id]);
     $kluc_mapa.=sprintf('<a href="#kluc_%s">%s</a>, ', $kluc->id, $kluc->txt);
  
  }



//zoznam kapitol
  $q=mysql_query("SELECT * FROM pr_kategorie WHERE parent_id=0 ORDER BY id, parent_id");
     while($kapitola=mysql_fetch_object($q)) {
        $i++;
     if ($kapitola->id==$_GET['id']) {
        $zoznam_kapitol.=sprintf('<li class="active"><a href="kategoria.php?id=%s">%s</a></li>', $kapitola->id, $kapitola->txt);     
     } else {
        $zoznam_kapitol.=sprintf('<li><a href="kategoria.php?id=%s">%s</a></li>', $kapitola->id, $kapitola->txt);     
       
     }
     }  



//zoznam podkapitol
   $zoznam_podkapitol=kat_vypis_vlavo($_GET['id'],0,0);

//VYPIS NA STRANKU
  foreach ($arrkat as $key=>$value) {
   if ($value<>$_GET['id']) $obsah.="<section id='kategoria_".$value."'><div class='page-header'><H2>".kat_namebyid($value)."</H2></div>";
   if ($kapitoly[$value]<>"") {$obsah.=$kapitoly[$value];}  
   if ($kluc_kap[$value]<>"") {$obsah.=$kluc_kap[$value]."</section>";} 
     
     
  }



   
$hlavicka=sprintf($tmpl_hlavicka," ","active", "Hľadať", " ");


printf($tmpl_kategoria, kat_namebyid($_GET['id']), kat_namebyid($_GET['id']), $hlavicka, $zoznam_podkapitol, kat_namebyid($_GET['id']), " ", $obsah);


?>

