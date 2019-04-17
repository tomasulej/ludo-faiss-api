<?php
    $theme="l-theme-blue";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
//require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_ludo_header.php";

?>
<div class="l-page">

    <div class="container">

        <div class="row">



<!--<script src="//cdn.jsdelivr.net/medium-editor/latest/js/medium-editor.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/medium-editor/latest/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">
-->

            <div class="offset-md-1 col-md-10" id="telo">

 <?php echo $telo;?>
                

            </div>

<!-- <script>var editor = new MediumEditor('#telo');</script> -->


   
        </div>

    </div>


</div>


<script type="text/javascript" src="https://steadyhq.com/widget_loader/0940a36c-d941-4b15-b76f-d45a9038c787"></script>


<?php

require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php";


?>