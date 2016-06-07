<?php


//error_reporting(E_ALL);
//ini_set('display_errors', '1');

include "kniznica.php";
include "../databaza_slova.php";


$word=$_GET['word'];

$konst_pocet=$_GET['p'];



//ID1--------------
$id1=$_GET['id1'];
$q1=mysql_query("SELECT * FROM freq_table WHERE id=$id1;");
$sada1=mysql_fetch_object($q1);
$tabulka1=$sada1->table_name;
$tabulka1_meno=$sada1->display_name;


$query_celkovo1=sprintf("SELECT SUM(count) as celkovo FROM %s;", $tabulka1);
$q1_celkovo=mysql_query($query_celkovo1);
$r1_celkovo=mysql_fetch_object($q1_celkovo);

$q1_h=mysql_query(sprintf("SELECT * FROM %s WHERE word='%s';", $tabulka1, $word));
 while ($r1_h=mysql_fetch_object($q1_h)) {
	 $a1[($r1_h->word)]=($r1_h->count)/($r1_celkovo->celkovo/100);
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

$q2_h=mysql_query(sprintf("SELECT * FROM %s WHERE word='%s'", $tabulka2,$word));
 while ($r2_h=mysql_fetch_object($q2_h)) {
	 $a2[($r2_h->word)]=($r2_h->count)/($r2_celkovo->celkovo/100);
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

$q3_h=mysql_query(sprintf("SELECT * FROM %s WHERE word='%s';", $tabulka3,$word));
 while ($r3_h=mysql_fetch_object($q3_h)) {
	 $a3[($r3_h->word)]=($r3_h->count)/($r3_celkovo->celkovo/100);
}



//KORPUS

$tabulka4="freq";
$tabulka4_meno="Celá slovenčina";

$query_celkovo4=sprintf("SELECT SUM(count) as celkovo FROM %s;", $tabulka4);
$q4_celkovo=mysql_query($query_celkovo4);
$r4_celkovo=mysql_fetch_object($q4_celkovo);
//echo $r4_celkovo->celkovo;

$q4_h=mysql_query(sprintf("SELECT * FROM %s WHERE word='%s'", $tabulka4, $word));
 while ($r4_h=mysql_fetch_object($q4_h)) {
	 //echo $r4_h->word;
	 $a4[($r4_h->word)]=($r4_h->count)/($r4_celkovo->celkovo/100);

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
        ['Slová', { role: 'annotation' }, '<?php echo $tabulka1_meno;?>', '<?php echo $tabulka2_meno;?>', '<?php echo $tabulka3_meno;?>','<?php echo $tabulka4_meno;?>'],
<?php        
 
foreach ($a4 as $key => $value) {
	if (empty($a2[$key])) {$a2[$key]=0;}
	if (empty($a3[$key])) {$a3[$key]=0;}
	if (empty($a4[$key])) {$a4[$key]=0;}
	
	printf("['%s', '%s', %s, %s, %s, %s],\n",$key, $key, $a1[$key],$a2[$key],$a3[$key],$a4[$key]); 
}	 
 
        
?>        
        

      ]);

      var options = {
	    legend: {position: 'bottom'},

        chart: {
          title: '',
        },
        hAxis: {
          title: '',
          	    legend: {position: 'top'},

          minValue: 0,
        },
        vAxis: {
          title: '',
          	    legend: {position: 'top'},

        },
        bars: 'vertical'
      };
      var material = new google.charts.Bar(document.getElementById('chart_div'));
      material.draw(data, options);
    }	
	
</script>	
	
</head>	

<body>
  <div id="chart_div" width="100%" height="100%"><div>
</body>

<html>