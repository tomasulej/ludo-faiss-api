<?php 

$id_piesen=(int)$_POST['id_piesen'];
if ($id_piesen==0) {$id_piesen=$_GET['id_piesen'];}


$nadpis="Pridávanie piesne: meta informácie (krok 1/5)";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_administracia_header.php";
?>


<div class="l-page">
<style>p.text-muted {display:none} </style>
    <div class="container">



<form action="02_subory.php" method="post" class="l-form l-well">
<?php
include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";


	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');

//echo "<H1>".(int)$_GET['id_piesen']."</H1>";


if ((int)$_GET['id_piesen']<>0) {
  $q_edit=mysql_query(sprintf("SELECT * FROM piesne WHERE id_piesen=%s",(int)$_GET['id_piesen']));
  $p_edit=mysql_fetch_object( $q_edit);
if ($p_edit->id_nadriadeny<>0) {
    $q_edit=mysql_query(sprintf("SELECT * FROM piesne WHERE id_piesen=%s",$p_edit->id_nadriadeny));
    $p_edit=mysql_fetch_object( $q_edit);
  
  ?>

  <div class="alert alert-info" role="alert">
  <strong>Edituješ variant a nechceš nič meniť v týchto údajoch?</strong> <a href="02_subory.php?id_piesen=<?php echo $id_piesen; ?>"> Poď na ďalší krok >></a>
</div>


  <?php
}


};


?>	
	  



	  
  <div class="form-group row">	  




    <label for="id_zbierka" class="col-sm-4 form-control-label"><strong>Zbierka:</strong></label>
    <div class="col-sm-8">
    <select class="form-control" id="id_zbierka" name="id_zbierka">
		<?php
			$q=mysql_query("SELECT * FROM zbierky;");
			while ($zbierky=mysql_fetch_object($q)) {
        if ($p_edit->id_zbierka==$zbierky->id_zbierka) {
          			    printf("<option value='%s' selected>%s</option>",$zbierky->id_zbierka,$zbierky->nazov);	

        } else {

			    printf("<option value='%s'>%s</option>",$zbierky->id_zbierka,$zbierky->nazov);	
        }
      }
			
		?>
    </select>



    </div>

  </div>	  
	  
	  
	  
  <div class="form-group row">
    <label for="identifikator" class="col-sm-4 form-control-label"><strong>Interný identifikátor:</strong></label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="identifikator" name="identifikator" placeholder="Identifikátor (napr. '231., '232b' a podobne." value="<?php  echo $p_edit->identifikator ?>"
      <p class="form-text text-muted">(nemusíte meniť)</p>
 </div>
  </div>


  <div class="form-group row">
    <label for="nazov_dlhy" class="col-sm-4 form-control-label"><strong>Dlhý názov:</strong></label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="nazov_dlhy" name="nazov_dlhy" placeholder="Dlhý názov piesne (napr. 'Na Kráľovej holi stojí strom zelený')" value="<?php  echo $p_edit->nazov_dlhy ?>">
    <p class="form-text text-muted">Začiatočné slová piesne (dlhšia verzia)- bude sa zobrazovať ako nadpis piesne</p>

    </div>
  </div>
  
    <div class="form-group row">
    <label for="nazov_kratky" class="col-sm-4 form-control-label"><strong>Krátky názov:</strong></label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="nazov_kratky" name="nazov_kratky" placeholder="Skrátený názov piesne (napr. 'Na Kráľovej holi...')" value="<?php  echo $p_edit->nazov_kratky ?>">
        <p class="form-text text-muted">Začiatočné slová piesne (kratšia verzia) - bude sa zobrazovať v podobných piesňach a iných miestach, kde nie je priestor zobraziť celý názov</p>

    </div>
  </div>	  


    <div class="form-group row">
    <label for="strana" class="col-sm-4 form-control-label"><strong>Strana:</strong></label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="strana" name="strana" placeholder="Strana, resp. na ktorej sa nachádza pieseň" value="<?php  echo $p_edit->strana ?>">
              <p class="form-text text-muted">Pozrite v PDF súbore na ktorých stranách sa v origináli nachádzala pieseň. Napr. "54", "55-56".</p>

    </div>
  </div>


	  
  <div class="form-group row">	  

    <label for="id_zberatel" class="col-sm-4 form-control-label"><strong>Zberateľ:</strong></label>
    <div class="col-sm-8">
    <select class="form-control" id="id_zberatel" name="id_zberatel">


    <option value='-1'>(Meno chýba v zozname)</option>


		<?php
			$q=mysql_query("SELECT * FROM zberatelia ORDER BY meno;");
			while ($zberatelia=mysql_fetch_object($q)) {

        
      if ($p_edit->id_zberatel==$zberatelia->id_zberatel) {
  			  printf("<option value='%s' selected>%s</option>",$zberatelia->id_zberatel,$zberatelia->meno);	
      
      } else {
			    printf("<option value='%s' %s>%s</option>",$zberatelia->id_zberatel,(empty($p_edit->id_zberatel)) ? "selected":"",$zberatelia->meno);	
      }


			}
			
  



		?>
    </select>


    <p class="form-text text-muted">Vyberte meno zberateľa zo zoznamu. Ak chýba v zozname, vyberte "(Meno chýba v zozname)" a vpíšte ho ručne.</p>
    </div>

  
  </div>	

