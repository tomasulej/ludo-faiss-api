<?php



	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');
    
    $id_poznamka=$_POST['id_poznamka'];
    include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

    $q=sprintf("DELETE FROM poznamky WHERE id_poznamka=%s", (int)$id_poznamka);

    $q_vymazat=mysql_query($q);

    echo "Výborne, pridané, ty kekečúr: ".$q;
?>