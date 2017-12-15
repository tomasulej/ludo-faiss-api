<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');




include $_SERVER["DOCUMENT_ROOT"]."/databaza_slova.php";


// spravna odpoved;
$counter=0;
$q1=mysql_query("SELECT * FROM kviz_words WHERE count_synonyms>3 ORDER BY rand() LIMIT 1 ");
$objSolution=mysql_fetch_object($q1);
$arrSolution=explode(";", $objSolution->synonyms);
foreach ($arrSolution as &$solution) {
    $counter++;
    if ($counter==1) {
        $solution_question=str_replace("+","",$solution);
    } else {
        $answers[$counter]["word"]=$solution;
        $answers[$counter]["isCorrect"]=1;
        $answers[$counter]["id"]=$counter;

        $lstCorrectAnswers.=$counter.",";
    }
}
$solution_count=$counter-1;
$solution_count_required=2;
$lstCorrectAnswers="[".rtrim($lstCorrectAnswers,",")."]";


//dalsie odpovede
$q2=mysql_query("SELECT * FROM kviz_words ORDER BY rand() LIMIT 8 ");
while ($objAnswers=mysql_fetch_object($q2)) {
    $counter++;
    $arrPotAnswers=array();
    $arrPotAnswers=explode(";", $objAnswers->synonyms);
    $answers[$counter]["word"]=str_replace("+","",$arrPotAnswers[0]);
    $answers[$counter]["isCorrect"]=0;
    $answers[$counter]["id"]=$counter;


}

shuffle($answers);



?>