<div class="form-group row" style="display:none" id="div_txt_zberatel"><div class="col-md-2"></div><div class="col-md-10">
    <label for="txt_zberatel" class="col-sm-4 form-control-label"><strong>Meno zberateľa:</strong></label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="txt_zberatel" name="txt_zberatel" placeholder="Napíšte meno zberateľa">
    </div>
</div></div>


    <div class="form-group row">
    <label for="source_zberatel" class="col-sm-4 form-control-label"><strong>Ako je napísaný zberateľ:</strong></label>
    <div class="col-sm-8">
    <select class="form-control" id="source_zberatel" name="source_zberatel">
      <option value='0' <?php if ($p_edit->source_zberatel==0) {echo 'selected';} else { echo '';} ?>>x normálne písmo (nie kurzíva) bez zátvoriek</option>
      <option value='1' <?php if ($p_edit->source_zberatel==1) {echo 'selected';} else { echo '';} ?>>[x] normálne písmo (nie kurzíva) v hranatých zátvorkách</option>
      <option value='2' <?php if ($p_edit->source_zberatel==2) {echo 'selected';} else { echo '';} ?>>(x) normálne písmo (nie kurzíva) v okrúhlych zátvorkách</option>
      <option value='3' <?php if ($p_edit->source_zberatel==3) {echo 'selected';} else { echo '';} ?>>[(x)] normálne písmo (nie kurzíva) v okrúhlych aj hranatých zátvorkách</option>
      <option value='4' <?php if ($p_edit->source_zberatel==4) {echo 'selected';} else { echo '';} ?>>i kurzíva bez zátvoriek</option>
      <option value='5' <?php if ($p_edit->source_zberatel==5) {echo 'selected';} else { echo '';} ?>>(i) kurzíva v okrúhlych zátvorkách</option>
      <option value='6' <?php if ($p_edit->source_zberatel==6) {echo 'selected';} else { echo '';} ?>>[i] kurzíva v hranatých zátvorkách</option>
      <option value='7' <?php if ($p_edit->source_zberatel==7) {echo 'selected';} else { echo '';} ?>>[(i)] kurzíva v klasických aj hranatých zátvorkých</option>

    </select>
            <p class="form-text text-muted">Pozrite ako je v origináli napísané. Údaj môže byť napísaný normálnym písmom, kurzívou a môže byť a nemusí byť vo vnútri okrúhlych alebo hranatých zátvoriek. Napríklad:<BR> <code>"(J. Rotarides, [1800], Príbelce [<i>Hontianska</i>])"</code><BR>
            Meno zberateľa (J. Rotarides) je normálnym písmom a okrúhlej zátvorke, rok zbierania (1880) je v okrúhlej aj hranatej, Miesto zozbierania (Príbelce) je v okrúhlej zátvorke a Miesto výskytu je v okrúhlej, hranatej zátvorke a je kurzívou (Hontianska). Obdobne uveďte aj ďalšie údaje, ktoré nasledujú nižšie.
            
            </p>


