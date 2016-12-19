<?php

include "../databaza_piesne.php";

$id=$_GET['id'];

//error_reporting(E_ALL);
//ini_set('display_errors', '1');


$q=mysql_query("SELECT * FROM piesne WHERE id_piesen=$id");

$piesen=mysql_fetch_object($q);

//Má parenta? Ak áno, vytiahni si ho
if ($piesen->id_nadriadeny<>0) {
   $q2=mysql_query("SELECT * FROM piesne WHERE id_piesen=$piesen->id_nadriadeny"); 
   $piesen_nadriadeny=mysql_fetch_object($q2);
   //echo $piesen_nadriadeny->nazov_dlhy;
}



//echo "<b>".$id."</b>";	
	
?>

//########################################
//# This page contains score data, timing data and the media file path. Save it as a text file in
//# the same folder as abcweb.html. Abcweb preloads score and media when it is opened with the
//# file name as parameter in the url, for example: http://your.domain.org/abcweb.html?file_name
//# Also works locally with file:///path/to/abcweb.html?file_name
//# **** You have to correct the path to the media file below! (media_file="...";) ****
//########################################
//#

media_file = "<?php 
if ($piesen->id_nadriadeny==0 AND !empty($piesen->file_mp3)) {
    printf("data/%s/%s",$piesen->id_piesen,$piesen->file_mp3);
} else {
    printf("data/%s/%s",$piesen_nadriadeny->id_piesen,$piesen_nadriadeny->file_mp3);

}
?>";
offset_js = 0.00;

<?php 
if ($piesen->id_nadriadeny==0 OR !empty($piesen->abc_settings)) {
    printf($piesen->abc_settings); 
} else {
    printf($piesen_nadriadeny->abc_settings);
}
?>

<?php 
if ($piesen->id_nadriadeny==0 OR !empty($piesen->abc_times_arr)) {
    printf($piesen->abc_times_arr); 
} else  {
    printf($piesen_nadriadeny->abc_times_arr); 
}
?>

<?php 
if ($piesen->id_nadriadeny==0 AND !empty($piesen->abc_notes)) {
 echo $piesen->abc_notes; 
 } else  {
    echo $piesen_nadriadeny->abc_notes; 
}

?>

abc_enc = [];