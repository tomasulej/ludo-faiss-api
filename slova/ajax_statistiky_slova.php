<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

include "kniznica.php";
include "../databaza_slova.php";


$rebricek_count_end=$_POST['count'];
$unique_count_limit=$_POST['uniq'];

//echo "sss".$_POST['count'];

$radenie=$_POST['radenie'];
$pismeno=$_POST['utvary'];


//if ($pismeno=="all") {$pismeno="*";}
$tabulka_id=$_POST['tabulka_id'];

$q=mysql_query("SELECT * FROM freq_table WHERE id=$tabulka_id;");
$sada=mysql_fetch_object($q);
$tabulka=$sada->table_name;

//echo $tabulka;


$wordcloud_url=sprintf("http://ludoslovensky.sk/data/wordcloud/wordcloud_freq.php?id=%s&radenie=%s&count=%s&uniq=%s&utvary=%s",$tabulka_id,$radenie,$rebricek_count_end,$unique_count_limit,$pismeno);

	
	?>


<div class="row">


<div class="col-md-2 col-md-offset-1">
<p><strong>Rebríček:</strong></p>


<div class="row">
<div class="col-md-6">
		
<?php	
	
	
	
if ($radenie=="top") {
	


if ($pismeno<>"all") {$sql="SELECT * FROM $tabulka WHERE (substr(form,1,1)='$pismeno') ORDER BY rating LIMIT $rebricek_count_end";}
else if ($pismeno=="menaaslovesa") {$sql="SELECT * FROM $tabulka WHERE (substr(form,1,1)='S' OR substr(form,1,1)='V') ORDER BY rating LIMIT $rebricek_count_end";}
  else {$sql="SELECT * FROM $tabulka ORDER BY rating LIMIT $rebricek_count_end";};		
//echo $sql;
$q=mysql_query($sql);

printf("<ol>");
$p=0;

while ($slovo=mysql_fetch_object($q)) {
	$p++;
	$popup=sprintf('<a data-popover="true" data-content="<div class=\'quote-popover\'>Slovo: <strong>%s</strong><BR> Forma: <strong>%s</strong><BR>Text: <strong>%sx</strong> (%s. miesto)<iframe src=\'http://www.ludoslovensky.sk/slova/ajax_statistiky_slova_compare.php?id1=19&id2=16&id3=30&word=%s\' width=\'400px\' frameborder=\'0\' height=250px></iframe></div>">',$slovo->word,$slovo->form,$slovo->count, $slovo->rating, $slovo->word);
	
	printf("<li>%s %s</a></li>", $popup, $slovo->word);
    if ($p>$rebricek_count_end/2) {printf('</ol></div><div class="col-md-6"><ol start="%s">',$p+1);$p=0;}


}
printf("</ol>");
}	
	
//-----------------------


if ($radenie=="unique") {
	
	
	
	

if ($pismeno<>"all") {$sql="SELECT * FROM $tabulka WHERE (count>$unique_count_limit) AND (uniq>0) AND (korpus_rating>2000) AND  (substr(form,1,1)='$pismeno') ORDER BY uniq DESC LIMIT $rebricek_count_end";}
  else {$sql="SELECT * FROM $tabulka WHERE (count>$unique_count_limit) AND (uniq>0) AND (korpus_rating>2000) ORDER BY uniq DESC LIMIT $rebricek_count_end";};
$q=mysql_query($sql);
$p=0;






printf("<ol>");
while ($slovo=mysql_fetch_object($q)) {
	$p++;
	   

		$popup=sprintf('<a data-popover="true" data-content="<div class=\'quote-popover\'>Slovo: <strong>%s</strong><BR> Forma: <strong>%s</strong><BR>Text: <strong>%sx</strong> (%s. miesto)<iframe src=\'http://www.ludoslovensky.sk/slova/ajax_statistiky_slova_compare.php?id1=19&id2=16&id3=30&word=%s\' width=\'400px\' frameborder=\'0\' height=250px></iframe></div>">',$slovo->word,$slovo->form, $slovo->count, $slovo->rating, $slovo->word);
	
		//printf("<li>%s %s(%s)</a></li>", $popup, $slovo->word, $slovo->count);
		
		
		$html=sprintf("<li>%s %s %s</a></li>", $popup, $slovo->word, $slovo->count);
		
		$slova_array[$slovo->id]=$slovo->count;
		$slova_html[$slovo->id]=$html;

	    //if ($p>$rebricek_count_end/2) {printf('</ol></div><div class="col-md-6"><ol start="%s">',$p+1);$p=0;}

	
}	


arsort($slova_array); 
//print_r($slova_array);

$p=0;
foreach ($slova_array as $key => $val) {	
	$p++;
	printf($slova_html[$key]);
    if ($p>$rebricek_count_end/2) {printf('</ol></div><div class="col-md-6"><ol start="%s">',$p+1);$p=0;}

}

printf("</ol>");

}



?>

</div></div>
</div>

<div class="col-md-9">	

<div class="embed-responsive embed-responsive-4by3">
   <iframe class="embed-responsive-item" src="<?php echo $wordcloud_url ?>"></iframe>
</div>

</div>	


</div>



