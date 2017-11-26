<?php
		
function diff($old, $new){
    $matrix = array();
    $maxlen = 0;
    foreach($old as $oindex => $ovalue){
        $nkeys = array_keys($new, $ovalue);
        foreach($nkeys as $nindex){
            $matrix[$oindex][$nindex] = isset($matrix[$oindex - 1][$nindex - 1]) ?
                $matrix[$oindex - 1][$nindex - 1] + 1 : 1;
            if($matrix[$oindex][$nindex] > $maxlen){
                $maxlen = $matrix[$oindex][$nindex];
                $omax = $oindex + 1 - $maxlen;
                $nmax = $nindex + 1 - $maxlen;
            }
        }   
    }
    if($maxlen == 0) return array(array('d'=>$old, 'i'=>$new));
    return array_merge(
        diff(array_slice($old, 0, $omax), array_slice($new, 0, $nmax)),
        array_slice($new, $nmax, $maxlen),
        diff(array_slice($old, $omax + $maxlen), array_slice($new, $nmax + $maxlen)));
}

function htmlDiff($old, $new){
    $ret = '';
    $diff = diff(preg_split("/[\s]+/", $old), preg_split("/[\s]+/", $new));
    foreach($diff as $k){
        if(is_array($k))
            $ret .= (!empty($k['d'])?"<del>".implode(' ',$k['d'])."</del> ":'').
                (!empty($k['i'])?"<ins>".implode(' ',$k['i'])."</ins> ":'');
        else $ret .= $k . ' ';
    }
    return $ret;
}






function str_replace_once($str_pattern, $str_replacement, $string){
   
	if (strpos($string, $str_pattern) !== false){
		$occurrence = strpos($string, $str_pattern);
		return substr_replace($string, $str_replacement, strpos($string, $str_pattern), strlen($str_pattern));
	}

	return $string;
}



function lyrics2html($lyrics)
{


				
	//slohy
	$nove_lyrics="<div class='row'> ".$lyrics." </div>";
    $nove_lyrics = preg_replace("/[\r\n]+/", "\n", $nove_lyrics);



//}	
	$sloha_counter=0;
	while (strpos($nove_lyrics,"}")!=false) {
		$sloha_counter++;
		//echo $nove_lyrics;
		if (($sloha_counter % 3 == 0)) 
			{$nove_lyrics=str_replace_once("}","</div></div><div class='row'>",$nove_lyrics);}
			else {$nove_lyrics=str_replace_once("}","</div>",$nove_lyrics);}
	}




    //{
    $sloha_counter=0;


    while (strpos($nove_lyrics,"{")!=false) {
        $sloha_counter++;
        //echo $nove_lyrics;
        $nove_lyrics=str_replace_once("{", '<div class="col-md-4 sloha"><span class="l-num">'.$sloha_counter.'</span>', $nove_lyrics);
        //echo $nove_lyrics;


    }


	//nové riadky
	$nove_lyrics=nl2br($nove_lyrics);


	$nove_lyrics=str_replace("</div><br />
<div class=\"col-md-4 sloha\">", "</div><div class=\"col-md-4 sloha\">", $nove_lyrics);

	//opakovania
	//$nove_lyrics=str_replace("/:", "<big>&#x1d106;</big>", $nove_lyrics);
	//$nove_lyrics=str_replace(":/", "<big>𝄇</big>", $nove_lyrics);
	

				
	//takty
	$counter=0;
	$needle = "|";
	$lastPos = 0;
	$odkial_strihaj=0;
	$positions = array();
				
	while (($lastPos = strpos($nove_lyrics, $needle, $lastPos))!== false) {
				    //$positions[] = $lastPos;
					
						
		$newPos=$lastPos + strlen($needle);
		$nove_lyrics2.=sprintf("<span id='l%s' class='%s'>%s</span>", 
		   $counter, "slova", substr($nove_lyrics,$odkial_strihaj,$lastPos-$odkial_strihaj));
				    
		$lastPos = $newPos;
		$odkial_strihaj=$lastPos;
		$counter++;
					
	}

	//odstranenie prebytocnych <BR>
	
	$nove_lyrics2=str_replace("</div><br>", "</div>", $nove_lyrics2);
	$nove_lyrics2=str_replace("<br><br>", "", $nove_lyrics2);

					
	return $nove_lyrics2;
}

