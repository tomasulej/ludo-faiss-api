



<?php
    $theme="l-theme-red";
    $nadavky_tab='class="active"';
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_nadavky_header_slovnik.php";

?>
 <link rel="stylesheet" href="css/style.css">

<BR>


 <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title">Pozor, táto stránka obsahuje vulgarizmy</h2>
      </div>
      <div class="modal-body">
        <p class="lead"><strong>Toto je stránka o nadávkach a nadávaní, preto - celkom logicky - obsahuje nadávky.</strong></p> 
        <p class="lead">Ak nechcete vidieť nadávky, radšej sem nechoďte.</p>
        <p class="lead"></p>
        
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-link" href="http://www.ludoslovensky.sk/prislovia">Fuj! Chcem ísť preč</a>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="javascript:	Cookies.set('pop', 'false');">Choď niekam, aj s týmito hláškami, <strong>chcem vstúpiť!</strong></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 







<div class="l-page">
<div class="container">
<div class="">

<h2>Najpopulárnejšie nadávky:</h2>

<nav class="navbar navbar-light bg-faded">
<div class="row">
<div class="col-md-7">
<p>Zobraziť: 
<a href="?sucasne" id="sucasne" class="btn btn-default btn-xs"><strong>Súčasné nadávky</strong> (kokot ap.)</a> 
<a href="?zat" id="zat" class="btn btn-default btn-xs"><strong>Staré nadávky</strong> (papľuch ap.)</a> 
</p></div>

<div class="col-md-5">
<a class="btn btn-default btn-xs" id="jeb" href="?jeb">jebať</a> 
<a href="?prd" id="prd" class="btn btn-default btn-xs">prdieť</a> 
<a href="?ser" id="ser" class="btn btn-default btn-xs">srať</a> 
<a href="?mrd" id="mrd" class="btn btn-default btn-xs">mrdať</a> 
<a href="?drb" id="drb" class="btn btn-default btn-xs">drbať</a>
</p>
</div>

</div>


</nav>



<div id="vis"></div>
<p><i>Čím väčšia bublina, tým viac sa používa. Vychádza z dát o počte použití daného slová na Google.com.</i></p> 
</div>
</div>



</div>
</div>
</div>

<HR>
   <div class="container content" >
    
<div class="col-md-9">    
<H2 align="center">Všetky sprostonárodné slová <small>Dovedna 738 výrazov</small></H2>
<div id="nadavky">
<?php
include "../databaza_nadavky.php";

$q=mysql_query("SELECT * FROM nadavka");

while ($nadavka=mysql_fetch_object($q)) {
	printf("<span id='nadavka_%s'><strong>%s</strong> - <i>%s</i></span><BR>",$nadavka->slovo,$nadavka->slovo,$nadavka->txt);
}

?>	    
</div>	    
</div>


<div class="col-md-3">
<H2>TOP Nadávky <small>podľa Google</small></H2>
<ol>
<?php

$q=mysql_query("SELECT * FROM nadavka ORDER BY google DESC LIMIT 30");

while ($nadavka=mysql_fetch_object($q)) {
	printf("<li><strong>%s</strong><BR>",$nadavka->slovo);
}

?>
</ol>


<div class="fb-like-box fb_iframe_widget" data-href="https://www.facebook.com/ludo.slovensky" data-height="50px" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=1402931466605062&amp;color_scheme=dark&amp;container_width=263&amp;header=false&amp;height=150&amp;href=https%3A%2F%2Fwww.facebook.com%2Fludo.slovensky&amp;locale=en_US&amp;sdk=joey&amp;show_border=false&amp;show_faces=true&amp;stream=false"><span style="vertical-align: bottom; width: 300px; height: 150px;"><iframe name="f3a838ff08" width="1000px" height="150px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like_box Facebook Social Plugin" src="http://www.facebook.com/v2.0/plugins/like_box.php?app_id=1402931466605062&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F6brUqVNoWO3.js%3Fversion%3D41%23cb%3Df15377eab4%26domain%3Dwww.ludoslovensky.sk%26origin%3Dhttp%253A%252F%252Fwww.ludoslovensky.sk%252Ff3f83bb3f%26relation%3Dparent.parent&amp;color_scheme=dark&amp;container_width=263&amp;header=false&amp;height=50&amp;href=https%3A%2F%2Fwww.facebook.com%2Fludo.slovensky&amp;locale=en_US&amp;sdk=joey&amp;show_border=false&amp;show_faces=true&amp;stream=false" class="" style="border: none; visibility: visible; width: 300px; height: 70px;"></iframe></span></div>

</div>

	    
	</div>

    <footer>
	    <div class="container">
		    <div class="row">

			    <div class="col-md-12">
			    Zdroje: Zdroje: Krátky slovník slovenského jazyka; Slovník súčasnej slovenčiny; A.P. Záturecký: Slovenské príslovia, porekadlá a úslovia; Najkratší slovník slovenského jazyka. Niečo tu chýba? <strong><a href="mailto:tomasulej@tomasulej.sk" style="color:white;text-decoration: underline">Napíšte mi!</a></strong><BR>
					    © <a href="http://www.facebook.com/tomas.ulej.pise" style="color:white;text-decoration: underline">Tomáš Ulej</a> 1987-2015.  <a href="http://www.ludoslovensky.sk/prislovia/o-ludovi.php" style="color:white;text-decoration: underline">Viac o projekte</a>.
			    </div>
		    </div>
	    </div>
    </footer>

  <script defer src="js/plugins.js"></script>
  <script src="js/libs/coffee-script.js"></script>
  <script src="js/libs/d3.min.js"></script>
  <script type="text/coffeescript" src="coffee/vis.coffee"></script>



<script>
$(document).ready(function() {

         if (Cookies.get('pop')!="false") {
            		$("#myModal").modal("show");
         }

});
</script>





<?php

require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php";

?>




