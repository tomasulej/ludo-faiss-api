<?php

include $_SERVER["DOCUMENT_ROOT"]."/databaza_prislovia.php";
$id=$_GET['id'];
$q1=mysql_query("SELECT * FROM pr_txt WHERE id=$id");

$prislovie=mysql_fetch_object($q1);

$q2=mysql_query("SELECT * FROM pr_poznamky WHERE txt_id=$id");

while ($poznamky=mysql_fetch_object($q2)) {
	$pozn_su=true;
	$poz.=sprintf("<li>%s</li>",$poznamky->txt);
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>

<script type="text/javascript" src="/static/js/analytics.js" ></script>
<link type="text/css" rel="stylesheet" href="/static/css/banner-styles.css"/>




    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $prislovie->txt;?> Nechaj si poradiť aj ty!">
    <meta name="author" content="Tomáš Ulej">

<meta property="og:title" content="Totok mi poradil Ľudo slovenský." />
<meta property="og:description" content="'<?php echo $prislovie->txt;?>' Nechaj si poradiť aj ty z dvanásť tisíc Ľuda slovenského prísloví a porekadiel. Zozbieral Adolf Peter Záturecký. Stránku zbúchal Tomáš Ulej." />

    <title>Ľudo slovenský radí: rada č. <?php echo $prislovie->id; ?> </title>

<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap-theme.min.css">

    <!-- Custom CSS for the 'One Page Wonder' Template -->
    <link href="obsah.css" rel="stylesheet">
    
    
    
    
    <style type="text/css">
    .tak-hovoril {padding-left:550px}
    .lajk {padding-left:550px}
    
    small {font-size: 14px}
    .csesta {padding-left:550px}
    .cesta a {text-color:gray}
body {padding-top: 10px;padding-left:20px; padding-right: 20px}	    

	     p {font-family: 'Cardo', serif;font-size: 25pt;padding: 0 15px;} 

	    
	    .bubble 
{
position: relative;
margin-left:550px;
margin-top:80px;
min-height: 140px;
width: 450px;
padding: 25px;
padding-top:25px;
background: #FFFFFF;
-webkit-border-radius: 30px;
-moz-border-radius: 30px;
border-radius: 30px;
border: #7F7F7F solid 4px;
}

.bubble:after 
{
content: '';
position: absolute;
border-style: solid;
border-width: 15px 15px 15px 0;
border-color: transparent #FFFFFF;
display: block;
width: 0;
z-index: 1;
left: -15px;
top: 77px;
}

.bubble:before 
{
content: '';
margin-left: 200px;
position: absolute;
border-style: solid;
border-width: 18px 18px 18px 0;
border-color: transparent #7F7F7F;
display: block;
width: 0;
z-index: 0;
left: -220px;
top: 74px;
}

@media (max-width: 767px) {
	.bubble2:before {margin-left:0px;}
	.bubble2 {margin-left:0px;}
	.bubble1 {margin-left:0px;}

	.bubble {margin-left:0px;width:100%!important;}
	.bubble:before {margin-left:0px;}

	.tak-hovoril {padding-left:0px;}
	.lajk {padding-left:0px;}
	.cesta {padding-left:0px}
	.poznamky {padding-left:0px}
	
    .btn {width:100%!important; white-space: normal;}
}		    
	    
    </style>
    
    <link href='http://fonts.googleapis.com/css?family=Cardo:400,400italic,700' rel='stylesheet' type='text/css'>

    
    
  </head>

  <body>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>

<script src="js/typeahead.js"></script>
<link rel="stylesheet" href="js/typeahead.css">



<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46378127-1', 'ludoslovensky.sk');
  ga('send', 'pageview');

</script>    


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=619723681422597";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    
<!--
    
<div style="text-align:right;"><div style="text-align:top" class="fb-like" data-href="http://www.ludoslovensky.sk/prislovia/" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div></div>
-->

    
    
<script type="text/javascript">



$('input#hladat').typeahead({
  name: 'ladanie',                                                          
  prefetch: 'js/json_search.json',                                         
  limit: 5,

});


$('.typeahead')
    .typeahead(/* pass in your datasets and initialize the typeahead */)
    .on('typeahead:selected', onAutocompleted)

function onAutocompleted(co, datum) {
 jano=datum;   
}


 
</script>
    
    <div class="container">

      <!-- START THE FEATURETTES -->



 
      <div class="featurette" id="home">
        <a href="http://www.ludoslovensky.sk/prislovia/najpopularnejsie.php"><img class="featurette-image hidden-xs img-circle img-responsive pull-left" width=500px src="/public/img/detvan_crop<?php echo rand(2,5); ?>.png"></a>
        <div class="bubble"><p>
	       <?php echo $prislovie->txt; ?> <?php if ($pozn_su) { ?><a href='http://www.ludoslovensky.sk/prislovia/prislovie.php?id=<?php echo $prislovie->id;?>#poznamky'><strong>*</strong></a>	<?php } ?>
	        
	        
	        
        </p></div>


        
      <BR>
     
<h3 class="tak-hovoril"> Tak hovorieval Ľudo Slovenský.  <BR><BR><a type="button" class="btn btn-success btn-lg" href="http://www.ludoslovensky.sk/prislovia/">Nechaj si aj Ty poradiť z 12-tisíc jeho prísloví a porekadiel</a> <small></small></h3>

<BR><BR><BR>
<div class="lajk"><iframe src="http://www.facebook.com/plugins/like.php?href=http://www.ludoslovensky.sk/prislovia/prislovie.php?id=<?php echo $prislovie->id;?>&width&layout=standard&action=like&show_faces=true&share=true&height=80&appId=1402931466605062" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"></iframe></div>

      </div>

      <!-- /END THE FEATURETTES -->


  
  
      

<?php if ($pozn_su) { ?>
      
                  <hr>
<div id="poznamky">
<H4>* Poznámky:</H4>
<ol>
<?php echo $poz; ?> 

</ol>
</div>
    </div><!-- /container -->

<?php } ?>


    <!-- JavaScript -->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
  
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46378127-1', 'ludoslovensky.sk');
  ga('send', 'pageview');

</script>
  
        <footer>
      <HR>
        <p><small>&copy; Adolf Peter Záturecký, <a href="http://www.facebook.com/tomas.ulej.pise" style="color:blue">Tomáš Ulej</a> 2006-2016. Foto (c) Karol Plicka. <a href="http://www.ludoslovensky.sk/o-ludovi.php" style="color:blue">Viac o projekte</a></small></p>
      </footer>

  
  
  </body>

</html>

