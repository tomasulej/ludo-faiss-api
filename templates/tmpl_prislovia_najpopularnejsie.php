<?php
$theme="l-theme-violet";
$prislovia_tab='class="active"';

require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_prislovia_header.php";


?>


<div class="l-articles">
    <div class="container">

        <h2>Najpopulárnejšie príslovia a porekadlá</h2>


        <p class="lead">Čo Ľud facebookový lajkne, to Ľudo slovenský sem, dľa úslovia <i>hlas ľudu, hlas boží</i>, vypisuje. Pohľadaj a lajkni <a href="http://www.ludoslovensky.sk/prislovia/cela-zbierka.php" class="vysviet">čosika dobrieho</a> aj ty, aby to bolo hore danô.</p>

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
                            <a href="<?php $prislovie["url"] ?>">   <?php echo $prislovie["text"]; ?> </a>
                        </p>

                        <div class="fb-like" data-href="<?php echo $prislovie["url"];?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>


                    </div>



                </div>

                <?php echo $koniec; ?>



            </div>
        <?php  } ?>


        <div class="l-center"><button type="button" class="l-btn l-btn--large l-btn--primary" onclick="window.location='cela-zbierka.php'">Zobraziť všetky príslovia</button><BR/></div>
<BR>

    </div>


</div>






<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php";?>

