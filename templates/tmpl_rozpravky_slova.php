<?php

$theme="l-theme-blue";
$rozpravky_tab='class="active"';


include $_SERVER["DOCUMENT_ROOT"]."/rozpravky/lib.rozpravky.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_rozpravky_header.php";

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
                    <h2>Slová v rozprávkach</h2>


                    <div id="vis"></div>




                </div>
        </div>
    </div>
</div>


    <script>



        window.onhashchange = function() {

            window.location.href="hladat.php?q="+window.location.hash.slice(1);

            $('[data-toggle="popover"]').popover({
                html: true,
                trigger: 'manual',
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



        };


    </script>


<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"?>

    <script defer src="/public/js/plugins.js"></script>
    <script src="/public/js/libs/coffee-script.js"></script>
    <script src="/nadavky/js/libs/d3.min.js"></script>

    <script type="text/coffeescript" src="/public/coffee/vis2.coffee"></script>
