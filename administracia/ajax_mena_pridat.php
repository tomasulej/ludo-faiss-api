<?php

include "../databaza_piesne.php";

$meno=$_POST['meno'];
$pohlavie=$_POST['pohlavie'];

$q=mysql_query("INSERT INTO mena (meno, pohlavie) VALUES ('$meno',$pohlavie);");

$q2=mysql_query("SELECT * FROM mena WHERE meno='$meno' AND pohlavie=$pohlavie");

$o_meno=mysql_fetch_object($q2);

printf('<input type="input" class="form-control" id="meno_id" name="meno_id" value=%s>',$o_meno->id_meno);



?>