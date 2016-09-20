<?php 
    $nadpis="Pridávanie piesne: prepojenia, poznámky a náhľady (krok 5/5)";
    require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_administracia_header.php";
    include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

	error_reporting(E_ALL);
	ini_set('display_errors', '1');

    $id_piesen=(int)$_POST['id_piesen'];


if ($_POST['odoslane']=='true') {

        $lyrics=$_POST['lyrics']; 
        $abc_notes=$_POST['abc_notes']; 
        $abc_settings=$_POST['abc_settings']; 
        $abc_times_arr=$_POST['abc_times_arr']; 






        $query_update=sprintf(
        "UPDATE `piesne` SET 
        `lyrics`='%s', 
        `abc_notes`='%s', 
        `abc_settings`='%s', 
        `abc_times_arr`='%s', 
        WHERE id_piesen=%s;",
        mysql_real_escape_string($lyrics),
        mysql_real_escape_string($abc_notes),
        mysql_real_escape_string($abc_settings),
        mysql_real_escape_string($abc_times_arr),
        $id_piesen);

        $q=mysql_query($query_update);
}


?>

<div class="l-page">
    <div class="container">



    </div>
</div>
