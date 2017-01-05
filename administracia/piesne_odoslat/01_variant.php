<?php

	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');

$id_piesen=(int)$_POST['id_piesen'];
if ($id_piesen==0) {$id_piesen=$_GET['id_piesen'];}

//require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_administracia_header.php";
include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

$q=mysql_query("SELECT * FROM piesne WHERE id_piesen=$id_piesen");

    $piesen=mysql_fetch_object($q);


$q2=mysql_query(sprintf("INSERT INTO piesne (id_nadriadeny, typ_nadriadeny, id_zbierka, identifikator, nazov_variant) VALUES (%s,%s, %s,'%s', '%s');", 
       $piesen->id_piesen, 1, $piesen->id_zbierka, $piesen->identifikator." variant",  "Variant 1"));


header("Location: 01_meta.php?id_piesen=".mysql_insert_id()); 
die();
