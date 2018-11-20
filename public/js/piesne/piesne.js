function lyrics_vyznac_zmeny(id2) {
    
    $( "#lyrics_2" ).load( "http://localhost:8888/piesne/piesen.lyrics.php?id_piesen="+id2);


    var a = $('#lyrics_vnutro').html();
    var b = $('#lyrics_vnutro').html();
    var result = $('#lyrics_vnutro');
    


    var diff = JsDiff.diffChars(a, b);
	var fragment = document.createDocumentFragment();
	for (var i=0; i < diff.length; i++) {

		if (diff[i].added && diff[i + 1] && diff[i + 1].removed) {
			var swap = diff[i];
			diff[i] = diff[i + 1];
			diff[i + 1] = swap;
		}

		var node;
		if (diff[i].removed) {
			node = document.createElement('del');
			node.appendChild(document.createTextNode(diff[i].value));
		} else if (diff[i].added) {
			node = document.createElement('ins');
			node.appendChild(document.createTextNode(diff[i].value));
		} else {
			node = document.createTextNode(diff[i].value);
		}
		fragment.appendChild(node);
	}

	result.textContent = '';
	result.html(fragment.html());
}
