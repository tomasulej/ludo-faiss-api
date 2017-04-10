<?php
$theme="l-theme-yellow";
$labs_tab='class="active"';
$url=$_GET['url'];


require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_prekladac_header.php";

if ($url<>"") { ?>



<div class="embed-responsive embed-responsive-1by1" style="overflow: auto; -webkit-overflow-scrolling: touch;">
    <iframe class="embed-responsive-item" style="overflow: auto; -webkit-overflow-scrolling: touch;" src="http://www.ludoslovensky.sk/prekladac/l.php?url=<?php echo $url;?>" allowfullscreen width="100%"></iframe>
</div>

   <?php } ?>