<?php
$theme="l-theme-violet";
$prislovia_tab='class="active"';

require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_prislovia_header.php";


?>




<div class="l-page" data-spy="scroll" data-target=".sidebar">

    <div class="container">





        <div class="l-song-header l-prislovia-header" data-role="header">
            <div class="row">

                <div class="col-md-12">

                    <h1>
                        <?php echo kat_namebyid($_GET['id']); ?>
                    </h1>



                </div>



            </div>

        </div>
<BR/>

<div class="l-prislovia">
    <div class="row">
        <div class="col-md-4" id="sidebar">



<h4>Obsah kapitoly</h4>


          <ul class="nav nav-pills nav-stacked sps sps--abv" id="scrollspy-nav">
              <?php echo $kapitoly_final; ?>
          </ul>




        </div>
        <div class="col-md-8 l-prislovia">

         <article data-spy="scroll" data-target="#scrollspy-nav" data-offset="0" id="prislovia">
        <?php echo $prislovia_final; ?>

        </article>









        </div>


    </div>
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



<script src="/public/js/affix.js"></script>


<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php";?>

