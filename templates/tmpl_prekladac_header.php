<div class="l-header">

    <div class="container">

        <div class="row">

            <div class="col-lg-2">

                <a class="l-header__logo" href="/prekladac"><img src="/public/img/logo-prekladac-inverse.png"></a>
            </div>

            <div class="col-lg-1 l-header__links">

            </div>



            <div class="col-lg-9">

                <form action="" method="get" id="prekladac">

                    <div class="input-group">
                        <input type="text" class="form-control" name="url" placeholder="http://www.ludoslovensky.sk" <?php echo ($url)?"value='$url'":""; ?>>
                        <span class="input-group-btn">
                    <button class="btn btn-secondary l-btn l-btn--inverse" type="button" onclick="$( '#prekladac' ).submit();">Surfuj ako Štúr!</button>
                </span>
                    </div>

                </form>


            </div>

        </div>

    </div>

</div>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#url" ).autocomplete({
      source: availableTags
    });
  } );
  </script>