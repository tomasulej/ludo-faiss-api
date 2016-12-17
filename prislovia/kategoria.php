<?php
//includes
include $_SERVER["DOCUMENT_ROOT"]."/databaza_prislovia.php";



  //ini_set('E_ERROR', E_ALL);
  //ini_set('display_errors', true);

include "kategoria.inc.php";


//META
$meta_type="article";
$meta_title="Ľudo Slovenský: príslovia a porekadlá na tému ".kat_namebyid($_GET['id']);
$meta_image="http://www.ludoslovensky.sk/public/img/ludo-prislovia.png";
$meta_url="http://".$_SERVER['SERVER_NAME']."/prislovia/kategoria.php?".$_GET['id'];
$meta_desc="Ľudo slovenský radí a poradí aj Tebe. Príď sa pozrieť na 12-tisíc jeho porekadiel a prísloví";








//tmpls
$tmpl_prislovie= "<p id=\"prislovie_%s\"><a class='prislovie' data-toggle=\"popover\"  
data-content=\"<div class='quote-popover'>%s</div>\" href=\"prislovie.php?id=%s\">%s</a></p>";




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


             //$kluc_slova[$prislovie->klu_id].=sprintf('<div class="row riadok"><div class="col-md-1"></div><div class="col-md-10"><p class="utvar">%s</div></div>',$utvary[$prislovie->utv_id]);

             $kluc_slova[$prislovie->klu_id].=sprintf('<h4 class="utvar">%s</h4>',$utvary[$prislovie->utv_id]);



         }
         $aktUtvar=$prislovie->utv_id;




         $pozn_box=sprintf("<big>„%s“</big><div class='fb-like' data-href='http://www.ludoslovensky.sk/prislovia/prislovie.php?id=%s' data-layout='button_count' data-action='like' data-show-faces='true' data-share='false'></div><hr><small><ul>%s</ul></small>", $prislovie->txt, $prislovie->id, $poznamky[$prislovie->id]);

         $kluc_slova[$prislovie->klu_id].=sprintf($tmpl_prislovie,
             $prislovie->id, $pozn_box, $prislovie->id, $prislovie->txt);


     } else {
         //if (is_int(($prislovie->zat_id)/10)) {
         //$vypis_cislo=$prislovie->zat_id;
         //} else {$vypis_cislo="";};


         //útvar
         if ($aktUtvar<>$prislovie->utv_id) {
             //$kluc_slova[$prislovie->klu_id].=sprintf('<div class="row riadok"><div class="col-md-1"></div><div class="col-md-10"><p class="utvar">%s</div></div>',$utvary[$prislovie->utv_id]);

             $kluc_slova[$prislovie->klu_id].=sprintf('<h4 class="utvar">%s</h4>',$utvary[$prislovie->utv_id]);




         }
         $aktUtvar=$prislovie->utv_id;

         $pozn_box=sprintf("<big>„%s“</big><div class='fb-like' data-href='http://www.ludoslovensky.sk/prislovia/prislovie.php?id=%s' data-layout='button_count' data-action='like' data-show-faces='true' data-share='false'></div><hr><small><ul>%s</ul></small>", $prislovie->txt, $prislovie->id, $poznamky[$prislovie->id]);

         $kapitoly[$prislovie->kap_id].=sprintf($tmpl_prislovie, $prislovie->id, $pozn_box, $prislovie->id, $prislovie->txt);
     }

 }



//VOLANIE KLUC SLOV
$kluc_kap=array();
$q_kluc=mysql_query(make_call($arrkat, "*", "pr_kluc", "kap_id"));
  while ($kluc=mysql_fetch_object($q_kluc)) {

      /*
   $kluc_kap[$kluc->kap_id].=sprintf('
  <div class="row riadok"><div class="col-md-1"></div><div class="col-md-11"><p class="klucove_slovo">%s</p></div></div>
  %s', $kluc->txt, $kluc_slova[$kluc->id]);
  */


      $tag_array=explode(",", $kluc->txt);


      $tags="";
      foreach ($tag_array as $value) {

          $tags.=sprintf('<span class="tag tag-default" style="text-transform: uppercase;">%s</span> ', $value);
      }

            $tags="<h4>".$tags."</h4>";

      $kluc_kap[$kluc->kap_id].=sprintf('
    <div class="tags">
	%s
	</div>%s',
          $tags, $kluc_slova[$kluc->id]);



      $kluc_mapa.=sprintf('<a href="#kluc_%s">%s</a>, ', $kluc->id, $kluc->txt);

  }



//zoznam kapitol
  $q=mysql_query("SELECT * FROM pr_kategorie WHERE parent_id=0 ORDER BY id, parent_id");
     while($kapitola=mysql_fetch_object($q)) {
         $i++;
         if ($kapitola->id==$_GET['id']) {
             $zoznam_kapitol.=sprintf('<a href="kategoria.php?id=%s">%s</a>', $kapitola->id, $kapitola->txt);
         } else {
             $zoznam_kapitol.=sprintf('<a href="kategoria.php?id=%s">%s</a>', $kapitola->id, $kapitola->txt);

         }
     }



//zoznam podkapitol
   $zoznam_podkapitol=new_kat_vypis_vlavo($_GET['id'],0,0);

//VYPIS NA STRANKU
  foreach ($arrkat as $key=>$value) {
      if ($value<>$_GET['id']) $obsah.="<H2>".kat_namebyid($value)."<a  id='kategoria_".$value."'></a></H2>";
      if ($kapitoly[$value]<>"") {$obsah.=$kapitoly[$value];}
      if ($kluc_kap[$value]<>"") {$obsah.=$kluc_kap[$value]."</article>";}


  }


  //kapitoly dolava

$id_kapitola=(int)$_GET['id'];

$q_vlavo=mysql_query("SELECT id,parent_id,txt FROM pr_kategorie WHERE parent_id=$id_kapitola");

while ($kap=mysql_fetch_object($q_vlavo)) {
    $counter++;

    $kapitoly_final.=sprintf("<li class=\"nav-item\"><a class=\"nav-link\" href=\"#kategoria_%s\" style='text-transform: uppercase'>%s. &nbsp; &nbsp;%s</a></li>",
        $kap->id,$counter,$kap->txt);

}


//$hlavicka=sprintf($tmpl_hlavicka,""," active", "", kat_namebyid($_GET['id']));
//$paticka= sprintf(implode('', file('tmpl_paticka.html')));

//printf($tmpl_kategoria, kat_namebyid($_GET['id']), kat_namebyid($_GET['id']), $hlavicka, $zoznam_podkapitol, $obsah, $paticka, $tmpl_analytics);
$prislovia_final=$obsah;












// nacitanie informacii
require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_prislovia_kategoria.php");

?>