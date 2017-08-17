<?php

include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

//$query="SELECT lokality.area, lokality.id_lokalita, lokality.id_lokalita FROM lokality";
//$q_piesne=mysql_query($query);

//META
//$meta_type="article";
//$meta_title="Ľudo Slovenský: kde sa na Slovensku spievajú ktoré piesne?";
//$meta_image="http://www.ludoslovensky.sk/public/img/ludo-music.png";
//$meta_url="http://".$_SERVER['SERVER_NAME']."/piesne/slova.php";
//$meta_desc="Tisíce rokov Ľudo Slovenský spieva piesne. Sú našim pokladom. Aby sme ho zachovali, postupne zbierame, digitalizujeme, triedime a sprístupňujeme desaťtisíce piesní, ktoré sa počas tisícok rokov spievali na našom území.";

//vytiahnutie dat
$q=mysql_query("SELECT mena.id_meno, mena.meno, mena.pohlavie, count(id_piesen) as pocet  FROM mena_piesne LEFT JOIN mena ON mena_piesne.id_meno=mena.id_meno  GROUP BY id_meno");



while ($d=mysql_fetch_object($q)) {
//    if ($d->pocet>3) {
//    $data.=sprintf(
//        '
//        {
//          "meno": "%s",
//          "pohlavie": "%s",
//          "pocet": %s,
//          "parent":"%s"
//        },
//        ',

 $data.=sprintf("'%s';'%s';'%s';'%s';'%s'
 ",$d->id_meno, $d->meno, ($d->pohlavie==1)?"Muž":"Žena", $d->pocet, $d->parent);
}
//$data=sprintf("var data = [ %s ]",$data);




require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_piesen_mena.php");
?>