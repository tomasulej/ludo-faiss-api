<?php
    $theme="l-theme-green l-layout-song";
    $piesne_tab='class="active"';
require_once $_SERVER["DOCUMENT_ROOT"]."/piesne/lib.piesne.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_piesne_header.php";

?>


<div class="l-page">

    <div class="container">





        <div class="l-song-header" data-role="header">
            <div class="row">

                <div class="col-md-9">

                    <h1>
                        <?php echo $piesen->nazov_dlhy;?>
                    </h1>

                </div>

                <div class="col-md-3 l-right">
                    <a id="playpause_main" class="l-btn l-btn--primary l-btn--medium" onclick="playpause('#aud','#playpause_main');"><i class="fa fa-play"></i> Prehrať melódiu</a>
                </div>







            </div>

            <p class="l-song-subh hidden-md-down"> <!--class="hidden-md-down"-->
                <small>Zozbieral(a): <strong><!--<a href="zberatel.php?id=<?php echo $piesen->id_zberatel; ?>">--><?php echo $piesen->zberatelia_meno; ?><!--</a>--></strong> (<?php echo $piesen->datum_zbieranie; ?>) ● Zdigitalizoval(a): <strong><!--<a href="digitalizator.php?id=<?php echo $piesen->id_digitalizator; ?>">--><?php echo $piesen->digitalizatori_meno; ?><!--</a>--></strong> (<?php echo date("Y",strtotime($piesen->datum_digitalizacia)); ?>) ● Pôvodná zbierka <strong><!--<a href="zbierky.php?id=<?php echo $piesen->id_zbierka ?>">--><?php echo $piesen->zbierky_nazov ?><!--</a>--></strong></small>
            </p>


        </div>




        <div class="l-song">

            <div class="row">

                <div class="col-md-12">

                    <div id="meddiv" style="display:none"   >
                            <audio id="aud" controls="controls" ontimeupdate="show_lyrics(this.currentTime)">Your browser does not support the audio element.</audio>
                            <video id="vid" controls="controls" autoplay style="display:none">Your browser does not support the video element.</video>
                            <div id="vidyub"></div>
                    </div>
                    <div id="streep"></div>
                    <div id="notation">
                    </div>



                </div>

            </div>

        </div>

<div id="lyrics" class="l-song-lyrics" data-reveal-id="lyrics" data-height="200">
            
        <?php echo lyrics2html($piesen->lyrics) ?>




</div>




    </div>

    <?php if (!empty($poznamky)) { ?>

        <div class="l-song-notes">
            <HR width="10%" align="left">
            <small><strong>Poznámky:</strong>
            <ol>
                    <?php foreach ($poznamky as $key=>$poznamka) { ?>
                        <li><?php echo $poznamka["txt"]; ?></li>
                    <?php } ?>

                <?php echo ($podobne_cudzie=="" ? "":"<li><strong>Podobné piesne v iných, dosiaľ nezdigitalizovaných zbierkach:</strong> ".$podobne_cudzie ); ?> </li>

                    </ol></small>

        </div>
    <?php } ?>


<a href="#" data-reveal="lyrics" class="l-btn-reveal">Zobraziť viac <i class="fa fa-chevron-down"></i></a>

</div>








<div id="tuto-poznam_div" class="l-well l-know">
            <strong>Poznáte túto pieseň?</strong>
            Dajte nám vedieť! Pomôžete tým mapovať rozšírenie piesni na Slovensku:
            <button class="l-btn l-btn--primary l-btn--small" data-toggle="popover" id="tuto-poznam" data-trigger="focus" data-original-title="" title="">
                <i class="fa fa-star"></i> Túto pieseň poznám!</button>
                <a data-toggle="popover" data-content="Nie všetky staré piesne ešte niekto pozná a nie všetky sa dnes spievajú tam, kde boli pred stovkami rokov zozbierané. Snažíme sa preto &lt;strong&gt;mapovať, kde všade sa ešte dnes spievajú jednotlivé piesne&lt;/strong&gt;. Dajte nám vedieť, či pieseň poznáte a &lt;strong&gt;pomôžte nám v našom úsilí!&lt;/strong&gt; Ďakujeme :)"  data-original-title="" title=""><i class="fa fa-question-circle"></i>
                </a>
        </div>






