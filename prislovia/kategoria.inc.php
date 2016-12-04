<?php

function make_call($id_array, $select_what, $from_what, $where_what)
{ // BEGIN function kat_make_call
    $str="SELECT $select_what FROM $from_what WHERE ";
    $start=true;

    foreach ($id_array as $key=>$value) {
        if ($start) {
            $str.= "$where_what=".$value." ";

        } else {
            $str.="OR $where_what=".$value." ";
        }
        $start=false;
    }


    return $str." ORDER BY ".$where_what.";";
} // END function kat_make_call

//KATEGORIE FUNKCIE
//*************************************************************************








function kat_namebyid($id)
{ // BEGIN function kat_namebyid
    $q=mysql_query("SELECT txt FROM pr_kategorie WHERE id=$id");
    return mysql_result($q, 0);
} // END function kat_namebyid

function katid_from_prislovie_id($id)
{ // BEGIN function kat_namebyid
    $q=mysql_query("SELECT kap_main FROM pr_txt WHERE id=$id");
    return mysql_result($q, 0);
} // END function kat_namebyid




function new_kat_vypis_vlavo($id,$vnorene,$uroven)
{

    $prefix=array(
        0=>array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25'),
        1=>array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","r","s","t","u","v","x","y","z"),
        2=>array("aa","bb","cc","dd","ee","ff","gg","hh","ii","jj","kk","ll","mm","nn","oo","pp","rr","ss","tt","uu","vv","xx","yy","zz")
    );

    //eko($prefix);




    $poradie=-1;
        $q=mysql_query("SELECT id,parent_id,txt FROM pr_kategorie WHERE parent_id=$id");

    if (mysql_num_rows($q)>0) {

        if ($vnorene==0) {
            $vypis.='<menu class="nav" data-spy="affix" data-toggle="affix" data-offset-top="180" data-offset-bottom="200">';} else {$vypis='<menu class="nav">';}
        //$vypis.="<h5>".kat_namebyid($id)."</h5>";

    }



    while ($k=mysql_fetch_object($q)) {
        $poradie++;
        if ($vnorene==0) {

            $vypis.=sprintf('<li class="navigacia" id="li_%s"><a href="#kategoria_%s"><b>%s</b> %s</a>',$k->id, $k->id, $prefix[$uroven][$poradie], $k->txt);} else {$vypis.=sprintf('<li id="li_%s"><a href="#kategoria_%s">%s. %s</a>',$k->id, $k->id, $prefix[$uroven][$poradie], $k->txt);}

        //echo $uroven.".".$poradie.$prefix[$uroven][$poradie];

        $vypis.=new_kat_vypis_vlavo($k->id,1,$uroven+1);

        $vypis.="</li>
          	";

    }


    if (mysql_num_rows($q)>0) {
        $vypis.="</menu>
   ";
    }

    return $vypis;
}






function kat_vypis_vlavo($id,$vnorene,$uroven)
{

    $prefix=array(
        0=>array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25'),
        1=>array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","r","s","t","u","v","x","y","z"),
        2=>array("aa","bb","cc","dd","ee","ff","gg","hh","ii","jj","kk","ll","mm","nn","oo","pp","rr","ss","tt","uu","vv","xx","yy","zz")
    );

    //eko($prefix);
    $poradie=-1;
    $q=mysql_query("SELECT id,parent_id,txt FROM pr_kategorie WHERE parent_id=$id");

    if (mysql_num_rows($q)>0) {

        if ($vnorene==0) {
            $vypis.='<ul id="navigacia" class="nav affix nav bs-sidenav">';} else {$vypis='<ul class="nav vnorene">';}
        //$vypis.="<h5>".kat_namebyid($id)."</h5>";


    }



    while ($k=mysql_fetch_object($q)) {
        $poradie++;
        if ($vnorene==0) {$vypis.=sprintf('<li class="navigacia" id="li_%s"><a href="#kategoria_%s">%s. %s</a>',$k->id, $k->id, $prefix[$uroven][$poradie], $k->txt);} else {$vypis.=sprintf('<li class="vnorene" id="li_%s"><a href="#kategoria_%s">%s. %s</a>',$k->id, $k->id, $prefix[$uroven][$poradie], $k->txt);}

        //echo $uroven.".".$poradie.$prefix[$uroven][$poradie];

        $vypis.=kat_vypis_vlavo($k->id,1,$uroven+1);

        $vypis.="</li>
          	";

    }


    if (mysql_num_rows($q)>0) {
        $vypis.="</ul>
   ";
    }

    return $vypis;
}


