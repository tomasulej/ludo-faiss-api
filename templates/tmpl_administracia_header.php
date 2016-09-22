<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Pridávanie piesní do Ľuda Slovenského</title>

    <!-- Bootstrap core CSS -->

<link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css" integrity="sha384-XXXXXXXX" crossorigin="anonymous">
<link rel="stylesheet" href="/public/css/style.css">
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" integrity="sha384-XXXXXXXX" crossorigin="anonymous"></script>
<script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>

  </head>

  <body class="l-theme-blue">

<div class="l-navbar">

    <div class="container">



        <div class="row">

            <div class="col-xl-1 col-lg-2 col-xs-4">
                <a class="l-navbar__logo">
                    <img src="/public/img/logo-small-dark.png" height="28">
                </a>
            </div>



        </div>

    </div>

</div>

<div class="l-header">
<div class="container"><div class="row">
  <div class="l-header__info">

        <h1><?php echo $nadpis ?></h1>
<p>
  <a href="index.php">Výber piesne</a> ->
  <a href="01_meta.php?id_piesen=<?php echo $id_piesen;?>">1. Základné informácie</a> ->
  <a href="02_subory.php?id_piesen=<?php echo $id_piesen;?>">2. Súbory</a> ->
  <a href="03_abc.php?id_piesen=<?php echo $id_piesen;?>">3. Texty a noty</a> ->
  <a href="04_crop.php?id_piesen=<?php echo $id_piesen;?>">4. Náhľad</a> 
  <a href="05_prepojenia.php?id_piesen=<?php echo $id_piesen;?>">4. Prepojenia a poznámky</a> 
  
</p>  



</div>
</div>
</div>
</div>