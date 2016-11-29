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



    <div class="container">

        <div class="l-list-items">


<?php echo $obsah; ?>

</div>
        </div>



    </div>


<script>



    $('[data-toggle="popover"]').popover({
        html: true,
        trigger: 'focus',
        placement: 'right',
        content: function() {
            //e.preventDefault();
            //alert("ahoj");
            return $.ajax({url: 'piesen.tuto-poznam.php?id_piesen=<?php echo $piesen->id_piesen; ?>',
                dataType: 'html',
                async: false}).responseText;
        }
    }).mouseover(function(e) {
        $(this).popover('toggle');
        e.preventDefault();
        e.stopImmediatePropagation();
    }).mouseout(function(e) {
        $('[data-toggle="popover"]').popover('hide');
    });






</script>



<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php";?>
