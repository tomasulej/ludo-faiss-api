<?php

$theme="l-theme-green";
$piesne_tab='class="active"';


include $_SERVER["DOCUMENT_ROOT"]."/piesne/lib.piesne.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_piesne_header.php";

?>
</div> <link rel="stylesheet" href="/public/css/style_bubbles.css">


<div class="l-page">

    <div class="container">
        <div class="l-song-header" data-role="header">
            <div class="row">
                <div class="col-md-12">



                </div>
            </div>
        </div>


        <div class="l-song">
            <div class="row">
                <div class="col-md-12">
                    <h2>Slová v ľudových piesňach</h2>


                    <div id="vis"></div>




                </div>
        </div>
    </div>
</div>


    <script>

        document.onmouseover = function() {
//User's mouse is inside the page. (This is working)
            window.innerDocClick = true;
        }

        document.onmouseleave = function() {
//User's mouse has left the page. (this is working)
            window.innerDocClick = false;
        }

        window.onhashchange = function() {
            //alert(window.location.hash);
            window.location.href="hladat.php?q="+window.location.hash.slice(1);
        };


    </script>


<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"?>

    <script defer src="/public/js/plugins.js"></script>
    <script src="/public/js/libs/coffee-script.js"></script>
    <script src="/nadavky/js/libs/d3.min.js"></script>

    <script type="text/coffeescript" src="/public/coffee/vis.coffee"></script>
