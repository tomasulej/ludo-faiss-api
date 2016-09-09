<?php

include "../databaza_piesne.php";

$id=$_GET['id'];

$q=mysql_query("SELECT * FROM piesne WHERE id_piesen=$id");

$piesen=mysql_fetch_object($q);

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
media_file = "<?php printf("data/%s/%s",$piesen->id_piesen,$piesen->file_mp3)?>";
offset_js = 0.00;

<?php printf($piesen->abc_settings); ?>

<?php printf($piesen->abc_times_arr); ?>

<?php echo $piesen->abc_notes; ?>

abc_enc = [];