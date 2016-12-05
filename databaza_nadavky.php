<?php
 if ($_SERVER['APP_ENV']=='tomas') {

      $pmeno="root";
      $heslo="LudoLudoVedMaNeser";
      $databaza="nadavky";
      $host="localhost";

      $konstDie = "Chyba pri spojení s databázou. Zlý, zlý Ulej! Ty radšej nič neprogramuj, ale Ulej!";
                                       //Konstanty
      mysql_connect($host,$pmeno,$heslo);
      mysql_select_db($databaza) or die($konstDie);

 } else if ($_SERVER['APP_ENV'] == 'roman') {
      $pmeno="root";
      $heslo="root";
      $databaza="nadavky";
      $host="localhost";
 } else {
 
      $pmeno="nadavky";
      $heslo="LudoLudoVedMaNeser";
      $databaza="nadavky";
      $host="localhost";

      $konstDie = "Chyba pri spojení s databázou. Zlý, zlý Ulej! Ty radšej nič neprogramuj, ale Ulej!";
                                       //Konstanty
      mysql_connect($host,$pmeno,$heslo);
      mysql_select_db($databaza) or die($konstDie);

}
?>
