//########################################
//# This page contains score data, timing data and the media file path. Save it as a text file in
//# the same folder as abcweb.html. Abcweb preloads score and media when it is opened with the
//# file name as parameter in the url, for example: http://your.domain.org/abcweb.html?file_name
//# Also works locally with file:///path/to/abcweb.html?file_name
//# **** You have to correct the path to the media file below! (media_file="...";) ****
//########################################
//#
//media_file = "na-kralovej-holi.mp4";
media_file = "test/nkh.wav";

offset_js = 0.00;

//opt = {"jump":0,"no_menu":0,"repufld":0,"noplyr":0,"nocsr":0,"media_height":"","btns":1,"ipadr":"","mstr":0,"autscl":0,"ctrmed":0,"ctrnot":0,"lncsr":0,"opacity":0.2,"synbox":0,"speed":1,"top_margin":0,"yubvid":"","nomed":0,"delay":0,"repskip":0,"spdctl":0,"lopctl":1,"metro":0};

opt = {"jump":0,"no_menu":0,"repufld":0,"noplyr":0,"nocsr":0,"media_height":"","btns":1,"ipadr":"","mstr":0,"autscl":0,"ctrmed":0,"ctrnot":0,"lncsr":0,"opacity":0.2,"synbox":0,"speed":1,"top_margin":0,"yubvid":"","nomed":0,"delay":0,"repskip":0,"spdctl":0,"lopctl":true,"metro":0};


times_arr = [[0.00,1.50,3.93,6.36,9.13,11.82,13.69,15.71,17.55,19.38],
[19.38,21.62,24.00,25.68,27.36,29.04,30.72,32.70,34.67,36.64,38.61],
[38.61,40.58,42.56,44.53,46.50,48.47,50.44,52.42,54.39,56.36]];
abc_arr = ["X:1",
"T:",
"C:",
"Z:© Ľudo Slovenský",
"%%scale 0.85",
"%%pagewidth 21.59cm",
"%%leftmargin 0.5cm",
"%%rightmargin 2cm",
"L:1/8",
"Q:1/4=80.00",
"M:2/4",
"I:linebreak $",
"K:G",
"V:1 treble nm=\"Voice\"",
"V:1",
"\"Em\" E E2 B, | EF G2 | B B2 c | B2\"B\" A2 |\"Em\" E3 |\"G\" G G2 D | GA B2 | d d2 e | d2\"D\" c2 | %9",
"\"G\" B4 |:$\"Am\" A A2 A | AB c2 |\"B\" B B2 A |\"Em\" GF E2 | E E2 B, | EF G2 | B B2\"Am\" c | %17",
"\"Em\" B2\"CH\" A2 |\"Em\" E4 :| %19",
""];
abc_enc = [];



	
	function show_lyrics(cas) {
		
		
		$( "span.titulky" ).each(function( index ) {
			
			if ((cas>$(this).attr("begin")) && (cas<$(this).attr("end"))) {
				//$(this).html($(this).attr("begin")+" - <strong>"+$(this).html()+"</strong>");	
				$(this).attr("style","font-weight: bold;font-size-adjust: 0.58;");
				
				
			} else {
				$(this).attr("style","");
			}
		
			
		});
		
		
		
		//document.getElementById('tracktime').innerHTML = cas;
		
		
		
	}
	
	
		
	
	
	
	
	
	
