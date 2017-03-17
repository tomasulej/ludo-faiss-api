<?php
$id_piesen=$_GET['id_piesen'];

?>


<!DOCTYPE html>
<html lang='en'>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">

    <script type='text/javascript' src="/public/js/d3.min.js" charset="utf-8"></script>
	<script type='text/javascript' src="/public/js/jquery-1.12.4.min.js" charset="utf-8"></script>
	<script type='text/javascript' src="/public/js/bootstrap.min.js" charset="utf-8"></script>
	<link rel='stylesheet' type='text/css' href='/public/js/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='style.css'>
	<title>Kontúra melódie</title>
</head>
<body>
	<center>
		<div class = 'container'>
	    	<svg class='chart'>
	    	</svg>
		</div>
		<div id = 'buttons'>
		</div>
	</center>
</body>

<script type="text/javascript">
	json_file='json_piesen_contour.php?id_piesen=<?php echo $id_piesen; ?>';
</script>

<script type='text/javascript' src='/piesne/analyze/script.js'></script>
</html>

