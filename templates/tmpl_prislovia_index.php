<?php
$theme="l-theme-violet";
$prislovia_tab='class="active"';

require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_prislovia_header_home.php";


?>



<div class="l-promo">

    <div class="container">

        <div class="row">

            <div class="col-lg-offset-3 col-lg-9  col-lg-push-4 col-xl-7 col-xl-push-3">

                <H2>Zadaj, čo ťa trápi a Ľudo ti poradí</H2>
                <form action="hladat.php" method="get" id="hladat">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" name="q" placeholder="Napíš sem, čo ťa trápi.">

                        <span class="input-group-btn">
                    <button class="btn btn-secondary l-btn btn-lg l-btn--inverse form-control-lg" type="button" onclick="$( '#hladat' ).submit();">Hľadať!</button>
                </span>

                </form>
            </div>
            <BR>


            <p class="text-muted-inverse">Napríklad <a href="hladat.php?q=l%C3%A1ska">láska</a>, <a href="http://www.ludoslovensky.sk/prislovia/hladat.php?q=majetok">majetok</a>, <a href="http://www.ludoslovensky.sk/prislovia/hladat.php?q=%C5%BEena">ženy</a>, <a href="http://www.ludoslovensky.sk/prislovia/hladat.php?q=mu%C5%BE">muži</a> alebo čô ti len napadne. </p>


        </div>

        <div class="col-lg-3 col-lg-pull-8 col-xl-5 col-xl-pull-9">
            <h3><a href="cela-zbierka.php">Témy v prísloviach a porekadlách</a></h3>
            <p>Nehľadáte nič konkrétne, len sa chcete prehrabávať po témach prísloví a nájsť niečo nové a zaujímavé? <a href="cela-zbierka.php">Listujte prísloviach</a> ako v (múdrej) knihe.</p>


        </div>



    </div>

</div>
</div>





<div class="l-articles">
    <div class="container">

        <h2>Najpopulárnejšie príslovia a porekadlá</h2>

        <?php  foreach ($prislovia as $key=>$prislovie) {$pocitadlo++; ?>



                <?php
                if ($parne = $pocitadlo % 2) {
                    $zaciatok='<div class="row quotes">';
                    $koniec="";
                } else {
                    $zaciatok='';
                    $koniec="</div>";
                }


                ?>

            <?php echo $zaciatok;?>

                    <div class="col-md-6">

                        <div class="l-article row">

                    <div class="l-article__img col-md-3">

                    <a href="<?php echo $prislovie["url"]; ?>"><img src="<?php echo $prislovie["img"]; ?>" class="hidden-md-down"></a>


                </div>

                <div class="l-article__content col-md-9">


                    <p>
                     <a href="<?php echo $prislovie["url"] ?>">   <?php echo $prislovie["text"]; ?> </a>
                    </p>

                    <div class="fb-like" data-href="<?php echo $prislovie["url"];?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>


                </div>



                        </div>

            <?php echo $koniec; ?>



                    </div>
        <?php  } ?>


        <div class="l-center"><button type="button" class="l-btn l-btn--large l-btn--primary" onclick="window.location='najpopularnejsie.php'">Zobraziť viac populárnych prísloví</button><BR/></div>



<BR>

</div>


</div>


<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php";?>
