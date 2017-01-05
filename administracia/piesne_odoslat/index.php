<?php 
$nadpis="Pridávanie piesne: výber";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_administracia_header.php";
?>


<div class="l-page">

    <div class="container">

<form action="01_meta.php" method="get" class="l-form l-well">
<?php
include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

?>


	  
  <div class="form-group row">	  



  <fieldset class="form-group">
    <label for="id_piesen" class="col-sm-2 form-control-label"><strong>Vyberte pieseň:</strong></label>
    <div class="col-sm-10">
    <select class="form-control" id="id_piesen" name="id_piesen">
		<?php
			$q=mysql_query("SELECT * FROM piesne WHERE stav<>1 ORDER BY id_piesen;");
			while ($piesne=mysql_fetch_object($q)) {
          			    printf("<option value='%s'>%s</option>",$piesne->id_piesen,
                          ($piesne->nazov_dlhy<>"") ? $piesne->identifikator." (".$piesne->nazov_dlhy.")":$piesne->identifikator);	

            }
			
		?>
    </select>
    	<p class="form-text text-muted">Vyberte poradové číslo piesne, ktoré chcete pridať prípadne upraviť.<BR>
        <small>Vysvetlivky: <i>I,II,III,D</i> => poradové číslo zbierky; za ním nasleduje <i>číslo</i> = poradové číslo piesne, uvedené v papierovej verzii piesne pred ňou. Ak už má pieseň u nás v databáze vyplnený <i>názov</i>, uvádza sa v zátvorke (v drvivej väčšine prípadov to znamená, že už bola predtým nahraná na server, ak takú pieseň vyberiete, môžete jej údaje meniť - prosím, používajte s rozumom).</small></p>

    </div>
  </fieldset>
  </div>	  
	  
	  
<button type="submit" class="l-btn l-btn--large l-btn--primary">Pokračovať v pridávaní >></button> <BR><BR> <a href="javascript:void(0);" onclick="window.location='01_variant.php?id_piesen='+$( '#id_piesen' ).val();">Pridať variant k tejto piesni</a> (použi len ak je už pieseň pridaná)

</form>



    </div> <!-- /container -->

</div>

<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"?>

  </body>
</html>

