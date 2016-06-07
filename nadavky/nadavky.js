function ZobrazVysledok() {
  par = Form.serialize('fTxt');
  $('riesenie').show();
  $('riesenie').innerHTML="<img src='ajax.gif'>";
  var ajax = new Ajax.Updater(
      'riesenie',
      'ludevit.old.php',
	    {
        method: 'post',
        parameters: par,
        asynchronous:true
			});
  		$('divText').hide();
	    $('riesenie').show();
}

function ZobrazFormular() {
  $('riesenie').innerHTML = '';
	$('riesenie').hide();
  $('divText').show();
}

function Taby(stav) {
	if (stav==1) {
    $('forma1').show();
		$('divText').hide();
		$('riesenie').hide();
		$('emailom').hide();
		$('emailom_status').hide();
		$('o-projekte').hide();
		$('preklady').innerHTML="<img src='ajax.gif'>";
		var ajax = new Ajax.Updater(
	      'preklady',
        'posledne-zadania.php?akcia=url');
  } else if (stav==2) {
    $('divText').show();
    $('forma1').hide();
		$('riesenie').hide();
		$('preklady').innerHTML="<img src='ajax.gif'>";
		$('emailom').hide();
		$('emailom_status').hide();
    $('o-projekte').hide();
		var ajax = new Ajax.Updater('preklady', 'posledne-zadania.php?akcia=text',{asynchronous:true});
  
  } else if (stav==3) {
    $('divText').hide();
    $('forma1').hide();
    $('riesenie').hide();
    $('emailom').show();
    $('emailom_status').hide();
    $('o-projekte').hide();
    $('preklady').innerHTML="EäTE SA DOR¡BA";
  } else if (stav==4) {
    $('o-projekte').show();
    $('divText').hide();
    $('forma1').hide();
    $('riesenie').hide();
    $('emailom').hide();
    $('emailom_status').hide();
    $('preklady').innerHTML="EäTE SA DOR¡BA";
  }
}
function TextVloz(id) {
    var url = 'nacitaj-preklad.php?akcia=text&id='+id; 
    vyries=false;
    if (Element.visible('divText')==false) {
        $('divText').show();
        $('riesenie').hide();
        vyries=true;
    } 
        
        $('txt_txt').disable();
        new Ajax.Request(url, {
           method: 'get',
           onSuccess: function(transport) {
                  $('txt_txt').enable();
                  document.getElementById('txt_txt').value = transport.responseText;
              if (vyries) ZobrazVysledok();
           },
           onFailure: function(){ 
              $('txt_txt').enable();
              $('submit_txt').enable(); 
              alert('Doölo ku pochibenju, noûe kontaktujùe LudevÌtovÌch spr·vcov. œakujeme!');
      }
    });
    
}


function UrlVloz(text) {
  document.getElementById("txt_url").innerHTML=text;
}

function EmailOdosli(nahlad) {
	par = Form.serialize('fmail');
  $('emailom_status').show();
  $('emailom_status').innerHTML="<img src='ajax.gif'>";
  var ajax = new Ajax.Updater(
      'emailom_status',
      'posli-emailom.php?nahlad='+nahlad,
	    {
        method: 'post',
        parameters: par,
        asynchronous:true
			});

}






