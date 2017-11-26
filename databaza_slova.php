<?php
 
 if ($_SERVER['APP_ENV']=='tomas') {
 
      $p_meno="root";
      $p_heslo="LudoLudoVedMaNeser";
      $p_databaza="slova";
      $p_host="localhost";

}else if ($_SERVER['APP_ENV'] == "roman") {
      $p_meno="root";
      $p_heslo="root";
      $p_databaza="slova";
      $p_host="localhost";
} else {
      echo "ahoj";
      $p_meno="slova";
      $p_heslo="LudoLudoVedMaNeser";
      $p_databaza="slova";
      $p_host="localhost";

}
      $konstDie = "Chyba pri spojení s databázou. Zlý, zlý Ulej! Ty radšej nič neprogramuj, ale Ulej!";
                                       //Konstanty
      mysql_connect($p_host,$p_meno,$p_heslo);
      mysql_select_db($p_databaza) or die($konstDie);
?>
