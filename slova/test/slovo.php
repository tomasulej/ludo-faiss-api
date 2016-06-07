<php
include "../../kniznica.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="description" content="Mám v hlave tri milióny slov. Ale iba jedno pre teba.">
    <meta name="author" content="Tomáš Ulej">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:image" content="brain.jpg"/>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="js_main.js"></script>



    <title>Jedno slovo</title>



<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css_main.css">



    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->






  </head>

  <body>
  
  

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=619723681422597&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
             <a class="navbar-brand" href="#">Hranie sa na slová</a>
        </div>

      </div>
    </div>
-->

    <div class="container">

      <div class="starter-template">

          <p class="lead">Mám v hlave <strong>tri milióny</strong> slov. Ale pre Teba len toto jedno:</p> 

 <div class="jumbotron">
        <?php
include "../../databaza_slova.php";
    
    
         //$q=mysql_query("SELECT * FROM slovo ORDER BY RAND() LIMIT 1");
         
         $range_result = mysql_query( " SELECT MAX(`id`) AS max_id , MIN(`id`) AS min_id FROM `ma` ");
		 $range_row = mysql_fetch_object( $range_result ); 
		 $random = mt_rand( $range_row->min_id , $range_row->max_id );
		 $result = mysql_query( " SELECT * FROM `ma` WHERE `id` >= $random LIMIT 0,1 ");
         
        
         
         while ($slovo=mysql_fetch_object($result)) {
	       printf("<H1>%s <small>(<a href='http://slovnik.juls.savba.sk/?w=%s' target='_blank'>meh?</a>)</small></H1>",$slovo->word, $slovo->parent);
	       $parent=$slovo->parent;  
	       $forma=$slovo->form;
	       
         }
         
        ?>

 </div>

<div class="row">
<div class="col-md-6 jumbotron">

<h2>Podobné slová</h2>
<?php

	$q=mysql_query("SELECT * from `ma` WHERE `form`='$forma' order by parent_freq desc LIMIT 5;");

	while ($f_slovo=mysql_fetch_object($q)) {
		printf("<li>%s</li>",$f_slovo->word);
	}

?>


	
</div>
<div class="col-md-6"></div>
	<h2>Preklad</h2>
	
	
</div>




       <div style="align:right" class="fb-like" data-href="http://tomasulej.sk/slovo/slovo.php" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
        
      </div>





     <div class="starter-template">
      <button type="button" class="btn btn-primary btn-lg" onclick="location.reload();"><span class="glyphicon glyphicon-circle-arrow-right"></span> Nahoď ešte ďalšie</button>

     </div>
    <div id="footer">
      <div class="container">
      
      
        <p class="text-muted">(c) Tomáš Ulej 2014</p>
      </div>
    </div>

    </div><!-- /.container -->





<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-167461-7']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>



  </body>
</html>
