<div class="l-header">

    <div class="container">

        <div class="row">

            <div class="col-lg-2">

                <a class="l-header__logo" href="/piesne"><img src="/public/img/logo-prekladac-inverse.png"></a>
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