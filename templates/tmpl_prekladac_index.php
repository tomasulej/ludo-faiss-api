<?php
$theme="l-theme-yellow";
$labs_tab='class="active"';

require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_prekladac_header.php";

if ($_GET['url']<>"") { ?>



<div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="http://www.ludoslovensky.sk/prekladac/l.php?url=<?php echo $_GET['url']?>" allowfullscreen></iframe>
</div>

   <?php } ?>