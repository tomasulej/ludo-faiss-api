<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Generátor vogónskej poézie: odľahčite vaše básnické črevo!</title>
   <meta property="og:title" content="Generátor vogónskej poézie: odľahčite vaše básnické črevo!"/>
   <meta property="og:site_name" content="ludoslovensky.sk"/>
   <meta property="og:type" content="article"/>
   <meta property="og:image" content="http://www.ludoslovensky.sk/slova/vogon/vogon.jpg"/>
   <meta property="og:url" content="http://www.ludoslovensky.sk/slova/vogon/"/>
   <meta property="fb:admins" content="686226655"/>
   <meta property="og:description" content="Z vďaky Douglesovi Adamsovi, ktorý prvý definoval žáner vogónskej poézie, ako aj všetkým jeho nasledovateľom: menovite kapelám No Name, Desmod a tiež predstaviteľom súčasnej experimentálnej slovenskej poézie venujeme tento nástroj, ktorý ich navždy odbremení od písania. "/>


    
    
    

    <!-- Bootstrap -->
    <link href="css/bootstrap.min1.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">


    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap-social.css" rel="stylesheet" >





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
  
  
  <script>
// Attach a submit handler to the form

function sendText(mod,mod2){
  // Stop form from submitting normally
  
  // Get some values from elements on the page:
  var $form = $( this ),
    //text = $('#text').val(),
    url = 'papagaj_ajax.php';
    m1=mod;
    m2=mod2;
     $('#vysledok p').empty().append("<big>Generujem básničku....</big><BR><img src='load.gif'><BR><i>Vyčkaj času<BR>ako husa klasu</i>");

  //alert(text);
  // Send the data using post
  var posting = $.post( url, { co: m1, ako: m2 } );
 
 
  // Put the results in a div
  posting.done(function( data ) {
    $('#vysledok p').empty().append(data);
    //var content = $( data ).find( "#content" );
    //$( "#result" ).empty().append( data );
  });
  
  
  

}
</script>
  
  
  
  
  
  </head>
  <body onload="sendText($('input[name=inlineRadioOptions]:checked').val(),$('input[name=inlineRadioOptions1]:checked').val());">
  
  
  
  
  
  
  
  
  
  
  
	  
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/sk_SK/sdk.js#xfbml=1&version=v2.4&appId=619723681422597";
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
			            <li><a href="/nadavky">Nadávky</a></li>
			            <li class="active"><a href="/slova/vogon/" class="active">Vogónska poézia</a></li>
			            <li><a href="/prislovia/o-ludovi.php">O Ľudovi</a></li>

			            
			            
		            </ul>
		        </div>
		
		    </div>
		
		</nav>
	    

	    
    </header>
    
<BR><BR>    
    
<div class="container content">
<div class="row">
			<H1>Generátor vogónskej<span style="textTransform='uppercase'">*</span> poézie:  <small>Odľahčí vaše básnicke črevo</small></H1>	
				

	<div class="hero col-md-10">

			
			<p>Z vďaky <a href="http://bit.ly/1Go1fS3" target="_blank">Douglesovi Adamsovi</a>, ktorý prvý definoval žáner vogónskej poézie, ako aj všetkým jeho nasledovateľom: menovite kapelám No Name, Desmod, a raperom ako Rytmus - venujeme tento nástroj, ktorý ich navždy odbremení od písania.</p>

	    </div>
<div class="col-md-2">
<div class="fb-share-button" data-href="http://www.ludoslovensky.sk/slova/vogon/" data-layout="button_count"></div><BR> 
			<div><a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.ludoslovensky.sk/slova/vogon/" data-via="tomasulejsk">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></div>
			
			
			

</div>




</div>

<BR>    
    <div class="container content" ><div class="row">
    <div class="col-md-7">
    
    
    <p>
    <strong>Použi slovnú zásobu:&nbsp;&nbsp;&nbsp;&nbsp;</strong>



<label class="radio-inline">
  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="hokej" onclick="sendText($('input[name=inlineRadioOptions]:checked').val(),$('input[name=inlineRadioOptions1]:checked').val());" checked> hokejistu
</label>
<label class="radio-inline">
  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="tehulka" onclick="sendText($('input[name=inlineRadioOptions]:checked').val(),$('input[name=inlineRadioOptions1]:checked').val());"> tehuľky/mamičky
</label>
<label class="radio-inline">
  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="slovencina" onclick="sendText($('input[name=inlineRadioOptions]:checked').val(),$('input[name=inlineRadioOptions1]:checked').val());"> celej slovenčiny (trochu pomalé)
