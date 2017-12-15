


<?php

    $theme="l-theme-yellow";
    $labs_tab='class="active"';
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
//require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_labs_header_small.php";

?>
<script src="//cdn.rawgit.com/hilios/jQuery.countdown/2.2.0/dist/jquery.countdown.min.js"></script>



<div class="l-articles">
    <div class="container">


    <div class="row">
    <div class="col-md-11 offset-md-1">
        <h2>Ľudov slovný kvíz: otestuj svoju slovnú zásobu</a></h2>


    </div></div>

        <div class="row">

        <div class="col-md-8 offset-md-1" id="hra">
        <div class="card">
            <div class="card-block">
                <p><big>Ako veľmi si rozumieš so slovami? Koľko si ich <strong>schopný(á) nájsť za minútu</strong>? Otestuj svoju slovnú zásobu v Ľudovom slovnom kvíze.</big></p>
                <BR><BR>
                    <div class="l-center"><button type="button" class="l-btn l-btn--large l-btn--primary" onclick="startGame()">Spustiť Ľudov slovný kvíz</button></div>
            </div>
            </div>


        </div>


        <div class="col-md-3 hidden-sm-down">

            <div class="card" id="casomiera" style="display:none">
                <div class="card-block">
                    <h4 class="card-title">Koľko dáš za minútu?</h4>


                    <div id="clock"></div>
                    <div>Správne odpovede: <big style="color:green" id="divCorrectAnswers">0</big></div>

                </div>

            </div>
        </div>


    </div>

        <div class="row">
            <div id="fb_chvastacka" class="col-md-11 offset-md-1" style="display:none">

                <h4>Pochváľ sa, koľko si nahral(a)</h4>
                <div class="fb-comments" data-href="http://www.ludoslovensky.sk/labs/kviz/" data-numposts="5"></div>
            </div>
        </div>

</div>
</div>




    <script type="text/javascript">


        CorrectAnswers=0;


        function loadQuestion() {
            $( "#hra" ).load( "ajax_question.php" );
        }

        function startGame() {
            loadQuestion();
            $("#casomiera").css("display","block");
            var fiveSeconds = new Date().getTime() + 59000;
            $('#clock').countdown(fiveSeconds, {elapse: true})
                .on('update.countdown', function (event) {
                    var $this = $(this);
                    if (event.elapsed) {
                        $('#casomiera').css("display","none");
                        $('#hra').html(
                            '<div class="card"><div class="card-block">' +
                            '<big><strong>Výborne!</strong> Správne si odpovedal(a) <strong>' +CorrectAnswers+'-krát</strong>. '+
                            '<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.ludoslovensky.sk%2Flabs%2Fkviz" target="_blank">Pochváľ sa na Facebooku</a> a vyzvi priateľov na súboj. Alebo skús znova, či nenahráš viac :)</big><BR>' +
                            '<div class="l-center"><button type="button" class="l-btn l-btn--large l-btn--primary" onclick="location.reload();"> <i class="fa fa-refresh"></i> Hrať znova</button></div>\n' +
                            '<br><small>Páčilo sa? <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.ludoslovensky.sk%2Flabs%2Fkviz" target="_blank">Zdieľaj</a>. Rekord? <a onclick="$(\'#fb_chvastacka\').show()" href="javascript:void(0)"><i class="fa fa-level-down" aria-hidden="true"></i> Tu sa môžeš pochvastať, koľko si nahral(a)</a></small>.'+
                            '<hr width="30%"><BR><small>Toto je laboratórny experiment projektu <a href="http://www.ludoslovensky.sk">Ľudo Slovenský</a>, ktorého cieľom je sprístupniť naše kultúrne dedičstvo. Pozri <a href="http://www.ludoslovensky.sk">naše ďalšie projekty</a>. (c) 2017 <a href="http://www.facebook.com/tomas.ulej.pise">Tomáš Ulej</a>, založené na <a href="http://korpus.juls.savba.sk/WordNet.html">projekte WordNet</a> Jazykovedného ústavu Ľudovíta Štúra.</small>'+
                            '</div></div>'
                        );

                    } else {
                        $this.html('Ešte ti zostáva <strong>' + event.strftime('%S') + '</strong> sekúnd.');
                    }
                });

        }



    </script>



<?php //require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"?>
