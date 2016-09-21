<?php



	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');
    
    $id_piesen=$_POST['id_piesen'];
    include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

    $q=sprintf("INSERT INTO poznamky (id_piesen,txt, id_druh) VALUES (%s,'%s',%s)", (int)$id_piesen,mysql_real_escape_string($_POST['txt']),(int)$_POST['id_druh']);

    $q_pridat=mysql_query($q);

    echo "Výborne, pridané, ty kekečúr: ".$q;
?>