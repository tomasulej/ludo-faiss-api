<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

include "kniznica.php";
include "../databaza_slova.php";


$rebricek_count_end=$_POST['count'];

//echo "sss".$_POST['count'];

$pismeno=$_POST['utvary'];
$tabulka_id=$_POST['tabulka_id'];

$q=mysql_query("SELECT * FROM freq_table WHERE id=$tabulka_id;");
$sada=mysql_fetch_object($q);
$tabulka=$sada->table_name;

//echo $tabulka;


$wordcloud_url=sprintf("https://ludoslovensky.sk/data/wordcloud/wordcloud_happiness.php?id=%s&count=%s&utvary=%s",$tabulka_id,$rebricek_count_end,$pismeno);

	
	?>


<div class="row">


<div class="col-md-2 col-md-offset-1">
<p><strong>Rebríček:</strong></p>


<div class="row">
<div class="col-md-6">
		
<?php	
	


if ($pismeno<>"all") {$sql="SELECT * FROM $tabulka WHERE (emotion=$pismeno) ORDER BY rating LIMIT $rebricek_count_end";}
  else {$sql="SELECT * FROM $tabulka WHERE emotion<>0 ORDER BY rating LIMIT $rebricek_count_end";};		
//echo $sql;
$q=mysql_query($sql);

printf("<ol>");
$p=0;

while ($slovo=mysql_fetch_object($q)) {
	$p++;
	$popup=sprintf('<a data-popover="true" data-content="<div class=\'quote-popover\'>Slovo: <strong>%s</strong><BR> Forma: <strong>%s</strong><BR>Text: <strong>%sx</strong> (%s. miesto)<BR>Korpus: <strong>%sx</strong> (%s. miesto)</div>">',$slovo->word,$slovo->form,$slovo->count, $slovo->rating, $slovo->korpus_count, $slovo->korpus_rating);
	
	printf("<li>%s %s</a></li>", $popup, $slovo->word);
    if ($p>$rebricek_count_end/2) {printf('</ol></div><div class="col-md-6"><ol start="%s">',$p+1);$p=0;}


}
printf("</ol>");


?>

</div></div>
</div>

<div class="col-md-9">	

<div class="embed-responsive embed-responsive-4by3">
   <iframe class="embed-responsive-item" style="height:400px" src="<?php echo $wordcloud_url ?>"></iframe>
</div>

</div>	


</div>