<?php if (!empty($podobne)) {  ?>

<div id="carousel-similar" class="carousel slide l-song-similar" data-ride="carousel">
    <h2>Podobné piesne</h2>

    <div class="carousel-inner" role="listbox">
        <div class="carousel-item row active">

    <?php
    $pocitadlo=0;
    foreach ($podobne as $key=>$p_piesen) {
        $pocitadlo++;
    ?>



        <div class="col-md-4">
        <div class="l-song-item l-well">
        <h3><a data-toggle="modal" data-target="#estetunieje"><?php echo ($p_piesen["nazov_kratky"]==""?"(ešte nezdigitalizované)":$p_piesen["nazov_kratky"]."…");?></a></h3>
        <?php if ($p_piesen['file_mp3']<>"") { 
            $p_button="playpause_p_".$p_piesen['id_piesen'];
            $p_audio="aud_".$p_piesen['id_piesen'];
            ?> 

        <a class="l-btn l-btn--primary l-btn--small l-btn-play" id="<?php echo $p_button;?>"
            onclick="playpause('<?php echo "#".$p_audio;?>','<?php echo "#".$p_button;?>');" ><i class="fa fa-play"></i></a>
        <audio id="<?php echo $p_audio; ?>" controls="controls" src="<?php echo $p_piesen['file_mp3']; ?>" style="display:none">Your browser does not support the audio element.</audio>
        <?php }?>

        <a <?php if ($p_piesen['file_mp3']<>0) {echo "href=".$p_piesen['id_piesen'].'"';} else {echo 'data-toggle="modal" data-target="#estetunieje"'; }?>"><img src='<?php echo $p_piesen["file_png"];?>'></a>
        </div></div>

            <?php
           // if ($pocitadlo==3){echo "</div>";} //uzatvorit prve listbox
            if (($pocitadlo % 3 == 0)) {

            ?>
        </div>
        <div class="carousel-item row">

            <?php
            }

            ?>


    <?php } ?>
    </div></div>

<?php if ($pocitadlo>3) { ?>

    <a href="#carousel-similar" role="button" data-slide="prev" class="btn-left">
        <i class="fa fa-chevron-left"></i>
    </a>
    <a href="#carousel-similar" role="button" data-slide="next" class="btn-right">
        <i class="fa fa-chevron-right"></i>
    </a>
    </div>


<?php } } ?>




<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="estetunieje" id="estetunieje" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="estetunieje">Ďas to páral! Táto pieseň tu ešte nie je! :(</h3>
            </div>
            <div class="modal-body">
                <p>Desiatky digitalizátorov denne usilovne pracujú na tom, aby sa tisícky piesni dostali na internet - túto však ešte nestihli. Vyčkaj času alebo <a href="/vyzva">pridaj k nám</a> a bude to rýchlejšie :)</p>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Zatvoriť</button>

            </div>
        </div>
    </div>
