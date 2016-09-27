<?php



	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');
    
    $id_vztahy_piesne=$_POST['id_vztahy_piesne'];
    include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

    $q=sprintf("DELETE FROM vztahy_piesne WHERE id_vztahy_piesne=%s", (int)$id_vztahy_piesne);

    $q_vymazat=mysql_query($q);

    echo "Výborne, vymazané, ty kekečúr: ".$q;
?>