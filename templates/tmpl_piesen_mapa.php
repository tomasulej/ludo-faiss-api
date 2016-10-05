<?php

    include $_SERVER["DOCUMENT_ROOT"]."/piesne/lib.piesne.php";
    require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
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
                        L.mapbox.accessToken = 'pk.eyJ1IjoiamVsdXNhbW90IiwiYSI6ImNpZnN0NGM2MjAxd2N1NGx6OWk2Y3BjOGsifQ.aFGe3wpK5fbZbrpefXxDNA';
                        var map = L.map('mapa').setView([48.812,19.473], 7);
                        L.tileLayer(
                            'https://api.mapbox.com/styles/v1/jelusamot/citx7z0my00aj2irqjs36mmeh/tiles/256/{z}/{x}/{y}?access_token=' + L.mapbox.accessToken, {
                            tileSize: 512,
                            zoomOffset: -1,
                         }).addTo(map);



                        <?php foreach ($p_mapa_point as $key=>$point) { ?>
                                    var p_<?php echo $point["c"]; ?> = [
                                        <?php echo $point["area"]; ?>

                                    ];


                                    var myLayer_p_<?php echo $point["c"] ?> = L.mapbox.featureLayer(p_<?php echo $point["c"] ?>, {
                                        pointToLayer: function(feature, latlon) {
                                           
  
                                            return L.marker(latlon, {
                                                fillColor:  '#66CC00',
                                                'paint': {
                                                    'fill-color': 'blue',
                                                    'fill-opacity': 0.8,
                                                },
                                                fillOpacity: 1.0,
                                                stroke: true
                                            });
                                        }
                                    }).addTo(map);




                        <?php } ?>




</script>

</div>
</div>
</div>
</div>
</div>

<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"?>
<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
