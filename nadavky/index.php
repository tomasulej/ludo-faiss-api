<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>

<script type="text/javascript" src="/static/js/analytics.js" ></script>
<link type="text/css" rel="stylesheet" href="/static/css/banner-styles.css"/>




    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="Tomáš Ulej">
    <title>Nehovorte k*kot, p*ča. Toto sú tradičné slovenské nadávky</title>
    <link rel="stylesheet" href="http://www.ludoslovensky.sk/nadavky/css/nadavky.css" type="text/css"> 
<script type="text/javascript" src="http://www.ludoslovensky.sk/nadavky/js/prototype.js"></script>
<script type="text/javascript" src="http://www.ludoslovensky.sk/nadavky/js/scriptaculous.js"></script>
    <meta property="og:image" content="http://www.ludoslovensky.sk/prislovia/img/detvan_crop2.png"/>
        <meta property="og:description"
          content="Potrebujete niekomu vynadať?! Tak potom nech to má štýl. Už žiadne genitálne urážky. Toto je zbierka tradičných slovenských nadávok od našich predkov."/>
      <meta property="fb:admins" content="686226655, 585314000" />


</head>
<body>

<div style="text-align:left"><a href="http://www.facebook.com/tomas.ulej.pise" style="color:gray">Tomáš Ulej</a> / <a href="http://www.ludoslovensky.sk/" style="color:gray">Ľudo Slovenský</a>: <a href="http://www.ludoslovensky.sk/prislovia">Príslovia</a> - <strong><a href="http://www.ludoslovensky.sk/nadavky/">Nadávky</a></strong></div><BR/>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/sk_SK/all.js#xfbml=1&appId=371703654059";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div style="margin-right: 516px;" align="left">
<H1><big><a href="http://www.ludoslovensky.sk/nadavky">Tradičné slovenské nadávky</a></big> </H1>
<H2>Vynadajte tým, ktorých máte radi. <a href="slovnik.php">Pozri aj: nadávky 21. storočia</a></H2>
<blockquote class="oval-thought-border" id="dedov-monolog">
	
<?php

if (!empty($_POST)) {$i=$_POST['odislo'];} else {$i=-1;};

//echo $i;

$pole[-1]="<p>Synu, už žiadny <span style='text-decoration:line-through'>kokot</span>, ani <span style='text-decoration:line-through'>piča</span>. Za našich čias sa nadávalo onakvejšie! Nože, aha! Vyskúšaj!</p>";
$pole[0]="<p>Joj, ty jeden holobriadok, drmľa, grešľa. Malý si, chrúst jeden, omražtek, ale už by si na butóny klikal? Bodaj ťa, oškrda akási!</p>";
$pole[1]="<p>Počúvaj, ty mrdofúz, štrbák. Chľasceš ako taký prepiduša, korheľ, chlipko, z tabaku kašleš ako taký taký chrchliak, mrcina, zdochliak. A čo si? Iba taký poľagan, hnilý kôň a mamľas. Jój, jak si ma napajedil.</p>";
$pole[2]="<p>Ešte nestačilo? Dobre teda, chuchma jedna, šaľuga, trúba. Všetkého sa bojíš, preto si iba obyčajný prdko, kakan, zašťan, dríšeľ a šumichrast. </p>";
$pole[3]="<p>Viem, tí tvoji by povedali, že si k*k*t, ale ja mám pre teba aj onakvejšie: holomok, lociga a svindžúr. A ak si žena, tak vedz, že si: culfa, cundra, fľandra, klampa, lecišina a lušta.</p>";
$pole[4]="<p>Nestačilo? <a href='javascript:void(0)' onclick=\"$('vsetky-nadavky').show();\">Pozri si všetkých 300 nadávok</a> slovenských, ktoré pre Teba <a href='http://www.ludoslovensky.sk'>A. P. Záturecký</a> ešte v 19. storočí zozbieral a <a href='http://www.facebook.com/tomas.ulej.pise'>kekečúr Tomáš Ulej</a> v roku 2014 na túto stránku dal. A <a href=\"https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.ludoslovensky.sk%2Fnadavky%2F\" target=\"_blank \">šír medzi priateľmi</a>, nech Ľudo slovenský vynadá aj im.</p>";

