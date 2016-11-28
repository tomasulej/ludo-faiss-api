<?php
    $theme="l-theme-green";
    $piesne_tab='class="active"';

include $_SERVER["DOCUMENT_ROOT"]."/piesne/lib.piesne.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_piesne_header.php";

?>


<div class="l-page l-search l-list">

    <div class="container">

        <div class="l-search-header">
            <h1>Vyhľadávanie v piesňach <span>3.400 piesní!</span></h1>
            <form action="hladat.php" method="get" id="hladat">
            <div class="input-group">
                <input type="text" class="form-control-lg form-control" id="q" name="q" placeholder="Hľadať v piesňach" <?php if ($hladane<>"") {echo "value='".$hladane."'";} ?>>
                <span class="input-group-btn">
                    <button class="btn btn-lg l-btn--primary" type="button" onclick="$( '#hladat' ).submit();">Hľadať!</button>
                </span>
            </div>
        </div>

    </div>



    <div class="container">

        <div class="l-list-items">



<?php if (!empty($piesne)) {  ?>



    <?php foreach ($piesne as $key=>$piesen) { ?>
        <div class="l-song-item l-well">
        <h3><a href="piesen.php?<?php echo $piesen['id_piesen'];?>"><?php echo ($piesen["nazov_dlhy"]==""?"(ešte nezdigitalizované)":$piesen["nazov_dlhy"]);?></a></h3>
        <?php if ($piesen['file_mp3']<>"") { 
            $p_button="playpause_p_".$piesen['id_piesen'];
            $p_audio="aud_".$piesen['id_piesen'];
            ?> 

        <a class="l-btn l-btn--primary l-btn--small l-btn--play" id="<?php echo $p_button;?>"
            onclick="playpause('<?php echo "#".$p_audio;?>','<?php echo "#".$p_button;?>');" ><i class="fa fa-play"></i></a>
        <audio id="<?php echo $p_audio; ?>" controls="controls" src="data/<?php echo $piesen['id_piesen']; ?>/<?php echo $piesen['file_mp3']; ?>" style="display:none" onended="alert('j');">Your browser does not support the audio element.</audio>

        <?php }?>

        <!-- <a href="piesen.php?<?php echo $piesen['id_piesen'];?>"><img src='data/<?php echo $piesen['id_piesen']; ?>/<?php echo $piesen["file_png"];?>'></a> -->
        
        <div class="row">
        <div class="col-md-4"><img src="data/<?php echo $piesen['id_piesen']; ?>/<?php echo $piesen['file_png'];?>" class="t"></div>
        <div class="col-md-8 hidden-sm-down"><p><i><?php echo cleanlyrics($piesen['lyrics']); ?></i></p>
            <a  href="piesen.php?<?php echo $piesen['id_piesen'];?>" class="l-btn l-btn--primary l-btn--small"><i class="fa fa-music"></i> Zobraziť celú pieseň</a>
        </div>
        </div>
        </div>

    <?php } ?>
    </div>
<?php } else { ?> <div class="l-well"><strong>Juj, nebite ma, pán kapelník!</strong> Nič som nenašiel, ale keď tu toho bude viac - tak nájdem, to môžem sľúbiť. Dovtedy dačo iné pomrkaj. </div>   <?php } ?>
</div> </div></div>


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

    $("#aud").on("pause", function (e) {
       if(duration<=ctime) {alert('kokot!');};
       alert(ctime+"xxx"+duration);
    });


  $("#aud").bind('seeked', function(){
    alert("kokot");
  });

function abc2svg() {
	$('.abc').each(function(i, obj) {
		ABCJS.renderAbc(obj, $(obj).text()); 	
 
	});
}

	










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