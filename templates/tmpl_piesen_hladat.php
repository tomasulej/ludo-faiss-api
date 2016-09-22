<?php

include $_SERVER["DOCUMENT_ROOT"]."/piesne/lib.piesne.php";

require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
?>


<div class="l-page">

    <div class="container">

 <div class="row">   
<div class="col-md-3">
<h4>Filtrovať vyhľadávanie</h4>
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
    <h5 class="list-group-item-heading">List group item heading</h5>
    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
  </a>
  <a href="#" class="list-group-item list-group-item-action">
    <h5 class="list-group-item-heading">List group item heading</h5>
    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
  </a>
  <a href="#" class="list-group-item list-group-item-action">
    <h5 class="list-group-item-heading">List group item heading</h5>
    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
  </a>
</div>

</div>
<?php if (!empty($piesne)) {  ?>

    <div class="l-song-similar col-md-9">


    <div class="row">
    <?php foreach ($piesne as $key=>$piesen) { ?>
        <div class="col-md-12">
        <div class="l-song-item l-well">
        <h2><a href="piesen.php?<?php echo $piesen['id_piesen'];?>"><?php echo ($piesen["nazov_dlhy"]==""?"(ešte nezdigitalizované)":$piesen["nazov_dlhy"]."…");?></a></h2>
        <?php if ($piesen['file_mp3']<>"") { 
            $p_button="playpause_p_".$piesen['id_piesen'];
            $p_audio="aud_".$piesen['id_piesen'];
            ?> 

        <a class="l-btn l-btn--primary l-btn--small" id="<?php echo $p_button;?>" 
            onclick="playpause('<?php echo "#".$p_audio;?>','<?php echo "#".$p_button;?>');" ><i class="fa fa-play"></i></a>
        <audio id="<?php echo $p_audio; ?>" controls="controls" src="data/<?php echo $piesen['id_piesen']; ?>/<?php echo $piesen['file_mp3']; ?>" style="display:none">Your browser does not support the audio element.</audio>

        <?php }?>

        <a href="piesen.php?<?php echo $piesen['id_piesen'];?>"><img src='data/<?php echo $piesen['id_piesen']; ?>/<?php echo $piesen["file_png"];?>'></a>
        <p class="l-song-subh">
            <small>Zozbieral(a): <a href="zberatel.php?id=<?php echo $piesen['id_zberatel']; ?>"><?php echo $piesen['zberatelia_meno']; ?></a> (<?php echo $piesen['datum_zbieranie']; ?>) ● Zdigitalizoval(a): <a href="digitalizator.php?id=<?php echo $piesen['id_digitalizator']; ?>"><?php echo $piesen['digitalizatori_meno']; ?></a> (<?php echo $piesen['datum_digitalizacia']; ?>) ● Pôvodná zbierka <a href="zbierky.php?id=<?php echo $piesen['id_zbierka'] ?>"><?php echo $piesen['zbierky_nazov'] ?></a></small>
        </p>
        </div><BR>

        </div><div></div>
    <?php } ?>
    </div>
<?php } ?>


</div></div>


<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"?>



<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>

<script>
    $('.switch li a').click(function(){
        var color = $(this).attr('class').split('-')[1];
        $('body').removeClass().addClass('l-theme-' + color);
    });
    
    function show_lyrics(cas) 
    {
     var counter=1;
        for (var i = 0, len = times_arr.length; i < len; i++) {
            for (var j = 0, len2 = times_arr[i].length; j < len2-1; j++) {
                if ((cas>times_arr[i][j]) && (cas<times_arr[i][j+1])) {
                    sp="#l"+counter;
                    $(sp).attr("style","background-color: #CED2F7");
                } 
                else {
                    sp="#l"+counter;
                    $(sp).attr("style","background-color: white");

                }
                counter++;	
            }
        }
    }


    function playpause(media_id,button_id) 
    {
     if ($(media_id)[0].paused) {
        $(media_id).trigger('play');
        $(button_id+' i').attr('class', "fa fa-pause");
    
     } else {    
        $(media_id).trigger('pause');
        $(button_id+' i').attr('class', "fa fa-play");
     }    
    }




</script>
    
<script src="http://wim.vree.org/js/abc2svg-1.js"></script>
<script src="http://wim.vree.org/js/abcweb-min.js"></script>
<script src="http://wim.vree.org/js/xml2abc-min.js"></script>
<script src="http://wim.vree.org/js/xml2abc-min.js"></script>
<script src="/public/js/abcjs_basic_2.3-min.js"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-575ac8e6862d0152"></script>


<script>

    function _d(role) {
        return '[data-role="' + role + '"]';
    }

    $("#aud").on("play", function (e) {
      $("#playpause_main"+' i').attr('class', "fa fa-pause");
    });

 
$("#aud").on("canplaythrough", function(e){
    duration=e.currentTarget.duration;
});    

$("#aud").on("timeupdate", function(event){
ctime=this.currentTime;
});



function abc2svg() {
	$('.abc').each(function(i, obj) {
		ABCJS.renderAbc(obj, $(obj).text()); 	
 
	});
}

	



    $("#aud").on("pause", function (e) {
       if(duration<=ctime) {alert('kokot!');};
       //alert(ctime+"xxx"+duration);
    });

  $("#aud").bind('ended', function(){
    //alert("kokot");
  });


    $(document).ready(function(){
        abc2svg();
        var headerScroll = false;
        var offsetTop = $(_d('header')).offset().top;

/*        $(window).scroll(function(){

            var scroll = $(window).scrollTop();
            if (scroll > offsetTop) {

                if (!headerScroll) {

                    $('.l-song').css('margin-top', $(_d('header')).height() + 'px');
                    $(_d('header')).addClass('l-song-header--float');

                    headerScroll = true;
                }

            } else {

                if (headerScroll) {

                    $('.l-song').css('margin-top', 0);
                    $(_d('header')).removeClass('l-song-header--float');
                    headerScroll = false;
                }
            }
        }); */
    

    
    
    });

</script>


</body>
</html>