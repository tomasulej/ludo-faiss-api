<?php

include "kniznica.php";
include "../databaza_slova.php";

error_reporting(E_ALL);
ini_set('display_errors', '1');


//echo zakladny_tvar("bol");
//echo zakladny_tvar("bude");


$sql="INSERT INTO freq_table (table_name,table_name_newinfo, display_name) VALUES ('freq2_matkin_nie_na_usta_178', 'newinfo_matkin_nie_na_usta_190', 'Maxim E. Matkin: Nie na ústa (2011)');";
//$sql="UPDATE freq_table SET display_name='Harry Potter: Dary smrti' WHERE id=26;";




//$sql="CREATE TABLE freq_table (
//id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
//table_name VARCHAR(256),
//display_name VARCHAR(256),
//description TEXT);";

echo $sql;


$q=mysql_query($sql);


echo emocia("najlepšieho");	
	
?>	