</div>








    <div class="l-song-details">

            <div class="row">

                <div class="col-md-4">
                    <h3>Podrobnosti</h3>

                <strong><a onclick="vytlac();">Názov</strong>: <?php echo $piesen->nazov_dlhy ?><BR>
                <strong>Pôvodná zbierka</strong>: <?php echo $piesen->zbierky_nazov?><BR>
                <strong>Strana:</strong> <?php echo $piesen->strana; ?><BR>
                <strong>Identifikátor</strong>: <?php echo $piesen->identifikator?> <BR>
                <strong>Zberateľ</strong>: <?php echo $piesen->zberatelia_meno?><BR>
                <strong>Digitalizátor(ka)</strong>: <?php echo $piesen->digitalizatori_meno?></a><BR>
                <!--<strong>Hudba</strong>: <a href="#"><?php echo $piesen->hudobnici_meno?></a><BR>-->
                <strong>Tempo</strong>: <?php echo $piesen->tempo?></a><BR>
                <strong>Dátum zozbierania</strong>: <?php echo $piesen->datum_zbieranie?><BR>
                <strong>Dátum digitalizácie</strong>: <?php echo date("d.m.Y",strtotime($piesen->datum_digitalizacia));?><BR>
                 <strong>Stiahnuť</strong>:
                    <a href="stiahnut.php?id=<?php echo $piesen->id_piesen; ?>&format=xml"><i class="fa fa-music"></i> noty</a>, <a href="stiahnut.php?id=<?php echo $piesen->id_piesen ?>&format=mp3"><i class="fa fa-volume-up"></i> hudbu</a>
                    <?php if ($piesen->file_pdf<>"") { ?>
                    , <a href="stiahnut.php?id=<?php echo $piesen->id_piesen; ?>&format=pdf"><i class="fa fa-photo"></i> originál</a>
                    <?php } ?>

                    <!-- <a href=""><i class="fa fa-print"></i> vytlačiť</a> -->
                    <HR>
                    <p><a class="l-btn l-btn--primary l-btn--small" data-toggle="modal" data-target="#detaily"><i class="fa fa-info"></i> Všetky informácie o piesni</a></p>


                    <div class="modal fade bd-example-modal-lg" id="detaily" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" id="detaily">
    <div class="modal-content">
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="myModalLabel"><?php echo $piesen->nazov_dlhy; ?> (všetky informácie o piesni)</h3>
      </div>
      <div class="modal-body">

      <H4>Zdroje informácii o tejto piesni</H4>
      <p>Noty, texty, poznámky a ďalšie informácie o piesni, ktoré uvádzame na týchto webových stránkach vychádzajú z viacerých zdrojov - 1. z rukopisných informácii zberateľov a prispievateľov zbierky Slovenské Spevy; 2. z pera redakcie prvého knižného vydania Slovenských spevov; 3. od zostavovateľa druhého vydania Spevov Ladislava Galka (<a href="">pozri viac</a> o tom ako vznikala zbierka Slovenské spevy), alebo 4. tak, že ich na tento web z iných zdrojov pridali spolupracovníci webu Ľudo Slovenský. Aby sme záujemcom uľahčili orientáciu, uvádzame na tomto mieste pôvod informácií týkajúcich sa tejto piesne:</p>


<table class="table table-sm">
  <thead>
    <tr>
      <th>Údaj</th>
      <th>Hodnota</th>
      <th>Ako bol získaný</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>Názov</th>
      <td><?php echo $piesen->nazov_dlhy ?></td>
      <td><small>Prvé ani druhé vydanie neobsahovalo názvy piesní. Dopĺňame z prvých slov piesne.</small></td>
    </tr>


        <tr>
      <th>Pôvodná zbierka</th>
      <td><?php echo $piesen->zbierky_nazov?></td>
      <td><small>Údaj preberáme z druhého vydania</small></td>
    </tr>

        <tr>
      <th>Strana</th>
      <td><?php echo $piesen->strana ?></td>
      <td><small>Údaj preberáme z druhého vydania.</small></td>
    </tr>

        <tr>
      <th>Identifikátor</th>
      <td><?php echo $piesen->identifikator ?></td>
      <td><small>Údaj preberáme z druhého vydania.</small></td>
    </tr>

        <tr>
      <th>Zberateľ</th>
      <td><?php echo $piesen->zberatelia_meno ?></td>
      <td><small>
      <?php
      
      switch ($piesen->source_zberatel) {
            case 0:
                echo "Údaj pochádza z prvého vydania a má podklad v rukopisoch zberateľa";
            break;
            case 1:
                echo "Údaj bol doplnený do druhého vydania na základe druhotných dokumentov";
            break;
            case 2:
                echo "Údaj nemá podklad v rukopisoch zberateľa, no bol uvedený v prvom vydaní";
            break;
            case 3:
                echo "";
            break;
            case 4:
                echo "Údaj má podklad v rukopisoch zberateľa, no nebol uvedený v prvom vydaní";
            break;
            case 5:
                echo "";
            break;
            case 6:
                echo "";
            break;
            case 7:
                echo "";
            break;
       }


       ?>
       </small></td>
    </tr>

        <tr>
      <th>Digitalizátor(ka)</th>
      <td><?php echo $piesen->digitalizatori_meno ?></td>
      <td><small>Údaj pridávame pre potreby tohto vydania.</small></td>
    </tr>

        <tr>
      <th>Tempo</th>
      <td><?php echo $piesen->tempo ?></td>
      <td><small><?php
      
      switch ($piesen->source_tempo) {
            case 0:
                echo "Údaj pochádza z prvého vydania a má podklad v rukopisoch zberateľa";
            break;
            case 1:
                echo "Údaj bol doplnený do druhého vydania na základe druhotných dokumentov";
            break;
            case 2:
                echo "Údaj nemá podklad v rukopisoch zberateľa, no bol uvedený v prvom vydaní";
            break;
            case 3:
                echo "";
            break;
            case 4:
                echo "Údaj má podklad v rukopisoch zberateľa, no nebol uvedený v prvom vydaní";
            break;
            case 5:
                echo "";
            break;
            case 6:
                echo "";
            break;
            case 7:
                echo "";
            break;
       }


       ?></small></td>

    </tr>

        <tr>
      <th>Dátum zozbierania</th>
      <td><?php echo $piesen->datum_zbieranie ?></td>
      <td><small><?php
      
      switch ($piesen->source_datum_zbieranie) {
            case 0:
                echo "Údaj pochádza z prvého vydania a má podklad v rukopisoch zberateľa";
            break;
            case 1:
                echo "Údaj bol doplnený do druhého vydania na základe druhotných dokumentov";
            break;
            case 2:
                echo "Údaj nemá podklad v rukopisoch zberateľa, no bol uvedený v prvom vydaní";
            break;
            case 3:
                echo "";
            break;
            case 4:
                echo "Údaj má podklad v rukopisoch zberateľa, no nebol uvedený v prvom vydaní";
            break;
            case 5:
                echo "";
            break;
            case 6:
                echo "";
            break;
            case 7:
                echo "";
            break;
       }


       ?></small></td>
    </tr>

    <tr>
      <th>Dátum digitalizácie</th>
      <td><?php echo $piesen->datum_digitalizacia ?></td>
      <td><small>Údaj pridávame pre potreby tohto vydania.</small></td>
    </tr>


