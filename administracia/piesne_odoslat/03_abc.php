<?php 
$nadpis="Pridávanie piesne: obsah piesne (krok 4/5)";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_administracia_header.php";
include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');

$id_piesen=(int)$_POST['id_piesen'];

?>


<?php

if ($_POST['odoslane']=='true') {

    //xml upload
    $upl_xml_target = $_SERVER["DOCUMENT_ROOT"]."/piesne/data/".(int)$_POST['id_piesen']."/".basename($_FILES["upl_xml"]["name"]);
    $upl_xml_temp=$_FILES["upl_xml"]["tmp_name"];
    move_uploaded_file($upl_xml_temp, $upl_xml_target);
   
    //mp3 upload
    $upl_mp3_target = $_SERVER["DOCUMENT_ROOT"]."/piesne/data/".(int)$_POST['id_piesen']."/".basename($_FILES["upl_mp3"]["name"]);
    $upl_mp3_temp=$_FILES["upl_mp3"]["tmp_name"];
    move_uploaded_file($upl_mp3_temp, $upl_mp3_target);
   
    //png upload
    $upl_png_target = $_SERVER["DOCUMENT_ROOT"]."/piesne/data/".(int)$_POST['id_piesen']."/".basename($_FILES["upl_png"]["name"]);
    $upl_png_temp=$_FILES["upl_png"]["tmp_name"];
    move_uploaded_file($upl_png_temp, $upl_png_target);
   
   
   
   //pridanie do databazy
    $q=mysql_query(sprintf("UPDATE piesne SET file_xml='%s', file_mp3='%s', file_png='%s' WHERE id_piesen=%s", 
           basename($_FILES["upl_xml"]["name"]), 
           basename($_FILES["upl_mp3"]["name"]),
           basename($_FILES["upl_png"]["name"]),
           (int)$_POST['id_piesen']));
    

}



if ($id_piesen<>0) {
  $q_edit=mysql_query(sprintf("SELECT * FROM piesne WHERE id_piesen=%s",(int)$id_piesen));
  $p_edit=mysql_fetch_object( $q_edit);
  //echo "<H1>".$p_edit->nazov_dlhy."xxx</H1>";
};


?>

<div class="l-page">
    <div class="container">

<p><a href="gen/abcweb.html?http://<?php echo  $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'];?>/piesne/data/<?php echo (int)$_POST['id_piesen'].'/'.basename($_FILES["upl_xml"]["name"])?>" target="_blank">Choď na adresu </a> a skopíruj údaje sem:</p>

<form action="04_prepojenia.php" method="post" class="l-form l-well">


  
  <div class="form-group row">	  

    <fieldset class="form-group">
    <label for="abc_notes">Noty piesne:</label>
    <textarea class="form-control" id="abc_notes" name="abc_notes" rows="15"><? echo $p_edit->abc_notes; ?>"</textarea>
  </fieldset>
  </div>

<div class="form-group row">	  
  
    <fieldset class="form-group">
    <label for="abc_settings">Nastavenia piesne:</label>

    <textarea class="form-control" id="abc_settings"  name="abc_settings" rows="5"><?php if ((int)$_GET['id_piesen']<>0) {echo $p_edit->abc_settings;} else { echo 'opt = {"jump":0,"no_menu":0,"repufld":0,"noplyr":0,"nocsr":0,"media_height":"","btns":1,"ipadr":"","mstr":0,"autscl":true,"ctrmed":0,"ctrnot":0,"lncsr":0,"opacity":0.2,"synbox":0,"speed":1,"top_margin":0,"yubvid":"","nomed":0,"delay":0,"repskip":0,"spdctl":0,"lopctl":0,"metro":0};';} ?>

</textarea>
  </fieldset>
  
</div> 


<div class="form-group row">	  
  
    <fieldset class="form-group">
    <label for="abc_times_arr">Načasovanie piesne:</label>
    <textarea class="form-control" id="abc_times_arr"  name="abc_times_arr" rows="5"><? echo $p_edit->abc_times_arr; ?></textarea>
  </fieldset>
  
</div> 


<div class="form-group row">	  
  <fieldset class="form-group">
    <label for="lyrics"><strong>Slová piesne:</strong></label>
    <textarea class="form-control" id="lyrics" name="lyrics" rows="15"><? echo $p_edit->lyrics; ?>"</textarea>
  </fieldset>
</div>  

<input type="hidden" name="odoslane" value="true">

<input type="hidden" name="update" value="true"><input type="hidden" name="id_piesen" value='<? echo $id_piesen;?>'> 



<button type="submit" class="l-btn l-btn--large l-btn--primary">Uložiť a pokračovať >></button>


</div></div>
</form>
<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"?>
