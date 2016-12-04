<?php
//header( 'Location: /prislovia/' ) ;

// nacitanie informacii



//META
$meta_type="article";
$meta_title="Ľudo Slovenský - Najväčšia digitálna zbierka kultúrneho dedičstva Slovenska";
$meta_image="http://www.ludoslovensky.sk/public/img/ludo.png";
$meta_url="http://".$_SERVER['SERVER_NAME'];
$meta_desc="Ahojte, ja som Ľudo Slovenský!

Tisíc rokov píšem rozprávky, tvorím príslovia, porekadlá, nadávam, kľajem a spievam. Som najplodnejší autorom Slovenska a tu je celá moja tvorba.";




$nadpis="Aj ty si Ľudo Slovenský. Vitaj doma";
$perex="Ahoj, volám sa Ľudo Slovenský a som všetko, čo vzniklo vďaka tomu, <strong>že obývaš toto územie a hovoríš týmto jazykom</strong>. Som najplodnejší autor Slovenska - <strong>píšem rozprávky</strong>, tvorím <strong><a href='/prislovia'> príslovia, porekadlá</a></strong> a <a href='/piesne'><strong>skladám piesne</strong></a>. Som tvoje kolektívne vedomie, <a href='/nadavky'>slovná zásoba</a> a kultúra - to dobré, aj to zlé. Som ty. Vitaj doma!";

$projekty[] = array(
    "url" => "/piesne/",
    "img" => "/public/img/ludo-music.png",
    "title" => "Ľudové piesne <span class=\"tag tag-default\">BETA</span>",
    "desc" => "Tisíce rokov Ľudo Slovenský <strong>spieva piesne</strong>. Sú našim pokladom. Aby sme ho zachovali, postupne zbierame, digitalizujeme, triedime a sprístupňujeme desaťtisíce piesní, ktoré sa počas tisícok rokov spievali na našom území.",
    "cta" => "Prehrabať sa v databáze vyše 50.000 ľudových piesní");

$projekty[] = array(
    "url" => "/prislovia/",
    "img" => "/public/img/ludo-prislovia.png",
    "title" => "Ľudové príslovia, porekadlá a pranostiky",
    "desc" => "Po bitke je každý múdry, preto Ľud(o) <strong>dáva rady do života</strong>! Vyše 12.000 prísloví, porekadiel a pranostík sme zdigitalizovali, poprepájali podľa tém, aby ste si mohli vychutnať múdrosť (aj hlúposť) našich predkov. ",
    "cta" => "Prehrabať sa v databáze vyše 12.000 ľudových prísloví");


$projekty[] = array(
    "url" => "/nadavky/",
    "img" => "/public/img/ludo-nadavky.png",
    "title" => "Ľudové nadávky",
    "desc" => "Kultúru národa poznáš podľa toho, ako <strong>nadáva</strong>. A my sme veľmi kultúrna krajina, preto Ľudo zozbieral vyše 700 rôznych slovenských nadávok. Pre potešenie teba, ty kekečúr!",
    "cta" => "Prehrabať sa v databáze vyše 700 ľudových nadávok");

$projekty[] = array(
    "url" => "/labs/",
    "img" => "/public/img/ludo-labs.png",
    "title" => "Ľudovô laboratórium smiešnopochabských pokusov",
    "desc" => "Zavše vymyslíme nejakú hlúposť a potom sa ňou chceme pochváliť. Malé, nesúrodé, pokusy o niečo hravé, či smiešne. Do laboratória ich odkladáme, nach sú všetky na jednom mieste.",
    "cta" => "Navštíviť Ľudo Labs a nechať vybuchnúť svoj počítač");


require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_ludo_index.php");

	
?>