<?php if (!empty($poznamky)) { $i=1?>
    <?php foreach ($poznamky as $key=>$poznamka) { ?>
    <tr>
      <th colspan="2">
      <b>Poznámka č. <?php echo $i;$i++;    ?></b><BR>
      <small><?php echo substr($poznamka["txt"],0,40); ?>…</small></th>
          <td><small>
          <?php 
          switch ($poznamky["id_druh"]) {
            case 0:
                echo "Ide o poznámku, ktorú pridal k piesni prispievateľ resp. prvá redakcia";
            break;
            case 1:
                echo "Ide o poznámku spracovávateľa druhého vydania.";
            break;  
            case 2:
                echo "Poznámka bola pridaná digitalizátormi Ľuda Slovenského";
            break;  

          }
          ?>
          </small></td>
    </tr>
    <?php } ?>
<?php } ?>


<?php if (!empty($podobne)) { $i=1; ?>
    <?php foreach ($podobne as $key=>$p_piesen) { ?>
     <tr>
      <th>Prepojenie č. <?php echo $i;$i++; ?></th>
      <td><?php echo ($p_piesen["nazov_kratky"]==""?"(ešte nezdigitalizované)":$p_piesen["nazov_kratky"]."…");?></td>
      <td><small> <?php 
          switch ($p_piesen["id_vztah"]) {
            case 1:
                echo "Prepojenie pribudlo v druhom vydaní. Ide o <i>totožný nápev</i>.";
            break;
            case 2:
                echo "Prepojenie pribudlo v druhom vydaní. K tejto piesni má <i>bližšiu príbuznosť</i>.";
            break;  
            case 3:
                echo "Prepojenie pribudlo v druhom vydaní. K tejto piesni má <i>vzdialenejšiu príbuznosť</i>.";
            break;  
 
          }
          ?></small></td>
    </tr>
    <?php } ?>
<?php } ?>


   
  </tbody>
