<?php
		


function str_replace_once($str_pattern, $str_replacement, $string){
   
	if (strpos($string, $str_pattern) !== false){
		$occurrence = strpos($string, $str_pattern);
		return substr_replace($string, $str_replacement, strpos($string, $str_pattern), strlen($str_pattern));
	}

	return $string;
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
    if(substr($form, 0, 1) == "A") {$a=true;};
    if(substr($form, 0, 1) == "P") {$a=false;};
    if(substr($form, 0, 1) == "N") {$a=false;};
    if(substr($form, 0, 1) == "V") {$a=true;};
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








?>