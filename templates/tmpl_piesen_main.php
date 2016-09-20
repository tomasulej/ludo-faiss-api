<?php

include $_SERVER["DOCUMENT_ROOT"]."/piesne/lib.piesne.php";

require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
?>


<div class="l-page">

    <div class="container">

        <div class="l-song-header" data-role="header">
            <div class="row">
                <div class="col-md-1 col-xs-2">
                    <a id="playpause_main" class="l-btn l-btn--primary l-btn--small l-btn--play" onclick="playpause('#aud','#playpause_main');"><i class="fa fa-play"></i></a>
                </div>
                <div class="col-md-6 col-xs-10">
                    <h1>
                        <?php echo $piesen->nazov_dlhy;?>
                    </h1>


                </div>
                <div class="col-md-5 col-xs-12 l-song-download">
                    Stiahnuť:
                    <a class="l-btn l-btn--primary l-btn--small" href="<?php echo $xml_link; ?>">noty</a>
                    <a class="l-btn l-btn--primary l-btn--small" href="<?php echo $mp3_link; ?>">hudbu</a>
                    <a class="l-btn l-btn--primary l-btn--small" href="<?php echo $pdf_link; ?>">vytlačiť (pdf)</a>

                </div>

            </div>
        <p class="l-song-subh">
            <small>Zozbieral(a): <a href="zberatel.php?id=<?php echo $piesen->id_zberatel; ?>"><?php echo $piesen->zberatelia_meno; ?></a> (<?php echo $piesen->datum_zbieranie; ?>) ● Zdigitalizoval(a): <a href="digitalizator.php?id=<?php echo $piesen->id_digitalizator; ?>"><?php echo $piesen->digitalizatori_meno; ?></a> (<?php echo $piesen->datum_digitalizacia; ?>) ● Pôvodná zbierka <a href="zbierky.php?id=<?php echo $piesen->id_zbierka ?>"><?php echo $piesen->zbierky_nazov ?></a></small>
        </p>
        </div>




        <div class="l-song">

            <div class="row">

                <div class="col-md-12">

                    <div id="meddiv" style="display:none"   >
                            <audio id="aud" controls="controls" ontimeupdate="show_lyrics(this.currentTime)" autoplay>Your browser does not support the audio element.</audio>
                            <video id="vid" controls="controls" autoplay style="display:none">Your browser does not support the video element.</video>
                            <div id="vidyub"></div>
                    </div>
                    <div id="streep"></div>
                    <div id="notation">
                    </div>



                </div>

            </div>

        </div>

        <div id="lyrics" class="l-song-lyrics">
            
        <?php echo lyrics2html($piesen->lyrics) ?>


        </div>


<?php if (!empty($poznamky)) { ?>
    <div class="l-song-notes">
    <H2>Poznámky</H2>

    <ul>
    <?php foreach ($poznamky as $key=>$poznamka) { ?>
        <li><?php echo $poznamka; ?></li>
    <?php } ?>
    </ul>

    </div>
<?php } ?>


<?php if (!empty($podobne)) {  ?>

    <div class="l-song-similar">
    <h2>Podobné piesne</h2>

    <div class="row">
    <?php foreach ($podobne as $key=>$p_piesen) { ?>
        <div class="col-md-4">
        <div class="l-song-item l-well">
        <h3><a href="piesen.php?<?php echo $p_piesen['id_piesen'];?>"><?php echo ($p_piesen["nazov_kratky"]==""?"(ešte nezdigitalizované)":$p_piesen["nazov_kratky"]."…");?></a></h3>
        <?php if ($p_piesen['file_mp3']<>"") { 
            $p_button="playpause_p_".$p_piesen['id_piesen'];
            $p_audio="aud_".$p_piesen['id_piesen'];
            ?> 

        <a class="l-btn l-btn--primary l-btn--small" id="<?php echo $p_button;?>" 
            onclick="playpause('<?php echo "#".$p_audio;?>','<?php echo "#".$p_button;?>');" ><i class="fa fa-play"></i></a>
        <audio id="<?php echo $p_audio; ?>" controls="controls" src="<?php echo $p_piesen['file_mp3']; ?>" style="display:none">Your browser does not support the audio element.</audio>
        <?php }?>

        <a href="piesen.php?<?php echo $p_piesen['id_piesen'];?>"><img src='<?php echo $p_piesen["file_png"];?>'></a>
        </div>
        </div>
    <?php } ?>
    </div>
<?php } ?>

