<?php

if ($_SERVER['APP_ENV']=='tomas') {
      $pmeno="root";
      $heslo="LudoLudoVedMaNeser";
      $databaza="piesne";
      $host="localhost";



} else {
      $pmeno="piesne";
      $heslo="LudoLudoVedMaNeser";
      $databaza="piesne";
      $host="localhost";


}
      $konstDie = "Chyba pri spojení s databázou. Zlý, zlý Ulej! Ty radšej nič neprogramuj, ale Ulej!";


                                       //Konstanty
      mysql_connect($host,$pmeno,$heslo);
      mysql_select_db($databaza) or die($konstDie);
?>