</table>

      <h4>Ako citovať toto dielo</h4>
      <strong>Pôvodná zbierka, z ktorej sme vychádzali</strong><BR>
      <blockquote><code>GALKO, L.: Slovenské spevy 1. diel (2. dopl. krit. a dokumentované vyd.). Bratislava : Opus, 1972. 599 s.</code></blockquote>
      <strong>Táto webová stránka:</strong><BR>
      <blockquote><code>GALKO, Ladislav: Slovenské spevy 1. diel (2. dopl. krit. a dokumentované vyd.). Ľudo Slovenský 2016, [cit. 22. 9. 2016]. Dostupné na webovskej stránke (world wide web): http://www.ludoslovensky.sk/piesne/piesen.php?<?php echo $piesen->id_piesen;?></code></blockquote>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Zatvoriť</button>

      </div>
    </div>
  </div>
</div>



<?php if (!empty($p_mena)) { ?>
                    <h3>Osoby spomenúte v piesni</h3>
<div>
                    <?php foreach ($p_mena as $key=>$meno) { ?>
                    <a href="osoby.php?id=<?php echo $meno['meno_id']; ?>">
                    
                    <?php echo 
                     ($meno["pohlavie"]==1 ? "♂ ":"♀ ").$meno["meno"];?></a>
                     
                    <?php } ?>
                    
</div>
<?php }?>


