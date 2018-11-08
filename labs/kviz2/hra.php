<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');




include $_SERVER["DOCUMENT_ROOT"]."/databaza_slova.php";


// spravna odpoved;
$counter=0;
$q1=mysql_query("SELECT * FROM kviz_words WHERE count_synonyms>2 ORDER BY rand() LIMIT 10");
while ($objSolution=mysql_fetch_object($q1)) {
    //echo $objSolution->synonyms;
    $arrSolution=explode(";", $objSolution->synonyms);
    //shuffle($arrSolution);
    $counter=0;
    foreach ($arrSolution as &$solution) {    
        $counter++;
        $answers[$objSolution->id]["word_".$counter]=$solution;
        //if ($counter>1) (break;
    }    

};

print_r($answers);


shuffle($answers);

print_r($answers);

?>


