<?php
//includes
include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";


//META
$meta_type="article";
$meta_title="[INFOGRAFIKA] O kom sa najviac spieva v slovenských ľudových piesňach?";
$meta_image="http://www.ludoslovensky.sk/public/img/ludo_infografika.png";
$meta_url="http://".$_SERVER['SERVER_NAME']."/blog/o-menach-v-ludovych-piesnach.php";
$meta_desc="Kataríny (od jedného promile vyššie) zvyknú v krčmách spievať Neďaleko od Trenčína,  Jánovia (v rovnakom stave) zase Nepi, Jano, nepi vodu. O ktorých menách sa najčastejšie spieva v slovenských ľudových piesňach?";




$telo="<script id=\"infogram_0_ludo___mena-68560\" title=\"Ľudo - mená\" src=\"//e.infogr.am/js/dist/embed.js?x9o\" type=\"text/javascript\"></script><div style=\"padding:8px 0;font-family:Arial!important;font-size:13px!important;line-height:15px!important;text-align:center;border-top:1px solid #dadada;margin:0 30px\"><a href=\"https://infogr.am/ludo___mena-68560\" style=\"color:#989898!important;text-decoration:none!important;\" target=\"_blank\" rel=\"nofollow\">Ľudo - mená</a><br><a href=\"https://infogr.am/create/column-chart?utm_source=embed_bottom&utm_medium=seo&utm_campaign=column_chart\" style=\"color:#989898!important;text-decoration:none!important;\" target=\"_blank\" rel=\"nofollow\">Create column charts</a></div>";

$bg_delete=true;
// nacitanie informacii
require ($_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_blog_article.php");

?>