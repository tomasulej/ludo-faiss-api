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
	    	<svg class='chart'>
	    	</svg>
		</div>
		<div id = 'buttons'>
		</div>



