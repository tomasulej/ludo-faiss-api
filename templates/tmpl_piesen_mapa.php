<?php

    $theme="l-theme-green";
    $piesne_tab='class="active"';


    include $_SERVER["DOCUMENT_ROOT"]."/piesne/lib.piesne.php";
    require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
    require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_piesne_header.php";

?>

<div class="l-page">

<div class="container">
        <div class="l-song-header" data-role="header">
            <div class="row">
            <div class="col-md-12">

            <h2>Ľudové piesne na mape</h2>

            </div>
            </div>
        </div>


<div class="l-song">
<div class="row">
<div class="col-md-12">
<div id="mapa" class="map" style="height:450px"></div>


<script>
                        //L.mapbox.accessToken = 'pk.eyJ1IjoiamVsdXNhbW90IiwiYSI6ImNpZnN0NGM2MjAxd2N1NGx6OWk2Y3BjOGsifQ.aFGe3wpK5fbZbrpefXxDNA';
                        
                        var map = L.map('mapa').setView([48.812,19.473], 7);
                        var baseLayer=L.tileLayer(
                            'https://api.mapbox.com/styles/v1/jelusamot/citx7z0my00aj2irqjs36mmeh/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoiamVsdXNhbW90IiwiYSI6ImNpZnN0NGM2MjAxd2N1NGx6OWk2Y3BjOGsifQ.aFGe3wpK5fbZbrpefXxDNA', {
                            tileSize: 512,
                            zoomOffset: -1,
                         }).addTo(map);



                        <?php foreach ($p_mapa_point as $key=>$point) { ?>
                                    var p_<?php echo $point["c"]; ?> = [
                                        <?php echo $point["area"]; ?>

                                    ];


                                    var myLayer_p_<?php echo $point["c"] ?> = L.geoJSON(p_<?php echo $point["c"] ?>, {
                                        pointToLayer: function(feature, latlon) {
                                           
  
                                            return L.marker(latlon, {
                                                fillColor:  '#66CC00',
                                                'paint': {
                                                    'fill-color': 'blue',
                                                    'fill-opacity': 0.8,
                                                },
                                                fillOpacity: 0.3,
                                                stroke: true
                                            });
                                        }
                                    }).addTo(map).bindPopup("Načítavam");
                                    


                                    myLayer_p_<?php echo $point["c"] ?>.on('click', function(e) {
                                        //alert("čau!");
                                        //var popup = new L.Popup();
                                        var popup = myLayer_p_<?php echo $point["c"] ?>.getPopup();

                                        var url="piesne.mapa.popup.php?id_lokalita=<?php  echo $point["id_lokalita"];?>";
                                        $.get(url).done(function(data) {
                                             popup.setContent(data);
                                             popup.update();
                                             //alert(data);
                                        });
                                    });  



                        <?php } ?>

function ajaxLokalita(id_lokalita) {
    return id_lokalita;

}

// don't forget to include leaflet-heatmap.js
/*
var testData = {
  max: 8,
  data: [{lat: 24.6408, lng:46.7728, count: 300},{lat: 50.75, lng:-1.55, count: 19}]
};



var cfg = {
  // radius should be small ONLY if scaleRadius is true (or small radius is intended)
  // if scaleRadius is false it will be the constant radius used in pixels
  "radius": 2,
  "maxOpacity": .8, 
  // scales the radius based on map zoom
  "scaleRadius": true, 
  // if set to false the heatmap uses the global maximum for colorization
  // if activated: uses the data maximum within the current map boundaries 
  //   (there will always be a red spot with useLocalExtremas true)
  "useLocalExtrema": true,
  // which field name in your data represents the latitude - default "lat"
  latField: 'lat',
  // which field name in your data represents the longitude - default "lng"
  lngField: 'lng',
  // which field name in your data represents the data value - default "value"
  valueField: 'count'
};


var heatmapLayer = new HeatmapOverlay(cfg);

var map = new L.Map('mapa', {
  center: new L.LatLng(25.6586, -80.3568),
  zoom: 4,
  layers: [baseLayer, heatmapLayer]
});

heatmapLayer.setData(testData);

*/


</script>

</div>
</div>
</div>
</div>
</div>

<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"?>
<!-- jQuery first, then Bootstrap JS. -->
<script src="/public/js/heatmap.min.js"></script>

<script src="/public/js/leaflet-heatmap.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.0.1/dist/leaflet.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
