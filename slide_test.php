<?php

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<style>
#mydiv {
	width:200px;
	height:200px;
	border:1px solid #ff0000;
	background-color: #cccccc;
	float:right;
	padding-top:100px;
}
</style>
</head>


<body>

<input type="button" id="button_hide" value="hide">
<input type="button" id="button_show" value="show">

<div id="mydiv">
content here
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
<script src="bootstrap/js/bootstrap-modal.js"></script>
<script type="text/JavaScript" src="bootstrap/js/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script> 
$(document).ready(function(){
	$("#button_hide").click(function () {
		
      $("#mydiv").hide("slide", { direction: "right" }, 500);
	});

	$("#button_show").click(function () {
		
      $("#mydiv").show("slide", { direction: "right" }, 500);
	});
});
</script>
</body>


</html>