function cleanlyrics($lyrics) {

	$array = explode('}',$lyrics);
	$nove_lyrics = $array[0];

		$nove_lyrics=str_replace("{", "", $nove_lyrics);
		//$nove_lyrics=str_replace("}", "", $nove_lyrics);
		$nove_lyrics=str_replace("|", "", $nove_lyrics);
		$nove_lyrics=str_replace("\n", "/", $nove_lyrics);

		

		return $nove_lyrics;

}


function cleanlyrics_full($lyrics) {
	
	
			$nove_lyrics=str_replace("{", "", $lyrics);
			$nove_lyrics=str_replace("}", "", $nove_lyrics);
			$nove_lyrics=str_replace("|", "", $nove_lyrics);
			$nove_lyrics=str_replace("\n", "<BR>", $nove_lyrics);
	
			
	
			return $nove_lyrics;
	
	}


	function cleanlyrics_full_diff($lyrics1,$lyrics2) {
		
		$nove_lyrics2=str_replace("|", "", $lyrics2);
		$nove_lyrics1=str_replace("|", "", $lyrics1);
		$nove_lyrics1=str_replace("\n", "<BR>", $nove_lyrics1);
		$nove_lyrics2=str_replace("\n", "<BR>", $nove_lyrics2);
		

		$nove_lyrics=htmlDiff($nove_lyrics1, $nove_lyrics2);

		$nove_lyrics=str_replace("{", "", $nove_lyrics);
		$nove_lyrics=str_replace("}", "", $nove_lyrics);

		
		
				return $nove_lyrics;
		
		}




function cleanlyrics_words($lyrics) {

	//$array = explode('}',$lyrics);
	//$nove_lyrics = $array[0];

    $nove_lyrics=str_replace("{", " ", $lyrics);
	$nove_lyrics=str_replace("}", " ", $nove_lyrics);
	$nove_lyrics=str_replace("|", "", $nove_lyrics);
	$nove_lyrics=str_replace("\n", " ", $nove_lyrics);
    $nove_lyrics=str_replace("[:","", $nove_lyrics);
    $nove_lyrics=str_replace(":]","", $nove_lyrics);
    $nove_lyrics=str_replace("/:","", $nove_lyrics);
    $nove_lyrics=str_replace(":/","", $nove_lyrics);
    $nove_lyrics=strip_tags($nove_lyrics);
    $nove_lyrics=str_replace("(","", $nove_lyrics);
    $nove_lyrics=str_replace(")","", $nove_lyrics);
    $nove_lyrics=str_replace(".","", $nove_lyrics);
    $nove_lyrics=str_replace(",","", $nove_lyrics);


    return $nove_lyrics;

}



function zakladny_tvar($word) {

	$word=str_replace(".","",$word);
	$word=str_replace(":","",$word);
	$word=str_replace("?","",$word);
	$word=str_replace("!","",$word);
	$word=str_replace(",","",$word);
	$word=str_replace(";","",$word);
	$word=str_replace("*","",$word);


	$word=strtolower($word);
	//echo $word;

	$q=mysql_query("SELECT * FROM `ma` WHERE ((`word`='$word') AND (`form`<>'W'))  ORDER BY `parent_freq` DESC LIMIT 1");

	while ($slovo=mysql_fetch_object($q)) {

		if ($slovo->parent<>"") {return $slovo->parent;} else {return $word;}

	}
}


function vyskyt_korpus_count($word) {
	$word=str_replace(".","",$word);
	$word=str_replace(":","",$word);
	$word=str_replace("?","",$word);
	$word=str_replace("!","",$word);
	$word=str_replace(",","",$word);
	$word=str_replace("*","",$word);

	$word=str_replace(";","",$word);
	$word=strtolower($word);

	$q=mysql_query("SELECT * FROM `freq` WHERE `word`='$word'");

	while ($slovo=mysql_fetch_object($q)) {

		return $slovo->count;
	}
}

