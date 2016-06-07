<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="Ľudo slovenský radí: najväčšia zbierka ľudových prísloví a porekadiel" />
<meta property="og:description" content="Dvanásť tisíc Ľuda slovenského prísloví a porekadiel. Zozbieral Adolf Peter Záturecký. Internetovú stránku zbúchal Tomáš Ulej." />
    
    

    <title>Ľudo slovenský radí: najväčšia zbierka ľudových prísloví a porekadiel</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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
    
       <?php printf(implode('', file('tmpl_hlavicka.html')), "active","", "", "Najpopulárnejšie Ľuda Slovenského príslovia a porekadlá"); ?>
    
    
    
        <div class="container content">
	    
	<p class="lead">Čo Ľud facebookový lajkne, to Ľudo slovenský sem, dľa úslovia <i>hlas ľudu, hlas boží</i>, vypisuje. Pohľadaj a lajkni <a href="http://www.ludoslovensky.sk/prislovia/cela-zbierka.php" class="vysviet">čosika dobrieho</a> aj ty, aby to bolo hore danô.</small></p>

	    
    </div>

    
    
    <div class="content">
	    <div class="container">

  
<?php
include "databaza.php";

$q=mysql_query("SELECT * FROM pr_txt ORDER BY hlasy DESC LIMIT 26");

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
		    	<a class="btn btn-lg btn-default" href="cela-zbierka.php">Pozrieť rady Ľuda Slovenského po kapitolách <span class="glyphicon glyphicon-chevron-right"></span></a>
		    </div>
		    
	    </div>
    </div>
    
    
<!--
    <div class="container content">
	    
	    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
	    
	    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
	    
    </div>
-->
    
    <?php printf(implode('', file('tmpl_paticka.html'))); ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
    
    <?php printf(implode('', file('../tmpl_analytics.html'))); ?>
    
  </body>
</html>