

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
                        <input id="autocomplete" onFocus="geolocate()" type="text" placeholder="Napr. Kocúrkovo" class="form-control input-lg">
                        <small class="text-muted">Resp. kde si bývali, keď si pieseň počuli prvýkrát?</small>
                        <input type="hidden" name="lat" id="lat" value="">
                        <input type="hidden" name="lng" id="lng" value="">

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
        //for (var component in componentForm) {
        //  document.getElementById(component).value = '';
        //  document.getElementById(component).disabled = false;
       // }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        //for (var i = 0; i < place.address_components.length; i++) {
          //var addressType = place.address_components[i].types[0];
         // alert(addressType);
         // if (componentForm[addressType]) {
          //  var val = place.address_components[i][componentForm[addressType]];
           // alert(val);
            //document.getElementById(addressType).value = val;
          //}
        //}
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

//$.get('/public/json/obce.json', function(data){
//  $("#mesto").typeahead({ 
//    source:data,
//    displayText: function(item){ return item.value;}
//  
//   });

// },'json');

</script>


<button type="submit" class="l-btn l-btn--large l-btn--primary">Odoslať informáciu</button>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgWx_CoLTLpPxc2bop5M8sE92k0UEFPTk&libraries=places&callback=initAutocomplete&language=sk">