</label>


</p>
    </div>
    
    <div class="col-md-5">

   <p>
    <strong>Mód:&nbsp;&nbsp;&nbsp;&nbsp;</strong>

<label class="radio-inline">
  <input type="radio" name="inlineRadioOptions1" id="inlineRadio11" value="hviezdoslav" onclick="sendText($('input[name=inlineRadioOptions]:checked').val(),$('input[name=inlineRadioOptions1]:checked').val());" checked> Hviezdoslav
</label>
<label class="radio-inline">
  <input type="radio" name="inlineRadioOptions1" id="inlineRadio21" value="sladkovic" onclick="sendText($('input[name=inlineRadioOptions]:checked').val(),$('input[name=inlineRadioOptions1]:checked').val());"> Sládkovič
</label>
<label class="radio-inline">
  <input type="radio" name="inlineRadioOptions1" id="inlineRadio21" value="chalupka" onclick="sendText($('input[name=inlineRadioOptions]:checked').val(),$('input[name=inlineRadioOptions1]:checked').val());"> Chalupka
</label>


</p>
    </div>
    
    </div> 
    
<div class="row"><div class="col-md-10">

<div class="vysledok well " id="vysledok" style="font-size:1.2em">
<p class="poem"></p>
</div>


<div class="row"><div class="col-md-8">
<a class="btn-default btn btn-lg" onclick="sendText($('input[name=inlineRadioOptions]:checked').val(),$('input[name=inlineRadioOptions1]:checked').val());"><span class="glyphicon glyphicon-refresh"></span> Táto básnička nesadla, vygeneruj ďalšiu</a></div> 

<div class="col-md-4">
<a class="btn btn-social btn-facebook btn-lg" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.ludoslovensky.sk%2Fslova%2Fvogon%2F" target="_blank">
  <i class="fa fa-facebook"></i>
  Zdieľať na Facebooku
</a>
</div>
</div>



</div>


<div class="col-md-2">

<code>*) Vogónska poézia - tretia najhoršia poézia v galaxii. Používa sa na mučenie nepriateľa</code>


</div>





</div></div>

	    
	</div>
  
    <footer>
	    <div class="container">
		    <div class="row">

			    <div class="col-md-7">
			    Zaujalo vás to? <strong><a href="mailto:tomasulej@tomasulej.sk" style="color:white;text-decoration: underline">Napíšte mi!</a></strong><BR>
					    © <a href="http://www.facebook.com/tomas.ulej.pise" style="color:white;text-decoration: underline">Tomáš Ulej</a> 1987-2015.  <a href="http://www.ludoslovensky.sk/prislovia/o-ludovi.php" style="color:white;text-decoration: underline">Viac o projekte Ľudo Slovenský</a>.
			    </div>
			    
			    <div class="col-md-5">
			    <div class="fb-like-box fb_iframe_widget" data-href="https://www.facebook.com/ludo.slovensky" data-height="50px" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=1402931466605062&amp;color_scheme=dark&amp;container_width=263&amp;header=false&amp;height=150&amp;href=https%3A%2F%2Fwww.facebook.com%2Fludo.slovensky&amp;locale=en_US&amp;sdk=joey&amp;show_border=false&amp;show_faces=true&amp;stream=false"><span style="vertical-align: bottom; width: 300px; height: 150px;"><iframe name="f3a838ff08" width="1000px" height="150px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like_box Facebook Social Plugin" src="http://www.facebook.com/v2.0/plugins/like_box.php?app_id=1402931466605062&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F6brUqVNoWO3.js%3Fversion%3D41%23cb%3Df15377eab4%26domain%3Dwww.ludoslovensky.sk%26origin%3Dhttp%253A%252F%252Fwww.ludoslovensky.sk%252Ff3f83bb3f%26relation%3Dparent.parent&amp;color_scheme=dark&amp;container_width=263&amp;header=false&amp;height=50&amp;href=https%3A%2F%2Fwww.facebook.com%2Fludo.slovensky&amp;locale=en_US&amp;sdk=joey&amp;show_border=false&amp;show_faces=true&amp;stream=false" class="" style="border: none; visibility: visible; width: 300px; height: 70px;"></iframe></span></div>
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
    <script src="js/jquery.cookie.js"></script>
    
    
    	  


	  
	  
	  
	  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46378127-1', 'auto');
  ga('send', 'pageview');

</script>
	  
    
    
  </body>
</html>