$button[-1]='Nechaj si vynadať odo mňa!';
$button[0]='Joj, dobre si mi! Ešte';
$button[1]='Ešte, ešte!';
$button[2]='Ešte mi daj, Ľudo slovenský!';
$button[3]='To sa mi páči. Poď do mňa!';


echo $pole[$i];
printf("</blockquote>");
?>


<div style="text-align:center">
<form action="http://www.ludoslovensky.sk/nadavky/index.php" method="post">

<?php

printf("<input type='hidden' name='odislo' value='%s'>",$i+1);


if ($i<=3) {
printf("<input
   type='submit'
   name='tlacidlo'
   class='dedo'
   value='%s!'
   title='' >",$button[$i]);}  
	
?>
	
	
	
	
   
   
   <BR> 
   <a href="javascript:void(0)" onclick="$('vsetky-nadavky').show();">Pozri celý zoznam nadávok</a><BR>
   alebo <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.ludoslovensky.sk%2Fnadavky%2F" target="_blank">pozvite priateľov</a>, aby som vynadal aj im.</a> 
</form> 

<big><a href="slovnik.php">Pozri aj: nadávky 21. storočia</a></big>

</div>
<div class="fb-like" data-href="http://www.ludoslovensky.sk/nadavky/" data-send="false" data-width="450" data-show-faces="true" text-align="right"></div>
</div>  
<div id="vsetky-nadavky" style="display:none; margin-right: 516px;" align="left" border="1">
<HR>
<H1>Všetky nadávky (viac ako 300 kusov)</H1>

<h3>Mladosť - staroba</h3>
<span class="poznamka">Nadávky a prezývky</span></p>
<p>holobriadok, 
holopusk, 
mladý vrabec, 
papľuch, sopliak 
<i><br>
O chalanoch</i></p>
<p>starý blázon, 
starý caban, 
starý cap, 
starý corgoň, 
starý čert, 
starý črep, 
starý hriech, 
starý hriešnik, 
starý hrniec, 
starý kôň, 
starý koridoň, starý Kubo, starý pes, starý somár, starý vlk, starý vrabec, 
starigáň 
<i><br>
Čiastočne o chalanoch, čiastočne o dospelých i starých, vyčíňajúcich detinské 
kúsky</i></p>

<p>stará baba, 
stará devla, 
stará drmľa, 
stará grešľa, 
stará hrkľa, 
stará kobza, 
stará koza, 
stará krava, 
stará krkoška, 
stará mrkva, 
stará mršina, 
stará striga, 
stará škrabňa, 
smrtka, 
stariga</p>
<p>Staré čuridlo, 
staré hebedo, 
staré hniezdo, 
staré nemehlo, 
staré rešeto , 
staré trdlo</p>

<h3>Tučnota; vysoký, pekný, mohutný vzrast</h3>
<p><span class="poznamka">Prezývky</span></p>
<p>bucko, 
bumbaj, 
dlháň, 
dlhoš, 
mamuna, 
obor, 
opacha, 
zruta</p>
<h3>Chudosť; malý, útly, chybný vzrast</h3>
<p class="poznamka">Prezývky</p>
<p>chrúst, 
kratiš, 
kriváň, 
krpec, 
krpec krpatý, 
omražtek, 
ostarok, 
podstarok, 
skrčenec, 
skrčok, 
zakrpatenec</p>
<h3>Tvár, oči</h3>
<p class="poznamka">Prezývky</p>

<p>briď, 
hnusa, 
hnusník, 
maškara, 
maškariak, 
mrzkáň, 
nepodarec, 
oškrda, 
pľuhavstvo, 
škero, 
škrata, 
škuliperda, 
špata</p>
<h3>Vlasy, fúzy, brada</h3>
<p class="poznamka">Prezývky</p>
<p>chlpaj, 
strapáň, 
fuzaj, 
fuzko, 
ježko, 
mrdofúz, 
odrifúz</p>
<h3>Zuby</h3>
<p class="poznamka">Prezývky</p>
<p>štrbák, 
štrba</p>
<h3>Žartovné pomenovania niektorých častí tela</h3>
<p>bagon, 
bahon, 
bampeľ, 
poneváč, 
vantech, 

<i><br>
brucho (veľké)</i></p>
<p>čapty, 
klanice, 
knochy, 
knochty, 
<i><br>
nohy</i></p>
<p>dycháče, 
dýchadlá, 
mechy, 
<i><br>
pľúca</i></p>
<p>kýpty, 
<i>ruky</i></p>
<p>bachor, 
jelito, 
Matej, 
<i><br>
žalúdok</i></p>

<h3>Zmysly</h3>
<p class="poznamka">Nadávky</p>
<p>slepáň, 
hlucháň</p>
<h3>Opilosť</h3>
<p class="poznamka">Prezývky a nadávky</p>
<p>chlipko, 
korheľ, 
korhelica, 
korhelisko, 
lalok, 
ochľasta, 
ožran, 
pálenčený sud, 
vínny sud, 
vínny nikej, 
prepiduša</p>
<p class="poznamka">Slovesné vyjadrenia</p>
<p>Buchnul si, dal si, docengal sa, docical sa, dorezal sa, doriadil sa, doťal 
sa, dotelil sa, chytilo ho, má dosť, nadral sa, nadungal sa, nahnul si, namazal 
sa, narezal sa, naslopal sa, nasúkal sa, naťahal sa, obstrebal sa, očelil sa, 
olial sa, opil sa, oprplal sa, oslonil sa, oslopal sa, otrštil sa, ožral sa, 
podgurážil sa, podnapil sa, podperil sa, podtrundžil sa, potúžil sa, spil sa, 
strundžil sa, šibnul si, trcnul si, umoknul, urazil sa, vychlipnul si, vysmrknul 
si, zmokol, zobralo ho</p>
<h3>Pažravosť, maškrtnosť; silný žalúdok</h3>

<p>bachor, 
bachra, 
bachračka, 
bruchopasník, 
koťoh, 
nenadžganec, 
nenásytník, 
nenažranec, 
nesyta, 
obžero, 
pažravec, 
poškrabpanvička, 
potrimiska, 
vlkolak, 
žráč, 
žrút</p>
<h3>Prezývky slabých a neduživých</h3>
<p>chrchloš, 
chrchliak, 
lazár, 
lazár večitý, 
mrcina, 
smrtka, 
smrti večera, 
zdochliak, 
zdochlina</p>
<h3>Falošnosť, ľstivosť, pokrytectvo, klamstvo</h3>
<p class="poznamka">Prezývky</p>
<p>dvojdvorský, 
falošník, 
falošnica, farizeus, 
líška, 
ošemeta, 
ošemetník, 
pánbožťok, 
patrikár, 
pobožničkár, 
pobožnostkár, 
podkušiteľ, 
pokrytec, 
potmehúd, 
pretvárenec, 
svätúšik, 
svätuškár, 
šemenda, 
úlisník, 
vábec</p>
<h3>O lenivosti a darmožrácstve</h3>
<p class="poznamka">Prezývky</p>
<p>darebák, 
darmožrút, 
daromník, 
daromnica, 
hnilý kôň, 
pecival, 
pecúch, 
poľagan, 
popelvár, 
popelváľ, 
Postojké Janko <i>(iron. pomenovanie postávajúceho povaľača; v tvare je 
zachovaná turčianska nárečová forma prisvojovacieho vlast. mena)</i>, 
povaľač, 
skľago, 
tetivo</p>

<h3>Skúposť, lakomstvo, úžerníctvo</h3>
<p>držibabka, 
gabaj, 
lakomčík, 
priezdušník, 
skučko, 
skuhroš, 
skupáň, 
skývražník, 
škrvačník, 
tlčibabka, 
úžerník, 
žgrliak, 
žgrľo, 
žgrľoš</p>
<h3>Úštipačné výroky nevďačného dlžníka</h3>
<p>Jaj, či už nemáš iba to, čo som ti ja dlžen? <br>
Veď ešte neutekáme! <br>
Veď sa ti to hockedy zíde. <br>
Veď si ja to viacej neurobím.<i> (Nechcem viac pôžičku od teba)</i><br>
Veď to ešte dosť minieš.</p>

<h3>Zlostné výroky tomu, kto nechce požičať</h3>
<p>Daj si ho zasoliť!<br>
Daj si ho za rám<br>
Daj si ho za sklo<br>
Môžeš si ho zjesť - Zjedz si ho!<br>
Môžeš si ho zožrať - Zožer si ho!</p>
<h3>Názvy pálenky</h3>
<p>besnica, 
čečina, 
čertovica, 
gramatika, 
nešťastnica, 
sečka, 
strcuľa, 
strcuľka</p>
<h3>Odev</h3>

<p class="poznamka">Prezývky</p>
<p>fúroš, 
Honzík z Kocúrkova, 
kolomažník, 
neogabanec, 
obšivkár, 
ošklbanec, 
ošva otrhaná, 
otrhátor, 
randoš, 
randa, 
rašmák, 
rozgajdanec, staré futro, šklban, trhan<i><br>
Obraz vzatý z povozníctva. Z.</i></p>
<h3>Čistota, nečistotnosť</h3>
<p class="poznamka">Prezývky</p>
<p>brigoš, 
bridoška, 
pľuhavec, 
prasa ošklivé, 
sviňa, 
vozgrivec</p>
<h3>Hlúposť, nevedomosť</h3>
<p class="poznamka">Nadávky (hlúpemu)</p>
<p>barák, 
baran, 
bibas, 
bludár, 
haľama, 
haraburda, 
hlupák, 
hovädo, 
chuchma, 
chuchmička, 
chumaj, 
chňupák, 
jašo, 
Jano drevený, 
Kelerova trúba, 
kôň, 
krava, 
Kubo sprostý, 
lanko, 
mamľas, 
motoch, 
motovidlo, 
mumaj, 
mumák, 
našialistý, 
netrebný, 
osol, 
pochabec, 
pochábeľ, 
pletkár, 
pletniak, 
sadlakurka, 
somár, 
sprosták, sprostina, 
syseľ, 
šaľo, 
šalabachter, 
šaľuga, 
šašo, 
šialenec, 
špalek, 
taranda, 
telivo, 
telpis, 
teliar, 
tetivo, 
trkvas, 
trúb, 
trúba, 
trubiroh, 
trulant, 
truľo, 
trup, 
trupák, 
trupavec, 
ťuťmák, 
ušiak, 
vôl, 
zamotal, 
zvetrelec</p>

<h3>Svojhlavosť, nedôvera</h3>
<p class="poznamka">Nadávky (svojhlavému)</p>
<p>Hlavaj, 
hlavatý, 
hlaváň, 
hrča, 
kotrbáň, 
krutáň, 
krutá ovca, 
kruté drevo, 
krutohlavec, 
krutohlavý, 
obluda, 
svojhlavec, 
svojhlavý, 
tvrdopsyk, 
tvrdošín, 
zanovit, 
zanovitý, 
zantúch, 
zatvrdilec</p>
<h3>Strach, bázeň</h3>
<p class="poznamka">Prezývky</p>
<p>baba, 
bojko, 
čuridlo, 
drist, 
dríšeľ, 
kakan, 
kuryplach, 
ošťan, 
oštinoha, 
prdko, 
prdimúka, 
šero, 
sinka, 
slabúch, 
slamka, 
husár, 
sraľo, 
strachoprd, 
strachopúd, 
straško, 
šumichrast, 
vetroplach, 
zasran, 
zašťan</p>
<h3>Šibalstvo</h3>
<p class="poznamka">Prezývky</p>
<p>dobrý majster, 
figliar, 
figelník, 
futrák, 
jašter, 
katova oprata, 
pes, 
pletkár, 
pochábeľ, 
psia noha, 
psina, 
psí národ, 
psisko, 
psohlavec, 
stonoha, 
šašo, 
šibenec, 
šibená noha, 
výmyselník</p>

<h3>Popudlivosť, hnevlivosť, mrzutosť</h3>
<p class="poznamka">Nadávky a prezývky</p>
<p>bosorák, 
drak, 
durák, 
dudroš, 
drdra, 
dudra, 
frfrák, 
frfra, 
frfloš, 
jasietka, 
jašo, 
jedoš, 
ježa nadurené, 
ježibaba, 
ježo naježený, 
mledzivo, 
mosúr namosúrený, 
nadrštený, 
napajedený, 
nechuta, 
nemrdal, 
prekysnutý, 
pudivietor, 
pušný prach, 
saňa, 
sotona, 
srdoš, 
srdúch, 
striga, 
strigôň, 
švíbalka, 
xantipa, 
zázrivec, 
zduteľ, 
zlostník, 
zlostnica, 
živý oheň</p>
<h3>Pýcha, namyslenosť</h3>
<p class="poznamka">Prezývky</p>
<p>horenos, 
mech, 
nadutý, 
popanštenec, 
roháč, 
rohačka, 
rozdrapenec, 
sombor nadutý</p>
<h3>Hlúpy, zanedbaný zovňajšok, spustnutosť</h3>
<p class="poznamka">Prezývky a nadávky</p>
<p>bambúch, 
borsuk, 
cicmák, 
cmuľo, 
čilek, 
čudák, 
čudo, 
drnaj, 
dromo, 
dudok, 
fičfiriť, 
fičúr, 
frckoš, 
geľo, 
čo kefu zožral, 
glemba, 
griňavec, 
griňo, 
grísniak, 
grnaj, 
chmuľo, 
chrapúň, 
chriapák, 
chruňo, 
jaštor, 
kamas, 
kľago, 
korheľ, 
kolodej, 
kolohnát, 
komondor, 
koridoň, 
kostrák, 
korpáň, 
kulifaj, 
lajdák, 
lušťák, 
medveď, 
moriak, 
mrdúc, 
mrdús, 
murckoš, 
nemotora, 
neohrabanec, 
neokresanec, 
odzgáň, 
ohľo, 
okáľ, 
oškrda, 
otrapa, 
ozembuch, 
polpalček, 
pošmák, 
potkan, 
pšochevár, 
roňo, 
skydoň, 
skrieň, 
slezák, 
slimák, 
strapák, 
svrček, 
šarbal, 
čo má mačatá v bruchu, 
škero vyškerený, 
škrapúň, 
škulibander, 
škuliperda, 
šmajták, 
šust pochabý, 
ťalagra, 
ťarbák, 
tetrov, 
trpák, 
zmrzliak, 
zogan, 
žogan</p>

<p class="poznamka">Prezývky a nadávky (ženám)</p>
<p>drnda, 
hajštra, 
halapírka, hnusa, 
chňupaňa, 
kostra, 
morka, 
mrnda, 
murcka, 
poťma, 
rapaňa, 
rázga, 
strapaňa, 
šuta, 
ťapa, 
ťapša, 
ťarba, 
tmoľa</p>
<h3>Mnohovravbosť, krikľúnstvo</h3>
<p class="poznamka">Nadávky a prezývky</p>
<p>gága, 
jačala, 
jazyčník, 
jazyčnica, 
klapačka, 
krikľúň, 
ľapduľa, 
melihuba, 
papuľa, 
papuľa mešter, 
papuliak, 
papuľník, 
radorečník, 
radorečnica, 
rapčalo, 
straka, 
rapotačka, 
štebota</p>
<h3>Zvada, urážka, pichľavé reči</h3>
<p class="poznamka">Nadávky a prezývky</p>
<p>grobian, 
groldo, 
hrubý, 
plátenník, 
hrubý súkenník, 
sekačka, 
sekerka, 
rozavúst, 
rozdrapenec, 
pyskáč, 
pyskačka, 
zubačka (o ženách)</p>
<p class="poznamka">Slovesné vyjadrenia</p>

<p>bendečí, 
breše, 
brýzga, 
hubuje, 
jazyčí, 
obhrikuje sa, 
papuľuje, 
plieska, 
šteká</p>
<h3>O zlých</h3>
<p class="poznamka">Nadávky</p>
<p>beštia, 
bezbožník, 
fialka, 
galgan, 
goldoš, 
holomok, 
huncút, 
kadečina, 
kadekto, 
kolopasník, 
kujon kujonský, 
kvietok, 
lagan, 
lapaj, 
lecikto, 
lociga, 
loptoš, 
lotor, 
lúdza, 
mršina, 
nehanblivec, 
nekázanec, 
nekázaný, 
neznajboh, 
ničiga, 
ohava, 
ohavník, 
oplan, 
pačmaga, 
papľuh, 
paskuda, 
pekelník, 
perepúť, 
planec, 
planietnik, 
planiga, 
plánik, 
planina, 
pliaga, 
pobehaj, 
podliak, 
podlina, 
pokuta, 
potlkeň, 
potvora, 
prašina, 
priepastník, 
psia krv, 
psia noha, 
psie koleno , 
(psie pokolenie), 
psí koreň psohlavec, 
psoväč, 
rozpustilec, 
sebevoľník, 
svetár, 
svévolník, 
sviňa, 
sviniar, 
sviňúr, 
svindžúr, 
šelma, 
šibenec, 
talhaj, 
tulák, 
vyvrheľ, 
vtáčik, 
zberba, 
zdochliak, 
zdochlina, 
zleza, 
zlezeň svetská, 
zdochliak neočatý</p>
<p class="poznamka">Nadávky (ženám)</p>
<p>Culfa, 
cundra, 
fľandra, 
klampa, 
lecišina, 
lušta, 
mriha, 
opica zaškriataná, 
peha, 
pľuha, 
rašma, 
sajha, 
suka, 
sviňa, 
šľampa, 
švandra, 
trokša, 
zola neočatá</p>
<h3>Kraje, mestá dediny, obyvatelia</h3>
<p class="poznamka">Prezývky</p>
<p><b>Krupinci </b>- štepené zajace, 

<b>Žilinci</b> - kapustniari, 
<b>Rajčania</b> - kožkári, 
<b>Turčania </b>- repkári, 
<b>Varínci</b> - pintlikári, 
<b>Sv. Peter</b> - murári, pľúckári, 
<b>Sielničania</b> - židia, 

<b>Trnovčania</b> - kapsiari</p>
<p class="poznamka">Nadávky</p>
<p>Žilinčania si navzájom nadávajú:</p>
<p>Ty psohlavec! A ty škero!<br>
Ty jašo! A ty kat!<br>
Ty šerha! - A ty konidráč!<br>
Ty zviselec! - A ty katova oprata!<br>
Ty trodrevník! - A ty srdce do dreveného zvona!<br>

Ty ledačo! - A ty lecikvid!<br>
Ty čuridlo! - A ty fifidlo!<br>
Ty ohava! - A ty špata!<br>
Ty somár! - A ty kôň Krista Pána!<br>
Ty trup! - A ty hlúb!<br>
Ty cigáň! - A ty vajda!<br>
Ty skľago! - A ty rosajda!<br>
Ty papuča! - A ty krpec!<br>
Ty sviniar! - A ty bravčiar!<br>

Ty handra! - A ty onuca!<br>
Ty bachor! - A ty črevo!<br>
Ty korheľ - A ty ožran!<br>
Ty svetár! - A ty pecár!<br>
Ty povaľač! - A ty leňoch!<br>
Ty chmuľo! - A ty truľo!<br>
Ty pľuhák! - A ty lajdák!<br>
Ty trhan! - A ty škuban!<br>
Ty psia noha! - A ty psia krv!<br>

Ty cepár! - A ty metlár!<br>
Ty zázrak! - A ty čudák!<br>
Ty lopaj! - A ty chumaj!<br>
Ty vreco! - A ty mech!<br>
Ty potvora! - A ty odmena!<br>
Ty hebedo! A ty nemelo!</p>



</div>  
<div align="center" style="margin-right: 516px;"><BR><BR><BR><BR><BR><small>(c) 2011-2013 <a href="http://www.facebook.com/tomas.ulej.pise">Tomáš Ulej</a>, foto (c) Karol Plicka.</small></div> 


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46378127-1', 'ludoslovensky.sk');
  ga('send', 'pageview');

</script> 



  </body>
</html>






<!--
     FILE ARCHIVED ON 0:40:45 Jan 3, 2014 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 13:02:03 Mar 14, 2014.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
-->
