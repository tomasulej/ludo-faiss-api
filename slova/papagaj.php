<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="description" content="Ako veľmi šťastné sú tvoje slová? Odmeraj to.">
    <meta name="author" content="Tomáš Ulej">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:image" content="happy.jpg"/>
	<script src="js/jquery.circliful.min.js"></script>
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="js_main.js"></script>



    <title>Opakovací papagáj</title>



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



<script>
// Attach a submit handler to the form

function sendText(){
  // Stop form from submitting normally
   
  // Get some values from elements on the page:
  var $form = $( this ),
    text = $('#text').val(),
    url = 'papagaj_ajax.php';
 
     $('#vysledok').empty().append("Načítavam!!!!");

  //alert(text);
  // Send the data using post
  var posting = $.post( url, { co: text } );
 
 
  // Put the results in a div
  posting.done(function( data ) {
    $('#vysledok').empty().append(data);
    //var content = $( data ).find( "#content" );
    //$( "#result" ).empty().append( data );
  });

}
</script>




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
<H1>Generátor vogónskej poézie</H1>
          <p class="lead">Aby už nikoho nemusela kopať múza</p> 

 <div class="row">
<div class="col-md-6 jumbotron">

<form role="form" name="form" id="form">
<p>Sem skopíruj už existujú vogónsku báseň:</p>
<textarea name="text" id="text" class="form-control" rows="2"></textarea><BR>
<input type=hidden name="tabulka" id="tabulka" />
<button type="button" class="btn btn-success" onclick="sendText();">Nechaj Ľuda, nech ju napodobní</button>

</form>


</div>



<div class="col-md-6 jumbotron vysledok" id="vysledok">

</div>




 </div>

 Zaujíma ťa to viac, alebo s tým chceš pomôcť? <a href="mailto:tomas.ulej@gmail.com">Napíš</a>.
 
 
        <div style="align:right" class="fb-like" data-href="http://ludoslovensky.sk/slovo/papagaj.php" data-layout="standard" data-action="like" data-show-faces="true" data-share="true" data-width="800px" data-height="300px" style="height:200px;width:200px"></div>
        
      </div>


    <div id="footer">
      <div class="container">
      
      
        <p class="text-muted">(c) Tomáš Ulej 2015</p>
      </div>
    </div>

    </div><!-- /.container -->








  </body>
</html>

