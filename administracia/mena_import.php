<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Piesen->Piesne->Sql</title>

    <!-- Bootstrap core CSS -->

<link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css" integrity="sha384-XXXXXXXX" crossorigin="anonymous">
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" integrity="sha384-XXXXXXXX" crossorigin="anonymous"></script>
<script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>


<script type="text/javascript">

function  posli_prepojenie(id) { 
    //$('#slova_stats').empty().append("Načítavam!");
    //var $form = $( this ),
	var piesen_id = $('#piesen'+id).val(),
	meno_id = $('#meno_id').val(),
    url = 'ajax_mena_pridat-prepojenie.php';
 
  //alert(text);
  // Send the data using post
  var posting = $.post( url, { piesen_id: piesen_id, meno_id: meno_id } );
 
 
  // Put the results in a div
  posting.done(function( data ) {
    //alert(data);
    $('#vysledok_'+id).empty().append(data);
 
  });

}

function  posli_meno(id) { 
    //$('#slova_stats').empty().append("Načítavam!");
    //var $form = $( this ),
	var meno = $('#meno').val(),
    pohlavie = $('#pohlavie:checked').val();
    url = 'ajax_mena_pridat.php';
 
  //alert(text);
  // Send the data using post
  var posting = $.post( url, { meno: meno, pohlavie: pohlavie } );
 
 
  // Put the results in a div
  posting.done(function( data ) {
    //alert(data);
    $('#vysledok_'+id).empty().append(data);
 
  });

}

function  hotovo() { 
    //$('#slova_stats').empty().append("Načítavam!");
    //var $form = $( this ),

    url = 'ajax_mena_update-file.php';
 
  //alert(text);
  // Send the data using post
  var posting = $.post( url );
 
 
  // Put the results in a div
  posting.done(function( data ) {
    //alert(data);
    //$('#vysledok_'+id).empty().append(data);
    location.reload();
  });

}



</script>





  </head>

  <body>
    <div class="container">


      <div class="page-header">
        <h1>Mená (import)</h1>
      </div>

<HR>

<?php

function multiExplode($delimiters,$string) {
    return explode($delimiters[0],strtr($string,array_combine(array_slice($delimiters,1),array_fill(0,count($delimiters)-1,array_shift($delimiters)))));
}

$tmpl_form='  <div class="form-group row">
    <label for="%s" class="col-sm-2 form-control-label">%s</label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="%s" name="%s" value=%s>

      %s
    </div>
    <div class="col-sm-2" id="vysledok_%s">
      <button onclick="javascript:%s(\'%s\')">Pridať</button>
    </div>


  </div>';


$tmpl_form_pohlavie='<label class="radio-inline"><input type="radio" name="pohlavie" id="pohlavie" value="1" checked>muž</label>
<label class="radio-inline"><input type="radio" name="pohlavie" id="pohlavie" value="2"> žena</label>';


	include "../databaza_piesne.php";

	error_reporting(E_ALL);
	ini_set('display_errors', '1');


    $retazec = fgets(fopen("mena_import.txt", 'r'));
    
    //$retazec="Janko: I 232, 322; II 333; D 23, 22, 32, 42";

    $pocet=count(file("mena_import.txt"));
    //echo $pocet;

    $percento=100-round(($pocet/446)*100);

    echo "<h2>$retazec <small>$percento percent hotovo</H2><HR>";

    $a_retazec=multiExplode(array(",",";",":","."),$retazec);
   $mam_meno=false;

    foreach ($a_retazec as &$w) {
        if (is_numeric($w)==false)  {




            if (strrpos($w," ")==false) {

                if ($mam_meno==false) {
                    //echo "Našiel som meno:".$w."<BR>";
                    printf($tmpl_form,"meno","<b>Meno:</b>","meno","meno",$w, $tmpl_form_pohlavie, $w,"posli_meno",$w);
                    $mam_meno=true;
                    
                } else { 
                    $zb_b=$w;
            //echo "Zbierka: ".$zb_a." Číslo: ".$w."<BR>";
                $q=mysql_query("select * from piesne WHERE identifikator='".$zb_a." ".$zb_b."';");
                $o_p=mysql_fetch_object($q);
                printf($tmpl_form,"piesen".$zb_a.$zb_b,"Zbierka:$zb_a->$zb_b","piesen".$zb_a.$zb_b,"piesen".$zb_a.$zb_b,$o_p->id_piesen,"",$zb_a.$zb_b,"posli_prepojenie",$zb_a.$zb_b);



                 }



            } else {
                $a_zb=explode(" ",$w);
                //print_r($a_zb);
                $zb_a=$a_zb[1];
                $zb_b=$a_zb[2];
                //echo "Zbierka: ".$zb_a." Číslo: ".$zb_b."<BR>";
                $q=mysql_query("select * from piesne WHERE identifikator='".$zb_a." ".$zb_b."';");
                $o_p=mysql_fetch_object($q);
                printf($tmpl_form,"piesen".$zb_a.$zb_b,"Zbierka:$zb_a->$zb_b","piesen".$zb_a.$zb_b,"piesen".$zb_a.$zb_b,$o_p->id_piesen,"",$zb_a.$zb_b,"posli_prepojenie",$zb_a.$zb_b);

                //
       
       
        }}

        else {
            $zb_b=(int)$w;
            //echo "Zbierka: ".$zb_a." Číslo: ".$w."<BR>";
                $q=mysql_query("select * from piesne WHERE identifikator='".$zb_a." ".$zb_b."';");
                $o_p=mysql_fetch_object($q);
                printf($tmpl_form,"piesen".$zb_a.$zb_b,"Zbierka:$zb_a->$zb_b","piesen".$zb_a.$zb_b,"piesen".$zb_a.$zb_b,$o_p->id_piesen,"",$zb_a.$zb_b,"posli_prepojenie",$zb_a.$zb_b);


            //
            }     
        }    
       

    
    



//print_r($a_retazec);

?>	  
	  
 
<button class="btn btn-primary" onclick="hotovo()">HOTOVO</button>
	  
	  
<!-- <div class="form-group row">	  
  <fieldset class="form-group">
    <label for="sql">Sql príkaz:</label>
    <textarea class="form-control" id="sql" name="sql" rows="5"></textarea>
  </fieldset>
</div>  
 

<input type="hidden" name="odoslane" value="true">



	  
  <div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Odoslať</button>
    </div>
  </div>
</form>




    </div>  /container -->



  </body>
</html>

