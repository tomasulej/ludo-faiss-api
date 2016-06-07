<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Piesen->Piesne->Sql</title>

    <!-- Bootstrap core CSS -->

<link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css" integrity="sha384-XXXXXXXX" crossorigin="anonymous">
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" integrity="sha384-XXXXXXXX" crossorigin="anonymous"></script>


  </head>

  <body>
    <div class="container">


      <div class="page-header">
        <h1>Piesne: (SQL)</h1>
		<p class="lead">Slúži na spustenie SQL príkazu nad databázou. Opatrne, rob len keď vieš, čo robíš.</p>
      </div>

<HR>

<form action="piesne_sql.php" method="post">
<?php
	include "../databaza_piesne.php";

	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');

if ($_POST['odoslane']=='true') {

$q=mysql_query($_POST['sql']);	

//printf($_POST['sql']);
	
	
}



?>	
	  
	  
 

	  
	  
<div class="form-group row">	  
  <fieldset class="form-group">
    <label for="sql">Sql príkaz:</label>
    <textarea class="form-control" id="sql" name="sql" rows="5"></textarea>
  </fieldset>
</div>  
 

<input type="hidden" name="odoslane" value="true">



	  
  <div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Odoslať</button>
    </div>
  </div>
</form>




    </div> <!-- /container -->



  </body>
</html>

