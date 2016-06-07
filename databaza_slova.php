<?php
      $pmeno="root";
      $heslo="LudoLudoVedMaNeser";
      $databaza="slova";
      $host="localhost";

      $konstDie = "Chyba pri spojení s databázou. Zlý, zlý Ulej! Ty radšej nič neprogramuj, ale Ulej!";
                                       //Konstanty
      mysql_connect($host,$pmeno,$heslo);
      mysql_select_db($databaza) or die($konstDie);
?>
