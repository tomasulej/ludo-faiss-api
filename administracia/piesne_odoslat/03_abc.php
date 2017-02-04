<?php 

$id_piesen=(int)$_POST['id_piesen'];
if ($id_piesen==0) {$id_piesen=$_GET['id_piesen'];}

$nadpis="Pridávanie piesne: obsah piesne (krok 3/5)";
include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_administracia_header.php";

if ($id_piesen<>0) {
  $q_edit=mysql_query(sprintf("SELECT * FROM piesne WHERE id_piesen=%s",(int)$id_piesen));
  $p_edit=mysql_fetch_object( $q_edit);
  //echo "<H1>".$p_edit->nazov_dlhy."xxx</H1>";
} else {
  $id_piesen=$_GET['id_piesen'];
  $q_edit=mysql_query(sprintf("SELECT * FROM piesne WHERE id_piesen=%s",(int)$id_piesen));
  $p_edit=mysql_fetch_object( $q_edit);
}


	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');


?>


<?php

if ($_POST['odoslane']=='true') {

    rmdir ($_SERVER["DOCUMENT_ROOT"]."/piesne/data/".(int)$_POST['id_piesen']);
    mkdir($_SERVER["DOCUMENT_ROOT"]."/piesne/data/".(int)$_POST['id_piesen']);
    //xml upload
    if (!empty(basename($_FILES["upl_xml"]["name"]))) {
        $upl_xml_target = $_SERVER["DOCUMENT_ROOT"]."/piesne/data/".(int)$_POST['id_piesen']."/".basename($_FILES["upl_xml"]["name"]);
        unlink($upl_xml_target);
        $upl_xml_temp=$_FILES["upl_xml"]["tmp_name"];
        move_uploaded_file($upl_xml_temp, $upl_xml_target);

        $q=mysql_query(sprintf("UPDATE piesne SET file_xml='%s' WHERE id_piesen=%s", basename($_FILES["upl_xml"]["name"]),  (int)$_POST['id_piesen']));

    }
    //mp3 upload
if (!empty(basename($_FILES["upl_mp3"]["name"]))) {
    $upl_mp3_target = $_SERVER["DOCUMENT_ROOT"] . "/piesne/data/" . (int)$_POST['id_piesen'] . "/" . basename($_FILES["upl_mp3"]["name"]);
    unlink($upl_mp3_target);

    $upl_mp3_temp = $_FILES["upl_mp3"]["tmp_name"];
    move_uploaded_file($upl_mp3_temp, $upl_mp3_target);

    $q2=mysql_query(sprintf("UPDATE piesne SET file_mp3='%s' WHERE id_piesen=%s", basename($_FILES["upl_mp3"]["name"]),  (int)$_POST['id_piesen']));

}


    //png upload
if (!empty(basename($_FILES["upl_png"]["name"]))) {
    $upl_png_target = $_SERVER["DOCUMENT_ROOT"] . "/piesne/data/" . (int)$_POST['id_piesen'] . "/" . basename($_FILES["upl_png"]["name"]);
    unlink($upl_png_target);

    $upl_png_temp = $_FILES["upl_png"]["tmp_name"];
    move_uploaded_file($upl_png_temp, $upl_png_target);
    $q=mysql_query(sprintf("UPDATE piesne SET file_png='%s' WHERE id_piesen=%s", basename($_FILES["upl_png"]["name"]),  (int)$_POST['id_piesen']));

}

    //pdf upload
if (!empty(basename($_FILES["upl_pdf"]["name"]))) {
    $upl_pdf_target = $_SERVER["DOCUMENT_ROOT"] . "/piesne/data/" . (int)$_POST['id_piesen'] . "/" . basename($_FILES["upl_pdf"]["name"]);
    unlink($upl_pdf_target);

    $upl_pdf_temp = $_FILES["upl_pdf"]["tmp_name"];
    move_uploaded_file($upl_pdf_temp, $upl_pdf_target);
    $q=mysql_query(sprintf("UPDATE piesne SET file_pdf='%s' WHERE id_piesen=%s", basename($_FILES["upl_pdf"]["name"]),  (int)$_POST['id_piesen']));

}
   


}





?>

<div class="l-page">
    <div class="container">
<p>Toto bude trošku náročnejšie, ale zvládneme to:</p>

<ol>
<li><a href="gen/abcweb.html?http://<?php echo  $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'];?>/piesne/data/<?php if ((int)$_POST['id_piesen']<>0) { echo (int)$_POST['id_piesen'].'/'.basename($_FILES["upl_xml"]["name"]);} else {echo $p_edit->id_piesen.'/'.$p_edit->file_xml;} ?>" target="_blank">Klikni sem</a> - do nového okna sa ti otvorila stránka, kde by si mal(a) vidieť noty. </li>
<li>Na tejto stránke klikni v pravo na "Menu" a zaškrtni "Enable sync". Následne úplne dole klikni na "Save".<!--<BR><img src="/public/img/navod_save_notes.gif"></li>-->
<li>Otvoril sa teraz textový súbor, jeho obsah skopíruj do kolonky nižšie:<!--<BR><img img src="/public/img/navod_save_notes2.png"><br>
<font color="green">Zelenou</font> sú noty piesne, <font color="yellow">žltou</font>časovanie piesne a <font color="blue">modrou</font> nastavenia piesne.-->
</li>
</ol>

