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
                        <?php echo $objPiesen->nazov_dlhy;?>
                        
                    </h1>



 




                    <?php    if (count($arrVarianty)>1) { ?>
       



                        <div class="l-song-variants">
                        <?php

                    $last_key = end(array_keys($varianty));
                    foreach ($arrVarianty as $key=>$variant) {$counter_variant++;?>
                    
                            <a class="l-btn l-btn--small <?php if ($variant["aktualna_piesen"]) {echo "l-btn--primary"; } ?>" href="piesen.php?<?php echo $variant["id_piesen"];?>"><i class="fa fa-music"></i> 
                            Variant č. <?php echo  $counter_variant; ?></a>
                    



                    <?php }  ?>  </div> <?php } ?>

                      







                </div>

                <div class="col-md-3 l-right">
                    <a id="playpause_main" class="l-btn l-btn--primary l-btn--medium l-btn--play" onclick="playpause('#aud','#playpause_main');"><i class="fa fa-play"></i> Prehrať melódiu</a>
                </div>







            </div>

            <p class="l-song-subh hidden-md-down"> <!--class="hidden-md-down"-->
                <small>Zozbieral(a): <strong><!--<a href="zberatel.php?id=<?php echo $objPiesen->id_zberatel; ?>">--><?php echo $objPiesen->zberatelia_meno; ?><!--</a>--></strong> (<?php echo $objPiesen->datum_zbieranie; ?>) 
                
                ● Zdigitalizoval<?php echo (empty($objPiesen->digitalizatori2_meno))?"(a)":"i";?>: 
                
                <strong><!--<a href="digitalizator.php?id=<?php echo $objPiesen->id_digitalizator; ?>">--><?php echo $objPiesen->digitalizatori_meno; ?><!--</a>--></strong> 
                <?php if (!empty($objPiesen->digitalizatori2_meno)) { ?> 
                   a <strong><!--<a href="digitalizator.php?id=<?php echo $objPiesen->id_digitalizator2; ?>">--><?php echo $objPiesen->digitalizatori2_meno; ?><!--</a>--></strong> 
                <?php } ?>

                (<?php echo date("Y",strtotime($objPiesen->datum_digitalizacia)); ?>) ● Pôvodná zbierka <strong><!--<a href="zbierky.php?id=<?php echo $objPiesen->id_zbierka ?>">--><?php echo $objPiesen->zbierky_nazov ?><!--</a>--></strong></small>
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


                    <div class="alert alert-warning alert-dismissible fade in" id="tempo_alert" style="display:none" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Zatvoriť" onclick="javascript:Cookies.set('tempo_alert', 'false');">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Tempo je len ilustračné!</strong>  Tempové označenie vychádza z publikovanej verzie Slovenských spevov. Moderné zápisy ľudových piesní takéto označenia už neobsahujú. Rýchlosť prehrávania piesní je nutné vnímať ako orientačnú.
                      <!-- <a  href="javascript:void(0)" onclick="javascript:Cookies.set('tempo_alert', 'false');$('#tempo_alert').hide();">Dobre, rozumiem.</a> -->
                    </div>

                </div>

            </div>

        </div>

<div id="lyrics" class="l-song-lyrics" data-reveal-id="lyrics" data-height="200">




    <!-- <a onclick="lyrics_zobrazit_skryte(true);">Klik</a> -->


        <?php echo lyrics2html($objPiesen->lyrics) ?>




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

        <div  id="contour_div" style="">
            </div>

<script>
$('#contour').click(function(){
  	$('#contour_div').load('/piesne/analyze/contour.php?id_piesen=<?php echo $objPiesen->id_piesen; ?>');
	$('#contour_div').show();
 	
});
</script>  

        </div>
    <?php } ?>


<a href="#" data-reveal="lyrics" class="l-btn-reveal">Zobraziť viac <i class="fa fa-chevron-down"></i></a>

</div>