<?php echo ($podobne_cudzie=="" ? "":"<p><small><strong>Podobné v iných zbierkach:</strong> ".$podobne_cudzie ); ?> </small></p>




    <div class="l-song-details">

            <div class="row">

                <div class="col-md-4">
                    <h3>Podrobnosti</h3>

                <strong>Názov</strong>: <?php echo $piesen->nazov_dlhy ?><BR>
                <strong>Pôvodná zbierka</strong>: <a href="#"><?php echo $piesen->zbierky_nazov?></a><BR>
                <strong>Identifikátor</strong>: <?php echo $piesen->identifikator?> <BR>
                <strong>Zberateľ</strong>: <a href="#"><?php echo $piesen->zberatelia_meno?></a><BR>
                <strong>Digitalizátor</strong>: <a href="#"><?php echo $piesen->digitalizatori_meno?></a><BR>
                <strong>Hudba</strong>: <a href="#"><?php echo $piesen->hudobnici_meno?></a><BR>
                <strong>Tempo</strong>: <a href="#"><?php echo $piesen->tempo?></a><BR>
                <strong>Dátum zozbierania</strong>: <?php echo $piesen->datum_zbieranie?><BR>
                <strong>Dátum digitalizácie</strong>: <?php echo $piesen->datum_digitalizacia?><BR>


<?php if (!empty($p_mena)) { ?>
                    <h3>Osoby a obsadenie</h3>

                    <?php foreach ($p_mena as $key=>$meno) { ?>
                    <div><a href="osoby.php?id=<?php echo $meno['meno_id']; ?>">
                    
                    <?php echo 
                     ($meno["pohlavie"]==1 ? "♂ ":"♀ ").$meno["meno"];?></a>
                    <?php } ?>
    </div>

<?php }?>


</div>
<?php if (!empty($p_mapa) OR !empty($p_mapa_point) OR !empty($zberatel_miesto) OR !empty($zberatel_vyskyt)) { ?>
                <div class="col-md-8">

                    <h3>Mapa piesne <a href="/piesne/mapa/"><small><i class="fa fa-map-o"></i> Pozrieť mapu všetkých piesní</small></a></h3>

                   <?php if (!empty($zberatel_vyskyt->id_lokalita)) { ?>
                        <p><strong>Kde sa spieva:</strong> <i class="fa fa-map-signs"></i> <a href="lok.php?id="><?php echo $zberatel_vyskyt->meno; ?></a><br>
                    <?php } ?>
                    <?php if (!empty($zberatel_miesto->id_lokalita)) { ?>
                        <p><strong>Kde bola zozbieraná:</strong> <i class="fa fa-map-signs"></i> <a href="lok.php?id="><?php echo $zberatel_miesto->meno; ?></a><br>
                    <?php } ?>
                    <?php if (!empty($p_mapa_point)) { ?>
                        <strong>Miesta spomenuté piesni</strong>:  
                        
                         <?php 
                         $i = 0;
                         $numItems = count($p_mapa);   
                         foreach ($p_mapa as $key=>$point_wording) { ?>

                        <span style="color:#66CC00;"><i class="fa fa-map-marker"></i></span>
                        <a href="lok.php?id=<?php echo $point_wording['id']; ?>"><?php echo $point_wording['meno']; ?></a>
                        <?php  //if(++$i === $numItems) { echo "."; } else { echo ","; } ?> 
                        
                        <?php } ?>


                    <?php } ?>

                    <?php if (!empty($p_mapa_point) OR !(empty($zberatel_miesto)) OR !empty($zberatel_vyskyt)) { ?>


                    <div id='mapa' class='map' Style="height:300px"> </div>

                    <script>
                        L.mapbox.accessToken = 'pk.eyJ1IjoiamVsdXNhbW90IiwiYSI6ImNpZnN0NGM2MjAxd2N1NGx6OWk2Y3BjOGsifQ.aFGe3wpK5fbZbrpefXxDNA';
                        var geojson_vyskyt = [<?php echo $zberatel_vyskyt->area; ?>];
                        var geojson_miesto = [<?php echo $zberatel_miesto->area; ?>];

                        var map = L.mapbox.map('mapa', 'mapbox.streets', {
                            scrollWheelZoom: false
                        }).setView([48.812,19.473], 6);

                        var myLayer = L.mapbox.featureLayer(geojson_miesto, {
                            pointToLayer: function(feature, latlon) {
                                return L.circleMarker(latlon, {
                                    fillColor:  '#66CC00',
                                    fillOpacity: 0.8,
                                    stroke: false
                                });
                            }
                        }).addTo(map);

                        var myLayer = L.mapbox.featureLayer(geojson_vyskyt, {
                            pointToLayer: function(feature, latlon) {
                                return L.circleMarker(latlon, {
                                    fillColor:  '#66CC00',
                                    fillOpacity: 0.8,
                                    stroke: false
                                });
                            }
                        }).addTo(map);


                        <?php foreach ($p_mapa_point as $key=>$point) { ?>
                                    var p_<?php echo $point["c"]; ?> = [
                                        <?php echo $point["area"]; ?>

                                    ];


                                    var myLayer_p_<?php echo $point["c"] ?> = L.mapbox.featureLayer(p_<?php echo $point["c"] ?>, {
                                        pointToLayer: function(feature, latlon) {
                                            return L.circleMarker(latlon, {
                                                fillColor:  '#66CC00',
                                                'paint': {
                                                    'fill-color': '#088',
                                                    'fill-opacity': 0.8
                                                },
                                                fillOpacity: 0.8,
                                                stroke: false
                                            });
                                        }
                                    }).addTo(map);

                        <?php } ?>


                       
                    </script>

                </div>
       <?php } }?>
       
            </div>



        </div>

    </div>

