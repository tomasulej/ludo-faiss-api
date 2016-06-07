<?php

    ini_set('E_ERROR', E_ALL);
    ini_set('display_errors', true);
	
	
?>	


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="Tomáš Ulej">
    <title>PRIDAJ TXT</title>
  </head>
  <body>

<?php  


 
  include "../../../databaza_nadavky.php";
  
  
  
  if ($_POST['h']=="h") {

   $slovo=$_POST['slovo'];
   $tvar=$_POST['tvar'];
   $sklonovanie_txt=$_POST['sklonovanie_txt'];
   $kategoria=$_POST['kategoria'];
   $kategoria2=$_POST['kategoria2'];
   
   $zdroj=$_POST['zdroj'];
   $txt=$_POST['txt'];

   $query=sprintf("INSERT INTO nadavka (slovo, tvar, sklonovanie_txt, kategoria, zdroj, txt) VALUES ('%s', '%s', '%s', %s, %s, '%s');", $slovo, $tvar, $sklonovanie_txt, $kategoria, $zdroj, $txt);
   printf($query);
   
   mysql_query($query);
   
   $q2=mysql_query("SELECT id FROM nadavka WHERE txt='$txt'");
   $s=mysql_fetch_object($q2);
   $id_nadavka=$s->id;	   	   
   
   
   foreach($_POST['kategoria2'] as $selected){
   		$q2=mysql_query("INSERT INTO nadavka_kategoria2 (id_nadavka,id_kategoria2) VALUES ($id_nadavka,$selected);");
   }

  }
    
   
?>

<H1>Importuj útvary</H1>
<form action="pridaj_nadavka.php" method="post">


Slovo:
  <input type="text" name="slovo" size="25">
  
Tvar:
  <input type="text" name="tvar" size="20">
  
Sklonovanie_txt:
  <input type="text" name="sklonovanie_txt" size="20"><BR>
  


Vyber hlavnú kategóriu
<select name="kategoria">
     <?php
       $q=mysql_query("SELECT * FROM kategoria");
         while ($k=mysql_fetch_object($q)) {
           printf('<option value="%s">%s</option>', $k->id, $k->txt);
         }
     ?>
     </select>  






Vyber zdroj
<select name="zdroj">
     <?php
       $q=mysql_query("SELECT * FROM zdroj");
         while ($k=mysql_fetch_object($q)) {
           printf('<option value="%s">%s</option>', $k->id, $k->txt);
         }
     ?>
     </select><BR> 



  <textarea name="txt" rows="16" cols="70"></textarea>


<p><b>Vyber témy kategóriu</b>:</p>


     <?php
       $q=mysql_query("SELECT * FROM kategoria2");
         while ($k=mysql_fetch_object($q)) {
           printf('<input type="checkbox" name="kategoria2[]" value="%s"><label>%s</label><br/>', $k->id, $k->txt);
         }
     ?>

  
  <BR>
  <input type="hidden" name="h" value="h">
  <input type="submit" name="submit" value="ODOSLAŤ">
</form>


</body>
</html>
