//exponea functions

function track_page_visit () {
    exponea.track('page_visit', {});
}


function track_item_visit (id, name, type, preview_url) {
    exponea.track('item_visit', {
        id: id,
        name: name,
        type: type,
        preview_url: preview_url
    });


}


function track_item_play (id, name, type, preview_url) {
    exponea.track('item_play', {
        id: id,
        name: name,
        type: type,
        preview_url: preview_url
    });


}


function track_item_download (id, name, type, preview_url, file_extension) {
    exponea.track('item_download', {
        id: id,
        name: name,
        type: type,
        preview_url: preview_url,
        file_extension: file_extension
    });
    return true;
}

function track_item_know (id, name, type, preview_url) {
    exponea.track('item_know', {
        id: id,
        name: name,
        type: type,
        preview_url: preview_url
    });
    return true;
}

function track_subscribe(email) {
    if ((grecaptcha.getResponse() != '') && (email != '')) {
        exponea.identify(email);
        exponea.update({email: email});
        alert("Vďaka Ti neskutočná za pridanie. Ľudo Ti bude písať. Pre odhlásenie len v e-maili na odkaz klikni.");
    } else {
        alert("Ba som ti, čosi nedobre: e-mail si zadal(a)? Že nie si robot, odklikol/odklikla? Nože ešte raz skontroluj a znova sem ťukni!");
    }


}




/* function lyrics_zobrazit_skryte(co) {
  if (co==true) {

      $('.l-h').show();
      $('.l-v').hide();

  } else {

      $('.l-h').hide();
      $('.l-v').show();

  }

} */

