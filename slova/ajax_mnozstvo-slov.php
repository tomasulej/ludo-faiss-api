<?php


//error_reporting(E_ALL);
//ini_set('display_errors', '1');

include "kniznica.php";
include "../databaza_slova.php";

$id=$_GET['id'];
$q=mysql_query("SELECT * FROM freq_table WHERE id=$id;");
$sada=mysql_fetch_object($q);
$tabulka=$sada->table_name;	
	
?>	


<html>
<head>
  <meta charset="utf-8">
   <script type="text/javascript" src="https://www.google.com/jsapi"></script>


<?php		
	  
$q_sd=mysql_query("SELECT substr(form,1,1) as pismeno, sum(count) as sum_pocet FROM $tabulka GROUP BY pismeno;");


while ($sd=mysql_fetch_object($q_sd)) {
	//printf("          ['%s', %s],\n",form_name($sd->pismeno),$sd->sum_pocet);
	if (je_plnovyznamove($sd->pismeno)==true) {$plnovyznamove+=$sd->sum_pocet;} else {$neplnovyznamove+=$sd->sum_pocet;}
	
}

printf("<big>%s percent textu tvoria slová, ktoré nenesú žiaden význam (predložky, ap.)</big>", round($neplnovyznamove/(($plnovyznamove+$neplnovyznamove)/100),2));

?>

   <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Druh', 'Počet slov'],


<?php
	printf("          ['%s', %s],\n","Neplnovýznamové",$neplnovyznamove);
	printf("          ['%s', %s],\n","Plnovýznamové",$plnovyznamove);
	

?>
        ]);

        var options = {
          pieSliceText: 'label',
          legend: {position: 'bottom'}

        };

        var chart = new google.visualization.PieChart(document.getElementById('plno-neplno'));

        chart.draw(data, options);
      }
    </script>






	
</head>	

<body>
<div id="plno-neplno"></div>	
</body>

<html>