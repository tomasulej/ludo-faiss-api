<?
  //ini_set('E_ERROR', E_ALL);
  //ini_set('display_errors', true);
include "/../databaza.php";
include "prislovia.inc.php";

$tmpl_kategoria= implode('', file('tmpl_kategoria.html'));
$tmpl_box= implode('', file('tmpl_box.html'));
$tmpl_prislovie= implode('', file('tmpl_prislovie.html'));

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
       $poznamky_all=sprintf('<blockquote><small><ol>%s</ol></small></blockquote>', 
                              $poznamky[$prislovie->id]);
    } else {$poznamky_all="";} 
    
    //Ak ma kluc_slovo, zoradime pod klucove slovo, inac dame do pola prislovi

    if ($prislovie->klu_id>0) {
       $kluc_slova[$prislovie->klu_id].=sprintf($tmpl_prislovie, $prislovie->zat_id, $prislovie->txt, $prislovie->utv_id, $utvary[$prislovie->utv_id], $poznamky_all);
    } else {
       $kapitoly[$prislovie->kap_id].=sprintf($tmpl_prislovie, $prislovie->zat_id, $prislovie->txt, $prislovie->utv_id, $utvary[$prislovie->utv_id], $poznamky_all);    
    }
    
 }



//VOLANIE KLUC SLOV
$kluc_kap=array();
$q_kluc=mysql_query(make_call($arrkat, "*", "pr_kluc", "kap_id"));
  while ($kluc=mysql_fetch_object($q_kluc)) {
     $kluc_kap[$kluc->kap_id].=sprintf('
<a name="kluc_%s"></a><H2><font color=gold>%s</font></H2>
<div class="kluc_slovo">%s</div><BR><HR>', $kluc->id, $kluc->txt, $kluc_slova[$kluc->id]);
     $kluc_mapa.=sprintf('<a href="#kluc_%s">%s</a>, ', $kluc->id, $kluc->txt);
  
  }




//VYPIS NA STRANKU
  foreach ($arrkat as $key=>$value) {
    $obsah.="<H1>".kat_namebyid($value)."</H1>";
   if ($kapitoly[$value]<>"") {$obsah.="<div class='kluc_slovo'>".$kapitoly[$value]."</div>";}  
   if ($kluc_kap[$value]<>"") {$obsah.=$kluc_kap[$value];} 
     
     
  }


printf($tmpl_kategoria, kat_namebyid($_GET['id']), sprintf($tmpl_box, kat_namebyid($_GET['id'])), $kluc_mapa, $obsah);
?>

