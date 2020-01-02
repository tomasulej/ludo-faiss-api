<?php
    $theme="l-theme-blue";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_rozpravky_header.php";


?>



<div class="l-page">

    <div class="container">

        <div class="row">




            <div class="col-md-8" itemprop="articleBody">


                <?php echo $telo;?>
                

            </div>



            <div class="col-md-4">

                    <?php echo $lavy_stlpec; ?>

                    <div class="kindleWidget" style="display:inline-block;padding:3px;cursor:pointer;font-size:18px;font-family:Arial;white-space:nowrap;line-height:1;border-radius:3px;border:#ccc thin solid;color:black;background:transparent url('https://d1xnn692s7u6t6.cloudfront.net/button-gradient.png') repeat-x;background-size:contain;"><img style="vertical-align:middle;margin:0;padding:0;border:none;" src="https://d1xnn692s7u6t6.cloudfront.net/white-25.png" /><span style="vertical-align:middle;margin-left:3px;">Send to Kindle</span></div>
            </div>





   
        </div>

    </div>


</div>





<?php

require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php";


?>