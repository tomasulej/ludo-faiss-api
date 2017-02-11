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