</div>


    </div>  


  <div class="form-group row">	  

    <label for="id_zberatel_miesto" class="col-sm-4 form-control-label"><strong>Miesto zozbierania:</strong></label>
    <div class="col-sm-8">
    <select class="form-control" id="id_zberatel_miesto" name="id_zberatel_miesto">
    <option value='-1'>(Miesto chýba v zozname)</option>
    <option value='0' <?php if (empty($p_edit->id_zberatel_miesto)) {echo "selected";} ?>>(žiadne)</option>
		<?php
			$q=mysql_query("SELECT * FROM lokality ORDER BY meno;");
			while ($lokality=mysql_fetch_object($q)) {
      if ($p_edit->id_zberatel_miesto==$lokality->id_lokalita) {
        printf("<option value='%s' selected>%s</option>",$lokality->id_lokalita,$lokality->meno);	
      }  
      else {  
			  printf("<option value='%s'>%s</option>",$lokality->id_lokalita,$lokality->meno);	
     }   
    	}
			
		?>
    </select>
    </div>

  </div>	  






  <div class="form-group row" style="display:none" id="div_txt_zberatel_miesto"><div class="col-md-2"></div><div class="col-md-10">
    <label for="txt_zberatel" class="col-sm-4 form-control-label"><strong>Miesto zozbierania:</strong></label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="txt_zberatel_miesto" name="txt_zberatel_miesto" placeholder="Napíšte miesto zozbierania">
    </div>
</div></div>


    <div class="form-group row">
    <label for="source_zberatel_miesto" class="col-sm-4 form-control-label"><strong>Ako je napísané miesto zozbierania:</strong></label>
    <div class="col-sm-8">
    <select class="form-control" id="source_zberatel_miesto" name="source_zberatel_miesto">
      <option value='0' <?php if ($p_edit->source_zberatel_miesto==0) {echo 'selected';} else { echo '';} ?>>x normálne písmo (nie kurzíva) bez zátvoriek</option>
      <option value='1' <?php if ($p_edit->source_zberatel_miesto==1) {echo 'selected';} else { echo '';} ?>>[x] normálne písmo (nie kurzíva) v hranatých zátvorkách</option>
      <option value='2' <?php if ($p_edit->source_zberatel_miesto==2) {echo 'selected';} else { echo '';} ?>>(x) normálne písmo (nie kurzíva) v klasických zátvorkách</option>
      <option value='3' <?php if ($p_edit->source_zberatel_miesto==3) {echo 'selected';} else { echo '';} ?>>[(x)] normálne písmo (nie kurzíva) v klasických aj hranatých zátvorkách</option>
      <option value='4' <?php if ($p_edit->source_zberatel_miesto==4) {echo 'selected';} else { echo '';} ?>>i kurzíva bez zátvoriek</option>
      <option value='5' <?php if ($p_edit->source_zberatel_miesto==5) {echo 'selected';} else { echo '';} ?>>(i) kurzíva v klasických zátvorkách</option>
      <option value='6' <?php if ($p_edit->source_zberatel_miesto==6) {echo 'selected';} else { echo '';} ?>>[i] kurzíva v hranatých zátvorkách</option>
      <option value='7' <?php if ($p_edit->source_zberatel_miesto==7) {echo 'selected';} else { echo '';} ?>>[(i)] kurzíva v klasických aj hranatých zátvorkých</option>

    </select>

