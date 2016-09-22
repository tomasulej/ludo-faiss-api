<?php


function cropImage($imagePath, $startX, $startY, $width, $height, $dest)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->cropImage($width, $height, $startX, $startY);
    if($f=fopen($dest, "w")){ 
        $imagick->writeImageFile($f);
    }

    //return $imagick->getImageBlob();
}


    $nadpis="Pridávanie piesne: prepojenia a poznámky (krok 5/5)";
    require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_administracia_header.php";
    include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');
    
    $id_piesen=$_POST['id_piesen'];
    if ($id_piesen==0) {$id_piesen=$_GET['id_piesen'];}


if ($id_piesen<>0) {
  $q_edit=mysql_query(sprintf("SELECT * FROM piesne WHERE id_piesen=%s",(int)$id_piesen));
  $p_edit=mysql_fetch_object( $q_edit);
};









//spracuj nahlad obrazka
if ($_POST['odoslane']=='true') {
    $x=$_POST['img_x'];
    $y=$_POST['img_y'];
    $width=(float)$_POST['img_width'];
    $height=(float)$_POST['img_height'];
    $fileSrc=$_SERVER["DOCUMENT_ROOT"].'/piesne/data/'.$p_edit->id_piesen."/".$p_edit->file_png;
    $fileDst=$_SERVER["DOCUMENT_ROOT"]."/piesne/data/".$p_edit->id_piesen ."/".$p_edit->file_png;
    //echo $fileSrc."-".$fileDst;
    copy($fileSrc,$_SERVER["DOCUMENT_ROOT"]."/piesne/data/".$p_edit->id_piesen."/cela-piesen.png");
    $obrazok=cropImage($fileSrc,$x,$y,$width,$height,$fileDst);
}


?>

<div class="l-page">

    <div class="container">

<div><h2>Pridať poznámku</div>

<form action="ajax_poznamky.php" method="post" class="l-form l-well" id="odosli_poznamku">

    <div class="form-group row">	  
  <fieldset class="form-group">
    <label for="id_druh" class="col-sm-2 form-control-label"><strong>Druh poznámky</strong></label>
    <div class="col-sm-10">
    <select class="form-control" id="id_druh" name="id_druh">
		<option value='0'>Je priamo pod piesňou a je označená hviezdičkou (*)</option>
        <option value='1' selected>Je pod čiarou a je označená krížikom (&#10013;)</option>
        <option value='2' selected>Poznámka pridaná nami (Ľudo Slovenský)</option>

    </select>
    </div>
  </fieldset>
  </div>

    <input type="hidden" id="id_piesen" name="id_piesen" value="<?php echo (int)$id_piesen;?>">


  <div class="form-group row">	  
  <fieldset class="form-group">
    <label for="txt"><strong>Pridať poznámku:</strong></label>
    <textarea class="form-control" id="txt" name="txt" rows="4"></textarea>
  </fieldset>
  </div>



  <div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
        <a class="l-btn l-btn--large l-btn--primary" onclick="odosli_poznamku()">Vložiť poznámku a poslať ďalšiu</a>
    </div>
  </div>
 </form> 

 <script>

 function odosli_poznamku(){
    $.ajax({
           type: "POST",
           url: "ajax_poznamky.php",
           data: $("#odosli_poznamku").serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
               $('#txt').val("");

           }
         });
}

 function odosli_prepojenie(){
    $.ajax({
           type: "POST",
           url: "ajax_prepojenia.php",
           data: $("#odosli_prepojenie").serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
                              $('#txt_piesen2').val("");
                              

           }
         });
}
 

 </script>


<div><h2>Vytvoriť prepojenie medzi piesňami</div>

<form action="ajax_prepojenia.php" method="post" class="l-form l-well" id="odosli_prepojenie">

    <input type="hidden" id="id_piesen" name="id_piesen" value="<?php echo (int)$id_piesen;?>">


    <div class="form-group row">	  
  <fieldset class="form-group">
    <label for="id_vztah" class="col-sm-2 form-control-label"><strong>Druh prepojenia</strong></label>
    <div class="col-sm-10">
    <select class="form-control" id="id_vztah" name="id_vztah">
		<option value='0'>Je to textový odkaz na inú zbierku (napr. Rup(1) 17)</option>
        <option value='1' selected>Je to odkaz na Spevy, napísaný kurzívou = totožný nápev</option>
        <option value='2' selected>Je to odkaz na Spevy, napísaný normálnym písmom = bližšia príbuznosť</option>
        <option value='3' selected>Je to odkaz na Spevy v hranatých zátvorkách = vzdialenejšia príbuznosť</option>

    </select>
    </div>
  </fieldset>
  </div>

<script>
          $("#id_vztah").change(function(){
                var val = $(this).find("option:selected").attr("value");
                if (val==0) {
                    $("#div_txt_piesen2").show();
                    $("#txt_piesen2").focus();
                    $("#div_id_piesen2").hide();
                } else {
                    $("#div_txt_piesen2").hide();
                    $("#div_id_piesen2").show();
                }
          });
</script>


<div class="form-group row" style="display:none" id="div_txt_piesen2">
    <label for="txt_piesen2" class="col-sm-2 form-control-label"><strong>Textový odkaz:</strong></label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="txt_piesen2" name="txt_piesen2" placeholder="Napr. Rup(1) 17">
    </div>
</div>


 <fieldset class="form-group" id="div_id_piesen2">
    <label for="id_piesen2" class="col-sm-2 form-control-label"><strong>Vyberte pieseň:</strong></label>
    <div class="col-sm-10">
    <select class="form-control" id="id_piesen2" name="id_piesen2">
		<?php
			$q=mysql_query("SELECT * FROM piesne ORDER BY id_piesen;");
			while ($piesne=mysql_fetch_object($q)) {
          			    printf("<option value='%s'>%s</option>",$piesne->id_piesen,
                          ($piesne->nazov_dlhy<>"") ? $piesne->identifikator." (".$piesne->nazov_dlhy.")":$piesne->identifikator);	

            }
			
		?>
    </select>
    </div>
  </fieldset>




  <div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
        <a class="l-btn l-btn--large l-btn--primary" onclick="javascript:odosli_prepojenie()">Vytvoriť prepojenie a pridať ďalšie</a>
    </div>
  </div>
</form>


 </div>
 </div>

 <?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"?>
