

<html>
<head>
<meta charset="utf-8">


</head>

<?php
include "../databaza_prislovia.php";


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


$slova_json_array=json_encode(explode(",", strtolower($slova[$prislovie->id])));
$kluce_json_array=json_encode(explode(",", strtolower($kluce[$prislovie->klu_id])));
//$kluce_slova_array=array_unique($kluce_slova_array);
//$slova_kluce_json_array=json_encode(array_merge(json_decode($slova_json_array, true),json_decode($kluce_json_array, true)));
//$slova_kluce_json_array=json_encode(array_unique(json_decode($slova_kluce_json_array)));

$kluce_slova_array=array_merge(explode(",", strtolower($slova[$prislovie->id])), explode(",", strtolower($kluce[$prislovie->klu_id])));
$kluce_slova_json=json_encode($kluce_slova_array);

//print_r($kluce_slova_array);

$json.=sprintf(
'
{"id": "%s",
"txt": "%s",
"kluc": %s,
"kluc_id": "%s",
"kategoria": "%s",
"kategoria_id":"%s",
"utvar": "%s",
"slova": %s,
"kluc_slova_spolu": %s},
<BR>', 
$prislovie->id, $prislovie->txt, $kluce_json_array, $prislovie->klu_id, $kategorie[$prislovie->kap_id],$prislovie->kap_id, $utvary[$prislovie->utv_id], $slova_json_array, $kluce_slova_json);

}  

echo "<blockquote>[".$json."]</blockquote>";



?>

</html>