</div>
    </div> 

  <div class="form-group row">	  

    <label for="id_zberatel_vyskyt" class="col-sm-4 form-control-label"><strong>Miesto vyskytu piesne:</strong></label>
    <div class="col-sm-8">
    <select class="form-control" id="id_zberatel_vyskyt" name="id_zberatel_vyskyt">
        <option value='-1'>(Miesto chýba v zozname)</option>
        <option value='0' <?php if (empty($p_edit->id_zberatel_vyskyt)) {echo "selected";} ?>>(žiadne)</option>

		<?php
			$q=mysql_query("SELECT * FROM lokality ORDER BY meno;");
			while ($lokality=mysql_fetch_object($q)) {

      if ($p_edit->id_zberatel_vyskyt==$lokality->id_lokalita) {
        			  printf("<option value='%s' selected>%s</option>",$lokality->id_lokalita,$lokality->meno);	

      }
      else {  

			  printf("<option value='%s'>%s</option>",$lokality->id_lokalita,$lokality->meno);	
			}
      }
			
		?>
    </select>
    </div>

  </div>


<div class="form-group row" style="display:none" id="div_txt_zberatel_vyskyt"><div class="col-md-2"></div><div class="col-md-10">
    <label for="txt_zberatel" class="col-sm-4 form-control-label"><strong>Miesto výskytu:</strong></label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="txt_zberatel_vyskyt" name="txt_zberatel_vyskyt" placeholder="Napíšte miesto výskytu">
    </div>
</div></div>

    <div class="form-group row">
    <label for="source_zberatel_vyskyt" class="col-sm-4 form-control-label"><strong>Ako je napísané miesto výskytu piesne:</strong></label>
    <div class="col-sm-8">
    <select class="form-control" id="source_zberatel_vyskyt" name="source_zberatel_vyskyt">
      <option value='0' <?php if ($p_edit->source_zberatel_vyskyt==0) {echo 'selected';} else { echo '';} ?>>x normálne písmo (nie kurzíva) bez zátvoriek</option>
      <option value='1' <?php if ($p_edit->source_zberatel_vyskyt==1) {echo 'selected';} else { echo '';} ?>>[x] normálne písmo (nie kurzíva) v hranatých zátvorkách</option>
      <option value='2' <?php if ($p_edit->source_zberatel_vyskyt==2) {echo 'selected';} else { echo '';} ?>>(x) normálne písmo (nie kurzíva) v klasických zátvorkách</option>
      <option value='3' <?php if ($p_edit->source_zberatel_vyskyt==3) {echo 'selected';} else { echo '';} ?>>[(x)] normálne písmo (nie kurzíva) v klasických aj hranatých zátvorkách</option>
      <option value='4' <?php if ($p_edit->source_zberatel_vyskyt==4) {echo 'selected';} else { echo '';} ?>>i kurzíva bez zátvoriek</option>
      <option value='5' <?php if ($p_edit->source_zberatel_vyskyt==5) {echo 'selected';} else { echo '';} ?>>(i) kurzíva v klasických zátvorkách</option>
      <option value='6' <?php if ($p_edit->source_zberatel_vyskyt==6) {echo 'selected';} else { echo '';} ?>>[i] kurzíva v hranatých zátvorkách</option>
      <option value='7' <?php if ($p_edit->source_zberatel_vyskyt==7) {echo 'selected';} else { echo '';} ?>>[(i)] kurzíva v klasických aj hranatých zátvorkých</option>

    </select>

