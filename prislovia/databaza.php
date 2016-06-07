<?php
      $pmeno="prislovia";
      $heslo="LudoLudoVedMaNeser";
      $databaza="prislovia";
      $host="localhost";
      
      if ($_SERVER['APP_ENV'] == "roman") {
	      $pmeno="root";
		  $heslo="root";
		  $databaza="prislovia";
		  $host="127.0.0.1";
      }
      
      $konstDie = "Chyba pri spojení s databázou. Zlý, zlý Ulej! Ty radšej nič neprogramuj, ale Ulej!";
                                       //Konstanty
      mysql_connect($host,$pmeno,$heslo);
      mysql_select_db($databaza) or die($konstDie);
?>
