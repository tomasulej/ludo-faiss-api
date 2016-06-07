<ul>
  <? 
    $ac=$_POST['ac'];
    include "../../databaza.php";
    $q=mysql_query('SELECT * FROM pr_kluc WHERE txt LIKE "%'.$ac.'%";');
      while ($d=mysql_fetch_object($q)) {
        $qq=mysql_query("SELECT txt FROM pr_kategorie WHERE id=$d->kap_id");
        $kapitola=mysql_result($qq, 0);
        $navrat.=sprintf('<li id="http://zlatyfond.sme.sk/projekty/prislovia/kategoria.php?id=%s#kluc_%s">%s (<i>%s</i>)</li>', $d->kap_id, $d->id, str_replace($ac, "<strong>".$ac."</strong>", $d->txt), $kapitola);
      }
      
    $q=mysql_query('SELECT * FROM pr_kategorie WHERE txt LIKE "%'.$ac.'%";');
      while ($k=mysql_fetch_object($q)) {
        $navrat.=sprintf('<li id="http://zlatyfond.sme.sk/projekty/prislovia/kategoria.php?id=%s">%s</li>', 
        $k->id, str_replace("%s".$ac."%", 
                              "<strong>".$ac."</strong>", 
                              $k->txt));
      }
    
    
    
    echo $navrat;
  ?>  
   
</ul>