function kat_make_array()
{ // BEGIN function kategorie_array
    $kategorie=array();
    $q=mysql_query("SELECT * FROM pr_kategorie");
    while ($k=mysql_fetch_object($q)) {
        $kategorie[$k->id]=$k->parent_id."|".$k->txt;
    }

    return $kategorie;
} // END function kategorie_array

//*************************************************************************

function kat_all_vypis($karray)
{ // BEGIN function kat_all_vypis
    foreach ($karray as $key=>$value) {
        list($parent, $txt)=explode("|",$value);
        if ($parent==0) {
            printf('<H3><a href="kategoria.php?id=%s">%s</H3>', $key, $txt);
            kat_sub_vypis($key, $karray);
        }
    }
} // END function kat_all_vypis

//*************************************************************************

function kat_id_array ($id, $karray) {
    $kk=array();
    $kk[]=$id;
    foreach ($karray as $key=>$value) {
        list($parent, $txt)=explode("|",$value);
        if ($parent==$id) {
            $kk[]=$key;
        }

    }
    return $kk;
}

function kat_id_array2 ($id, $karray) {
    $kk=array();
    $kk[]=$id;
    foreach ($karray as $key=>$value) {
        list($parent, $txt)=explode("|",$value);
        if ($parent==$id) {
            $kk[]=$key;
            //druhá úroveň
            foreach ($karray as $key2=>$value2) {
                list($parent2, $txt2)=explode("|",$value2);
                if ($parent2==$key) {
                    $kk[]=$key2;
                    foreach ($karray as $key3=>$value3) {
                        list($parent3, $txt3)=explode("|",$value3);
                        if ($parent3==$key2) {
                            $kk[]=$key3;
                        }
                    }
                }
            }


        }
    }



    return array_unique($kk);
}



//*************************************************************************



//*************************************************************************




function kat_sub_vypis($id, $karray)
{ // BEGIN function kategoria
    $uroven++;
    $poradie=0;
    echo "<UL>";
    foreach ($karray as $key=>$value) {
        $poradie++;
        list($parent, $txt)=explode("|",$value);
        if ($parent==$id) {
            printf('<li>%s. <a href="kategoria.php?id=%s">%s</a></li>', $key, $txt);
            echo  kat_sub_vypis($key, $karray);
        }

    }
    echo "</UL>";
} // END function kategoria
//*************************************************************************

// ************** PRISLOVIA FUNKCIE

//*************************************************************************

function txt_id_array($arr_id)
{ // BEGIN function txt_id
    $txt_id=array();
    $qi_txt=mysql_query(make_call($arr_id, "id", "pr_txt", "kap_id"));
    while ($k=mysql_fetch_object($qi_txt)) {
        $txt_id[]=$k->id;
    }

    return $txt_id;
} // END function txt_id




//*************************************************************************

// ************** VYPIS EKO FUNKCIE

//*************************************************************************
function eko ($vInput, $echo=true)
{
    if ($echo) {
        echo "<br>" . fancy_vardump ($vInput);
    } else {
        return fancy_vardump ($vInput);
    }
}

