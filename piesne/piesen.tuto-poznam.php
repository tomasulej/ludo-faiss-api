
<div id="vnutro_tutopoznam">
<?php 

include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

$id_piesen=(int)$_GET['id_piesen']; 





if ($_POST['odoslane_tutopoznam']=="true") {
  //echo $_POST['lokalita'].$_POST['rok_narodenia'];
  $q=mysql_query(sprintf("UPDATE user_vyskyt SET rok_narodenia=%s, lokalita='%s', lat=%s, lng=%s WHERE id_user_vyskyt=%s;",
    (int)$_POST['rok_narodenia'],
    $_POST['lokalita'],
    floatval($_POST['lat']),
    floatval($_POST['lng']),
    (int)$_POST['id_user_vyskyt']
  ));
  
?>
<div class="alert alert-success" role="alert">
  <p><strong>Perfektné</strong>, ďakujeme za pomoc, teraz už vieme všetko potrebné. Ak by ste mali chuť dostávať od nás občasný newsletter s novými piesňami a ďalšími informáciami o projekte, <a href="http://www.ludoslovensky.sk/newsletter.html">kliknite sem</a>.  </p>
</div>



<?php

 

} else {
  $id_piesen=(int)$_GET['id_piesen']; 
  $q=mysql_query(sprintf("INSERT INTO user_vyskyt (id_piesen) VALUES (%s);",$id_piesen));

  $q2=mysql_query("SELECT * FROM user_vyskyt ORDER BY id_user_vyskyt DESC LIMIT 1");
  $user_vyskyt=mysql_fetch_object($q2);
  $id_user_vyskyt=(int)$user_vyskyt->id_user_vyskyt;

?>
<div class="alert alert-success" role="alert">
  <p><strong>Ďakujeme za informáciu!</strong> Povedzte nám viac o tom, odkiaľ ste a kedy ste sa narodili a pomôžte nám tak <strong>mapovať ľudovú kultúru na Slovensku</strong>.</b></p>
</div>

  <style type="text/css">
    .pac-container {
      z-index: 10000 !important; }



  </style>

<script>
    //$("#rok_narodenia").atrr("selected");
    $("select[name=rok_narodenia] option[value=1980]").attr('selected','selected');
    
</script>


<form id="form_tutopoznam" method="post">
  <fieldset class="form-group">
    <label for="rok_narodenia" class="form-control-label"><strong>Rok vášho narodenia:</strong></label>
    <select class="form-control" id="rok_narodenia" name="rok_narodenia">
		<?php

                for ($x=2010; $x >= 1916; $x--) {
              	    printf("<option value='%s' selected>%s</option>",$x,$x);	
                }

		?>
    </select>
</fieldset>

<fieldset class="form-group">
                        <label for="autocomplete"><strong>Odkiaľ ste (mesto/obec):</strong></label>
                        <input id="autocomplete" name="lokalita" onFocus="geolocate()" type="text" placeholder="Napr. Kocúrkovo" class="form-control input-lg">
                        <small class="text-muted">Resp. kde si bývali, keď si pieseň počuli prvýkrát?</small>
                        <input type="hidden" name="lat" id="lat" value="">
                        <input type="hidden" name="lng" id="lng" value="">
                        <input type="hidden" name="odoslane_tutopoznam" id="odoslane_tutopoznam" value="true">
                        <input type="hidden" name="id_user_vyskyt" id="id_user_vyskyt" value="<?php echo $id_user_vyskyt; ?>">

</fieldset>



<script>
      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['(cities)'],
            componentRestrictions: {country: 'sk'}
            });

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }


function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
        $("#lat").val(place.geometry.location.lat());
        $("#lng").val(place.geometry.location.lng());

}

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
}

function odosli_formular(){

    $.ajax({
           type: "POST",
           url: "piesen.tuto-poznam.php",
           data: $("#form_tutopoznam").serialize(), // serializes the form's elements.
           success: function(data)
           {
               $('#vnutro_tutopoznam').html(data); // show response from the php script.
               //$('#vnutro_tutopoznam').val("");

           }
         });


}



</script>


<button type="button" onclick="odosli_formular()" class="l-btn l-btn--large l-btn--primary">Odoslať informáciu</button>

</form>   

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgWx_CoLTLpPxc2bop5M8sE92k0UEFPTk&libraries=places&callback=initAutocomplete&language=sk">
<?php } ?>


</div>