<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

include "kniznica.php";
include "../databaza_slova.php";

$id=$_GET['id'];
if ($id==""){$id=1;}
	    
$q=mysql_query("SELECT * FROM freq_table WHERE id=$id;");
$sada=mysql_fetch_object($q);



//konstanty
 $rebricek_count_end=20;
 $unique_count_limit=50;
 $unique_rating_limit=500;
 $tabulka=$sada->table_name;




?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="Ľuda Slovenského jazyka analýza" />
<meta property="og:description" content="Čím je jazyk výnimočný. Najtypickejších slov hľadanie." />
    
  
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

      

    <title>Ľuda Slovenského slov štatistika</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.vertical-tabs.min.css" rel="stylesheet">

    
    <link href="css/style.css" rel="stylesheet">
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      
    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


<script type="text/javascript">

function  nacitaj_statistiky(co) { 
    //$('#slova_stats').empty().append("Načítavam!");
    var $form = $( this ),
	rad = $('#radenie:checked').val(),
    tab_id = '<?php echo $id; ?>',
    c= $('#count').val(),
    u= $('#unique').val(),
    url = 'ajax_statistiky_slova.php';
 
  //alert(text);
  // Send the data using post
  var posting = $.post( url, { utvary: co, radenie: rad, tabulka_id: tab_id, count: c, uniq: u } );
 
 
  // Put the results in a div
  posting.done(function( data ) {
    //alert(data);
    $('#slova_stats').empty().append(data);
    //var content = $( data ).find( "#content" );
    //$( "#result" ).empty().append( data );
  });
	//var $tab = $('#tabs_slova'), $active = $tab.find('.tab-pane.active'), text = $active.find('p:hidden').text();
    //alert(text)
}


function  nacitaj_happiness(co) { 
    //$('#slova_stats').empty().append("Načítavam!");
    var $form = $( this ),
	
    tab_id = '<?php echo $id; ?>',
    c= $('#count_happiness').val(),
    url = 'ajax_statistiky_happiness.php';
 
  //alert(text);
  // Send the data using post
  var posting = $.post( url, { utvary: co, tabulka_id: tab_id, count: c} );
 
 
  // Put the results in a div
  posting.done(function( data ) {
    //alert(data);
    $('#happiness_stats').empty().append(data);
    //var content = $( data ).find( "#content" );
    //$( "#result" ).empty().append( data );
  });
	//var $tab = $('#tabs_slova'), $active = $tab.find('.tab-pane.active'), text = $active.find('p:hidden').text();
    //alert(text)
}



	
</script>	   


  </head>
  <body onload="nacitaj_statistiky('all');nacitaj_happiness('all');">
	  
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1402931466605062&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
    
       <?php printf(implode('', file('tmpl_hlavicka.html')),"Ľuda Slovenského jazyka analýza"); ?>
    
    
    
        <div class="container content">
	        


<div class="row">

<div class="col-md-8">
<form class="form-inline"><label for"sada">Vyberte dokument:</label>&nbsp;&nbsp;&nbsp;	<select id="sada" class="form-control input-sm" onchange="window.location = $( '#sada' ).val()">

<?php

	  $q=mysql_query("SELECT * FROM freq_table");
	  
	  while ($sady=mysql_fetch_object($q)) {
		  if ($sady->id==$id) {$class="selected";} else {$class="";}
		  printf('<option value="http://www.ludoslovensky.sk/slova/statistiky.php?id=%s" %s>%s</option>',$sady->id,$class, $sady->display_name);
		  
	  }



?>
</select></form>
</div>

<div class="col-md-4"><p>Čo je toto za vec? Čítaj najskôr <a href="https://dennikn.sk/85941/kto-tara-viac-fico-alebo-dzurinda-vsetko-o-slovach-politikov-a-nas-ostatnych/">tento článok</a>. Máš dáta, ktoré by sem mohli pribudnúť? <a href="mailto:tomas.ulej@gmail.com">Napíš mi</a>. Chceš viac takýchto vecí? <a href="http://www.facebook.com/ludoslovensky">Toto lajkni</a>.</p></div>

</div>
        