function vyskyt_korpus_rating($word) {
	$word=str_replace(".","",$word);
	$word=str_replace(":","",$word);
	$word=str_replace("?","",$word);
	$word=str_replace("!","",$word);
	$word=str_replace(",","",$word);
	$word=str_replace("*","",$word);

	$word=str_replace(";","",$word);
	$word=strtolower($word);

	$q=mysql_query("SELECT * FROM `freq` WHERE `word`='$word'");

	while ($slovo=mysql_fetch_object($q)) {

		return $slovo->id;
	}
}


function zakladny_tvar_form($word) {

	$word=str_replace(".","",$word);
	$word=str_replace(":","",$word);
	$word=str_replace("?","",$word);
	$word=str_replace("!","",$word);
	$word=str_replace(",","",$word);
	$word=str_replace(";","",$word);
	$word=str_replace("*","",$word);
	$word=strtolower($word);
	//echo $word;

	$q=mysql_query("SELECT * FROM `ma` WHERE `word`='$word' ORDER BY `parent_freq` DESC LIMIT 1");

	while ($slovo=mysql_fetch_object($q)) {

		if ($slovo->parent<>"") {return $slovo->form;} else {return $word;}

	}
}


function form_name($form) {
	if(substr($form, 0, 1) == "S") {$str="podstatné meno";};
	if(substr($form, 0, 1) == "A") {$str="prídavné meno";};
	if(substr($form, 0, 1) == "P") {$str="zámeno";};
	if(substr($form, 0, 1) == "N") {$str="číslovka";};
	if(substr($form, 0, 1) == "V") {$str="sloveso";};
	if(substr($form, 0, 1) == "G") {$str="príčastie";};
	if(substr($form, 0, 1) == "D") {$str="príslovka";};
	if(substr($form, 0, 1) == "E") {$str="predložka";};
	if(substr($form, 0, 1) == "O") {$str="spojka";};
	if(substr($form, 0, 1) == "T") {$str="častica";};
	if(substr($form, 0, 1) == "J") {$str="citoslovce";};
	if(substr($form, 0, 1) == "R") {$str="reflexívum";};
	if(substr($form, 0, 1) == "Y") {$str="kondicionálová morféma";};
	if(substr($form, 0, 1) == "Z") {$str="interpunkcia";};
	if(substr($form, 0, 1) == "#") {$str="neslovný element";};
	if(substr($form, 0, 1) == "0") {$str="číslica";};
	if(substr($form, 0, 1) == "W") {$str="skratky";};


	if ($str<>"") {return $str;} else {return $form;}
}

function je_plnovyznamove($form) {
    $a=false;

    if(substr($form, 0, 1) == "S") {$a=true;};
    if(substr($form, 0, 1) == "A") {$a=false;};
    if(substr($form, 0, 1) == "P") {$a=false;};
    if(substr($form, 0, 1) == "N") {$a=false;};
    if(substr($form, 0, 1) == "V") {$a=false;};
    if(substr($form, 0, 1) == "G") {$a=false;};
    if(substr($form, 0, 1) == "D") {$a=false;};
    if(substr($form, 0, 1) == "E") {$a=false;};
    if(substr($form, 0, 1) == "O") {$a=false;};
    if(substr($form, 0, 1) == "T") {$a=false;};
    if(substr($form, 0, 1) == "J") {$a=false;};
    if(substr($form, 0, 1) == "R") {$a=false;};
    if(substr($form, 0, 1) == "Y") {$a=false;};
    if(substr($form, 0, 1) == "Z") {$a=false;};
    if(substr($form, 0, 1) == "#") {$a=false;};
    if(substr($form, 0, 1) == "0") {$a=false;};
    if(substr($form, 0, 1) == "W") {$a=false;};

    return $a;
}