<form action="04_crop.php" method="post" class="l-form l-well">

  <div class="form-group row">	  

    <label for="abc_all">Sem skopíruj celý obsah a klikni na načítať údaje:</label>
    <textarea class="form-control" id="abc_all" name="abc_all" rows="15"></textarea>
<button type="button" class="l-btn l-btn--large l-btn--primary" onclick="nacitat_udaje()">Načítať údaje</button>

  </div>
<script>
function nacitat_udaje() {
  var abc_all=$('#abc_all').val();
  
  //abc_notes
  var abc_notes=abc_all.substring(abc_all.indexOf("abc_arr"));
  abc_notes=abc_notes.replace("\"T:Title\",\n","");
  abc_notes=abc_notes.replace("1.00cm","0.00cm");
  abc_notes=abc_notes.replace("1.00cm","0.00cm");

  abc_notes=abc_notes.replace('treble nm=\\"Klavír\\" snm=\\"Kl.\\"',"");
  abc_notes=abc_notes.replace('treble nm=\"Klaví­r\" snm=\"Kl.\"',"");


  abc_notes=abc_notes.replace(abc_notes.substring(abc_notes.indexOf("Q:")-2,abc_notes.indexOf(",",abc_notes.indexOf("Q:"))+1),"");
  $("#abc_notes").val(abc_notes); 

  //abc_settings
  var abc_settings=abc_all.substring(abc_all.indexOf("opt = "),abc_all.indexOf(";",abc_all.indexOf("opt = ")+1));
  abc_settings=abc_settings.replace('"autscl":0','"autscl":true');
  $("#abc_settings").val(abc_settings); 


  //abc_times_arr
  var abc_times_arr=abc_all.substring(abc_all.indexOf("times_arr"),abc_all.indexOf(";",abc_all.indexOf("times_arr"))+1);
  alert(abc_times_arr);
  $("#abc_times_arr").val(abc_times_arr); 

}


</script>



  
  <div class="form-group row">	  

    <label for="abc_notes">Noty piesne:</label>
    <textarea class="form-control" id="abc_notes" name="abc_notes" rows="2"><?php echo $p_edit->abc_notes; ?></textarea>
  </div>

<div class="form-group row">	  
  
    <label for="abc_settings">Nastavenia piesne:</label>

    <textarea class="form-control" id="abc_settings"  name="abc_settings" rows="2"><?php if ((int)$_GET['id_piesen']<>0 OR (int)$_POST['id_piesen']<>0) {echo $p_edit->abc_settings;} else { echo 'opt = {"jump":0,"no_menu":0,"repufld":0,"noplyr":0,"nocsr":0,"media_height":"","btns":1,"ipadr":"","mstr":0,"autscl":true,"ctrmed":0,"ctrnot":0,"lncsr":0,"opacity":0.2,"synbox":0,"speed":1,"top_margin":0,"yubvid":"","nomed":0,"delay":0,"repskip":0,"spdctl":0,"lopctl":0,"metro":0};';} ?>

</textarea>
  
</div> 


<div class="form-group row">	  
  
    <label for="abc_times_arr">Načasovanie piesne:</label>
    <textarea class="form-control" id="abc_times_arr"  name="abc_times_arr" rows="2"><?php echo $p_edit->abc_times_arr; ?></textarea>
  
</div> 

<HR>

<p>Slová piesne pridávame <strong>pomocou špeciálnych značiek</strong>, ktoré nám umožnia synchronizovať ich s hudbou.</p>
<img src="/public/img/navod_lyrics.png">
<ol>
<li>Každú jednu slohu obalíme do "{}"</li>
<li>Pomocou znaku "<strong>|</strong>" určíme kde sa začínajú a končia takty.</li>
<li>V prvej slohe opakovania "/::/" zrušíme a všetko vypisujeme.</li>
<li>Takto pod seba vypíšeme všetky slohy piesne</li>
</ol>
Uvedený príklad teda zapíšeme takto:<BR>
<blockquote><code>
{|Sekerenka| pántok|<BR> 
nechce rúbat| ruby;|<BR>
sekerenka| pántok|<BR>
nechce rúbat| duby;|<BR>
takžo je| milovat,|<BR>
kdo koho ne|lúbi.|}<BR>
</code></blockquote>




<div class="form-group row">	  
    <label for="lyrics"><strong>Slová piesne:</strong></label>
    <textarea class="form-control" id="lyrics" name="lyrics" rows="15"><?php echo $p_edit->lyrics; ?></textarea>
</div>  

<input type="hidden" name="odoslane" value="true">

<input type="hidden" name="update" value="true"><input type="hidden" name="id_piesen" value='<?php echo $id_piesen;?>'> 



<button type="submit" class="l-btn l-btn--large l-btn--primary">Uložiť a pokračovať >></button>


</div></div>
</form>
<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"?>
