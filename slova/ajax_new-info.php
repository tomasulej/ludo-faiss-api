<?php


//error_reporting(E_ALL);
//ini_set('display_errors', '1');

include "kniznica.php";
include "../databaza_slova.php";
$dielik=5000;


$id=$_GET['id'];
$q=mysql_query("SELECT * FROM freq_table WHERE id=$id;");
$sada=mysql_fetch_object($q);
$tabulka=$sada->table_name_newinfo;
$tabulka_name=$sada->display_name;
//$tabulka="newinfo_vilikovsky_letmy_sneh_139";	
	
?>	


<html>
<head>
  <meta charset="utf-8">
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['corechart']}]}"></script>
<?php		
	  

$q1_sd=mysql_query("SELECT count(absolut_pos) as dokopy FROM $tabulka");
$c=mysql_fetch_object($q1_sd);
$dokopy=$c->dokopy;

//$q_sd=mysql_query("SELECT * FROM $tabulka ORDER BY absolut_pos ASC;");

$q_sd=mysql_query("SELECT absolut_pos div $dielik as abs, AVG(newinfo_pos) as newinfo_avg FROM $tabulka GROUP BY absolut_pos div $dielik ORDER BY absolut_pos ASC;");



?>

   <script type="text/javascript">
     
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Percento textu', '<?php echo $tabulka_name ;?>'],

	 <?php
	
while ($sd=mysql_fetch_object($q_sd)) {
		printf("['%s', %s],", round(($sd->abs*$dielik)/($dokopy/100)), $sd->newinfo_avg);
		if ($sd->abs==5) {$vypis=sprintf("<big>V  prvých %s slovách je %s, ktoré prinášajú nejakú novú informáciu.</big>",$sd->abs*$dielik,round($sd->newinfo_avg));}
}	
		 
	
	?>	

		            


        ]);

        var options = {
	      legend: {position: 'none'},
		  titleTextStyle: { color: '#5c5c5c', fontName: 'Open Sans', fontSize: '16' },
          title: '<?php echo $tabulka_name; ?> - Pribúdanie nových informácii v priebehu času',
          hAxis: {title: 'Postupnosť slov', textPosition: 'none'},
          colors: ['green', 'red', 'green', '#f3b49f', '#f6c7b6'],
		  series: {
            0: { lineWidth: 3 }
            },
          vAxis: {title:'Nové informácie',minValue: 0, textPosition: 'none'}
          
        };

        var chart = new google.visualization.LineChart(document.getElementById('area'));
        chart.draw(data, options);
      }


  	
    
    
     </script>






	
</head>	

<body>
<?php echo $vypis; ?>	
<div id="area" style="height:80%; width:100%"></div>	
</body>

<html>