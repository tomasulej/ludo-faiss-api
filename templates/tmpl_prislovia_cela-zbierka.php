<?php
$theme="l-theme-violet";
$prislovia_tab='class="active"';

require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_prislovia_header.php";


?>

<div class="container">

<div class="l-page l-list">





    <div class="l-list-items">
        <h2>Celá zbierka prísloví a porekadiel po kapitolách</h2>

        <p class="lead">Totok je celá zbierka prísloví i porekadiel, ako ju Adolf Peter Záturecký, Ľudo najšikovnejší, v 19. storočí pozbieral. Je to celá múdrosť Ľuda Slovenského za tisíce rokov pozbieraná. Nože sa v nej, Ľudo internetový, pohrab a nájdi, čo zvečnenia zasluhuje.</p>

<?php //print_r($kategorie)?>

<?php foreach ($kategorie as $key=>$kat) { ?>

    <div class="l-song-item l-well">


        <div class="row">
            <div class="col-md-3 hidden-md-down"><img src="<?php echo $kat["img"]?>" class="t"></div>
            <div class="col-md-9">
                <h2><a href="<?php echo $kat["url"]?>"><?php echo $kat["nazov"]?></a></h2>


                <p><?php echo $kat["txt"]?></p>
            </div>
        </div>
    </div>


<?php } ?>


</div></div></div>


<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php";?>

