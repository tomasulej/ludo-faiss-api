<?php



	error_reporting(E_ALL);
	ini_set('display_errors', '1');
    
    $id_piesen=$_POST['id_piesen'];
    include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

    if ((int)$_POST['id_vztah']==0) {
            $q=sprintf("INSERT into vztahy_piesen (id_piesen1, txt_piesen2, id_vztah) VALUES (%s,'%s',%s);",
                    (int)$id_piesen,mysql_real_escape_string($_POST['txt_piesen2']),(int)$_POST['id_vztah']);
    } else {
            $q=sprintf("INSERT into vztahy_piesne (id_piesen1, id_piesen2, id_vztah) VALUES (%s,%s,%s);",
                    (int)$id_piesen,(int)$_POST['id_piesen2'],(int)$_POST['id_vztah']);
   }

   $q_pridat=mysql_query($q);

    echo "Výborne, pridané, ty kekečúr:".$q;

?>