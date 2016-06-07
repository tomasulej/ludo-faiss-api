<?
include "databaza.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Tomáš Ulej">

    <!-- CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 30px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
      
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.js"></script>


</head>

<body>



    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Slovenské príslovia</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="#">Domov</a></li>
              <li><a class="active">Celá zbierka</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


<header class="jumbotron subhead">
  <div class="container">
    <h1>Človek, jeho vek, pohlavie, rodina a domovina</h1>
    <p class="lead">O človeku, jeho živote. Radí ľud slovenský</p>
  </div>
</header>



      <div class="row">
        <div class="span4"> <div class="sidebar-nav affix-top" data-spy="affix" data-offset-bottom="-200">
            <ul class="nav nav-tabs nav-stacked" >
              <li class="nav-header">Obsah</li>
              <?
              	$q=mysql_query("SELECT * FROM pr_kategorie WHERE parent_id=$id");
              	while ($kapitola=mysql_fetch_object($q)) {
                   	printf("<li><a href='#kapitola_%s'>%s</a>",$kapitola->id, $kapitola->txt);
                }
              ?>             
            </ul>
          </div></div><!--/.well -->

 
        <div class="span8">
        
        
          <div class="row-fluid">
          
          
          <a href="#"id="example" class="btn btn-danger" rel="popover" data-content="It's so simple to create a tooltop for my website!" data-original-title="Twitter Bootstrap Popover">hover for popover</a> 
          
          
          
<table>
<tr><td width="50px"></td><td>Ženská práca skrytá, ale sýta.</td></tr>
<tr><td></td><td><span id="prislovie_172">Ženská robota a ženská reč nemá konca.</span></td></tr>
<tr><td></td><td>Chlapi osve a biele osve! – Biela pohlava.</td></tr>
</table>
<H4><span style="text-transform:uppercase">Žena, ženský</span></H4>
<table>
<tr><td width="50px"></td><td>Ani to čert nevymyslí, čo má žena v svojej mysli.</td></tr>
<tr><td></td><td>Boli tam ľudia aj ženy.</td></tr>
<tr><td></td><td>Čert všetko vie, len o ženskej ocieľke nie.</td></tr>
<tr><td><code>175</code></td><td>Kam chlap nemôže, dôjde žena.</td></tr>
<tr><td></td><td>Kde husi, tam gag; kde ženy, tam jak.</td></tr>
<tr><td></td><td>Keď žena hvízda, sedem kostolov sa trasie.</td></tr>
<tr><td></td><td>Medzi ženami požehnaný!</td></tr>
<tr><td></td><td>Nemca neprepiješ, ženu neprevedieš.</td></tr>
<tr><td><code>180</code></td><td>Nemca neprepiješ, ženu neoklameš.</td></tr>
<tr><td></td><td>Ranný dážď, ženský plač, panská láska a aprílová chvíľa – to všetko na zajačom chvoste visí.</td></tr>
<tr><td></td><td>Vadia sa strigy o list, ženy o svoje pletky.</td></tr>
<tr><td></td><td>Žena, ak nemá čo robiť, nech pára a znovu šije.</td></tr>
<tr><td></td><td>Žena má deväťdesiatdeväť fortieľov a štyri defekty.</td></tr>
<tr><td><code>185</code></td><td>Žena o tom mlčí, o čom nevie.</td></tr>
<tr><td></td><td>Ženská práca skrytá, ale sýta.</td></tr>
<tr><td></td><td>Ženská robota a ženská reč nemá konca.</td></tr>
<tr><td></td><td>Chlapi osve a biele osve! – Biela pohlava.</td></tr>
</table>







          </div><!--/row-->
        </div><!--/span-->
      </div>


      <footer>
        <p>&copy; Company 2013</p>
      </footer>




  </body>
</html>