</div>
    </div> 



    <div class="form-group row">
    <label for="datum_zbieranie" class="col-sm-4 form-control-label"><strong>Dátum zozbierania:</strong></label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="datum_zbieranie" name="datum_zbieranie" placeholder="Dátum, kedy bola zbierka pôvodne zozbieraná" value="<?php echo $p_edit->datum_zbieranie; ?>">
    </div>
  </div>



    <div class="form-group row">
    <label for="source_datum_zbieranie" class="col-sm-4 form-control-label"><strong>Ako je napísaný dátum zozbierania:</strong></label>
    <div class="col-sm-8">
    <select class="form-control" id="source_datum_zbieranie" name="source_datum_zbieranie">
      <option value='0' <?php if ($p_edit->source_datum_zbieranie==0) {echo 'selected';} else { echo '';} ?>>x normálne písmo (nie kurzíva) bez zátvoriek</option>
      <option value='1' <?php if ($p_edit->source_datum_zbieranie==1) {echo 'selected';} else { echo '';} ?>>[x] normálne písmo (nie kurzíva) v hranatých zátvorkách</option>
      <option value='2' <?php if ($p_edit->source_datum_zbieranie==2) {echo 'selected';} else { echo '';} ?>>(x) normálne písmo (nie kurzíva) v klasických zátvorkách</option>
      <option value='3' <?php if ($p_edit->source_datum_zbieranie==3) {echo 'selected';} else { echo '';} ?>>[(x)] normálne písmo (nie kurzíva) v klasických aj hranatých zátvorkách</option>
      <option value='4' <?php if ($p_edit->source_datum_zbieranie==4) {echo 'selected';} else { echo '';} ?>>i kurzíva bez zátvoriek</option>
      <option value='5' <?php if ($p_edit->source_datum_zbieranie==5) {echo 'selected';} else { echo '';} ?>>(i) kurzíva v klasických zátvorkách</option>
      <option value='6' <?php if ($p_edit->source_datum_zbieranie==6) {echo 'selected';} else { echo '';} ?>>[i] kurzíva v hranatých zátvorkách</option>
      <option value='7' <?php if ($p_edit->source_datum_zbieranie==7) {echo 'selected';} else { echo '';} ?>>[(i)] kurzíva v klasických aj hranatých zátvorkých</option>

    </select>

</div>
    </div> 
  
  
      <div class="form-group row">
    <label for="datum_digitalizacia" class="col-sm-4 form-control-label"><strong>Dátum digitalizácie:</strong></label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="datum_digitalizacia" name="datum_digitalizacia" value="<?php if ($_GET['id_piesen']<>0) {echo $p_edit->datum_digitalizacia;} else {echo date("Y-m-d");} ?>">
      <p class="form-text text-muted">Uveďte dnešný dátum v tvare YYYY-MM-DD, napr. "2016-07-23"</p>
    </div>
  </div>


  <div class="form-group row">	  
    <label for="id_digitalizator" class="col-sm-4 form-control-label"><strong>Meno digitalizátora:</strong></label>
    <div class="col-sm-8">
    <select class="form-control" id="id_digitalizator" name="id_digitalizator">
       <option value='-1'>(Meno chýba v zozname)</option>

		<?php
			$q=mysql_query("SELECT * FROM digitalizatori ORDER BY meno;");
			while ($digitalizatori=mysql_fetch_object($q)) {

      if ($p_edit->id_digitalizator==$digitalizatori->id_digitalizator) {

			  printf("<option value='%s' selected>%s</option>",$digitalizatori->id_digitalizator,$digitalizatori->meno);	

      }  
      else { 

			  printf("<option value='%s' %s>%s</option>",$digitalizatori->id_digitalizator,(empty($p_edit->id_digitalizator)) ? "selected":"",$digitalizatori->meno);	

      }  
			}
			
		?>
    </select>
    <p class="form-text text-muted">Vaše meno, alebo meno digitalizátora. Ak chýba v zozname, vyberte možnosť "(chýba v zozname)" a doplňte.</p>
    </div>
  </div>
  
<div class="form-group row" style="display:none" id="div_txt_digitalizator"><div class="col-md-2"></div><div class="col-md-10">
    <label for="txt_digitalizator" class="col-sm-4 form-control-label"><strong>Meno digitalizátora:</strong></label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="txt_digitalizator" name="txt_digitalizator" placeholder="Napíšte meno digitalizátora">
    </div>
