<?php 
    $id_piesen=(int)$_POST['id_piesen'];
    if ($id_piesen==0) {$id_piesen=$_GET['id_piesen'];}

    $nadpis="Pridávanie piesne: prepojenia, poznámky a náhľady (krok 4/5)";
    require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_administracia_header.php";
    include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

	error_reporting(E_ALL);
	ini_set('display_errors', '1');




if ($_POST['odoslane']=='true') {

        $lyrics=$_POST['lyrics']; 
        $abc_notes=$_POST['abc_notes']; 
        $abc_settings=$_POST['abc_settings']; 
        $abc_times_arr=$_POST['abc_times_arr']; 






        $query_update=sprintf(
        "UPDATE `piesne` SET 
        `lyrics`='%s', 
        `abc_notes`='%s', 
        `abc_settings`='%s', 
        `abc_times_arr`='%s' 
        WHERE id_piesen=%s;",
        mysql_real_escape_string($lyrics),
        mysql_real_escape_string($abc_notes),
        mysql_real_escape_string($abc_settings),
        mysql_real_escape_string($abc_times_arr),
        $id_piesen);

        //echo $query_update;
        $q=mysql_query($query_update);
}


if ($id_piesen<>0) {
  $q_edit=mysql_query(sprintf("SELECT * FROM piesne WHERE id_piesen=%s",(int)$id_piesen));
  $p_edit=mysql_fetch_object( $q_edit);
  //echo "<H1>".$p_edit->nazov_dlhy."xxx</H1>";
};


?>

<div class="l-page">
    <div class="container">

    <form action="05_prepojenia.php" method="post" class="l-form l-well">

<p><strong>Nastav ukazovateľ tak, aby <strong>ukazoval prvé dva takty</strong>.</strong>(nevieš ako na vec - <a href="/public/img/navod_nahlad.gif" target="_blank">klikni sem pre video</a>)</p>
<img id="image" style="max-width: 100%;" height="800px" src="<?php echo "http://".$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']."/piesne/data/".$p_edit->id_piesen."/".$p_edit->file_png?>">
<input type="input" class="form-control" id="img_width" name="img_width" placeholder="">
<input type="input" class="form-control" id="img_height" name="img_height" placeholder="">
<input type="input" class="form-control" id="img_x" name="img_x" placeholder="">
<input type="input" class="form-control" id="img_y" name="img_y" placeholder="">

<p><strong>Nastav ukazovateľ tak, aby ukazoval <strong>celú pieseň</strong></p>
<img id="image_full" style="max-width: 100%;" height="800px"  src="<?php echo "http://".$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']."/piesne/data/".$p_edit->id_piesen."/".$p_edit->file_png?>">
<input type="input" class="form-control" id="img_full_width" name="img_full_width" placeholder="">
<input type="input" class="form-control" id="img_full_height" name="img_full_height" placeholder="">
<input type="input" class="form-control" id="img_full_x" name="img_full_x" placeholder="">
<input type="input" class="form-control" id="img_full_y" name="img_full_y" placeholder="">



  <script>
    $(function () {
      var $image = $('#image');

      $image.cropper({
       aspectRatio: 4 / 1,   
        movable: false,
        zoomable: false,
        rotatable: false,
        scalable: false,
        //cropBoxResizable: false,
        crop: function(e) {
    // Output the result data for cropping image.
                $("#img_x").val(e.x);
                $("#img_y").val(e.y);
                $("#img_height").val(e.height);
                $("#img_width").val(e.width);


                //console.log(e.scaleX);
                //console.log(e.scaleY);
       }
      });

      $('#replace').on('click', function () {
        $image.cropper('replace', '../assets/img/picture-2.jpg');
      });
    /// image full
          var $image_full = $('#image_full');

      $image_full.cropper({
        movable: false,
        zoomable: false,
        rotatable: false,
        scalable: true,
        cropBoxResizable: false,
        crop: function(e) {
    // Output the result data for cropping image.
                $("#img_full_x").val(e.x);
                $("#img_full_y").val(e.y);
                $("#img_full_height").val(e.height);
                $("#img_full_width").val(e.width);


                //console.log(e.scaleX);
                //console.log(e.scaleY);
       }
      });

      $('#replace').on('click', function () {
        $image_full.cropper('replace', '../assets/img/picture-2.jpg');
      });
    
    });
  </script>


<input type="hidden" name="odoslane" value="true">

<input type="hidden" name="update" value="true"><input type="hidden" name="id_piesen" value='<?php echo $id_piesen;?>'> 

  <div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="l-btn l-btn--large l-btn--primary">Uložiť zmeny a pokračovať >></button>
    </div>
  </div>
</form>

    </div>
</div>

<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"; ?>

  <link rel="stylesheet" href="cropper.css">
  <script src="cropper.js"></script>