function lyrics2html_diff($lyrics1,$lyrics2)
{


	

//slohy
$nove_lyrics1="<div class='row'> ".$lyrics1." </div>";
$nove_lyrics1 = preg_replace("/[\r\n]+/", "\n", $nove_lyrics1);



//slohy2
$nove_lyrics2="<div class='row'> ".$lyrics2." </div>";
$nove_lyrics2 = preg_replace("/[\r\n]+/", "\n", $nove_lyrics2);
	
	


//}	
	$sloha_counter=0;
	while (strpos($nove_lyrics1,"}")!=false) {
		$sloha_counter++;
		//echo $nove_lyrics;
		if (($sloha_counter % 3 == 0)) 
			{$nove_lyrics1=str_replace_once("}","</div></div><div class='row'> ",$nove_lyrics1);}
			else {$nove_lyrics1=str_replace_once("}","</div>",$nove_lyrics1);}
	}

	$sloha_counter=0;
	while (strpos($nove_lyrics2,"}")!=false) {
		$sloha_counter++;
		//echo $nove_lyrics;
		if (($sloha_counter % 3 == 0)) 
			{$nove_lyrics2=str_replace_once("}","</div></div><div class='row'> ",$nove_lyrics2);}
			else {$nove_lyrics2=str_replace_once("}","</div>",$nove_lyrics2);}
	}




    //{
    $sloha_counter=0;


    while (strpos($nove_lyrics1,"{")!=false) {
        $sloha_counter++;
        //echo $nove_lyrics;
        $nove_lyrics1=str_replace_once("{", '<div class="col-md-4 sloha"><span class="l-num"> '.$sloha_counter.'</span> ', $nove_lyrics1);
        //echo $nove_lyrics;


    }
    $sloha_counter=0;
	
	
		while (strpos($nove_lyrics2,"{")!=false) {
			$sloha_counter++;
			//echo $nove_lyrics;
			$nove_lyrics2=str_replace_once("{", '<div class="col-md-4 sloha"><span class="l-num"> '.$sloha_counter.'</span> ', $nove_lyrics2);
			//echo $nove_lyrics;
	
	
		}

		//echo "<pre>$nove_lyrics1 ------------- $nove_lyrics2 </pre>";
		


		//echo "<pre>$nove_lyrics</pre>";

	//nové riadky
	$nove_lyrics1=nl2br($nove_lyrics1);


	$nove_lyrics1=str_replace("</div><br />
<div class=\"col-md-4 sloha\">", "</div><div class=\"col-md-4 sloha\">", $nove_lyrics1);

$nove_lyrics2=nl2br($nove_lyrics2);


	$nove_lyrics2=str_replace("</div><br />
<div class=\"col-md-4 sloha\">", "</div><div class=\"col-md-4 sloha\">", $nove_lyrics2);


	//opakovania
	//$nove_lyrics=str_replace("/:", "<big>&#x1d106;</big>", $nove_lyrics);
	//$nove_lyrics=str_replace(":/", "<big>𝄇</big>", $nove_lyrics);
	
	$nove_lyrics=htmlDiff($nove_lyrics1,$nove_lyrics2);
	
				
	//takty
	$counter=0;
	$needle = "|";
	$lastPos = 0;
	$odkial_strihaj=0;
	$positions = array();
	$nove_lyrics2="";			

	while (($lastPos = strpos($nove_lyrics, $needle, $lastPos))!== false) {
				    //$positions[] = $lastPos;
					
						
		$newPos=$lastPos + strlen($needle);
		$nove_lyrics2.=sprintf("<span id='l%s' class='%s'>%s</span>", 
		   $counter, "slova", substr($nove_lyrics,$odkial_strihaj,$lastPos-$odkial_strihaj));
				    
		$lastPos = $newPos;
		$odkial_strihaj=$lastPos;
		$counter++;
					
	}

	//odstranenie prebytocnych <BR>
	

	$nove_lyrics2=str_replace("</div><br>", "</div>", $nove_lyrics2);
	$nove_lyrics2=str_replace("<br><br>", "", $nove_lyrics2);

					
	return $nove_lyrics2;
}


function js2abc($js) {
	$js=str_replace("abc_arr = [","",$js);
	$js=str_replace('abc_enc = [];',"",$js);
	$js=str_replace('""];',"",$js);
	$js=str_replace('",',"",$js);
	$js=str_replace('\"','"',$js);


	foreach(preg_split('~[\r\n]+~', $js) as $line){
		if(empty($line) or ctype_space($line)) continue; // skip only spaces
		//if (substr($line,1,2)=="%%") continue;
		$line=substr($line, 1);
		$f_js.=$line.PHP_EOL;
	}



	return $f_js;

}






?>