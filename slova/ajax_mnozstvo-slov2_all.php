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
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['corechart']}]}"></script>
<?php		
	  

$q1_sd=mysql_query("SELECT sum(count) as dokopy FROM freq");
$c=mysql_fetch_object($q1_sd);
$dokopy=$c->dokopy;


$q_sd=mysql_query("SELECT id div 10 AS r, SUM(count) as mnozstvo FROM freq GROUP BY id div 10 ORDER BY id;");

$p=0;
$pocet=0;
$bola_veta=false;

while ($sd=mysql_fetch_object($q_sd)) {
	$p=$p+10;
	$pocet=$pocet+$sd->mnozstvo;
	$slova_mnozstvo[$p]=round($pocet/($dokopy/100),2);
	
		if ($slova_mnozstvo[$p]>75 AND !$bola_veta) {printf("<big>Stačilo by poznať %s rôznych slov a porozumiete trom štvrtinám celého textu</big>", $p, $slova_mnozstvo[$p]);$bola_veta=true;}

    //echo $slova_mnozstvo[$p]."% ----";
}


?>

   <script type="text/javascript">
     
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Počet slov', 'Percento celého textu'],

	 <?php
	
	foreach ($slova_mnozstvo as $key => $val) {
		printf("['%s', %s],",$key,$val);
	}	
		 
	?>	

		            


        ]);

        var options = {
          title: 'Koľko slov a koľko textu',
          hAxis: {title: 'Počet slov'},
          vAxis: {title:'Percento textu',minValue: 0}
          
        };

        var chart = new google.visualization.AreaChart(document.getElementById('area'));
        chart.draw(data, options);
      }


  	
    
    
     </script>






	
</head>	

<body>
<div id="area"></div>	
</body>

<html>