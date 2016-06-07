<?php


//error_reporting(E_ALL);
//ini_set('display_errors', '1');

include "kniznica.php";
include "../databaza_slova.php";



//ID1--------------
$id1=$_GET['id1'];
$q1=mysql_query("SELECT * FROM freq_table WHERE id=$id1;");
$sada1=mysql_fetch_object($q1);
$tabulka1=$sada1->table_name;
$tabulka1_meno=$sada1->display_name;


$query_celkovo1=sprintf("SELECT SUM(count) as celkovo FROM %s;", $tabulka1);
$q1_celkovo=mysql_query($query_celkovo1);
$r1_celkovo=mysql_fetch_object($q1_celkovo);

$q1_h=mysql_query(sprintf("SELECT SUM(count) as pocet, emotion FROM %s GROUP by emotion;", $tabulka1));
 while ($r1_h=mysql_fetch_object($q1_h)) {
	 $a1[intval($r1_h->emotion)]=($r1_h->pocet)/($r1_celkovo->celkovo/100);
}

//print_r($a1);

//ID2--------------

$id2=$_GET['id2'];
$q2=mysql_query("SELECT * FROM freq_table WHERE id=$id2;");
$sada2=mysql_fetch_object($q2);
$tabulka2=$sada2->table_name;
$tabulka2_meno=$sada2->display_name;

$query_celkovo2=sprintf("SELECT SUM(count) as celkovo FROM %s;", $tabulka2);
$q2_celkovo=mysql_query($query_celkovo2);
$r2_celkovo=mysql_fetch_object($q2_celkovo);

$q2_h=mysql_query(sprintf("SELECT SUM(count) as pocet, emotion FROM %s GROUP by emotion;", $tabulka2));
 while ($r2_h=mysql_fetch_object($q2_h)) {
	 $a2[$r2_h->emotion]=($r2_h->pocet)/($r2_celkovo->celkovo/100);
}


//ID3--------------


$id3=$_GET['id3'];
$q3=mysql_query("SELECT * FROM freq_table WHERE id=$id3;");
$sada3=mysql_fetch_object($q3);
$tabulka3=$sada3->table_name;
$tabulka3_meno=$sada3->display_name;

$query_celkovo3=sprintf("SELECT SUM(count) as celkovo FROM %s;", $tabulka3);
$q3_celkovo=mysql_query($query_celkovo3);
$r3_celkovo=mysql_fetch_object($q3_celkovo);

$q3_h=mysql_query(sprintf("SELECT SUM(count) as pocet, emotion FROM %s GROUP by emotion;", $tabulka3));
 while ($r3_h=mysql_fetch_object($q3_h)) {
	 $a3[$r3_h->emotion]=($r3_h->pocet)/($r3_celkovo->celkovo/100);
}


//KORPUS

$tabulka4="freq";
$tabulka4_meno="Celá slovenčina";

$query_celkovo4=sprintf("SELECT SUM(count) as celkovo FROM %s;", $tabulka4);
$q4_celkovo=mysql_query($query_celkovo4);
$r4_celkovo=mysql_fetch_object($q4_celkovo);
//echo $r4_celkovo->celkovo;

$q4_h=mysql_query(sprintf("SELECT emotion, SUM(count) as pocet FROM %s WHERE emotion<>0 GROUP BY emotion;", $tabulka4));
 while ($r4_h=mysql_fetch_object($q4_h)) {
	 //echo $r4_h->word;
	 $a4[($r4_h->emotion)]=($r4_h->pocet)/($r4_celkovo->celkovo/100);

}




//$tabulka="newinfo_vilikovsky_letmy_sneh_139";	
	
?>	




<html>
<head>
  <meta charset="utf-8">
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>

      
<script>
google.load('visualization', '1', {packages: ['corechart', 'bar']});
google.setOnLoadCallback(drawTitleSubtitle);

function drawTitleSubtitle() {
      var data = google.visualization.arrayToDataTable([
        ['Emócia', '<?php echo $tabulka1_meno;?>', '<?php echo $tabulka2_meno;?>', '<?php echo $tabulka3_meno;?>','<?php echo $tabulka4_meno;?>'],
<?php        
 
for ($i=-2; $i<4; $i++) {
	if (empty($a1[$i])) {$a1[$i]=0;}
	if (empty($a2[$i])) {$a2[$i]=0;}
	if (empty($a3[$i])) {$a3[$i]=0;}
	if (empty($a4[$i])) {$a4[$i]=0;}
	
	if ($i<>0) {printf("['%s', %s, %s, %s, %s],",emotion_name($i),$a1[$i],$a2[$i],$a3[$i],$a4[$i]);}; 
}	 
 
        
?>        
        

      ]);

      var options = {
        chart: {
          title: 'Politici a emócie v ich slovách',
                  titleTextStyle: { color: '#5c5c5c', fontName: 'Open Sans', fontSize: '16' }

        },
        legend: {position: 'bottom'},

        hAxis: {
          minValue: 0,
        },
        vAxis: {textPosition: 'none'},
        bars: 'vertical',

      };
      var material = new google.charts.Bar(document.getElementById('chart_div'));
      material.draw(data, options);
    }	
	
</script>	
	
</head>	

<body>
  <div id="chart_div" style="height:100%"><div>
</body>

<html>