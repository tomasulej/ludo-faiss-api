<?php
$theme="l-theme-blue";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_ludo_header.php";
?>


<div class="l-promo">

    <div class="container">

        <div class="row">

            <div class="col-lg-8 col-lg-push-4 col-xl-9 col-xl-push-3">

<h3>Čo je projekt Ľudo Slovenský?</h3>
                <p>Ľudo Slovenský je <strong>digitalizovanou zbierkou ľudovej slovesnosti</strong> - cieľom projektu je <strong>zdigitalizovať</strong> a širokej verejnosti <strong>sprístupniť ľudovú slovesnosť</strong> (príslovia, porekadlá, piesne, rozprávky ap.) ako aj ďalšie informácie a dáta o živote ľudí, ktorí žili na území Slovenska.
                    Sme komunita ľudí, ktorí veria, že všetko, čo náš ľud kedy vytvoril treba dostať na internet a uchovať. Ak sa ti páči, čo robíme, <a href="/vyzva">môžeš nám pomôcť</a>.</p>



                <div class="l-promo__btns">

                    <a class="l-btn l-btn--large l-btn--inverse" href="/o-ludovi.php">Zistiť viac o Ľudovi</a>
                    <a class="l-btn l-btn--large l-btn--inverse" href="/vyzva/">Pridaj sa k nám!</a>

                </div>

            </div>

            <div class="col-lg-4 col-lg-pull-8 col-xl-3 col-xl-pull-9">

                <img src="/public/img/ludo-grey.png" width="100%">

            </div>

        </div>

    </div>

</div>


<div class="l-articles">
    <div class="container">

        <h2>Ľuda Slovenského anciáša tvojho projekty a iniciatívy</h2>

        <?php foreach ($projekty as $key=>$projekt) { ?>
        <div class="l-article row">

            <div class="l-article__img col-md-3">

                <a href="<?php echo $projekt["url"]; ?>"><img src="<?php echo $projekt["img"]; ?>"></a>

            </div>

            <div class="l-article__content col-md-9">

                <h3><a href="<?php echo $projekt["url"]; ?>"><?php echo $projekt["title"]; ?></a></h3>

                <p>
                    <?php echo $projekt["desc"]; ?>
                </p>

                <a href="<?php echo $projekt["url"]; ?>" class="l-btn l-btn--primary l-btn--small"><!--<i class="fa fa-music"></i>--> <?php echo $projekt["cta"]; ?></a>

            </div>

        </div>
        <?php } ?>






    </div>


</div>


<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php";?>
