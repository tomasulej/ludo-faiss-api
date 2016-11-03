<?php

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


?>
