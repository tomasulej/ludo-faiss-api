<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');




include $_SERVER["DOCUMENT_ROOT"]."/databaza_slova.php";


// spravna odpoved;
$counter=0;
$q1=mysql_query("SELECT * FROM kviz_words WHERE count_synonyms>2 ORDER BY rand() LIMIT 6");

$countT=0;

while ($objSolution=mysql_fetch_object($q1)) {
    //echo "<p>".$objSolution->synonyms;
    $arrSolution=explode(";", $objSolution->synonyms);
    //print_r($arrSolution)
    //shuffle($arrSolution);
    $counter=0;
    foreach ($arrSolution as &$solution) {    
        $counter++;
        $answers[$countT]["word_".$counter]=$solution;
        if ($counter>1) break;
    }    
$countT++;    
};



shuffle($answers);


?>


