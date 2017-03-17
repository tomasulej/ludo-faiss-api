<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";
$id_piesen=$_GET['id_piesen'];
$q=mysql_query("SELECT * FROM piesne WHERE id_piesen=$id_piesen;");
$piesen=mysql_fetch_object($q);

//file_edit because of utf-8 problems
$xml_content=file_get_contents('/var/www/html/piesne/data/'.$piesen->id_piesen.'/'.$piesen->file_xml);
$table = array(
        'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj', 'Ž'=>'Z', 'ž'=>'z', 'C'=>'C', 'c'=>'c', 'C'=>'C', 'c'=>'c',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
        'ÿ'=>'y', 'R'=>'R', 'r'=>'r'
    );
$xml_content = strtr($xml_content, $table);
file_put_contents('/var/www/html/piesne/analyze/temp.xml', $xml_content);


$command = escapeshellcmd('/usr/bin/python /var/www/html/piesne/analyze/contour.py /var/www/html/piesne/analyze/temp.xml');
echo $command;

$data = shell_exec($command);




?>