</div></div>


 <div class="form-group row">	  
    <label for="id_digitalizator2" class="col-sm-4 form-control-label"><strong>Kto pridal dielo sem (Tvoje meno):</strong></label>
    <div class="col-sm-8">
    <select class="form-control" id="id_digitalizator2" name="id_digitalizator2">
       <option value='-1'>(Meno chýba v zozname)</option>

		<?php
			$q=mysql_query("SELECT * FROM digitalizatori ORDER BY meno;");
			while ($digitalizatori=mysql_fetch_object($q)) {

      if ($p_edit->id_digitalizator2==$digitalizatori->id_digitalizator) {

			  printf("<option value='%s' selected>%s</option>",$digitalizatori->id_digitalizator,$digitalizatori->meno);	

      }  
      else { 

			  printf("<option value='%s' %s>%s</option>",$digitalizatori->id_digitalizator,(empty($p_edit->id_digitalizator)) ? "selected":"",$digitalizatori->meno);	

      }  
			}
			
		?>
    </select>
    <p class="form-text text-muted">Vaše meno, alebo meno digitalizátora. Ak chýba v zozname, vyberte možnosť "(chýba v zozname)" a doplňte.</p>
    </div>
  </div>
  
<div class="form-group row" style="display:none" id="div_txt_digitalizator2"><div class="col-md-2"></div><div class="col-md-10">
    <label for="txt_digitalizator2" class="col-sm-4 form-control-label"><strong>Meno digitalizátora:</strong></label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="txt_digitalizator2" name="txt_digitalizator2" placeholder="Napíšte meno digitalizátora">
    </div>
</div></div>






  
    <div class="form-group row" style="display:none">	  
    <label for="id_hudba" class="col-sm-4 form-control-label"><strong>Autor hudobnej nahrávky:</strong></label>
    <div class="col-sm-8">
    <select class="form-control" id="id_hudba" name="id_hudba">
		<?php
			$q=mysql_query("SELECT * FROM hudobnici;");
			while ($hudobnici=mysql_fetch_object($q)) {

      if ($p_edit->id_hudba==$hudobnici->id_hudba) {
         printf("<option value='%s' selected>%s</option>",$hudobnici->id_hudba,$hudobnici->meno);	 
         }

        else {
          printf("<option value='%s'>%s</option>",$hudobnici->id_hudba,$hudobnici->meno);	 }
  

        }



			
		?>
    </select>
    </div>
  </div>


 
    <div class="form-group row">	  
    <label for="id_tempo" class="col-sm-4 form-control-label"><strong>Tempo:</strong></label>
    <div class="col-sm-8">
    <select class="form-control" id="id_tempo" name="id_tempo">
              <option value='-1'>(Tempo chýba v zozname)</option>
		<?php
			$q=mysql_query("SELECT * FROM tempo ORDER BY tempo.tempo;");
			while ($tempo=mysql_fetch_object($q)) {

      if ($p_edit->id_tempo==$tempo->id_tempo) {
			  printf("<option value='%s' selected>%s (%s bpm)</option>",$tempo->id_tempo,$tempo->tempo, $tempo->bpm);	

      } 
			  printf("<option value='%s'>%s (%s bpm)</option>",$tempo->id_tempo,$tempo->tempo, $tempo->bpm);	
			}
			
		?>
    </select>
    </div>
  </div>

<div class="form-group row" style="display:none" id="div_txt_tempo"><div class="col-md-2"></div><div class="col-md-10">
    <label for="txt_tempo" class="col-sm-4 form-control-label"><strong>Tempo:</strong></label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="txt_tempo" name="txt_tempo" placeholder="Napíšte názov tempa">
      
    </div>

    <label for="txt_bpm" class="col-sm-4 form-control-label"><strong>Bpm:</strong></label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="txt_bpm" name="txt_bpm" placeholder="Napíšte počet BPM (beats per minute)">
      
    </div>


