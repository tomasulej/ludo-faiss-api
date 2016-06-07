<?php

  ini_set('E_ERROR', E_ALL);
  ini_set('display_errors', true);


include "../../databaza_nadavky.php";


function formatuj_nadavku($co) {

  //$xml = preg_replace ("/(\(\()(.*)\)\)/", "- <i>$2</i>", $co);
 
  $xml = preg_replace(array("|(\(\()+|i","|(\)\))+|i"),array("<i>'","'</i>"),$co);	

 
 
  $xml = strtr($xml, array('{' => '<code>', '}' => '</code>'));

  $xml = preg_replace ("/(\[(.*?)\])/", "<span class='glyphicon glyphicon glyphicon-link'></span> <a href='#nadavka_$2'>$2</a>", $xml);

 

  //$xml = preg_replace(array("|(\[)+|i","|(\])+|i"),array("<span class='glyphicon glyphicon glyphicon-link'></span> <a href='#nefunguje'>","</a>"),$xml);	

	
  return $xml;	
}



function najdi_nadavku($co) {

}



//--------------------------------
$tmpl_kategoria= implode('', file('tmpl_kategoria.html'));
$tmpl_nadavka= implode('', file('tmpl_nadavka.html'));
$tmpl_hlavicka= implode('', file('tmpl_hlavicka.html'));

$tmpl_analytics= implode('', file('../../tmpl_analytics.html'));



$lava_zatial='

				    <menu class="nav" data-spy="affix" data-toggle="affix" data-offset-top="180" data-offset-bottom="200">
				 <li class="navigacia" id="li_27"><a href="#kategoria_27"><b>1</b> Mladosť – staroba</a></li>



          	<li class="navigacia" id="li_28"><a href="#kategoria_28"><b>2</b> Muži a ženy vo všeobecnosti</a></li>
          	<li class="navigacia" id="li_29"><a href="#kategoria_29"><b>3</b> Mládenec a panna. Ženba a vydávanie</a></li>

';


//obsah
$q=mysql_query("SELECT * FROM nadavka;");
while ($nadavka=mysql_fetch_object($q)) {
	$obsah.=sprintf($tmpl_nadavka, $nadavka->slovo, $nadavka->slovo, formatuj_nadavku($nadavka->txt));
	
	
}






$hlavicka=sprintf($tmpl_hlavicka,""," active", "", "", "", "Ľuda Slovenského nadávky a hanlivé pomenovania");
$paticka= sprintf(implode('', file('tmpl_paticka.html')));

printf($tmpl_kategoria, "Po témach", "haha2", $hlavicka, $lava_zatial, $obsah, $paticka, $tmpl_analytics);

	
	
	
?>	