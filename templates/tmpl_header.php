<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="<?php echo $meta_desc;?>">

    <title><?php  echo $meta_title;   ?> </title>



    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=151297594883274';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WTG8BZM');</script>
    <!-- End Google Tag Manager -->





   <meta property="og:title" content="<?php echo $meta_title;  ?>"/>
  <?php if ($meta_audio<>"") { ?> <meta property="og:audio" content="<?php echo $meta_audio;  ?>"/> <?php } ?>

   <meta property="og:site_name" content="ludoslovensky.sk"/>
   <meta property="og:type" content="<?php echo $meta_type ?>" />
   <meta property="og:image" content="<?php  echo $meta_image;   ?>"/>
   <meta property="og:url" content="<?php  echo $meta_url;   ?>"/>
   <meta property="fb:admins" content="686226655"/>
   <meta property="og:description" content="<?php  echo $meta_desc;   ?>"/>
   <meta property="fb:app_id" content="619723681422597"/>


<style>
.dlog { display:none; background:lightblue; position:absolute; top: 50%; left: 50%; width:30%; padding:10px;
        transform: translate(-50%,-50%); z-index:9; }
.abc svg {  display: block; cursor: pointer; }
.ewd svg {  }
</style>
<script src="/public/js/abc2svg-1.js"></script>
<script src="/public/js/xmlplay_emb.js"></script>

<!-- AdSense -->
<script data-ad-client="ca-pub-5853905332483717" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


<!-- GDPR -->

<script src="https://cc.cdn.civiccomputing.com/9/cookieControl-9.x.min.js"></script>
<script>
    var config = {
        apiKey: '4a7cdce2e1b58e956b914628954e0073cf545033',
        product: 'COMMUNITY',
        optionalCookies: [
            {
                    name: 'marketing',
                    label: 'Marketing',
                    description: '',
                    cookies: [],
                    onAccept : function(){},
                    onRevoke: function(){}
                }
        ],

        position: 'RIGHT',
        theme: 'DARK'
    };
    
    CookieControl.load( config );
</script>




    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" integrity="sha384-MIwDKRSSImVFAZCVLtU0LMDdON6KVCrZHyVQQj6e8wIEJkW4tvwqXrbMIya1vriY" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/public/css/style.css">

  
    <!-- jQuery first, then Bootstrap JS. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-575ac8e6862d0152"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-575ac8e6862d0152"></script>
    <script type="text/javascript" src="/public/js/ludo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.3/js.cookie.min.js"></script>


<!--Mapy -->

    <script src='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.0/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.0.0/dist/leaflet-src.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.0.0/leaflet.markercluster.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.0.0/MarkerCluster.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.0.0/MarkerCluster.Default.css" />


</head>

<body class="<?php echo $theme;?>">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTG8BZM"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->



<div class="l-navbar">



    <div class="container">
<!--
        <menu class="switch hidden-md-down">
            <li><a class="switch-blue"></a></li>
            <li><a class="switch-green"></a></li>
            <li><a class="switch-red"></a></li>
            <li><a class="switch-yellow"></a></li>
        </menu>
-->
        <div class="row">

            <div class="col-xl-1 col-lg-2 col-xs-5">
                <a class="l-navbar__logo" href="/">
                    <img src="/public/img/logo-small-dark.png" height="28">
                </a>

                <span class="hidden-sm-up">
                    <a class="btn-burger" id="burger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bars" style=""></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="burger">
                                            <a class="dropdown-item" href="/piesne">Piesne</a>

                        <a class="dropdown-item" href="/prislovia">Príslovia a porekadlá</a>
                        <a class="dropdown-item" href="/nadavky/slovnik.php">Nadávky</a>
                        <a class="dropdown-item" href="/labs">Ľudo Labs</a>
                    </div>
                </span>





            </div>

            <div class="col-xl-8 col-lg-7 hidden-md-down">
                <menu class="l-navbar__menu">
                                    <li <?php echo $piesne_tab;?>><a href="/piesne/" target="_parent">Piesne <span class="tag tag-default tag-pill">NOVÉ</span></a> </li>

                    <li <?php echo $prislovia_tab;?>><a href="/prislovia" target="_parent">Príslovia a porekadlá</a></li>
                    <li <?php echo $nadavky_tab;  ?>><a href="/nadavky/slovnik.php" target="_parent">Nadávky</a></li>
                    <li <?php echo $labs_tab;  ?>><a href="/labs" target="_parent">Ľudo Labs</a></li>

                </menu>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-7">
                <div class="l-navbar__user">
                    <a href="/o-ludovi.php">O Ľudovi</a>
                    <a class="l-btn l-btn--small l-btn--primary" href="/vyzva">Pridaj sa</a>
                </div>
            </div>

        </div>

    </div>

</div>

