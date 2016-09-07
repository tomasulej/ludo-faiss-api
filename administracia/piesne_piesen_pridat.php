<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Piesen->Piesne->Pridat</title>

    <!-- Bootstrap core CSS -->

<link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css" integrity="sha384-XXXXXXXX" crossorigin="anonymous">
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" integrity="sha384-XXXXXXXX" crossorigin="anonymous"></script>


  </head>

  <body>
    <div class="container">


      <div class="page-header">
        <h1>Nová pieseň</h1>
		<p class="lead">Slúži na pridávanie nových piesni. Pred odoslaním, prosím, všetko znova skontrolujte.</p>
      </div>

<HR>

<form action="piesne_piesen_pridat.php" method="post">
<?php
	include "../databaza_piesne.php";

	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');

//echo "<H1>".(int)$_GET['id']."</H1>";


if ((int)$_GET['id']<>0) {
  $q_edit=mysql_query(sprintf("SELECT * FROM piesne WHERE id_piesen=%s",(int)$_GET['id']));
  $p_edit=mysql_fetch_object( $q_edit);
  //echo "<H1>".$p_edit->nazov_dlhy."xxx</H1>";
};


if ($_POST['odoslane']=='true') {

	printf("%s: %s","id_zbierka",$_POST['id_zbierka']);




$id_zbierka=$_POST['id_zbierka']; printf(" %s:%s","id_zbierka",$id_zbierka);
$identifikator=$_POST['identifikator']; printf(" %s:%s","identifikator",$identifikator);
$nazov_dlhy=$_POST['nazov_dlhy']; printf(" %s:%s","nazov_dlhy",$nazov_dlhy);
$nazov_kratky=$_POST['nazov_kratky']; printf(" %s:%s","nazov_kratky",$nazov_kratky);
$id_zberatel=$_POST['id_zberatel']; printf(" %s:%s","id_zberatel",$id_zberatel);
$id_zberatel_miesto=$_POST['id_zberatel_miesto']; printf(" %s:%s","id_zberatel_miesto",$id_zberatel_miesto);
$id_zberatel_vyskyt=$_POST['id_zberatel_vyskyt']; printf(" %s:%s","id_zberatel_vyskyt",$id_zberatel_vyskyt);
$datum_zbieranie=$_POST['datum_zbieranie']; printf(" %s:%s","datum_zbieranie",$datum_zbieranie);
$datum_digitalizacia=$_POST['datum_digitalizacia']; printf(" %s:%s","datum_digitalizacia",$datum_digitalizacia);
$id_digitalizator=$_POST['id_digitalizator']; printf(" %s:%s","id_digitalizator",$id_digitalizator);
$id_hudba=$_POST['id_hudba']; printf(" %s:%s","id_hudba",$id_hudba);
$id_tempo=$_POST['id_tempo']; printf(" %s:%s","id_tempo",$id_tempo);
$id_incipit=$_POST['id_incipit']; $id_incipit=0;printf(" %s:%s","id_incipit",$id_incipit);

$lyrics=$_POST['lyrics']; printf(" %s:%s","lyrics",$lyrics);
$abc_notes=$_POST['abc_notes']; printf(" %s:%s","abc_notes",$abc_notes);
$abc_settings=$_POST['abc_settings']; printf(" %s:%s","abc_settings",$abc_settings);
$abc_times_arr=$_POST['abc_times_arr']; printf(" %s:%s","abc_times_arr",$abc_times_arr);
$file_xml=$_POST['file_xml']; printf(" %s:%s","file_xml",$file_xml);
$file_mp3=$_POST['file_mp3']; printf(" %s:%s","file_mp3",$file_mp3);
$file_html=$_POST['file_html']; printf(" %s:%s","file_html",$file_html);
$file_pdf=$_POST['file_pdf']; printf(" %s:%s","file_pdf",$file_pdf);

$strana=$_POST['strana']; printf(" %s:%s","strana",$strana);

$source_zberatel=$_POST['source_zberatel']; printf(" %s:%s","source_zberatel",$source_zberatel);
$source_zberatel_miesto=$_POST['source_zberatel_miesto']; printf(" %s:%s","source_zberatel_miesto",$source_zberatel_miesto);
$source_zberatel_vyskyt=$_POST['source_zberatel_vyskyt']; printf(" %s:%s","source_zberatel_vyskyt",$source_zberatel_vyskyt);
$source_datum_zbieranie=$_POST['source_datum_zbieranie']; printf(" %s:%s","source_datum_zbieranie",$source_datum_zbieranie);
$source_tempo=$_POST['source_tempo']; printf(" %s:%s","source_tempo",$source_tempo);







$query_pridat=sprintf("INSERT INTO `piesne` (`id_zbierka`, `identifikator`, `nazov_dlhy`, `nazov_kratky`, `strana`, `id_zberatel`, `id_zberatel_miesto`, `id_zberatel_vyskyt`, `datum_zbieranie`, `datum_digitalizacia`, `id_digitalizator`, `id_hudba`, id_tempo, `id_incipit`, `lyrics`, `abc_notes`, `abc_settings`, `abc_times_arr`, `file_xml`, `file_mp3`, `file_html`, `file_pdf`) VALUES
(%s, '%s', '%s', '%s', %s, %s, %s, %s, '%s', '%s', %s, %s, '%s', %s, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', %s, %s, %s, %s, %s);",
mysql_real_escape_string($id_zbierka),
mysql_real_escape_string($identifikator),
mysql_real_escape_string($nazov_dlhy),
mysql_real_escape_string($nazov_kratky),
mysql_real_escape_string($strana),
mysql_real_escape_string($id_zberatel),
mysql_real_escape_string($id_zberatel_miesto),
mysql_real_escape_string($id_zberatel_vyskyt),
mysql_real_escape_string($datum_zbieranie),
mysql_real_escape_string($datum_digitalizacia),
mysql_real_escape_string($id_digitalizator),
mysql_real_escape_string($id_hudba),
mysql_real_escape_string($id_tempo),
mysql_real_escape_string($id_incipit),
mysql_real_escape_string($lyrics),
mysql_real_escape_string($abc_notes),
mysql_real_escape_string($abc_settings),
mysql_real_escape_string($abc_times_arr),
mysql_real_escape_string($file_xml),
mysql_real_escape_string($file_mp3),
mysql_real_escape_string($file_html),
mysql_real_escape_string($file_pdf),
mysql_real_escape_string($source_zberatel),
mysql_real_escape_string($source_zberatel_miesto),
mysql_real_escape_string($source_zberatel_vyskyt),
mysql_real_escape_string($source_datum_zbieranie),
mysql_real_escape_string($source_tempo)


);

$query_update=sprintf("UPDATE `piesne` SET 
`id_zbierka`=%s, 
`identifikator`='%s', 
`nazov_dlhy`='%s', 
`nazov_kratky`='%s', 
`strana`='%s', 
`id_zberatel`=%s, 
`id_zberatel_miesto`=%s, 
`id_zberatel_vyskyt`=%s, 
`datum_zbieranie`='%s', 
`datum_digitalizacia`='%s', 
`id_digitalizator`=%s, 
`id_hudba`=%s, 
id_tempo=%s, 
`id_incipit`=%s, 
`lyrics`='%s', 
`abc_notes`='%s', 
`abc_settings`='%s', 
`abc_times_arr`='%s', 
`file_xml`='%s', 
`file_mp3`='%s', 
`file_html`='%s', 
`file_pdf`='%s',
`source_zberatel`='%s',
`source_zberatel_miesto`='%s',
`source_zberatel_vyskyt`='%s',
`source_datum_zbieranie`='%s',
`source_tempo`='%s'


WHERE id_piesen=%s;",

mysql_real_escape_string($id_zbierka),
mysql_real_escape_string($identifikator),
mysql_real_escape_string($nazov_dlhy),
mysql_real_escape_string($nazov_kratky),
mysql_real_escape_string($strana),
mysql_real_escape_string($id_zberatel),
mysql_real_escape_string($id_zberatel_miesto),
mysql_real_escape_string($id_zberatel_vyskyt),
mysql_real_escape_string($datum_zbieranie),
mysql_real_escape_string($datum_digitalizacia),
mysql_real_escape_string($id_digitalizator),
mysql_real_escape_string($id_hudba),
mysql_real_escape_string($id_tempo),
mysql_real_escape_string($id_incipit),
mysql_real_escape_string($lyrics),
mysql_real_escape_string($abc_notes),
mysql_real_escape_string($abc_settings),
mysql_real_escape_string($abc_times_arr),
mysql_real_escape_string($file_xml),
mysql_real_escape_string($file_mp3),
mysql_real_escape_string($file_html),
mysql_real_escape_string($file_pdf),
mysql_real_escape_string($source_zberatel),
mysql_real_escape_string($source_zberatel_miesto),
mysql_real_escape_string($source_zberatel_vyskyt),
mysql_real_escape_string($source_datum_zbieranie),
mysql_real_escape_string($source_tempo),
(int)$_POST['id']
);


//echo $query_pridat;
if ($_POST['update']="true") {
$q=mysql_query($query_update);
echo "<b>".$query_update."</b>";


} else {
$q=mysql_query($query_pridat);
echo "<b>".$query_pridat."</b>";

}
//echo "<b>".$query_update."</b>";
//echo "<b>".$query_pridat."</b>";


	
}



?>	
	  
	  
  <div class="form-group row">	  
  <fieldset class="form-group">
    <label for="id_zbierka" class="col-sm-2 form-control-label">Zbierka:</label>
    <div class="col-sm-10">
    <select class="form-control" id="id_zbierka" name="id_zbierka">
		<?php
			$q=mysql_query("SELECT * FROM zbierky;");
			while ($zbierky=mysql_fetch_object($q)) {
        if ($p_edit->id_zbierka==$zbierky->id_zbierka) {
          			    printf("<option value='%s' selected>xxx%s</option>",$zbierky->id_zbierka,$zbierky->nazov);	

        } else {

			    printf("<option value='%s'>%s</option>",$zbierky->id_zbierka,$zbierky->nazov);	
        }
      }
			
		?>
    </select>
    </div>
  </fieldset>
  </div>	  
	  
	  
	  
	  
  <div class="form-group row">
    <label for="identifikator" class="col-sm-2 form-control-label">Interný identifikátor:</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="identifikator" name="identifikator" placeholder="Identifikátor (napr. '231., '232b' a podobne." value="<?  echo $p_edit->identifikator ?>"
    </div>
  </div>
	  
  <div class="form-group row">
    <label for="nazov_dlhy" class="col-sm-2 form-control-label">Dlhý názov:</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="nazov_dlhy" name="nazov_dlhy" placeholder="Dlhý názov piesne (napr. 'Na Kráľovej holi stojí strom zelený')" value="<?  echo $p_edit->nazov_dlhy ?>">
    </div>
  </div>
  
    <div class="form-group row">
    <label for="nazov_kratky" class="col-sm-2 form-control-label">Krátky názov:</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="nazov_kratky" name="nazov_kratky" placeholder="Skrátený názov piesne (napr. 'Na Kráľovej holi...')" value="<?  echo $p_edit->nazov_kratky ?>">
    </div>
  </div>	  


    <div class="form-group row">
    <label for="strana" class="col-sm-2 form-control-label">Strana:</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="strana" name="strana" placeholder="Strana, na ktorej sa nachádza pieseň" value="<?  echo $p_edit->strana ?>">
    </div>
  </div>


	  
  <div class="form-group row">	  
  <fieldset class="form-group">
    <label for="id_zberatel" class="col-sm-2 form-control-label">Zberateľ:</label>
    <div class="col-sm-10">
    <select class="form-control" id="id_zberatel" name="id_zberatel">
		<?php
			$q=mysql_query("SELECT * FROM zberatelia;");
			while ($zberatelia=mysql_fetch_object($q)) {

      if ($p_edit->id_zberatel==$zberatelia->id_zberatel) {
  			  printf("<option value='%s' selected>xxx%s</option>",$zberatelia->id_zberatel,$zberatelia->meno);	
      
      } else {
			    printf("<option value='%s'>%s</option>",$zberatelia->id_zberatel,$zberatelia->meno);	


      }


			}
			
		?>
    </select>
    </div>
  </fieldset>
  </div>	
  	  
  <div class="form-group row">	  
  <fieldset class="form-group">
    <label for="id_zberatel_miesto" class="col-sm-2 form-control-label">Miesto zozbierania:</label>
    <div class="col-sm-10">
    <select class="form-control" id="id_zberatel_miesto" name="id_zberatel_miesto">
		<?php
			$q=mysql_query("SELECT * FROM lokality;");
			while ($lokality=mysql_fetch_object($q)) {
      if ($p_edit->id_zberatel_miesto==$lokality->id_lokalita) {
        printf("<option value='%s' selected>xxx %s</option>",$lokality->id_lokalita,$lokality->meno);	
      }  
      else {  
			  printf("<option value='%s'>%s</option>",$lokality->id_lokalita,$lokality->meno);	
     }   
    	}
			
		?>
    </select>
    </div>
  </fieldset>
  </div>	  

  <div class="form-group row">	  
  <fieldset class="form-group">
    <label for="id_zberatel_vyskyt" class="col-sm-2 form-control-label">Miesto vyskytu piesne:</label>
    <div class="col-sm-10">
    <select class="form-control" id="id_zberatel_vyskyt" name="id_zberatel_vyskyt">
		<?php
			$q=mysql_query("SELECT * FROM lokality;");
			while ($lokality=mysql_fetch_object($q)) {

      if ($p_edit->id_zberatel_vyskyt==$lokality->id_lokalita) {
        			  printf("<option value='%s' selected>xxx %s</option>",$lokality->id_lokalita,$lokality->meno);	

      }
      else {  

			  printf("<option value='%s'>%s</option>",$lokality->id_lokalita,$lokality->meno);	
			}
      }
			
		?>
    </select>
    </div>
  </fieldset>
  </div>


    <div class="form-group row">
    <label for="datum_zbieranie" class="col-sm-2 form-control-label">Dátum zozbierania:</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="datum_zbieranie" name="datum_zbieranie" placeholder="Dátum, kedy bola zbierka pôvodne zozbieraná" value="<? echo $p_edit->datum_zbieranie; ?>">
    </div>
  </div>
  
      <div class="form-group row">
    <label for="datum_digitalizacia" class="col-sm-2 form-control-label">Dátum digitalizácie:</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="datum_digitalizacia" name="datum_digitalizacia" value="<? if ($_GET['id']<>0) {echo $p_edit->datum_digitalizacia;} else {echo date("d.m.Y");} ?>">
    </div>
  </div>


  <div class="form-group row">	  
  <fieldset class="form-group">
    <label for="id_digitalizator" class="col-sm-2 form-control-label">Meno digitalizátora:</label>
    <div class="col-sm-10">
    <select class="form-control" id="id_digitalizator" name="id_digitalizator">
		<?php
			$q=mysql_query("SELECT * FROM digitalizatori;");
			while ($digitalizatori=mysql_fetch_object($q)) {

      if ($p_edit->id_digitalizator==$digitalizatori->id_digitalizator) {

			  printf("<option value='%s' selected>xxx %s</option>",$digitalizatori->id_digitalizator,$digitalizatori->meno);	

      }  
      else { 

			  printf("<option value='%s'>%s</option>",$digitalizatori->id_digitalizator,$digitalizatori->meno);	

      }  
			}
			
		?>
    </select>
    </div>
  </fieldset>
  </div>
  
  
    <div class="form-group row">	  
  <fieldset class="form-group">
    <label for="id_hudba" class="col-sm-2 form-control-label">Autor hudobnej nahrávky:</label>
    <div class="col-sm-10">
    <select class="form-control" id="id_hudba" name="id_hudba">
		<?php
			$q=mysql_query("SELECT * FROM hudobnici;");
			while ($hudobnici=mysql_fetch_object($q)) {

      if ($p_edit->id_hudba==$hudobnici->id_hudba) {
         printf("<option value='%s' selected>xxx %s</option>",$hudobnici->id_hudba,$hudobnici->meno);	 
         }

        else {
          printf("<option value='%s'>%s</option>",$hudobnici->id_hudba,$hudobnici->meno);	 }
  

        }



			
		?>
    </select>
    </div>
  </fieldset>
  </div>


 
    <div class="form-group row">	  
  <fieldset class="form-group">
    <label for="id_tempo" class="col-sm-2 form-control-label">Tempo:</label>
    <div class="col-sm-10">
    <select class="form-control" id="id_tempo" name="id_tempo">
		<?php
			$q=mysql_query("SELECT * FROM tempo;");
			while ($tempo=mysql_fetch_object($q)) {

      if ($p_edit->id_tempo==$tempo->id_tempo) {
			  printf("<option value='%s' selected>xxx %s (%s bpm)</option>",$tempo->id_tempo,$tempo->tempo, $tempo->bpm);	

      } 
			  printf("<option value='%s'>%s (%s bpm)</option>",$tempo->id_tempo,$tempo->tempo, $tempo->bpm);	
			}
			
		?>
    </select>
    </div>
  </fieldset>
  </div>



    <div class="form-group row">	  
  <fieldset class="form-group">
    <label for="id_incipit" class="col-sm-2 form-control-label">Incipit:</label>
    <div class="col-sm-10">
    <select class="form-control" id="id_incipit">
		<?php
			$q=mysql_query("SELECT * FROM incipity;");
			while ($incipity=mysql_fetch_object($q)) {

      if ($p_edit->id_incipit==$incipity->id_incipit) {
        printf("<option value='%s' selected>xxx %s</option>",$incipity->id_incipit,$incipity->text);	

  
      }  else {

        
			  printf("<option value='%s'>%s</option>",$incipity->id_incipit,$incipity->text);	

        }
			}
			
		?>
    </select>
    </div>
  </fieldset>
  </div>

    <div class="form-group row">
    <label for="file_xml" class="col-sm-2 form-control-label">Súbor MusicXML:</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="file_xml" name="file_xml" placeholder="cislo_nazov-piesne.xml" value="<? echo $p_edit->file_xml; ?>">
    </div>
    </div>
    
    <div class="form-group row">
    <label for="file_mp3" class="col-sm-2 form-control-label">Súbor mp3:</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="file_mp3" name="file_mp3" placeholder="cislo_nazov-piesne.mp3" value="<? echo $p_edit->file_mp3; ?>">
    </div>
    </div>
    
    <div class="form-group row">
    <label for="file_html" class="col-sm-2 form-control-label">Súbor html:</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="file_html" name="file_html" placeholder="cislo_nazov-piesne.html" value="<? echo $p_edit->file_html; ?>">
    </div>
    </div>
    
    <div class="form-group row">
    <label for="file_pdf" class="col-sm-2 form-control-label">Súbor pdf:</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="file_pdf" name="file_pdf" placeholder="cislo_nazov-piesne.pdf" value="<? echo $p_edit->file_pdf; ?>">
    </div> 
    </div>   



	  
	  
<div class="form-group row">	  
  <fieldset class="form-group">
    <label for="lyrics">Slová piesne:</label>
    <textarea class="form-control" id="lyrics" name="lyrics" rows="3"><? echo $p_edit->lyrics; ?>"</textarea>
  </fieldset>
</div>  
  
  <div class="form-group row">	  

    <fieldset class="form-group">
    <label for="abc_notes">Noty piesne:</label>
    <textarea class="form-control" id="abc_notes" name="abc_notes" rows="3">value="<? echo $p_edit->abc_notes; ?>"</textarea>
  </fieldset>
  </div>

<div class="form-group row">	  
  
    <fieldset class="form-group">
    <label for="abc_settings">Nastavenia piesne:</label>

    <textarea class="form-control" id="abc_settings"  name="abc_settings" rows="3"><?php if ((int)$_GET['id']<>0) {echo $p_edit->abc_settings;} else { echo 'opt = {"jump":0,"no_menu":0,"repufld":0,"noplyr":0,"nocsr":0,"media_height":"","btns":1,"ipadr":"","mstr":0,"autscl":true,"ctrmed":0,"ctrnot":0,"lncsr":0,"opacity":0.2,"synbox":0,"speed":1,"top_margin":0,"yubvid":"","nomed":0,"delay":0,"repskip":0,"spdctl":0,"lopctl":0,"metro":0};';} ?>

</textarea>
  </fieldset>
  
</div> 


<div class="form-group row">	  
  
    <fieldset class="form-group">
    <label for="abc_times_arr">Načasovanie piesne:</label>
    <textarea class="form-control" id="abc_times_arr"  name="abc_times_arr" rows="3"><? echo $p_edit->abc_times_arr; ?></textarea>
  </fieldset>
  
</div> 

    <div class="form-group row">
    <label for="source_zberatel" class="col-sm-2 form-control-label">source_zberatel:</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="source_zberatel" name="source_zberatel" placeholder="source_zberatel" value="<? echo $p_edit->source_zberatel; ?>">
    </div> 
    </div>  


        <div class="form-group row">
    <label for="source_zberatel_miesto" class="col-sm-2 form-control-label">source_zberatel_miesto:</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="source_zberatel_miesto" name="source_zberatel_miesto" placeholder="source_zberatel_miesto" value="<? echo $p_edit->source_zberatel_miesto; ?>">
    </div> 
    </div>  


        <div class="form-group row">
    <label for="source_zberatel_vyskyt" class="col-sm-2 form-control-label">source_zberatel_vyskyt:</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="source_zberatel_vyskyt" name="source_zberatel_vyskyt" placeholder="source_zberatel_vyskyt" value="<? echo $p_edit->source_zberatel_vyskyt; ?>">
    </div> 
    </div>  


        <div class="form-group row">
    <label for="source_datum_zbieranie" class="col-sm-2 form-control-label">source_datum_zbieranie:</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="source_datum_zbieranie" name="source_datum_zbieranie" placeholder="source_datum_zbieranie" value="<? echo $p_edit->source_datum_zbieranie; ?>">
    </div> 
    </div>  


        <div class="form-group row">
    <label for="source_tempo" class="col-sm-2 form-control-label">source_tempo:</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="source_tempo" name="source_tempo" placeholder="source_tempo" value="<? echo $p_edit->source_tempo; ?>">
    </div> 
    </div>  





<input type="hidden" name="odoslane" value="true">

<?php if ((int)$_GET['id']<>0) {echo '<input type="hidden" name="update" value="true"><input type="hidden" name="id" value='.$_GET['id'].'">';} ?> 

	  
  <div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Odoslať</button>
    </div>
  </div>
</form>




    </div> <!-- /container -->



  </body>
</html>

