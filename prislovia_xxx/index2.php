<?php
$theme="l-theme-blue";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
include "databaza.php";

//require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_ludo_header.php";


?>

    <div class="header container">

        <div class="row">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-lg-5">
                        <h1><a>Príslovia a porekadlá</a></h1>
                    </div>
                    <div class="menu col-lg-7">
                        <a href="najpopularnejsie.php" class="item"><span class="glyphicon glyphicon-star-empty"></span>Najpopulárnejšie</a>
                        <a href="cela-zbierka.php" class="item"><span class="glyphicon glyphicon-book"></span>Celá zbierka po kapitolách</a>
                    </div>
                </div>
            </div>
            <div class="search col-sm-4">
                <form action="hladat.php" method="get">

                    <input type="text" name="q" placeholder="Hľadať...">
                    <span class="glyphicon glyphicon-search"></span>
                </form>

            </div>
        </div>

        <a class="logo">
            <img src="img/logo.png">
        </a>

    </div>

</header>

<div class="container intro">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-4">
                    <img src="img/ludo.jpg">
                </div>
                <div class="col-md-8">
                    <h2>Ahoj, volajú ma Ľudo, Ľudo Slovenský.</h2>
                    <p>
                        Toto sú moje príslovia a porekadlá.<br>
                        Užívaj ich v zdraví, <i>Ľudo internetový</i> a šír medzi svojimi!
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="content">
    <div class="container">

        <h2>Zadaj, čo ťa trápi. Ľudo poradí.</h2>

        <div class="searchbox">
            <form action="hladat.php" method="get">
                <input type="text" name="q" value="Napíš sem, čo ťa trápi...">
                <span class="glyphicon glyphicon-search"></span>
                <div class="keywords">
                    napr. <a href="hladat.php?q=l%C3%A1ska">láska</a>, <a href="http://www.ludoslovensky.sk/prislovia/hladat.php?q=majetok">majetok</a>, <a href="http://www.ludoslovensky.sk/prislovia/hladat.php?q=%C5%BEena">ženy</a>, <a href="http://www.ludoslovensky.sk/prislovia/hladat.php?q=mu%C5%BE">muži</a> alebo čô ti len napadne.
                </div>
        </div>
        </form>
    </div>
</div>

<div class="content grey">
    <div class="container">

        <h2 class="with-subhdg">Moje najpopulárnejšie rady</h2>
        <div class="subhdg">Vyberá Ľudo Facebookový</div>


        <?php
        include "databaza.php";

        $q=mysql_query("SELECT * FROM pr_txt ORDER BY hlasy DESC LIMIT 6");

        $pocitadlo=0;

        while ($prislovie=mysql_fetch_object($q)){
            $pocitadlo++;

            if ($parne = $pocitadlo % 2) {
                $zaciatok='<div class="row quotes">';
                $koniec="";
            } else {
                $zaciatok='';
                $koniec="</div>";
            }


            printf('
    %s


<div class="item col-md-6"><a href="http://www.ludoslovensky.sk/prislovia/prislovie.php?id=%s">
  <img src="img/detvan_crop%s.png">
<p>%s</p>
<div class="fb-like" data-href="http://www.ludoslovensky.sk/prislovia/prislovie.php?id=%s" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
</a>
</div>
    
    %s
    ', $zaciatok, $prislovie->id, rand(2,5), $prislovie->txt, $prislovie->id, $koniec);


            //echo $prislovie->txt;
        }



        ?>








        <div class="block center">
            <a class="btn btn-lg btn-default" href="najpopularnejsie.php">Pozrieť viac obľúbených rád Ľuda Slovenského <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>

    </div>
</div>


<!--
    <div class="container content">

	    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

	    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

    </div>
-->



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<?php printf(implode('', file('tmpl_paticka.html'))); ?>


<?php printf(implode('', file('../tmpl_analytics.html'))); ?>

</body>
</html>