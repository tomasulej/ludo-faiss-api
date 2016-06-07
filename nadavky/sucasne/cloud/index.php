<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ľudo slovenský radí: najväčšia zbierka ľudových prísloví a porekadiel</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min1.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">



<!--
   <link rel="stylesheet" href="css/reset.css">

-->
 <link rel="stylesheet" href="css/style.css">

   <script src="js/libs/modernizr-2.0.6.min.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	  
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1402931466605062&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
    
    <header style="background-image: url('img/bg.jpg');">
	    
	    <nav class="navbar navbar-default navbar-fixed-top menu-top" role="navigation">
		    <div class="container">
		
		        <div class="navbar-header">
		            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tu-collapse-1">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		            <a class="navbar-brand" href="#">Ľudo Slovenský</a>
		        </div>
		
	        <div class="collapse navbar-collapse" id="tu-collapse-1">
		            <ul class="nav navbar-nav navbar-right">
			            <li><a href="/prislovia">Príslovia a porekadlá</a></li>
			            <li class="active"><a href="/nadavky">Nadávky</a></li>
			            <li><a href="/prislovia/o-ludovi.php">O Ľudovi</a></li>

			            
			            
		            </ul>
		        </div>
		
		    </div>
		
		</nav>
	    

	    
    </header>
    
<BR><BR>    
    
<div class="container content">
<div class="hero">
<H1>Slovník slovenského pičungu <small>Najpopulárnejšie (s)prostonárodné slová</small></H1>
<p>Tisíce rokov <b>bohujeme</b>, <b>pičujeme</b> a <b>dojebávame</b> sa navzájom, v slovníkoch však väčšinu týchto slov nenájdete. Hanbíme sa za ne? Toto je slovník slovenského pičungu - vyše <strong>sedemsto vulgárnych, hrubých a sprostých slov</strong>. Je to naše <strong>národné bohatstvo</strong>.</p>

<div class="well well-sm row">
<div class="col-md-8">
<p>Zobraziť: 
<a href="?sucasne" id="sucasne" class="btn btn-default btn-sm active"><strong>Súčasné nadávky</strong> (kokot, piča a spol.)</a> 
<a href="?zat" id="zat" class="btn btn-default btn-sm"><strong>Staré nadávky</strong> (papľuch, ogrgeľ ap.)</a> 
</p></div>

<div class="col-md-4">
Leb odvodené od:  <a class="btn btn-default btn-xs" id="jeb" href="?jeb">jebať</a> 
<a href="?prd" id="prd" class="btn btn-default btn-xs">prdieť</a> 
<a href="?ser" id="ser" class="btn btn-default btn-xs">srať</a> 
<a href="?mrd" id="mrd" class="btn btn-default btn-xs">mrdať</a> 
<a href="?drb" id="drb" class="btn btn-default btn-xs">drbať</a>
</p>
</div>

</div>


<div id="vis"></div>

</div>
</div>






		       





      
</div> 

       
       
</div> 
  
  <HR>
    
    <div class="container content" >
    
<div class="col-md-9">    
<H1 align="center">Všetky sprostonárodné slová <small>Dovedna 738 výrazov</small></H1>
<div id="nadavky">
<?php
include "../../../databaza_nadavky.php";

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

$q=mysql_query("SELECT * FROM nadavka ORDER BY google DESC LIMIT 50");

while ($nadavka=mysql_fetch_object($q)) {
	printf("<li><strong>%s</strong> (%s)<BR>",$nadavka->slovo,$nadavka->google);
}

?>
</ol>
</div>

	    
	</div>
    
    <footer>
	    <div class="container">
		    <div class="row">

			    <div class="col-md-12">
				    <div class="copyright">
					    © Adolf Peter Záturecký, <a>Tomáš Ulej</a><br> 2006-2013. Foto (c) Karol Plicka. <a>Viac o projekte</a>
				    </div>
			    </div>
		    </div>
	    </div>
    </footer>



  <script defer src="js/plugins.js"></script>
  <script src="js/libs/coffee-script.js"></script>
  <script src="js/libs/d3.min.js"></script>
  <script type="text/coffeescript" src="coffee/vis.coffee"></script>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/jquery.columnizer.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
      <script type="text/javascript">
	  $('#nadavky').columnize("columns: 4");
	  
	  <?php
	  foreach ($_GET as $key => $value) {
	      printf("$('#sucasne').removeClass('active');");
		  printf("$('#%s').addClass('active');",$key);

	  }
	  
	  
	  ?>
	  
	  
	  </script>
    
    
  </body>
</html>