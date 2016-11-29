<?php
$theme="l-theme-violet";
$prislovia_tab='class="active"';

require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_prislovia_header.php";


?>


<div class="l-page l-search l-list">

    <div class="container">

        <div class="l-search-header">
            <h1>Vyhľadávanie v prísloviach <span>máme ich vyše 12-tisíc</span></h1>
            <form action="hladat.php" method="get" id="hladat">
                <div class="input-group">
                    <input type="text" class="form-control-lg form-control" id="q" name="q" placeholder="Hľadať v piesňach" <?php if ($_GET['q']<>"") {echo "value='".$_GET['q']."'";} ?>>
                    <span class="input-group-btn">
                    <button class="btn btn-lg l-btn--primary" type="button" onclick="$( '#hladat' ).submit();">Hľadať!</button>
                </span>
                </div>
        </div>

    </div>



<?php echo $obsah; ?>





    </div>




<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php";?>