</div></div>




    <div class="form-group row">
    <label for="source_tempo" class="col-sm-4 form-control-label"><strong>Ako je napísané tempo:</strong></label>
    <div class="col-sm-8">
    <select class="form-control" id="source_tempo" name="source_tempo">

      <option value='0' <?php if ($p_edit->source_tempo==0) {echo 'selected';} else { echo '';} ?>>x normálne písmo (nie kurzíva) bez zátvoriek</option>
      <option value='1' <?php if ($p_edit->source_tempo==1) {echo 'selected';} else { echo '';} ?>>[x] normálne písmo (nie kurzíva) v hranatých zátvorkách</option>
      <option value='2' <?php if ($p_edit->source_tempo==2) {echo 'selected';} else { echo '';} ?>>(x) normálne písmo (nie kurzíva) v klasických zátvorkách</option>
      <option value='3' <?php if ($p_edit->source_tempo==3) {echo 'selected';} else { echo '';} ?>>[(x)] normálne písmo (nie kurzíva) v klasických aj hranatých zátvorkách</option>
      <option value='4' <?php if ($p_edit->source_tempo==4) {echo 'selected';} else { echo '';} ?>>i kurzíva bez zátvoriek</option>
      <option value='5' <?php if ($p_edit->source_tempo==5) {echo 'selected';} else { echo '';} ?>>(i) kurzíva v klasických zátvorkách</option>
      <option value='6' <?php if ($p_edit->source_tempo==6) {echo 'selected';} else { echo '';} ?>>[i] kurzíva v hranatých zátvorkách</option>
      <option value='7' <?php if ($p_edit->source_tempo==7) {echo 'selected';} else { echo '';} ?>>[(i)] kurzíva v klasických aj hranatých zátvorkých</option>

    </select>

</div>
    </div> 

<a onclick="$('#div_id_tempo2').show();" href="javascript:void(0)">>> Chcem pridať aj druhé tempo, lebo sú dve >></a> - napríklad <i>"Moderato. (Sviežo)"</i>. Pridajme oboje - aj Tempo: "Moderato", Tempo 2: "Sviežo" </a>

<div id="div_id_tempo2" style="display:none">
    <div class="form-group row">	  
    <label for="id_tempo2" class="col-sm-4 form-control-label"><strong>Tempo 2:</strong></label>
    <div class="col-sm-8">
    <select class="form-control" id="id_tempo2" name="id_tempo2">
            <option value='-1'>(Tempo chýba v zozname)</option>
            <option value='0' selected>Žiadne druhé tempo - je iba jedno</option>
            

		<?php
			$q=mysql_query("SELECT * FROM tempo ORDER BY tempo.tempo;");
			while ($tempo=mysql_fetch_object($q)) {

      if ($p_edit->id_tempo==$tempo->id_tempo) {
			  printf("<option value='%s'>%s (%s bpm)</option>",$tempo->id_tempo,$tempo->tempo, $tempo->bpm);	

      } 
			  printf("<option value='%s'>%s (%s bpm)</option>",$tempo->id_tempo,$tempo->tempo, $tempo->bpm);	
			}
			
		?>
    </select>
    </div>
  </div>

<div class="form-group row" style="display:none" id="div_txt_tempo2"><div class="col-md-2"></div><div class="col-md-10">
    <label for="txt_tempo2" class="col-sm-4 form-control-label"><strong>Tempo2:</strong></label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="txt_tempo2" name="txt_tempo2" placeholder="Napíšte názov tempa">
      
    </div>

    <label for="txt_bpm2" class="col-sm-4 form-control-label"><strong>Bpm:</strong></label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="txt_bpm2" name="txt_bpm2" placeholder="Napíšte počet BPM (beats per minute)">
      
    </div>


</div></div>




    <div class="form-group row">
    <label for="source_tempo2" class="col-sm-4 form-control-label"><strong>Ako je napísané tempo2:</strong></label>
    <div class="col-sm-8">
    <select class="form-control" id="source_tempo2" name="source_tempo2">
      <option value='0' <?php if ($p_edit->source_tempo==0) {echo 'selected';} else { echo '';} ?>>x normálne písmo (nie kurzíva) bez zátvoriek</option>
      <option value='1' <?php if ($p_edit->source_tempo==1) {echo 'selected';} else { echo '';} ?>>[x] normálne písmo (nie kurzíva) v hranatých zátvorkách</option>
      <option value='2' <?php if ($p_edit->source_tempo==2) {echo 'selected';} else { echo '';} ?>>(x) normálne písmo (nie kurzíva) v klasických zátvorkách</option>
      <option value='3' <?php if ($p_edit->source_tempo==3) {echo 'selected';} else { echo '';} ?>>[(x)] normálne písmo (nie kurzíva) v klasických aj hranatých zátvorkách</option>
      <option value='4' <?php if ($p_edit->source_tempo==4) {echo 'selected';} else { echo '';} ?>>i kurzíva bez zátvoriek</option>
      <option value='5' <?php if ($p_edit->source_tempo==5) {echo 'selected';} else { echo '';} ?>>(i) kurzíva v klasických zátvorkách</option>
      <option value='6' <?php if ($p_edit->source_tempo==6) {echo 'selected';} else { echo '';} ?>>[i] kurzíva v hranatých zátvorkách</option>
      <option value='7' <?php if ($p_edit->source_tempo==7) {echo 'selected';} else { echo '';} ?>>[(i)] kurzíva v klasických aj hranatých zátvorkých</option>

    </select>

