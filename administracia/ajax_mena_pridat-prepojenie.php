<?php 

include "../databaza_piesne.php";

$piesen_id=$_POST['piesen_id'];
$meno_id=$_POST['meno_id'];
$sql="INSERT INTO mena_piesne (id_meno,id_piesen) VALUES ($meno_id, $piesen_id);";
//echo $sql;
$q=mysql_query($sql);

echo $q;

 ?>