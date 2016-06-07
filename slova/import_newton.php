<html>
<head>
  <meta charset="utf-8">
	
</head>	

<style>

.fico {color:gray}
.dobsinsky,.direr,.vlkova,.bielik,.medzihradsky {color:green}
.figel {color:blue}
.radicova, {color:violet}
.pospisilova,.miklos {color:violet}
.dzurinda {color:brown}
.kiska {color:yellow}

	
</style>	



<body>

<?php
	
	
//error_reporting(E_ALL);
//ini_set('display_errors', '1');	

$pocitadlo=0;
$file = new SplFileObject("newton_kiska_nesprac.txt");
while (!$file->eof()) {
    $pocitadlo++;
    $line=$file->fgets();
    
    $skip_line=false;
    
    if (strpos($line,"Robert FICO")!== false) {$class="fico";
	    $skip_line=true;
	    }
    if (strpos($line,"--------------------")!== false) {$skip_line=true;}
    
    if (strpos($line,"Braňo DOBŠINSKÝ")!== false) {$class="dobsinsky";}
    if (strpos($line,"Richard DÍRER")!== false) {$class="direr";}

    if (strpos($line,"Ján FIGEĹ")!== false) {$class="figel";}
    
    if (strpos($line,"Ján FIGEĽ")!== false) {$class="figel";}
    if (strpos($line,"Ivan ŠTEFANEC")!== false) {$class="stefanec";}
    if (strpos($line,"Mikuláš DZURINDA")!== false) {$class="dzurinda";$skip_line=true;}
    
    

    if (strpos($line,"Jana POSPÍŠILOVÁ")!== false) {$class="pospisilova";}
    if (strpos($line," Iveta RADIČOVÁ")!== false) {$class="radicova";}
    if (strpos($line,"Iveta RADIČOVÁ")!== false) {$class="radicova";}
    
    
    if (strpos($line,"Richard SULÍK")!== false) {$class="sulik";}
    if (strpos($line,"Jozef KOLLÁR")!== false) {$class="kollar";}
    if (strpos($line,"Radoslav PROCHÁZKA")!== false) {$class="prochazka";}
    if (strpos($line,"Branislav DOBŠINSKÝ")!== false) {$class="dobsinsky";}
	if (strpos($line,"Andrej KISKA")!== false) {$class="kiska";$skip_line=true;}
	if (strpos($line,"Pavol PAVLIS")!== false) {$class="pavlis";}
	if (strpos($line,"Pavol HRUŠOVSKÝ")!== false) {$class="hrusovsky";}
	if (strpos($line,"Lucia VIROSTKOVÁ")!== false) {$class="vyrostkova";}
	if (strpos($line,"Ján DINGA")!== false) {$class="dinga";}
	if (strpos($line,"Ivan MIKLOŠ")!== false) {$class="miklos";}
	if (strpos($line,"Ľuba ORAVOVÁ")!== false) {$class="oravova";}
	if (strpos($line,"Béla BUGÁR")!== false) {$class="bugar";}
	if (strpos($line,"Jozef MIHÁL")!== false) {$class="mihal";}
	if (strpos($line,"Pavol FREŠO")!== false) {$class="freso";}
	if (strpos($line,"Ivan ŠVEJNA")!== false) {$class="svejna";}
	if (strpos($line,"Alžbeta VLKOVÁ")!== false) {$class="vlkova";}
	if (strpos($line,"Pavol KIRINOVIČ")!== false) {$class="kirinovic";}
	if (strpos($line,"Marek GABRIŠ")!== false) {$class="gabris";}
	if (strpos($line,"Michal PÁLENIK")!== false) {$class="palenik";}
	if (strpos($line,"Vladimír TOMEK")!== false) {$class="palenik";}
	if (strpos($line,"Peter KAŽIMÍR")!== false) {$class="kazimir";}
	if (strpos($line,"René MEDZIHRADSKÝ")!== false) {$class="kazimir";}
	if (strpos($line,"Peter BIELIK")!== false) {$class="bielik";}
	if (strpos($line,"Michal HORSKÝ")!== false) {$class="horsky";}
	if (strpos($line,"Martin LINHART")!== false) {$class="linhart";}
	if (strpos($line,"Miroslav KOHÚT")!== false) {$class="kohut";}
	if (strpos($line,"Norbert DOLINSKÝ")!== false) {$class="dolinsky";}
	if (strpos($line,"Ľ. KARÁSEK")!== false) {$class="karasek";}
	if (strpos($line,"M. DZURINDA")!== false) {$class="dzurinda";$skip_line=true;}
	if (strpos($line,"Zlatica PUŠKÁROVÁ")!== false) {$class="puskarova";}
	if (strpos($line,"Z. PUŠKÁROVÁ")!== false) {$class="puskarova";}
	if (strpos($line,"Martin STRIŽINEC")!== false) {$class="strizinec";}
	
	
	
	
	
	
	if (strpos($line,'Robert Fico, poslanec NR SR(Smer): "')!== false) {$class="fico";}
	if (strpos($line,'Pál Csáky, podpredseda vlády pre európsku integráciu(SMK): "')!== false) {$class="csaky";}
    if (strpos($line,'Vojtech Tkáč, poslanec NR SR(Ľudová únia): "')!== false) {$class="tkac";}
    if (strpos($line,'Nora Gubková: „')!== false) {$class="gubkova";}
    if (strpos($line,'Róbert Kotian, týždenník Formát: „')!== false) {$class="kotian";}
    if (strpos($line,'Martin Hanus, Domino fórum: „')!== false) {$class="hanus";}
    if (strpos($line,'Nora Gubková: „')!== false) {$class="gubkova";}
    if (strpos($line,'Robert Fico, predseda Smer-u: "')!== false) {$class="fico";}
    if (strpos($line,'Vladimír Mečiar, predseda Ľudovej strany- HZDS: "')!== false) {$class="meciar";}
    if (strpos($line,'Béla Bugár, predseda SMK: "')!== false) {$class="bugar";}
    if (strpos($line,'Maroš Stano: „')!== false) {$class="stano";}
    if (strpos($line,'Zuzana Martináková, Slobodné fórum: „')!== false) {$class="martinakova";}
    if (strpos($line,'Pavol Hrušovský, predseda KDH: „')!== false) {$class="hrusovsky";}
    if (strpos($line,'Ivan Mikloš, podpredseda SDKÚ: „')!== false) {$class="miklos";}
    if (strpos($line,'Michal Vašečka, nezávislý analytik: „')!== false) {$class="vasecka";}
    if (strpos($line,'Dagmar Vanečková: „')!== false) {$class="vaneckova";}
    if (strpos($line,'Dag Daniš, komentátor denníka Pravda: „')!== false) {$class="danis";}
    if (strpos($line,'Róbert Kotian, redaktor časopisu Goldman: „')!== false) {$class="kotian";}
    if (strpos($line,'Ivan Saktor, prezident KOZ: "')!== false) {$class="saktor";}
    if (strpos($line,'Béla Bugár, predseda SMK: "')!== false) {$class="bugar";}
    if (strpos($line,'Robert Fico, predseda Smeru: "')!== false) {$class="fico";}
    if (strpos($line,'Pavol Hrušovský, predseda NR SR: "')!== false) {$class="hrusovsky";}
    if (strpos($line,'Richard Kvasňovský: „')!== false) {$class="kvasnovsky";}
    if (strpos($line,'Radovan Pavlík: „')!== false) {$class="pavlik";}
    if (strpos($line,'Peter Višváder: „')!== false) {$class="visvader";}
    if (strpos($line,'Ivan Janda: „')!== false) {$class="janda";}
    if (strpos($line,'Róbert Fico, predseda strany Smer: „')!== false) {$class="fico";}
    if (strpos($line,'Moderátor: „')!== false) {$class="moderator";}
    if (strpos($line,'Martin Hanus: „')!== false) {$class="hanus";}
    if (strpos($line,'Dag Daniš: „')!== false) {$class="danis";}
    if (strpos($line,'Dag Daniš: „')!== false) {$class="danis";}
    if (strpos($line,'Ivan JANDA,')!== false) {$class="janda";}
    if (strpos($line,'Ivan GAŠPAROVIČ,')!== false) {$class="janda";}
    if (strpos($line,'Ľuba ORAVOVÁ,')!== false) {$class="oravova";}
    if (strpos($line,'Daniel KRAJCER,')!== false) {$class="krajcer";}
    if (strpos($line,'Viliam VETEŠKA,')!== false) {$class="veteska";}
    if (strpos($line,'Branislav ZÁVODSKÝ,')!== false) {$class="zavodsky";}
    if (strpos($line,'Branislav ZÁVODSKÝ,')!== false) {$class="zavodsky";}
    if (strpos($line,'Pavol Hrušovský, predseda NR SR a predseda KDH: „')!== false) {$class="hrusovsky";}
    if (strpos($line,'Béla Bugár, podpredseda NR SR: "')!== false) {$class="bugar";}
    if (strpos($line,'Róbert FICO, predseda strany Smer-SD')!== false) {$class="fico";}
    if (strpos($line,'Vladimír MEČIAR,')!== false) {$class="meciar";}
    if (strpos($line,'Vlado ZÁBORSKÝ,')!== false) {$class="zaborsky";}
    if (strpos($line,'Ján SLOTA,')!== false) {$class="slota";}
    if (strpos($line,'Beáta ORAVCOVÁ,')!== false) {$class="oravcova";}
    if (strpos($line,'Branislav ZÁBORSKÝ,')!== false) {$class="zaborsky";}


 
	if (strpos($line,'Mikuláš Dzurinda, predseda vlády SR(SDKÚ): "')!== false) {$class="dzurinda";}
    if (strpos($line,'Mikuláš Dzurinda, premiér SR: „')!== false) {$class="dzurinda";}
    if (strpos($line,'Mikuláš Dzurinda, predseda vlády SR: „')!== false) {$class="dzurinda";}
    if (strpos($line,'Mikuláš Dzurinda, predseda vlády SR: "')!== false) {$class="dzurinda";}

    if (strpos($line,'Mikuláš Dzurinda: „')!== false) {$class="dzurinda";}

    if (strpos($line,'Mikuláš Dzurinda, predseda SDKÚ: "')!== false) {$class="dzurinda";}


    if (strpos($line,'Mikuláš Dzurinda, premiér a predseda SDKÚ: „')!== false) {$class="dzurinda";}

    if (strpos($line,'Mikuláš Dzurinda, predseda vlády SR: „')!== false) {$class="dzurinda";}

    
     
    
    if ($class=="kiska" AND $skip_line==false) {$kiska_txt.=$line."<BR/>";}
    //SELECT rating div 1000 AS r, count(id), SUM(count) FROM freq_fico_2010_2015_vsetko_81 GROUP BY rating div 1000 ORDER BY rating;
    //echo $class." --- ";
    // 
    
    //printf("<span class='%s'>%s</span><br>\n", $class, $line);
    //if ($pocitadlo>10000) {break;}
}

//file_put_contents("fico_oddeleny.txt", $fico_txt);

echo $kiska_txt;



$file = null;


	
	
	
?>	

</body>
</html>



	