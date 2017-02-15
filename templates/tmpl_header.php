<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="<?php echo $meta_desc;?>">

    <title><?php  echo $meta_title;   ?> </title>





<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1364310410299072'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1364310410299072&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->




   <meta property="og:title" content="<?php echo $meta_title;  ?>"/>
  <?php if ($meta_audio<>"") { ?> <meta property="og:audio" content="<?php echo $meta_audio;  ?>"/> <?php } ?>

   <meta property="og:site_name" content="ludoslovensky.sk"/>
   <meta property="og:type" content="<?php echo $meta_type ?>" />
   <meta property="og:image" content="<?php  echo $meta_image;   ?>"/>
   <meta property="og:url" content="<?php  echo $meta_url;   ?>"/>
   <meta property="fb:admins" content="686226655"/>
   <meta property="og:description" content="<?php  echo $meta_desc;   ?>"/>
   <meta property="fb:app_id" content="619723681422597"/>


    <script id="facebook-jssdk" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&amp;appId=1402931466605062&amp;version=v2.0"></script>
    <script src='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.css' rel='stylesheet' /> 
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.0/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.0.0/dist/leaflet-src.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.0.0/leaflet.markercluster.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.0.0/MarkerCluster.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.0.0/MarkerCluster.Default.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.3/js.cookie.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js?hl=sk'></script>



	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1402931466605062&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" integrity="sha384-MIwDKRSSImVFAZCVLtU0LMDdON6KVCrZHyVQQj6e8wIEJkW4tvwqXrbMIya1vriY" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/public/css/style.css">

  
    <!-- jQuery first, then Bootstrap JS. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-575ac8e6862d0152"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-575ac8e6862d0152"></script>
    <script type="text/javascript" src="/public/js/ludo.js"></script>


    <!-- <style>
        .l-h {display:none;}
    </style> -->


    <!-- Exponea -->
    <script>(function(d,b){if(!d.exponea){var a=function(a,g){function k(c){return function(){var e=arguments;""==a&&"initialize"==c&&e&&e[0].modify&&e[0].modify.overlay&&"loading"==b.readyState&&(b.write('<div id="__inf__overlay__" style="position:absolute;background:#fff;left:0;top:0;width:100%;height:100%;z-index:1000000"></div>'),setTimeout(function(){var a=b.getElementById("__inf__overlay__");a&&b.body.removeChild(a);res.__=!0},e[0].modify.delay||500));d.exponea._.push([a+c,arguments])}}var h=g.split(" "),f,c;res={_:[]};for(c=0;c<h.length;c++)f=h[c],res[f]=k(f);return res};d.exponea=a("","initialize identify update track trackLink trackEnhancedEcommerce getHtml showHtml showBanner showForm ping getAbTest");d.exponea.notifications=a("notifications.","isAvailable isSubscribed subscribe unsubscribe");var a=b.createElement("script"),g="https:"===b.location.protocol?"https:":"http:";a.type="text/javascript";a.async=!0;a.src=g+"//api.exponea.com/js/exponea.min.js";b.getElementsByTagName("head")[0].appendChild(a)}})(window,document);</script>
    <script type="text/javascript">
        exponea.initialize({
            "token": "7b7dc456-eeab-11e6-884f-141877340e97",
            "track": {
                "visits": true
            },
            "modify": {
                "enabled": true,
                "overlay": false,
                "delay": 500
            }
            //, customer: window.loggedInCustomer // replace window.loggedInCustomer with id of your web site customer, e.g. "john.smith@gmail.com"
        });
    </script>



    <!-- Hotjar Tracking Code for www.ludoslovensky.sk -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:406573,hjsv:5};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

    <!-- Optimazely -->

    <script src="https://cdn.optimizely.com/js/8230584952.js"></script>



</head>
<body class="<?php echo $theme;?>">

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

