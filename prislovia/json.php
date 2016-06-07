

<html>
<head>
<meta charset="utf-8">


</head>

<?
include "databaza.php";


//vsetky kategorie

$kategorie=array();
$q=mysql_query("SELECT * FROM pr_kategorie");
while($kategoria=mysql_fetch_object($q)) {
     $kategorie[$kategoria->id]=sprintf('%s', $kategoria->txt);  
}


// vsetky utvary
$utvary=array();
$q=mysql_query("SELECT * FROM pr_utvary");
while($utvar=mysql_fetch_object($q)) {
     $utvary[$utvar->id]=sprintf('%s', $utvar->txt);  
}


// vsetky kluc
$kluce=array();
$q=mysql_query("SELECT * FROM pr_kluc");
while($kluc=mysql_fetch_object($q)) {
     $kluce[$kluc->id]=sprintf('%s', $kluc->txt);  
}


// vsetky index
$slova=array();
$q=mysql_query("SELECT * FROM pr_slova");
while($slovo=mysql_fetch_object($q)) {
     $slova[$slovo->txt_id]=sprintf('%s ', $slovo->txt);  
}



$q=mysql_query("SELECT * FROM pr_txt");


//$q=mysql_query("SELECT pr_txt.id as idecko, pr_txt.txt, pr_txt.kap_id, pr_txt.utv_id, pr_txt.klu_id, pr_kategorie.txt as kategoria, pr_utvary.txt as utvar, pr_kluc.txt as kluc FROM pr_txt 
//INNER JOIN pr_kategorie ON pr_txt.kap_id=pr_kategorie.id
//INNER JOIN pr_utvary ON pr_txt.utv_id=pr_utvary.id
//INNER JOIN pr_kluc ON pr_txt.klu_id=pr_kluc.id WHERE 1=1 LIMIT 10");

while($prislovie=mysql_fetch_object($q)) {
$json.=sprintf(
'
curl -XPUT \'http://95.85.7.30:9200/prislovia/prislovie/%s\' -d 
\'{"txt": "%s",
"kluc": "%s",
"kategoria": "%s",
"utvar": "%s",
"slova": "%s"}\'<BR>', 
$prislovie->id, $prislovie->txt,$kluce[$prislovie->klu_id], $kategorie[$prislovie->kap_id], $utvary[$prislovie->utv_id], $slova[$prislovie->id]);

}  

echo "<blockquote>".$json."</blockquote>";



?>

</html>