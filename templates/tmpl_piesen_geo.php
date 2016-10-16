<?php

include $_SERVER["DOCUMENT_ROOT"]."/piesne/lib.piesne.php";

require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
?>

<div class="l-page">

    <div class="container">

        <div class="l-song">

            <div class="row">

                <div class="col-md-12">
<input class="typeahead">


                </div>
            </div>
        </div>
    </div>
</div>

<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"; ?>



<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>


    
<script src="http://wim.vree.org/js/abc2svg-1.js"></script>
<script src="http://wim.vree.org/js/abcweb-min.js"></script>
<script src="http://wim.vree.org/js/xml2abc-min.js"></script>
<script src="http://wim.vree.org/js/xml2abc-min.js"></script>
<script src="/public/js/abcjs_basic_2.3-min.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-575ac8e6862d0152"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

<script>
// Instantiate the Bloodhound suggestion engine
var movies = new Bloodhound({
  datumTokenizer: function(datum) {
    return Bloodhound.tokenizers.whitespace(datum.value);
  },
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  remote: {
    wildcard: '%QUERY',
    url: 'http://www.freemap.sk/api/0.1/q/%QUERY',
    transform: function(response) {
      // Map the remote source JSON array to a JavaScript object array
      return $.map(response.results, function(movie) {
        return {
          value: movie.name
        };
      });
    }
  }
});

// Instantiate the Typeahead UI
$('.typeahead').typeahead(null, {
  display: 'value',
  source: movies
});
</script>


</body>
</html>