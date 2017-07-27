<?php

include $_SERVER["DOCUMENT_ROOT"]."/databaza_prislovia.php";
include "kategoria.inc.php";

$id=$_GET['id'];
$kluc=$_GET['kluc'];
$q1=mysql_query("SELECT * FROM pr_txt WHERE id=$id");
$prislovie=mysql_fetch_object($q1);

$q2=mysql_query("SELECT * FROM pr_poznamky WHERE txt_id=$id");

while ($poznamky=mysql_fetch_object($q2)) {
    $pozn_su=true;
	$poz.=sprintf("<code>%s</code><BR>",$poznamky->txt);
}



?>
<small><blockquote class="blockquote">

<?php if ($pozn_su) { ?>
 
<?php echo $poz; ?> 

<?php } ?>

<strong>Zdroj</strong>: A. P. Záturecký: Slovenské príslovia, porekadlá a úslovia, Zlatý fond denníka SME, 2013<BR>
<strong>Kategória</strong>: <a href="kategoria.php?id=<?php echo $prislovie->kap_main;?>"><?php echo kat_namebyid($prislovie->kap_id); ?> <BR>
<strong>Trvalý odkaz</strong>: <a href="prislovie.php?id=<?php echo $prislovie->id;?>">hin</a><BR>

</small></blockquote>	        
     
<div class="lajk"><iframe src="http://www.facebook.com/plugins/like.php?href=http://www.ludoslovensky.sk/prislovia/prislovie.php?id=<?php echo $prislovie->id;?>&width&layout=standard&action=like&show_faces=true&share=true&height=40&appId=1402931466605062" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"></iframe></div>


     

 

   