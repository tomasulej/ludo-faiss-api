<script>
window.onerror = function(msg) {
    alert("window error: msg");
    return false
};
var errtxt = "",
    new_page = "",
    abc,
    play,
    abcplay,
    a_src = [],
    a_pe = [];
var user = {
    errmsg: function(msg, l, c) {
        errtxt += clean_txt(msg) + "\n"
    },
    img_out: function(str) {
        new_page += str
    },
    page_format: false,
    imagesize: '100%'
};


function compare_vysviet_div(div_id) {
    var page = document.getElementById( div_id ).innerHTML;

    user.get_abcmodel = function(tsfirst, voice_tb, music_types, info) {
        if (play == 2)
            abcplay.add(tsfirst, voice_tb)
    };


    var i = 0,
        j,
        k,
        res,
        src,
        seq = 0,
        re = /\n%abc|\nX:/g,
        re_stop = /\n<|\n%.begin/g;
    abc = new Abc(user);



    for (;;) {
        res = re.exec(page);
        if (!res)
            break;
        j = re.lastIndex - res[0].length;
        new_page += page.slice(i, j);
        re_stop.lastIndex = ++j;
        while (1) {
            res = re_stop.exec(page);
            if (!res || res[0] == "\n<")
                break;
            k = page.indexOf(res[0].replace("begin", "end"), re_stop.lastIndex);
            if (k < 0)
                break;
            re_stop.lastIndex = k
        }
        if (!res || k < 0)
            k = page.length;
        else
            k = re_stop.lastIndex - 2;
        src = page.slice(j, k);
        if (play) {
            new_page += '<div onclick="playseq(' + a_src.length + ')">\n';
            a_src.push(src)
        }
        try {
            abc.tosvg("abcemb", src)
        } catch (e) {
            alert("abc2svg javascript error: " + e.message + "\nStack:\n" + e.stack)
        }
        if (errtxt) {
            i = page.indexOf("\n", j);
            i = page.indexOf("\n", i + 1);
            alert("Errors in\n" + page.slice(j, i) + "\n...\n\n" + errtxt);
            errtxt = ""
        }
        if (play)
            new_page += "</div>\n";
        i = k;
        if (k >= page.length)
            break;
        re.lastIndex = i
    }
    user.img_out = null;
    try {
        document.getElementById( div_id ).innerHTML = new_page + page.slice(i)
    } catch (e) {
        alert("abc2svg bad generated SVG: " + e.message + "\nStack:\n" + e.stack)
    }
}





</script>



<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

 include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";
 require_once $_SERVER["DOCUMENT_ROOT"]."/piesne/lib.piesne.php";
 
 
 
 $getPiesen=$_GET['arrPiesen'];
 $arrPiesen=explode("-",$getPiesen);


foreach ($arrPiesen as $key=>$idPiesen) {
    if (!empty($idPiesen)) {$mysqlPiesen.="id_piesen=$idPiesen OR ";}     
}   
$mysqlPiesen=preg_replace('/OR $/', '', $mysqlPiesen); 

$q=mysql_query("SELECT * FROM piesne WHERE $mysqlPiesen;");
$pocet=mysql_num_rows($q);
$pocitadlo=0;

while ($piesen=mysql_fetch_object($q)) {
    $lyricsy[]=$piesen->lyrics;
$melodie.=sprintf('
<div class="col-md-%s"><h2>%s</h2>
<div id="noty_%s" class="abc">
%s
</div>
<script>compare_vysviet_div("noty_%s");</script>
</div>', 
round(12/$pocet),
($piesen->id_nadriadeny<>0)?"Variant":"Originál",
$pocitadlo,
js2abc($piesen->abc_notes),
$pocitadlo);


$texty.=sprintf('
<div class="col-md-%s"><h2>%s</h2>
<div id="lyrics_%s">   
%s
</div>
</div>', 
round(12/$pocet),
($piesen->id_nadriadeny<>0)?"Variant":"Originál",
$pocitadlo,
($pocitadlo==0)?cleanlyrics_full($piesen->lyrics):cleanlyrics_full_diff($lyricsy[0],$piesen->lyrics));






    $pocitadlo++;



}
?>


<p>Lorem ipsum</p>



<div id="accordion" role="tablist" aria-multiselectable="true">
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Porovnať melódie piesní
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
      <div class="card-block">
        
        <?php echo $melodie ?>

      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Porovnať texty piesní
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
        <?php echo $texty; ?>

      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Zmeny v melódii na grafe
        </a>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="card-block" id="contour_div">

      </div>
    </div>
  </div>
</div>


<script>
    $('#contour_div').load('http://www.ludoslovensky.sk/piesne/analyze/contour.php?arrPiesen=<?php echo $arrPiesen?>&id_piesen=<?php echo $_GET["id_piesen"]?>');

</script>