</div>
    </div> </div>








    <div class="form-group row" style="display:none">	  
    <label for="id_incipit" class="col-sm-4 form-control-label"><strong>Incipit:</strong></label>
    <div class="col-sm-8">
    <select class="form-control" id="id_incipit">
		<?php
			$q=mysql_query("SELECT * FROM incipity;");
			while ($incipity=mysql_fetch_object($q)) {

      if ($p_edit->id_incipit==$incipity->id_incipit) {
        printf("<option value='%s' selected>%s</option>",$incipity->id_incipit,$incipity->text);	

  
      }  else {

        
			  printf("<option value='%s'>%s</option>",$incipity->id_incipit,$incipity->text);	

        }
			}
			
		?>
    </select>
    </div>
  </div>

   





<input type="hidden" name="odoslane" value="true">

<?php if ((int)$_GET['id_piesen']<>0) {echo '<input type="hidden" name="update" value="true"><input type="hidden" name="id_piesen" value='.$_GET['id_piesen'].'">';} ?> 

	  
  <div class="form-group row">
    <div class="col-sm-offset-2 col-sm-8">
<button type="submit" class="l-btn l-btn--large l-btn--primary">Uložiť zmeny a pokračovať >></button>
    </div>
  </div>
</form>




    </div> <!-- /container -->

</div>

<script>
          $("#id_zberatel").change(function(){
            var val = $(this).find("option:selected").attr("value");
            if (val==-1) {$("#div_txt_zberatel").show();$("#txt_zberatel").focus();} else {$("#div_txt_zberatel").hide();}
          });
          
          $("#id_zberatel_miesto").change(function(){
            var val = $(this).find("option:selected").attr("value");
            if (val==-1) {$("#div_txt_zberatel_miesto").show();$("#txt_zberatel_miesto").focus();} else {$("#div_txt_zberatel_miesto").hide();}
          });

          $("#id_zberatel_vyskyt").change(function(){
            var val = $(this).find("option:selected").attr("value");
            if (val==-1) {$("#div_txt_zberatel_vyskyt").show();$("#txt_zberatel_vyskyt").focus();} else {$("#div_txt_zberatel_vyskyt").hide();}
          });

          $("#id_digitalizator").change(function(){
            var val = $(this).find("option:selected").attr("value");
            if (val==-1) {$("#div_txt_digitalizator").show();$("#txt_digitalizator").focus();} else {$("#div_txt_digitalizator").hide();}
          });

          $("#id_digitalizator2").change(function(){
            var val = $(this).find("option:selected").attr("value");
            if (val==-1) {$("#div_txt_digitalizator2").show();$("#txt_digitalizator2").focus();} else {$("#div_txt_digitalizator2").hide();}
          });

          $("#id_tempo").change(function(){
            var val = $(this).find("option:selected").attr("value");
            if (val==-1) {$("#div_txt_tempo").show();$("#txt_tempo").focus();} else {$("#div_txt_tempo").hide();}
          });

          $("#id_tempo2").change(function(){
            var val = $(this).find("option:selected").attr("value");
            if (val==-1) {$("#div_txt_tempo2").show();$("#txt_tempo2").focus();} else {$("#div_txt_tempo2").hide();}
          });

</script>



<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"?>


