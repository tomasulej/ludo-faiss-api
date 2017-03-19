<?php
	$arrPiesen=$_GET['id_piesen'];


?>


<script type="text/javascript">
	json_file='/piesne/analyze/json_piesen_contour.php?arrPiesen=<?php echo $arrPiesen; ?>';
</script>

    <script type='text/javascript' src="/public/js/d3.min.js" charset="utf-8"></script>
    <link rel='stylesheet' type='text/css' href='/piesne/analyze/style.css'>
	<script type='text/javascript' src='/piesne/analyze/script.js'></script>
		<div class = 'container'>
		<p class="popis"><small>Prvá redakcia zbierky Slovenské spevy urobila v melódii tejto piesne zmeny oproti originálu, ktorý jej zaslal pôvodný zberateľ. Ladislav Galko, autor druhého vydania Slovenských spevov, preskúmal a porovnal originál piesne s publikovanou verziu a zaznamenal zmeny. Ak chcete zobraziť celú pieseň tak, ako ju zverejnila prvá redakcia, <a class="contour-url" href="">kliknite sem</a>.</small></p>

	    	<svg class='chart'>
	    	</svg>

			<div id = 'legend' class="row"></div>
		</div>



