<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="Ľudo slovenský radí: najväčšia zbierka ľudových prísloví a porekadiel" />
<meta property="og:description" content="Dvanásť tisíc Ľuda slovenského prísloví a porekadiel. Zozbieral Adolf Peter Záturecký. Internetovú stránku zbúchal Tomáš Ulej." />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   
    
    <script>
	function show_lyrics2(cas) 
  {

var pocet_taktov=0;
times_arr.forEach(function(e,i,a){pocet_taktov += e.length; });
pocet_taktov=pocet_taktov-1-times_arr.length;
//alert(pocet_taktov);

		counter=0;
		for (var i = 0, len = times_arr.length; i < len; i++) {
			
			for (var j = 0, len2 = times_arr[i].length; j < len2-1; j++) {

			//console.log(cas);
			//console.log(times_arr[i][j]+" --- ");
			

			if ((cas>times_arr[i][j]) && (cas<times_arr[i][j+1])) {


					pocet=(sloha*pocet_taktov)+counter+1;
          
          //alert(pocet);
          counter++;


          sp="#l"+pocet;

				    //console.log(sp);	
				    $(sp).attr("style","font-weight: bold;font-size-adjust: 0.58;");
          console.log(sp);



			} else {
				
			       counter++;	
				
			}	
			
	}
			
		}
		
		
		
		
	}

	    
	  





	    
	    
	    
	    

var sloha=0;



$(document).ready(function(){







var audio = document.getElementById('aud');

var events = 'abort,canplay,canplaythrough,durationchange,emptied,ended,error,loadeddata,loadedmetadata,loadstart,pause,play,playing,progress,ratechange,seeked,seeking,stalled,suspend,timeupdate,volumechange,waiting'.split(',');

var onEvent = function(e) {
    console.log(e.type);
    this.removeEventListener(e.type, onEvent, false); // remove event listener
};


// add event listener to audio for all events
for (var i = 0, len = events.length; i < len; i++) {
    audio.addEventListener(events[i], onEvent, false);
}





document.addEventListener('seeked', function(e){
  //alert('k');
  sloha++;
  alert(sloha);
}, true);
});
</script>



    <title>Ľudo Slovenský: Piesne</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	  
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1402931466605062&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
    
       <?php printf(implode('', file('../tmpl_hlavicka.html')), "","", ""); ?>
    
    
    
<div></div>
    
    
    <div class="content">
	    <div class="container">
		<div class="row">	

			<div class="col-md-8">
<H1>Na Kráľovej holi  </H1>


<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://wim.vree.org/js/abc2svg-1.js"></script>
<script src="http://wim.vree.org/js/abcweb-min.js"></script>
<script src="http://wim.vree.org/js/xml2abc-min.js"></script>





<div id="buttons">
    <div style="height: 5px;"></div>
    <span id="sync">
        <div id="menu"><div id="mbar" style="padding: 4px;">Menu</div>
            <label id="snclbl">enable sync<input id="synbox" type="checkbox" accesskey="e"/></label>
            <label>speed ctrl<input id="spdctl" type="checkbox"/></label>
            <label>loop mode<input id="lopctl" type="checkbox"/></label>
            <label>file buttons<input id="btns" type="checkbox"/></label>
            <label id="ncrlbl">no cursor<input id="nocsr" type="checkbox"/></label>
            <label id="lnclbl">line cursor<input id="lncsr" type="checkbox"/></label>
            <label>center player<input id="ctrmed" type="checkbox"/></label>
            <label>center score<input id="ctrnot" type="checkbox"/></label>
            <label>hide player<input id="noplyr" type="checkbox"/></label>
            <label id="asclbl">autoscale<input id="autscl" type="checkbox"/></label>
            <label>skip repeats<input id="repskip" type="checkbox"/></label>
            <label>count in<input id="cntin" type="checkbox"/></label>
            <label>metronome<input id="metro" type="checkbox"/></label>
            <label id="helpm">help</label>
        </div>
        <div id="sync_out">
            <div id="sync_info"></div>
            <label>wait offset: <input id="woff" type="checkbox"></input></label>
            <label id="implbl">import: <input id="impbox" type="checkbox"></input></label>
            <label>jump: <input id="jump" type="checkbox"></input></label>
            <button id="save">save</button>
            <label>scramble: <input id="encr" type="checkbox"></input></label>
        </div>
    </span>
    <div id="medbts">
        <label><span id="abclbl">score file: </span><div id="abcfile"><input type="file" id="fknp" accept=".abc,.xml,.js" tabindex="1"/></div></label>
        <label id="medlbl">media file: <div id="mediafile"><input type="file" id="mknp" accept="" tabindex="2"/></div></label>
        <label id="yvdlbl">youtube id: <div id="yubfile">
            <input type="text" id="yubid" size="11" value="qx-ymShyfIk" title="11 characters" pattern="[A-Za-z0-9\-_]{11}"/>
            <input type="button" id="yknp" value="load"/>
        </div></label>
        <label id="drplbl">use dropbox:<input id="drpuse" type="checkbox" tabindex="3"/></label>
        <label id="yublbl">use youtube:<input id="yubuse" type="checkbox" tabindex="4"/></label>
    </div>

</div>

<div id="streep"></div>
<div id="notation"></div>
<pre id="err"></pre>
<div id="saveDiv" style="display:none"></div>
<pre id="wait" class="dlog">Loading, please wait ...</pre>
<div id="countin" class="dlog"></div>