</div>


<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"?>



<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>

<script>
    $('.switch li a').click(function(){
        var color = $(this).attr('class').split('-')[1];
        $('body').removeClass().addClass('l-theme-' + color);
    });
    
    function show_lyrics(cas) 
    {
     var counter=1;
        for (var i = 0, len = times_arr.length; i < len; i++) {
            for (var j = 0, len2 = times_arr[i].length; j < len2-1; j++) {
                if ((cas>times_arr[i][j]) && (cas<times_arr[i][j+1])) {
                    sp="#l"+counter;
                    $(sp).attr("style","background-color: #CED2F7");
                } 
                else {
                    sp="#l"+counter;
                    $(sp).attr("style","background-color: white");

                }
                counter++;	
            }
        }
    }


    function playpause(media_id,button_id) 
    {
     if ($(media_id)[0].paused) {
        $(media_id).trigger('play');
        $(button_id+' i').attr('class', "fa fa-pause");
    
     } else {    
        $(media_id).trigger('pause');
        $(button_id+' i').attr('class', "fa fa-play");
     }    
    }




</script>
    
<script src="http://wim.vree.org/js/abc2svg-1.js"></script>
<script src="http://wim.vree.org/js/abcweb-min.js"></script>
<script src="http://wim.vree.org/js/xml2abc-min.js"></script>
<script src="http://wim.vree.org/js/xml2abc-min.js"></script>
<script src="/public/js/abcjs_basic_2.3-min.js"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-575ac8e6862d0152"></script>


<script>

    function _d(role) {
        return '[data-role="' + role + '"]';
    }

    $("#aud").on("play", function (e) {
      $("#playpause_main"+' i').attr('class', "fa fa-pause");
    });

 
$("#aud").on("canplaythrough", function(e){
    duration=e.currentTarget.duration;
});    

$("#aud").on("timeupdate", function(event){
ctime=this.currentTime;
});



function abc2svg() {
	$('.abc').each(function(i, obj) {
		ABCJS.renderAbc(obj, $(obj).text()); 	
 
	});
}

	



    $("#aud").on("pause", function (e) {
       if(duration<=ctime) {alert('kokot!');};
       alert(ctime+"xxx"+duration);
    });

  $("#aud").bind('ended', function(){
    alert("kokot");
  });


    $(document).ready(function(){
        abc2svg();
        var headerScroll = false;
        var offsetTop = $(_d('header')).offset().top;

/*        $(window).scroll(function(){

            var scroll = $(window).scrollTop();
            if (scroll > offsetTop) {

                if (!headerScroll) {

                    $('.l-song').css('margin-top', $(_d('header')).height() + 'px');
                    $(_d('header')).addClass('l-song-header--float');

                    headerScroll = true;
                }

            } else {

                if (headerScroll) {

                    $('.l-song').css('margin-top', 0);
                    $(_d('header')).removeClass('l-song-header--float');
                    headerScroll = false;
                }
            }
        }); */
    

    
    
    });

</script>


</body>
</html>