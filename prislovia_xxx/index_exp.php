<?
include "databaza.php";
include "prislovia.inc.php";	
//ini_set('E_ERROR', E_ALL);
//ini_set('display_errors', true);
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="Tomáš Ulej">
    <title>Slovenské príslovia</title>
    <link rel="stylesheet" href="css/bootstrap-responsive.css" type="text/css"> 
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"> 


    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>

    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>


</head>
<body>

 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Príslovia <small>(ALFA)</small></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="#about">O projekte</a></li>
            </ul>
            <form class="navbar-form pull-right">
              <input class="search-query span4" type="text" placeholder="Hľadaj príslovie">
              <button type="submit" class="btn">Hľadaj</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Slovenské príslovia <small>Dosiaľ <? $q=mysql_query("SELECT count(*) FROM pr_txt;"); echo mysql_result($q, 0); ?> end kaunťing</small></h1>
</div>

<div class="row"><div class="span12">


<table>

<?
$id=$_GET['id'];

$q=mysql_query("
SELECT 
pr_txt.zat_id as zat_id, 
pr_txt.txt as txt, 
pr_utvary.txt as utvar
FROM pr_txt LEFT JOIN (pr_poznamky, pr_kluc, pr_kategorie, pr_utvary) 
ON (pr_poznamky.txt_id=pr_txt.id AND pr_kluc.id=pr_txt.klu_id AND pr_kategorie.id=pr_txt.kap_id AND pr_utvary.id=pr_txt.utv_id) 

WHERE pr_txt.kap_main=$id;");

while ($prislovie=mysql_fetch_object($q)) {
printf("<tr><td width='50px'>%s</td><td>%s</td></tr>",$prislovie->zat_id, $prislovie->txt);


}

?>




</table>

</div> <!-- /container -->

