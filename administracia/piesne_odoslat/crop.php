<?php

	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');


$w=$_GET['w'];
$h=isset($_GET['h'])?$_GET['h']:$w;    // h est facultatif, =w par d&#233;faut
$x=isset($_GET['x'])?$_GET['x']:0;    // x est facultatif, 0 par d&#233;faut
$y=isset($_GET['y'])?$_GET['y']:0;    // y est facultatif, 0 par d&#233;faut
$filename=$_GET['src'];
header('Content-type: image/png');
header('Content-Disposition: attachment; filename='.$src);
$image = imagecreatefrompng($filename); 
$crop = imagecreatetruecolor($w,$h);
magealphablending($crop, false);
imagesavealpha($crop, true);
imagecopy ( $crop, $image, 0, 0, $x, $y, $w, $h );
imagepng($crop);
?>