function fancy_vardump ($vInput, $level = 0, $depth = 0) {

    $bgs = array ('#DDDDDD', '#C4F0FF', '#BDE9FF', '#FFF1CA');
    $bg = &$bgs[$depth % sizeof($bgs)];
    $font_size = "12";
    $s = "<table border='0' cellpadding='4' cellspacing='0' style='font-size: ".$font_size."px;'><tr><td style='background: none $bg;font-size: ".$font_size."px; text-align: left; ";
    if (is_int($vInput)) {
        $s .= "'>";
        $s .= sprintf('int (<b>%d</b>)', intval($vInput));
    } else if (is_float($vInput)) {
        $s .= "'>";
        $s .= sprintf('float (<b>%f</b>)', doubleval($vInput));
    } else if (is_string($vInput)) {
        $s .= "'>";
        $s .= sprintf('string[%d] (<b>"%s"</b>)', strlen($vInput),$vInput);
    } else if (is_bool($vInput)) {
        $s .= "'>";
        $s .= sprintf('bool (<b>%s</b>)', ($vInput === true ? 'true' : 'false'));
    } else if (is_resource($vInput)) {
        $s .= "'>";
        $s .= sprintf('resource (<b>%s</b>)', get_resource_type($vInput));
    } else if (is_null($vInput)) {
        $s .= "'>";
        $s .= sprintf('null');
    } else if (is_array($vInput)) {
        $s .= "'>";
        $s .= sprintf('array[%d]', count($vInput));
        $s .= "</td></tr>";
        if ($level == 0 || $depth < $level) {
            $s .= "<tr><td style='background: none $bg; text-align: left; border-top: solid 2px black;font-size: ".$font_size."px;'>";
            $s .= "<table border='0' cellpadding='4' cellspacing='0' style='font-size: ".$font_size."px;'>";
            foreach ($vInput as $vKey => $vVal) {
                $s .= '<tr>';
                $s .= "<td style='background-color: $bg; text-align: left;font-size: ".$font_size."px;'>".
                    sprintf('<b>%s%s%s</b>', ((is_int($vKey)) ? '' : '"'), $vKey, ((is_int($vKey)) ? '' : '"')).
                    '</td>';
                $s .= "<td style='background-color: $bg; text-align: left;font-size: ".$font_size."px;'>=></td>";
                $s .= "<td style='background-color: $bg; text-align: left;font-size: ".$font_size."px;'>" .
                    fancy_vardump($vVal, $level, $depth+1) .
                    '</td>';
                $s .= '</tr>';
            }
            $s .= '</table>';
        }
    } else if (is_object($vInput)) {
        $s .= "'>";
        $s .= sprintf('object (<b>%s</b>)', get_class($vInput));
        $s .= "</td></tr>";
        if ($level == 0 || $depth < $level) {
            $s .= "<tr><td style='background: none $bg; text-align: left; border-top: solid 2px black;font-size: ".$font_size."px;'>";
            $s .= "<table border='0' cellpadding='4' cellspacing='0' style='font-size: ".$font_size."px;'>";
            foreach (get_object_vars($vInput) as $vKey => $vVal) {
                $s .= '<tr>';
                $s .= "<td style='background-color: $bg; text-align: left;font-size: ".$font_size."px;'>" .
                    sprintf('<b>%s%s%s</b>', ((is_int($vKey)) ? '' : '"'), $vKey, ((is_int($vKey)) ? '' : '"')) .
                    '</td>';
                $s .= "<td style='background-color: $bg; text-align: left;font-size: ".$font_size."px;'>=></td>";
                $s .= "<td style='background-color: $bg; text-align: left;font-size: ".$font_size."px;'>" .
                    fancy_vardump($vVal, $level, $depth+1) .
                    '</td>';
                $s .= '</tr>';
            }
            $s .= '</table>';
        }
    } else {
        $s .= "'>";
        $s .= sprintf('<b>unhandled (gettype() reports "%s")',
            gettype($vInput));
    }
    $s .= '</td></tr></table>';

    return $s;
}
?>