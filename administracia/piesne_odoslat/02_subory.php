<?php 
$nadpis="Pridávanie piesne: nahranie súborov (krok 2/5)";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_administracia_header.php";
include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";

	error_reporting(E_ALL);
	ini_set('display_errors', '1');

?>


<div class="l-page">

    <div class="container">


<?php 
if ($_POST['odoslane']=='true') {
    $id_piesen=$_POST['id_piesen'];
    $id_zbierka=$_POST['id_zbierka']; //printf(" %s:%s","id_zbierka",$id_zbierka);
    $identifikator=$_POST['identifikator']; //printf(" %s:%s","identifikator",$identifikator);
    $nazov_dlhy=$_POST['nazov_dlhy']; //printf(" %s:%s","nazov_dlhy",$nazov_dlhy);
    $nazov_kratky=$_POST['nazov_kratky']; //printf(" %s:%s","nazov_kratky",$nazov_kratky);
    $id_zberatel=$_POST['id_zberatel']; //printf(" %s:%s","id_zberatel",$id_zberatel);
    //
    if ($id_zberatel==-1) {
        $txt_zberatel=$_POST['txt_zberatel'];
        $q_txt_zberatel=mysql_query("INSERT INTO zberatelia (meno) VALUES ('$txt_zberatel');");
        $id_zberatel=mysql_insert_id();
        //echo "ID_ZBERATEL PO NOVOM JE:".$id_zberatel;

    }

    $id_zberatel_miesto=$_POST['id_zberatel_miesto']; //printf(" %s:%s","id_zberatel_miesto",$id_zberatel_miesto);
        //
    if ($id_zberatel_miesto==-1) {
        $txt_zberatel_miesto=$_POST['txt_zberatel_miesto'];
        $q_txt_zberatel_miesto=mysql_query("INSERT INTO lokality (meno, meno_original, typ_id) VALUES ('$txt_zberatel_miesto','',1);");
        $id_zberatel_miesto=mysql_insert_id();
        //echo "ID_ZBERATEL_MIESTO PO NOVOM JE:".$id_zberatel_miesto;
    }
    
    $id_zberatel_vyskyt=$_POST['id_zberatel_vyskyt']; //printf(" %s:%s","id_zberatel_vyskyt",$id_zberatel_vyskyt);
    //
    if ($id_zberatel_vyskyt==-1) {
        $txt_zberatel_vyskyt=$_POST['txt_zberatel_vyskyt'];
        $q_txt_zberatel_vyskyt=mysql_query("INSERT INTO lokality (meno, meno_original, typ_id) VALUES ('$txt_zberatel_vyskyt','',1);");
        $id_zberatel_vyskyt=mysql_insert_id();
        //echo "ID_ZBERATEL_vyskyt PO NOVOM JE:".$id_zberatel_vyskyt;
    }    
    
    $datum_zbieranie=$_POST['datum_zbieranie']; //printf(" %s:%s","datum_zbieranie",$datum_zbieranie);
    $datum_digitalizacia=$_POST['datum_digitalizacia']; //printf(" %s:%s","datum_digitalizacia",$datum_digitalizacia);
    
    
    
    $id_digitalizator=$_POST['id_digitalizator']; //printf(" %s:%s","id_digitalizator",$id_digitalizator);
    //
    if ($id_digitalizator==-1) {
        $txt_digitalizator=$_POST['txt_digitalizator'];
        $q_txt_digitalizator=mysql_query("INSERT INTO digitalizatori (meno) VALUES ('$txt_digitalizator');");
        $id_digitalizator=mysql_insert_id();
        //echo "ID_digitalizator PO NOVOM JE:".$id_digitalizator;
    } 
    
    $id_hudba=$_POST['id_hudba']; //printf(" %s:%s","id_hudba",$id_hudba);
    $id_tempo=$_POST['id_tempo']; //printf(" %s:%s","id_tempo",$id_tempo);
    $id_incipit=$_POST['id_incipit']; $id_incipit=0;//printf(" %s:%s","id_incipit",$id_incipit);
    $strana=$_POST['strana']; //printf(" %s:%s","strana",$strana);

    $source_zberatel=$_POST['source_zberatel']; //printf(" %s:%s","source_zberatel",$source_zberatel);
    $source_zberatel_miesto=$_POST['source_zberatel_miesto']; //printf(" %s:%s","source_zberatel_miesto",$source_zberatel_miesto);
    $source_zberatel_vyskyt=$_POST['source_zberatel_vyskyt']; //printf(" %s:%s","source_zberatel_vyskyt",$source_zberatel_vyskyt);
    $source_datum_zbieranie=$_POST['source_datum_zbieranie']; //printf(" %s:%s","source_datum_zbieranie",$source_datum_zbieranie);
    $source_tempo=$_POST['source_tempo']; //printf(" %s:%s","source_tempo",$source_tempo);


$query_update=sprintf("UPDATE `piesne` SET 
`id_zbierka`=%s, 
`identifikator`='%s', 
`nazov_dlhy`='%s', 
`nazov_kratky`='%s', 
`strana`='%s', 
`id_zberatel`=%s, 
`id_zberatel_miesto`=%s, 
`id_zberatel_vyskyt`=%s, 
`datum_zbieranie`='%s', 
`datum_digitalizacia`='%s', 
`id_digitalizator`=%s, 
`id_hudba`=%s, 
id_tempo=%s, 
`id_incipit`=%s, 
`source_zberatel`='%s',
`source_zberatel_miesto`='%s',
`source_zberatel_vyskyt`='%s',
`source_datum_zbieranie`='%s',
`source_tempo`='%s' WHERE id_piesen=%s;",

mysql_real_escape_string($id_zbierka),
mysql_real_escape_string($identifikator),
mysql_real_escape_string($nazov_dlhy),
mysql_real_escape_string($nazov_kratky),
mysql_real_escape_string($strana),
mysql_real_escape_string($id_zberatel),
mysql_real_escape_string($id_zberatel_miesto),
mysql_real_escape_string($id_zberatel_vyskyt),
mysql_real_escape_string($datum_zbieranie),
mysql_real_escape_string($datum_digitalizacia),
mysql_real_escape_string($id_digitalizator),
mysql_real_escape_string($id_hudba),
mysql_real_escape_string($id_tempo),
mysql_real_escape_string($id_incipit),
mysql_real_escape_string($source_zberatel),
mysql_real_escape_string($source_zberatel_miesto),
mysql_real_escape_string($source_zberatel_vyskyt),
mysql_real_escape_string($source_datum_zbieranie),
mysql_real_escape_string($source_tempo),
(int)$id_piesen
);


echo $query_update;

$q=mysql_query($query_update);



	
} else {
    $id_piesen=$_GET['id_piesen'];
    echo $id_piesen;
}


