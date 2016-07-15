<html>
    <head>
        <title>Freq wordcloud (c) Tomáš Ulej & D3 JS</title>
        <meta charset="UTF-8">
        <script src="http://d3js.org/d3.v3.min.js"></script>
		<script src="d3.layout.cloud.js"></script>
             <script type="text/javascript" src="wordcloud_happiness_csv.php?id=<?php echo $_GET['id'];?>&count=<?php echo $_GET['count']?>&utvary=<?php echo $_GET['utvary'];?>"></script>

    </head>
    <body style='overflow:hidden'>
    <div style="text-align:left"><a href="javascript:void(0)" onclick="location.reload();"><img width="12px" src="refresh_icon.png"></a></div>
	    
	    <div id="vis"></div><script type="text/javascript" src="word-cloud.js"></script></body>
</html>
