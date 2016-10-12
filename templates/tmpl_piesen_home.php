<?php
    $theme="l-theme-green";
    $piesne_tab='class="active"';
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_piesne_header_home.php";

?>


<div class="l-promo">

    <div class="container">

        <div class="row">

            <div class="col-lg-10 col-lg-push-4 col-xl-9 col-xl-push-3">

                <H2>Nájdi pieseň, ktorá ti po mysli chodí</H2>

<div class="input-group">
                <input type="text" class="form-control form-control-lg" placeholder="Nože, zadaj názov svojej piesne, či ju nájdeme">

                <span class="input-group-btn">
                    <button class="btn btn-secondary l-btn btn-lg l-btn--inverse form-control-lg" type="button">Hľadať!</button>
                </span>


                </div>
                <p class="text-muted-inverse"><small>Upozornenie: Náš projekt nachodí sa len na počiatku, z plánovaných 50-tisíc piesni dosiaľ len <?php echo $pocet_piesni; ?> je zdigitalizovaných. Nech ťa teda smútok nepremkýna, ak nenájdeš, čo si chcel(a). Vyčkaj času, ako husa klasu. Alebo tiež  môžeš <a href="/vyzva/">priložiť ruku k dielu a pomôcť nám</a>.</small></p>

</div>

  <!--        <div class="col-lg-2 col-lg-pull-8 col-xl-3 col-xl-pull-9">

                <img src="/public/img/ludo-grey.png" width="70%">

            </div> -->

        </div>

    </div>

</div>



<div class="row">
<div class="col-md-12">
<h2>Najnovšie pridané piesne</h2>

<?php foreach ($piesne as $key=>$piesen) { ?>
        <div class="col-md-12">
        <div class="l-song-item l-well"> 
        <h3><a href="piesen.php?<?php echo $piesen['id_piesen'];?>"><?php echo ($piesen["nazov_kratky"]==""?"(ešte nezdigitalizované)":$piesen["nazov_dlhy"]."…");?></a></h3>
        <?php if ($piesen['file_mp3']<>"") { 
            $p_button="playpause_p_".$piesen['id_piesen'];
            $p_audio="aud_".$piesen['id_piesen'];
            ?> 

        <a class="l-btn l-btn--primary l-btn--small" id="<?php echo $p_button;?>" 
            onclick="playpause('<?php echo "#".$p_audio;?>','<?php echo "#".$p_button;?>');" ><i class="fa fa-play"></i></a>
        <audio id="<?php echo $p_audio; ?>" controls="controls" src="data/<?php echo $piesen['id_piesen']; ?>/<?php echo $piesen['file_mp3']; ?>" style="display:none">Your browser does not support the audio element.</audio>

        <?php }?>

        <a href="piesen.php?<?php echo $piesen['id_piesen'];?>"><img src='data/<?php echo $piesen['id_piesen']; ?>/<?php echo $piesen["file_png"];?>'></a>
        <!--<p class="l-song-subh">
            <small>Zozbieral(a): <a href="zberatel.php?id=<?php echo $piesen['id_zberatel']; ?>"><?php echo $piesen['zberatelia_meno']; ?></a> (<?php echo $piesen['datum_zbieranie']; ?>) ● Zdigitalizoval(a): <a href="digitalizator.php?id=<?php echo $piesen['id_digitalizator']; ?>"><?php echo $piesen['digitalizatori_meno']; ?></a> (<?php echo $piesen['datum_digitalizacia']; ?>) ● Pôvodná zbierka <a href="zbierky.php?id=<?php echo $piesen['id_zbierka'] ?>"><?php echo $piesen['zbierky_nazov'] ?></a></small>
        </p>-->
        </div><BR>

        </div><div></div>
    <?php } ?>



</div>



</div>



<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"?>