<div id="tuto-poznam_div1" class="l-know">

    <span class="fa fa-asterisk" aria-hidden="true" style="font-size: 35px">&nbsp;</span>

    <strong>Poznali ste túto pieseň už predtým?</strong>


    <button id="tutopoznam_prvykrok" class="l-btn l-btn--primary l-btn--small tutopoznam_prvykrok" onclick="javascript:poznam();">
        <i class="fa fa-thumbs-up"></i> Áno</button>


    <button class="l-btn  l-btn--small" onclick="javascript:nepoznam();">
        <i class="fa fa-thumbs-down"></i> Nie</button>


    <a data-toggle="popover" data-content="Nie všetky staré piesne ešte niekto pozná a nie všetky sa dnes spievajú tam, kde boli pred stovkami rokov zozbierané. Snažíme sa preto &lt;strong&gt;mapovať, kde všade sa ešte dnes spievajú jednotlivé piesne&lt;/strong&gt;. Dajte nám vedieť, či pieseň poznáte a &lt;strong&gt;pomôžte nám v našom úsilí!&lt;/strong&gt; Ďakujeme :)"  data-original-title="" title=""><i class="fa fa-question-circle"></i>
    </a>

<BR><BR>

</div>


<div id="tuto-poznam_answer"></div>

<script>
    function poznam() {
        $('#tuto-poznam_answer').html($.ajax({url: 'piesen.tuto-poznam1.php?id_piesen=<?php echo $objPiesen->id_piesen; ?>',
            dataType: 'html',
            async: false}).responseText);
        track_item_know(<?php echo $objPiesen->id_piesen; ?>,"<?php echo $objPiesen->nazov_dlhy; ?>","piesen","<?php echo $objPiesen->file_png; ?>");

    }

    function nepoznam() {
        $('#tuto-poznam_answer').html("<strong>Vďaka za informáciu!</strong> Niet nad to spoznať nejakú novú ešte neopočúvanú pieseň :)");

    }



</script>









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
        <h3><a <?php echo ($p_piesen["nazov_kratky"]==""?" data-toggle=\"modal\" data-target=\"#estetunieje\">(ešte nezdigitalizované)":" href='piesen.php?".$p_piesen["id_piesen"]."'>".$p_piesen["nazov_kratky"]."…");?></a></h3>
        <?php if ($p_piesen['file_mp3']<>"") { 
            $p_button="playpause_p_".$p_piesen['id_piesen'];
            $p_audio="aud_".$p_piesen['id_piesen'];
            ?> 

        <a class="l-btn l-btn--primary l-btn--small l-btn-play" id="<?php echo $p_button;?>"
            onclick="playpause('<?php echo "#".$p_audio;?>','<?php echo "#".$p_button;?>');" ><i class="fa fa-play"></i></a>
        <audio id="<?php echo $p_audio; ?>" controls="controls" src="<?php echo $p_piesen['file_mp3']; ?>" style="display:none">Your browser does not support the audio element.</audio>
        <?php }?>

        <a <?php if ($p_piesen['file_mp3']<>0) {echo "href=".$p_piesen['id_piesen'].'"';} else {echo 'data-toggle="modal" data-target="#estetunieje"'; }?>><img src='<?php echo $p_piesen["file_png"];?>'></a>
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
                <p>Desiatky digitalizátorov denne usilovne pracujú na tom, aby sa tisícky piesni dostali na internet - túto však ešte nestihli. Vyčkaj času alebo <a href="/vyzva">sa pridaj k nám</a> a bude to rýchlejšie :)</p>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Zatvoriť</button>

            </div>
        </div>
    </div>
</div>



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="tutopoznam_box" id="tutopoznam_box" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body" id="tutopoznam_box_text">


            </div>

        </div>
    </div>
