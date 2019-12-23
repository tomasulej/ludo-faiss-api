<?php
    $theme="l-theme-blue";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_rozpravky_header.php";


?>
<div class="l-page">

    <div class="container">

        <div class="row">




            <div class="col-md-8">


                <?php echo $telo;?>
                

            </div>



            <div class="col-md-4">

                    <?php echo $lavy_stlpec; ?>



            </div>





   
        </div>

    </div>


</div>





<?php

require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php";


?>