</div>
<?php if (!empty($p_mapa) OR !empty($p_mapa_point) OR !empty($zberatel_miesto) OR !empty($zberatel_vyskyt)) { ?>
                <div class="col-md-8">

                    <h3>Mapa piesne <a href="/piesne/mapa.php"><small><i class="fa fa-map-o"></i> Pozrieť mapu všetkých piesní</small></a></h3>

                   <?php if (!empty($zberatel_vyskyt->id_lokalita)) { ?>
                        <p><strong>Kde sa spieva:</strong> <i class="fa fa-map-signs"></i> <?php echo $zberatel_vyskyt->meno; ?><br>
                    <?php } ?>
                    <?php if (!empty($zberatel_miesto->id_lokalita)) { ?>
                        <p><strong>Kde bola zozbieraná:</strong> <i class="fa fa-map-signs"></i> <?php echo $zberatel_miesto->meno; ?><br>
                    <?php } ?>
                    <?php if (!empty($p_mapa_point)) { ?>
                        <strong>Miesta spomenuté piesni</strong>:  
                        
                         <?php 
                         $i = 0;
                         $numItems = count($p_mapa);   
                         foreach ($p_mapa as $key=>$point_wording) { ?>

                        <span style="color:#66CC00;"><i class="fa fa-map-marker"></i></span>
                        <!--<a href="lok.php?id=<?php echo $point_wording['id']; ?>">--><?php echo $point_wording['meno']; ?><!--</a>-->
                        <?php  //if(++$i === $numItems) { echo "."; } else { echo ","; } ?> 
                        
                        <?php } ?>


                    <?php } ?>

                    <?php if (!empty($p_mapa_point) OR !(empty($zberatel_miesto)) OR !empty($zberatel_vyskyt)) { ?>


                    <div id='mapa' class='map' Style="height:300px"> </div>

                    <script>
                        
                        var map = L.map('mapa').setView([48.812,19.473], 7);
                        var baseLayer=L.tileLayer(
                            'https://api.mapbox.com/styles/v1/jelusamot/ciucsw0fj007e2is1xs9pzkcj/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoiamVsdXNhbW90IiwiYSI6ImNpZnN0NGM2MjAxd2N1NGx6OWk2Y3BjOGsifQ.aFGe3wpK5fbZbrpefXxDNA').addTo(map);

                        
                        var geojson_vyskyt = [<?php echo $zberatel_vyskyt->area; ?>];
                        var geojson_miesto = [<?php echo $zberatel_miesto->area; ?>];
          
                        var myLayer = L.geoJSON(geojson_miesto, {
                            pointToLayer: function(feature, latlon) {
                                return L.circleMarker(latlon, {
                                    fillColor:  '#66CC00',
                                    fillOpacity: 0.8,
                                    stroke: false
                                });
                            }
                        }).addTo(map);

                        var myLayer_vyskyt = L.geoJSON(geojson_vyskyt, {
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


                                    var myLayer_p_<?php echo $point["c"] ?> = L.geoJSON(p_<?php echo $point["c"] ?>, {
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


        <!--klucove slova -->
        <?php if (!empty($klucove_slova)) {  ?>
        <div class="row">

            <div class="col-md-12">
                <h3>Kľúčové slová</h3>

                <?php foreach ($klucove_slova as $key=>$klucoveslovo) { ?>
                    <a href="hladat.php?q=<?php echo $klucoveslovo;?>" class="tag tag-default"><?php echo $klucoveslovo;?></a>
                <?php } ?>

            </div>

        </div>

        <?php } ?>
        <!-- populárne songy -->


        <?php if (!empty($odporucane)) {  ?>

            <div id="carousel-recommended" class="carousel slide l-song-similar" data-ride="carousel">
            <h2>Ďalšie zaujímavé piesne</h2>

            <div class="carousel-inner" role="listbox">
                <div class="carousel-item row active">

                    <?php
                    $pocitadlo=0;
                    foreach ($odporucane as $key=>$p_piesen) {
                    $pocitadlo++;
                    ?>




                    <div class="col-md-4">
                        <div class="l-song-item l-well">
                            <h3><?php echo ($p_piesen["nazov_kratky"]==""?"<a data-toggle=\"modal\" data-target=\"#estetunieje\">(ešte nezdigitalizované)":"<a href=piesen.php?".$p_piesen["id_piesen"].">".$p_piesen["nazov_kratky"]."…");?></a></h3>
                            <?php if ($p_piesen['file_mp3']<>"") {
                                $p_button="playpause_p_".$p_piesen['id_piesen'];
                                $p_audio="aud_".$p_piesen['id_piesen'];
                                ?>

                                <a class="l-btn l-btn--primary l-btn--small l-btn--play" id="<?php echo $p_button;?>"
                                   onclick="playpause('<?php echo "#".$p_audio;?>','<?php echo "#".$p_button;?>');" ><i class="fa fa-play"></i></a>
                                <audio id="<?php echo $p_audio; ?>" controls="controls" src="<?php echo $p_piesen['file_mp3']; ?>" style="display:none">Your browser does not support the audio element.</audio>
                            <?php }?>

                            <a <?php if ($p_piesen['file_mp3']<>"") {echo "href=piesen.php?".$p_piesen['id_piesen'].'"';} else {echo 'data-toggle="modal" data-target="#estetunieje"'; }?>"><img src='<?php echo $p_piesen["file_png"];?>'></a>
                        </div></div>

                    <?php
                    // if ($pocitadlo==3){echo "</div>";} //uzatvorit prve listbox
                    if (($pocitadlo % 3 == 0)) {

                    ?>
                </div>
                <div class="carousel-item row">

                    <?php
                    }

                    ?>


                    <?php } ?>
                </div></div>

            <?php if ($pocitadlo>3) { ?>

                <a href="#carousel-recommended" role="button" data-slide="prev" class="btn-left">
                    <i class="fa fa-chevron-left"></i>
                </a>
                <a href="#carousel-recommended" role="button" data-slide="next" class="btn-right">
                    <i class="fa fa-chevron-right"></i>
                </a>
                </div>


            <?php } } ?>


        </div>

    </div>










</div></div>


<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"?>




<script>

        var v = $('.l-page'),
    cache_width = v.width(),
    a4  =[ 595.28,  841.89];


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

//tuto poznam!
$('[data-toggle="popover"]').popover({
    html: true,
    trigger: 'focus',
    content: function() {
        //e.preventDefault();
        //alert("ahoj");  
      return $.ajax({url: 'piesen.tuto-poznam.php?id_piesen=<?php echo $piesen->id_piesen; ?>',
                     dataType: 'html',
                     async: false}).responseText;
    }
  }).click(function(e) {
    $(this).popover('toggle');
    e.preventDefault();
    e.stopImmediatePropagation();
  });


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
        this.currentTime = 0;
        //playpause('#aud','#playpause_main'); 
        $('#playpause_main i').attr('class', "fa fa-play");

    });

  $("#aud").bind('ended', function(){
    
  });

/*
var vid = document.getElementById("aud");
vid.onloadeddata = function() {
    playpause('#aud','#playpause_main'); 
}; */


   

    $(document).ready(function(){
        abc2svg();

        /*var headerScroll = false;
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
<<<<<<< HEAD
        }); */
    

    

        });




    

</script>

<script src="/public/js/reveal.js"></script>



</body>
</html>