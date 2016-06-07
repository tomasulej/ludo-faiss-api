
<?
include "databaza.php";

$remove[] = "'";
$remove[] = '"';
$remove[] = ';';


$q=mysql_query("SELECT txt FROM pr_slova WHERE 1 GROUP BY txt");
while ($slovo=mysql_fetch_object($q)) {
	if (strpos($key,"/")==false) {
		$slova.=sprintf('"%s", ', str_replace( $remove, "", $slovo->txt));
	
	}
}


$slova=rtrim($slova, ", ");
printf('[%s]',$slova);

?>