</div>








    <div class="l-song-details">

            <div class="row">

                <div class="col-md-4">
                    <h3>Podrobnosti</h3>



                <strong><a onclick="vytlac();">Názov</strong>: <?php echo $objPiesen->nazov_dlhy ?><BR>
                <strong>Pôvodná zbierka</strong>: <?php echo $objPiesen->zbierky_nazov?><BR>
                <strong>Strana:</strong> <?php echo $objPiesen->strana; ?><BR>
                <strong>Identifikátor</strong>: <?php echo $objPiesen->identifikator?> <BR>
                <strong>Zberateľ</strong>: <?php echo $objPiesen->zberatelia_meno?><BR>
                <strong>Digitalizátor(ka)</strong>: <?php echo $objPiesen->digitalizatori_meno?> 
                <?php if (!empty($objPiesen->digitalizatori2_meno)) { ?>
                     a <?php echo $objPiesen->digitalizatori2_meno?></a><BR>
                <?php } ?>

                <!--<strong>Hudba</strong>: <a href="#"><?php echo $objPiesen->hudobnici_meno?></a><BR>-->
                <strong>Tempo</strong>: <?php echo $objPiesen->tempo1." ".$objPiesen->tempo2;?></a><BR>
                <strong>Dátum zozbierania</strong>: <?php echo $objPiesen->datum_zbieranie?><BR>
                <strong>Dátum digitalizácie</strong>: <?php echo date("d.m.Y",strtotime($objPiesen->datum_digitalizacia));?><BR>
                 <strong>Stiahnuť</strong>:

                    <a href="<?php echo $objPiesen->xml_link; ?>" onclick='return track_item_download(<?php echo $objPiesen->id_piesen; ?>,"<?php echo $objPiesen->nazov_dlhy; ?>","piesen","<?php echo $objPiesen->file_png; ?>", "xml");'><i class="fa fa-music"></i> noty</a>,

                    <a href="<?php echo $objPiesen->mp3_link; ?>" onclick='return track_item_download(<?php echo $objPiesen->id_piesen; ?>,"<?php echo $objPiesen->nazov_dlhy; ?>","piesen","<?php echo $objPiesen->file_png; ?>", "mp3");'><i class="fa fa-volume-up"></i> hudbu</a>

                    <?php if (!empty($objPiesen->pdf_link)) { ?>
                    , <a href="<?php echo $objPiesen->pdf_link; ?>" onclick='return track_item_download(<?php echo $objPiesen->id_piesen; ?>,"<?php echo $objPiesen->nazov_dlhy; ?>","piesen","<?php echo $objPiesen->file_png; ?>", "pdf");'><i class="fa fa-photo"></i> originál</a>
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
        <h3 class="modal-title" id="myModalLabel"><?php echo $objPiesen->nazov_dlhy; ?> (všetky informácie o piesni)</h3>
      </div>
      <div class="modal-body">

      <H4>Zdroje informácii o tejto piesni</H4>
      <p>Noty, texty, poznámky a ďalšie informácie o piesni, ktoré uvádzame na týchto webových stránkach, vychádzajú z viacerých zdrojov - 1. z rukopisných informácií zberateľov a prispievateľov zbierky Slovenské spevy; 2. z pera redakcie prvého knižného vydania Slovenských spevov; 3. od zostavovateľa druhého vydania Spevov Ladislava Galka (doplneného a kritického), alebo 4. tak, že ich na tento web z iných zdrojov pridali spolupracovníci webu Ľudo Slovenský. Aby sme záujemcom uľahčili orientáciu, uvádzame na tomto mieste pôvod informácií týkajúcich sa tejto piesne:</p>


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
      <td><?php echo $objPiesen->nazov_dlhy ?></td>
      <td><small>Prvé ani druhé vydanie neobsahuje názvy (incipity) piesní. Dopĺňame vychádzajúc z prvého verša piesne.</small></td>
    </tr>


        <tr>
      <th>Pôvodná zbierka</th>
      <td><?php echo $objPiesen->zbierky_nazov?></td>
      <td><small>Údaj preberáme z druhého vydania</small></td>
    </tr>

        <tr>
      <th>Strana</th>
      <td><?php echo $objPiesen->strana ?></td>
      <td><small>Údaj preberáme z druhého vydania.</small></td>
    </tr>

        <tr>
      <th>Identifikátor</th>
      <td><?php echo $objPiesen->identifikator ?></td>
      <td><small>Údaj preberáme z druhého vydania.</small></td>
    </tr>

        <tr>
      <th>Zberateľ</th>
      <td><?php echo $objPiesen->zberatelia_meno ?></td>
      <td><small>
      <?php
      
      switch ($objPiesen->source_zberatel) {
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
      <td><?php echo $objPiesen->digitalizatori_meno ?></td>
      <td><small>Údaj pridávame pre potreby tohto vydania.</small></td>
    </tr>

<?php if (!empty($objPiesen->digitalizatori2_meno)) { ?>
  <tr>
      <th>Digitalizátor(ka)</th>
      <td><?php echo $objPiesen->digitalizatori2_meno ?></td>
      <td><small>Údaj pridávame pre potreby tohto vydania.</small></td>
  </tr>
<?php } ?>
        <tr>
      <th>Tempo: </th>
      <td><?php echo $objPiesen->tempo1 ?></td>
      <td><small><?php
      
      switch ($objPiesen->source_tempo1) {
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

<?php if ($objPiesen->tempo2<>"") { ?>
 <tr>
      <th>Tempo:</th>
      <td><?php echo $objPiesen->tempo2 ?></td>
      <td><small><?php
      
      switch ($objPiesen->source_tempo2) {
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
<?php } ?>


        <tr>
      <th>Dátum zozbierania</th>
      <td><?php echo $objPiesen->datum_zbieranie ?></td>
      <td><small><?php
      
      switch ($objPiesen->source_datum_zbieranie) {
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
      <td><?php echo $objPiesen->datum_digitalizacia ?></td>
      <td><small>Údaj pridávame pre potreby tohto vydania.</small></td>
    </tr>


<?php if (!empty($poznamky)) { $i=1?>
    <?php foreach ($poznamky as $key=>$poznamka) { ?>
    <tr>
      <th colspan="2">
      <b>Poznámka č. <?php echo $i;$i++;    ?></b><BR>
      <small><?php echo substr($poznamka["txt"],0,strpos($poznamka["txt"]," ",50)); ?>…</small></th>
          <td><small>
          <?php 
          switch ($poznamka["id_druh"]) {
            case 0:
                echo "Ide o poznámku, ktorú pridal k piesni zberateľ, resp. prvá redakcia";
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
      <th>Piesňový variant / Príbuznosť <?php echo $i;$i++; ?></th>
      <td><?php echo ($p_piesen["nazov_kratky"]==""?"(ešte nezdigitalizované)":$p_piesen["nazov_kratky"]."…");?></td>
      <td><small> <?php 
          switch ($p_piesen["id_vztah"]) {
            case 1:
                echo "Prepojenie pribudlo v druhom vydaní. Ide o <i>totožný nápev</i> (podľa klasifikácie L. Galka).";
            break;
            case 2:
                echo "Prepojenie pribudlo v druhom vydaní. K tejto piesni má <i>bližšiu príbuznosť</i> (podľa klasifikácie L. Galka).";
            break;  
            case 3:
                echo "Prepojenie pribudlo v druhom vydaní. K tejto piesni má <i>vzdialenejšiu príbuznosť</i> (podľa klasifikácie L. Galka).";
            break;  
 
          }
          ?></small></td>
    </tr>
    <?php } ?>
<?php } ?>


   
  </tbody>
</table>

      <h4>Ako citovať toto dielo</h4>
      <strong>Pôvodná zbierka, z ktorej sme vychádzali:</strong><BR>
      <blockquote><code>GALKO, L. Slovenské spevy : Druhé doplnené, kritické a dokumentované vydanie. I. diel. Bratislava : Opus, 1972. 599 s.</code></blockquote>
      <strong>Táto webová stránka:</strong><BR>
      <blockquote><code>GALKO, L. Slovenské spevy : Druhé doplnené, kritické a dokumentované vydanie [online]. I. diel. Bratislava : Opus, 1972. 599 s. [cit. 2016-09-22]. Ľudo Slovenský 2016. Dostupné na internete: http://www.ludoslovensky.sk/piesne/piesen.php?<?php echo $objPiesen->id_piesen;?></code></blockquote>





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


                    <div id='mapa' class='map' style="height:300px"> </div>

                    <script>
                        
                        var map = L.map('mapa').setView([48.812,19.473], 7);
                        var baseLayer=L.tileLayer(
                            'https://api.mapbox.com/styles/v1/jelusamot/ciucsw0fj007e2is1xs9pzkcj/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoiamVsdXNhbW90IiwiYSI6ImNpZnN0NGM2MjAxd2N1NGx6OWk2Y3BjOGsifQ.aFGe3wpK5fbZbrpefXxDNA').addTo(map);

                        
                        var geojson_vyskyt = [<?php echo $zberatel_vyskyt_area; ?>];
                        var geojson_miesto = [<?php echo $zberatel_miesto_area; ?>];
          
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

                            <a <?php if ($p_piesen['file_mp3']<>"") {echo "href=piesen.php?".$p_piesen['id_piesen'];} else {echo 'data-toggle="modal" data-target="#estetunieje"'; }?>><img src='<?php echo $p_piesen["file_png"];?>'></a>
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


<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"; ?>
<script src="/public/js/abc2svg.js"></script>
<script src="/public/js/abcweb-min.js"></script>
<script src="/public/js/xml2abc-min.js"></script>
<script src="/public/js/abcjs_basic_2.3-min.js"></script>




<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-575ac8e6862d0152"></script>



<script src="/public/js/reveal.js"></script>
<script src="http://www.ludoslovensky.sk:8080/easyrec-web/api-js/easyrec.js" type="text/javascript"></script>
<script type='text/javascript'>
    var apiKey = "d75d567db9f310c51f665c609e6059a5";
    var tenantId = "piesne";
</script>



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
         //if (Cookies.get('tempo_alert')!="false") {
         //    $('#tempo_alert').show();
         //}
         if (media_id=='#aud') {track_item_play(<?php echo $objPiesen->id_piesen; ?>,"<?php echo $objPiesen->nazov_dlhy; ?>","piesen","<?php echo $objPiesen->file_png; ?>");}


     } else {
         //$('#tempo_alert').hide();

         $(media_id).trigger('pause');
        $(button_id+' i').attr('class', "fa fa-play");
     }    
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


    $("#aud").on("pause", function (e) {
        this.currentTime = 0;
        //playpause('#aud','#playpause_main'); 
        $('#playpause_main i').attr('class', "fa fa-play");

    });


        $(document).ready(function(){




            easyrec_view({
                userId:"",
                itemId:"<?php echo $objPiesen->id_piesen; ?>",
                itemUrl:"/piesen.php?<?php echo $objPiesen->id_piesen; ?>",
                itemDescription:"<?php echo $objPiesen->nazov_dlhy; ?>",
                itemImageUrl:"/data/<?php echo $objPiesen->id_piesen; ?>/<?php echo $objPiesen->file_png;?>"});

            $('.abc').each(function(i, obj) {
                ABCJS.renderAbc(obj, $(obj).text());

            });


            var urla=window.location.href;
            if (urla.includes('utm_medium=email')) {
                window.location.href='http://www.ludoslovensky.sk/piesne/piesen.php?<?php echo $objPiesen->id_piesen; ?>';
            }


        });



    function _d(role) {
        return '[data-role="' + role + '"]';
    }











</script>
    




</body>
</html>