<div class="col-md-offset-1 lead" style="display:none">

 	  <span class="titulky" begin="00.010" id="p0" end="04.540">Na Kráľovej holi</span>
      <span class="titulky" begin="04.540" id="p1" end="10.240">stojí strom zelený.</span><BR>
      <span class="titulky" begin="11.108" id="p2" end="15.021">Na Kráľovej holi</span>
      <span class="titulky" begin="15.051" id="p3" end="20.378">stojí strom zelený</span><BR>
      <span class="titulky" begin="21.737" id="p4" end="25.447">Vrch má naklonený</span>,<BR>
      <span class="titulky" begin="25.465" id="p5" end="29.447">vrch má naklonený</span>,<BR>
      <span class="titulky" begin="29.465" id="p6" end="32.697">vrch má naklonený</span>,<BR>
      <span class="titulky" begin="32.687" id="p7" end="38.396">do šumiackej zemi</span>
</div>



<div class="row"><div class="col-md-6">

<div id="lyrics2" class="col-md-offset-1 lead">

 	  <span id="l0">Na Kráľo</span><span id="l1">vej holi</span>
      <span id="l2">stojí strom</span><span id="l3"> zele</span><span id="l4">ný.</span><BR>
      <span id="l5">Na Kráľo</span><span id="l6">vej holi</span>
      <span id="l7">stojí strom</span> <span id="l8">zele</span><span id="l9">ný</span><BR>
     
     
      <span id="l10">Vrch má na</span><span id="l11">klonený</span>,<BR>
      <span id="l12">vrch má na</span><span id="l13">klonený</span>,<BR>
      <span id="l14">vrch má na</span><span id="l15">klonený</span>,<BR>
      <span id="l16">do šumia</span><span id="l17">ckej ze</span><span id="l18">mi</span> <BR>
      
      
            <span id="l19">Vrch má na</span><span id="l20">klonený</span>,<BR>
      <span id="l21">vrch má na</span><span id="l22">klonený</span>,<BR>
      <span id="l23">vrch má na</span><span id="l24">klonený</span>,<BR>
      <span id="l25">do šumia</span><span id="l26">ckej ze</span><span id="l27">mi</span> 
      
      
</div>

</div>


<div class="col-md-6">

<div id="lyrics2" class="col-md-offset-1 lead">

 	  <span id="l28">Odkážte</span> <span id="l29">odpište</span>
      <span id="l30">tej mojej</span><span id="l31"> mate</span><span id="l32">ri</span>.<BR>
      <span id="l33">Na Kráľo</span><span id="l34">vej holi</span>
      <span id="l34">stojí strom</span> <span id="l36">zele</span><span id="l37">ný</span><BR>
     /: <span id="l38">Vrch má na</span><span id="l39">klonený</span>,<BR>
      <span id="l40">vrch má na</span><span id="l41">klonený</span>,<BR>
      <span id="l42">vrch má na</span><span id="l43">klonený</span>,<BR>
      <span id="l44">do šumia</span><span id="l45">ckej ze</span><span id="l46">mi</span> :/
</div>


</div>
</div>




			</div>


	<div class="col-md-4">
				
				    <div id="meddiv">
        <audio id="aud" controls="controls"  ontimeupdate="show_lyrics2(this.currentTime);"><source/>Your browser does not support the audio element.</audio>
        <video id="vid" controls="controls" width="100%" ontimeupdate="show_lyrics(this.currentTime);show_lyrics2(this.currentTime);" autoplay>Your browser does not support the video element.</video>
        <div id="vidyub"></div>
        <div id="crediv">
            <div id="credits"></div>
            <div id="spdlbl">speed: <button id="plus">plus</button>&nbsp;<button id="min">min</button><span id="rate"></span></div>
            <label id="looplbl">Hraj aj ďalšie slohy<input id="loop" type="checkbox" checked/></label>
    
        </div>
    
    
    
    </div>
				
	<h3>Viac o piesni</h3>
<p><strong>Prvý výskyt:</strong> Písne svetské lidu slovanského v Uhřích (1650)<BR/>
<strong>Znotoval:</strong> Tomáš Ulej, 2016<BR/>
<strong>Témy:</strong> <span class="label label-default">Default</span>
<span class="label label-primary">Primary</span>
<span class="label label-success">Success</span>
<span class="label label-info">Info</span><BR>

<strong>Lokality:</strong>: <a href="">Kráľová hoľa</a>
</p>


<H3>Stiahnuť pieseň</H3>
<div class="row">
<div class="col-md-6"><P><a href="#" class="btn btn-primary btn-info"><span class="glyphicon glyphicon-download"></span> Stiahnuť akordy a text</a></p></div>
<div class="col-md-6"><p><a href="#" class="btn btn-primary btn-default"><span class="glyphicon glyphicon-download"></span> Stiahnuť noty</a><BR></p></div>
</div>

			
				
			</div>
			
		</div>	
			
	<h3>Lokality súvisiace s piesňou</h3>
	
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83958.94697265895!2d20.069166058935494!3d48.88266949177469!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473fcd5accb1762d%3A0x903486ec2ada52e9!2zS3LDocS-b3ZhIGhvxL5hLCA5NzYgNzEgxaB1bWlhYw!5e0!3m2!1ssk!2ssk!4v1453591349902" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>	  

			</div>


   

		    
	    </div>
    </div>
    
    
<!--
    <div class="container content">
	    
	    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
	    
	    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
	    
    </div>
-->
    
    <?php printf(implode('', file('tmpl_paticka.html'))); ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    
    
    <?php printf(implode('', file('../tmpl_analytics.html'))); ?>
    
  </body>
</html>