if ($id_piesen<>0) {
  $q_edit=mysql_query(sprintf("SELECT * FROM piesne WHERE id_piesen=%s",(int)$id_piesen));
  $p_edit=mysql_fetch_object( $q_edit);
  //echo "<H1>".$p_edit->nazov_dlhy."xxx</H1>";
};

?>


<form action="03_abc.php" method="post" class="l-form l-well" enctype="multipart/form-data">


 <div class="form-group row">
    <label for="file_xml" class="col-sm-2 form-control-label">Súbor MusicXML:</label>
    <div class="col-sm-10">
    <input type="file" name="upl_xml" id="upl_xml">
    <!--<input type="input" class="form-control" id="file_xml" name="file_xml" placeholder="cislo_nazov-piesne.xml" value="<? echo $p_edit->file_xml; ?>">-->
    </div>
    </div>
    
    <div class="form-group row">
    <label for="file_mp3" class="col-sm-2 form-control-label">Súbor mp3:</label>
    <div class="col-sm-10">
        <input type="file" name="upl_mp3" id="upl_mp3">

      <!--<input type="input" class="form-control" id="file_mp3" name="file_mp3" placeholder="cislo_nazov-piesne.mp3" value="<? echo $p_edit->file_mp3; ?>">-->
    </div>
    </div>
    
    <input type="hidden" name="odoslane" value="true">
    <input type="hidden" name="id_piesen" value='<?php echo $id_piesen; ?>'>    

    <div class="form-group row">
    <label for="file_png" class="col-sm-2 form-control-label">Súbor png:</label>
    <div class="col-sm-10">
            <input type="file" name="upl_png" id="upl_png">
     <!-- <input type="input" class="form-control" id="file_html" name="file_html" placeholder="cislo_nazov-piesne.html" value="<? echo $p_edit->file_html; ?>">-->
    </div>
    </div>
    


<button type="submit" class="l-btn l-btn--large l-btn--primary">Nahrať súbory a pokračovať >></button>


	  
	  


</form>
</div></div>


<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"?>
