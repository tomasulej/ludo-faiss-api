<?php


//error_reporting(E_ALL);
//ini_set('display_errors', '1');

include "kniznica.php";
include "../databaza_slova.php";
$dielik=5000;


$id1=$_GET['id1'];
$q1=mysql_query("SELECT * FROM freq_table WHERE id=$id1;");
$sada1=mysql_fetch_object($q1);
$tabulka1=$sada1->table_name_newinfo;
$tabulka1_meno=$sada1->display_name;

$id2=$_GET['id2'];
$q2=mysql_query("SELECT * FROM freq_table WHERE id=$id2;");
$sada2=mysql_fetch_object($q2);
$tabulka2=$sada2->table_name_newinfo;
$tabulka2_meno=$sada2->display_name;


$id3=$_GET['id3'];
$q3=mysql_query("SELECT * FROM freq_table WHERE id=$id3;");
$sada3=mysql_fetch_object($q3);
$tabulka3=$sada3->table_name_newinfo;
$tabulka3_meno=$sada3->display_name;


//$tabulka="newinfo_vilikovsky_letmy_sneh_139";	
	
?>	


<html>
<head>
  <meta charset="utf-8">
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['corechart']}]}"></script>
<?php		
	  

//$q1_sd=mysql_query("SELECT count(absolut_pos) as dokopy FROM $tabulka");
//$c=mysql_fetch_object($q1_sd);
//$dokopy=$c->dokopy;

//$q_sd=mysql_query("SELECT * FROM $tabulka ORDER BY absolut_pos ASC;");



$q_sd1=mysql_query("SELECT absolut_pos div $dielik as abs, AVG(newinfo_pos) as newinfo_avg FROM $tabulka1 GROUP BY absolut_pos div $dielik ORDER BY absolut_pos ASC;");

$q_sd2=mysql_query("SELECT absolut_pos div $dielik as abs, AVG(newinfo_pos) as newinfo_avg FROM $tabulka2 GROUP BY absolut_pos div $dielik ORDER BY absolut_pos ASC;");

$q_sd3=mysql_query("SELECT absolut_pos div $dielik as abs, AVG(newinfo_pos) as newinfo_avg FROM $tabulka3 GROUP BY absolut_pos div $dielik ORDER BY absolut_pos ASC;");



?>

   <script type="text/javascript">
     
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Pozícia', <?php printf("'%s'",$tabulka1_meno); ?>, <?php printf("'%s'",$tabulka2_meno); ?>, <?php printf("'%s'",$tabulka3_meno); ?>],


	 <?php
	
while ($sd1=mysql_fetch_object($q_sd1)) {
		//printf("['%s', %s],", round(($sd->abs*$dielik)/($dokopy/100)), $sd->newinfo_avg);
		//if ($sd->abs==5) {$vypis=sprintf("<big>V  prvých %s slovách je %s, ktoré prinášajú nejakú novú informáciu.</big>",$sd->abs*$dielik,round($sd->newinfo_avg));}
	  $hodnota1[$sd1->abs]=$sd1->newinfo_avg;	
}	

while ($sd2=mysql_fetch_object($q_sd2)) {
		//printf("['%s', %s],", round(($sd->abs*$dielik)/($dokopy/100)), $sd->newinfo_avg);
		//if ($sd->abs==5) {$vypis=sprintf("<big>V  prvých %s slovách je %s, ktoré prinášajú nejakú novú informáciu.</big>",$sd->abs*$dielik,round($sd->newinfo_avg));}
	  $hodnota2[$sd2->abs]=$sd2->newinfo_avg;	
}	
	

while ($sd3=mysql_fetch_object($q_sd3)) {
		//printf("['%s', %s],", round(($sd->abs*$dielik)/($dokopy/100)), $sd->newinfo_avg);
		//if ($sd->abs==5) {$vypis=sprintf("<big>V  prvých %s slovách je %s, ktoré prinášajú nejakú novú informáciu.</big>",$sd->abs*$dielik,round($sd->newinfo_avg));}
	  $hodnota3[$sd3->abs]=$sd3->newinfo_avg;	
}	
	

	
foreach ($hodnota2 as $key => $value) {
			
		printf("['%s', %s, %s, %s],", $key*$dielik, $hodnota1[$key], $hodnota2[$key], $hodnota3[$key]);

}	
	
	
	?>	

		            

       ]);
 

        var options = {
	      legend: {position: 'bottom'},
	              pointSize: 0,


          title: 'Ako pribúdajú nové informácie v texte v priebehu času',
            colors: ['red', 'blue', 'black', '#f3b49f', '#f6c7b6'],
            
            series: {
            0: { lineWidth: 3 },
            1: { lineWidth: 3 },
            2: { lineWidth: 1 }
            
            
            },  
            
		  titleTextStyle: { color: '#5c5c5c', fontName: 'Open Sans', fontSize: '16' },

          hAxis: {title: 'Pozícia (poradie slova)', textPosition: 'none'},
          vAxis: {title:'Nové informácie',minValue: 0, textPosition: 'none'}
          
        };

        var chart = new google.visualization.LineChart(document.getElementById('area'));
        chart.draw(data, options);
      }


  	
    
    
     </script>






	
</head>	

<body>
<?php echo $vypis; ?>	
<div id="area" style="height:100%;width:100%"></div>	
</body>

<html>