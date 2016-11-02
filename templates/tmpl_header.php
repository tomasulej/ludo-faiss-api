<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?php  echo $meta_title;   ?> </title>



   <meta property="og:title" content="<?php echo $meta_title;  ?>"/>
  <?php if ($meta_audio<>"") { ?> <meta property="og:audio" content="<?php echo $meta_audio;  ?>"/> <?php } ?>

   <meta property="og:site_name" content="ludoslovensky.sk"/>
   <meta property="og:type" content="<?php echo $meta_type ?>" />
   <meta property="og:image" content="<?php  echo $meta_image;   ?>"/>
   <meta property="og:url" content="<?php  echo $meta_url;   ?>"/>
   <meta property="fb:admins" content="686226655"/>
   <meta property="og:description" content="<?php  echo $meta_desc;   ?>"/>
   <meta property="fb:app_id" content="619723681422597"/>



    <script src='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.css' rel='stylesheet' /> 
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.0/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.0.0/dist/leaflet-src.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.0.0/leaflet.markercluster.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.0.0/MarkerCluster.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.0.0/MarkerCluster.Default.css" />
    
 <style>
.supsub {
    display: inline-block;
}

.supsub sup,
.supsub sub {
    position: relative;
    display: block;
    font-size: .5em;
    line-height: 1.2;
}


 </style>



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
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/niklasvh/html2canvas/0.5.0-alpha2/dist/html2canvas.min.js"></script> -->
    
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

            <div class="col-xl-1 col-lg-2 col-xs-4">
                <a class="l-navbar__logo">
                    <img src="/public/img/logo-small-dark.png" height="28">
                </a>
            </div>

            <div class="col-xl-8 col-lg-7 hidden-md-down">
                <menu class="l-navbar__menu">
                    <li <?php echo $prislovia_tab;?>><a href="/prislovia" target="_parent">Príslovia a porekadlá</a></li>
                    <li <?php echo $nadavky_tab;  ?>><a href="/nadavky" target="_parent">Nadávky</a></li>
                    <li <?php echo $piesne_tab;?>><a href="/piesne/" target="_parent">Piesne</a></li>
                    <li><a href="/labs" <?php echo $labs_tab;  ?> target="_parent">Ľudo Labs</a></li>
                </menu>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-8">
                <div class="l-navbar__user">
                    <a href="/o-ludovi.php">O Ľudovi</a>
                    <a class="l-btn l-btn--small l-btn--primary" href="/vyzva">Pridaj sa</a>
                </div>
            </div>

        </div>

    </div>

</div>