<h3>Štatistiky o texte</h3>
<div class="row">
<div class="col-md-4 well">
	<div class="embed-responsive embed-responsive-4by3">
		<iframe class="embed-responsive-item" src="ajax_mnozstvo-slov.php?id=<?php echo $id;?>"></iframe>
	</div>
</div>

<div class="col-md-4 well">
	<div class="embed-responsive embed-responsive-4by3">
		<iframe class="embed-responsive-item" src="ajax_mnozstvo-slov2.php?id=<?php echo $id;?>"></iframe>
	</div>
</div>


<div class="col-md-4 well">
	<div class="embed-responsive embed-responsive-4by3">
		<iframe class="embed-responsive-item" src="ajax_new-info.php?id=<?php echo $id;?>"></iframe>
	</div>
</div>

</div>

<BR>
<H2>Analýza najtypickejších slov</H2>


<div class="row well">
<div class="col-md-12" id="radiobuttony">
<form class="form-inline">


&nbsp;&nbsp;&nbsp;		
<label for="co">Zobraziť:</label>&nbsp;
	
<select id="co" class="form-control input-sm" onchange="nacitaj_statistiky($( '#co' ).val())">
  <option value="all" selected>Všetky slová</option>

<?php

$q_o=mysql_query("SELECT substr(form,1,1) as pismeno, form, sum(count) as sum_pocet FROM $tabulka GROUP BY pismeno ORDER by sum_pocet DESC;");
$p=0;

   while ($o=mysql_fetch_object($q_o)) {
   		printf("<option value='%s' onselect='nacitaj_statistiky(\"%s\")'>%s (%s slov)</option>",$o->pismeno, $o->pismeno,form_name($o->pismeno),$o->sum_pocet);
   }
?>


</select>
	
&nbsp;&nbsp;&nbsp;	
<label class="radio-inline">
  <input type="radio" name="radenie" id="radenie" value="top" onchange="nacitaj_statistiky($( '#co' ).val())">Najpopulárnejšie slová
</label>
<label class="radio-inline">
  <input type="radio" name="radenie" id="radenie" value="unique" checked onchange="nacitaj_statistiky($( '#co' ).val())">Najtypickejšie slová
</label>
&nbsp;&nbsp;	
<label for="count">Počet</label>
    <input class="" type="text" class="form-control input-sm" id="count" value="50" onchange="nacitaj_statistiky($( '#co' ).val())">

<label for="unique">Min. p:</label>
    <input type="text" class="form-control input-sm" id="unique" value="10" onchange="nacitaj_statistiky($( '#co' ).val())">
  
  
</div></div>

</div>
</form>

</div>


  

<div class="col-md-12" id="slova_stats">
<div style="height:500px"></div>
</div>

<div class="container">

<h2>Analýza emocionality</h2>
<div class="row well">
<div class="col-md-12" id="radiobuttony">
<form class="form-inline">


&nbsp;&nbsp;&nbsp;		
<label for="co">Zobraziť:</label>&nbsp;
	
<select id="co_happiness" class="form-control input-sm" onchange="nacitaj_happiness($( '#co_happiness' ).val())">
  <option value="all" selected>Všetky druhy emócii</option>

<?php

$q_o=mysql_query("SELECT emotion as pismeno, form, sum(count) as sum_pocet FROM $tabulka GROUP BY pismeno ORDER by sum_pocet DESC;");
$p=0;

   while ($o=mysql_fetch_object($q_o)) {
   		if ($o->pismeno<>0) {printf("<option value='%s' onselect='nacitaj_happiness(\"%s\")'>%s (%s slov)</option>",$o->pismeno, $o->pismeno,emotion_name($o->pismeno),$o->sum_pocet);}
   }
?>


</select>
	
&nbsp;&nbsp;	
<label for="count">Počet</label>
    <input class="" type="text" class="form-control input-sm" id="count_happiness" value="50" onchange="nacitaj_happiness($( '#co_happiness' ).val())">
  
</div></div>

</div>
</form>

</div>


<div class="row">

<div class="col-md-12" id="happiness_stats">
<div style="height:500px"></div>

</div>









 </div>


    
    <?php printf(implode('', file('../tmpl_paticka.html'))); ?>
        <script src="js/scripts.js"></script>


    
    <?php printf(implode('', file('../tmpl_analytics.html'))); ?>
    
  </body>
</html>