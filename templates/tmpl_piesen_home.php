<?php
    $theme="l-theme-green";
    $piesne_tab='class="active"';
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_piesne_header_home.php";

?>


<div class="l-promo">

    <div class="container">

        <div class="row">

            <div class="col-lg-9 col-lg-push-4 col-xl-7 col-xl-push-3">

                <H2>Nájdi pieseň, ktorá Ti chodí po rozume</H2>

<div class="input-group">
                <input type="text" class="form-control form-control-lg" placeholder="Nože, zadaj názov svojej piesne, či ju nájdeme">

                <span class="input-group-btn">
                    <button class="btn btn-secondary l-btn btn-lg l-btn--inverse form-control-lg" type="button">Hľadať!</button>
                </span>


                </div>
                <p class="text-muted-inverse"><small>Upozornenie: Náš projekt nachodí sa len na počiatku, z plánovaných 50-tisíc piesni dosiaľ len <?php echo $pocet_piesni; ?> je zdigitalizovaných. Nech ťa teda smútok nepremkýna, ak nenájdeš, čo si chcel(a). Vyčkaj času, ako husa klasu. Alebo tiež  môžeš <a href="/vyzva/">priložiť ruku k dielu a pomôcť nám</a>.</small></p>

</div>

       <div class="col-lg-3 col-lg-pull-8 col-xl-5 col-xl-pull-9">
<h3>Mapa</h3>
<div id="mapa_pokrytie" style="height:150px"></div>
<BR>
<script>
var map = L.map('mapa_pokrytie').setView([48.812,19.473], 6);
                        var markers = L.markerClusterGroup({    
                            spiderfyOnMaxZoom: false,
                            showCoverageOnHover: false,
                            zoomToBoundsOnClick: false});
                        var baseLayer=L.tileLayer(
                            'https://api.mapbox.com/styles/v1/jelusamot/citx7z0my00aj2irqjs36mmeh/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoiamVsdXNhbW90IiwiYSI6ImNpZnN0NGM2MjAxd2N1NGx6OWk2Y3BjOGsifQ.aFGe3wpK5fbZbrpefXxDNA').addTo(map);

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
                                    }).addTo(map);
                                    


                                    myLayer_p_<?php echo $point["c"] ?>.on('click', function(e) {
                                        window.location.href="mapa.php";

                                    });

                                       
                                   
                        <?php } ?>



map.addLayer(map);
</script>
</div>



            </div> 

        </div>

    </div>

</div>



<div class="container"><div class="row l-page">
<div class="col-md-7">
<h2>Najnovšie pridané piesne</h2>

<?php foreach ($piesne as $key=>$piesen) { ?>
        <div class="col-md-12">
        <div class="l-song-item l-well"> 
        <h3><a href="piesen.php?<?php echo $piesen['id_piesen'];?>"><?php echo ($piesen["nazov_dlhy"]==""?"(ešte nezdigitalizované)":$piesen["nazov_dlhy"]."…");?></a></h3>
        <?php if ($piesen['file_mp3']<>"") { 
            $p_button="playpause_p_".$piesen['id_piesen'];
            $p_audio="aud_".$piesen['id_piesen'];
            ?> 

<!--        <a class="l-btn l-btn--primary l-btn--small" id="<?php echo $p_button;?>" 
            onclick="playpause('<?php echo "#".$p_audio;?>','<?php echo "#".$p_button;?>');" ><i class="fa fa-play"></i></a>
        <audio id="<?php echo $p_audio; ?>" controls="controls" src="data/<?php echo $piesen['id_piesen']; ?>/<?php echo $piesen['file_mp3']; ?>" style="display:none">Your browser does not support the audio element.</audio>
-->
        <?php }?>

        <a href="piesen.php?<?php echo $piesen['id_piesen'];?>"><img src='data/<?php echo $piesen['id_piesen']; ?>/<?php echo $piesen["file_png"];?>'></a>
        <!--<p class="l-song-subh">
            <small>Zozbieral(a): <a href="zberatel.php?id=<?php echo $piesen['id_zberatel']; ?>"><?php echo $piesen['zberatelia_meno']; ?></a> (<?php echo $piesen['datum_zbieranie']; ?>) ● Zdigitalizoval(a): <a href="digitalizator.php?id=<?php echo $piesen['id_digitalizator']; ?>"><?php echo $piesen['digitalizatori_meno']; ?></a> (<?php echo $piesen['datum_digitalizacia']; ?>) ● Pôvodná zbierka <a href="zbierky.php?id=<?php echo $piesen['id_zbierka'] ?>"><?php echo $piesen['zbierky_nazov'] ?></a></small>
        </p>-->
        </div><BR>



        </div><div></div>
    <?php } ?>

<div align="center"><button type="submit" class="l-btn l-btn--large l-btn--primary">Všetky piesne (<?php echo $pocet_piesni;?>)</button></div>

</div>


<div class="col-md-5">
<H2>Najpopulárnejšie</H2>
<ol>
<?php foreach ($piesne_top as $key=>$piesen) { ?>
    <li><a href="piesen.php?<?php echo $piesen['id_piesen'];?>"><?php echo $piesen["nazov_dlhy"]?></a> <small><i class="fa fa-eye" aria-hidden="true"></i><?php echo $piesen['videnia'] ?></small></li>

<?php } ?> 
</ol>


<h2>Pridaj sa do nášho newslettera</H2>
<p>Chceš <strong>najnovšie piesne a novinky</strong>, správy a zaujímavosti o ľudovej slovesnosti <strong>priamo do svojej schránky</strong>? Daj nám svoj e-mail.
<iframe width="100%" height="195" src="https://my.sendinblue.com/users/subscribe/js_id/2c7dt/id/3" frameborder="0" scrolling="auto" allowfullscreen style="display: block;margin-left: auto;margin-right: auto;"></iframe>


<h2>Miluj Ľuda na Facebooku</h2>
<div class="fb-like-box" data-href="https://www.facebook.com/ludo.slovensky" data-height="50px" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div></div>



</div>


</div>





</div></div>



<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"?>
