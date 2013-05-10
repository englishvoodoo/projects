<?php
// views/page_footer.php

require_once('classes/Settings.php');

$Settings = new Settings();
$Settings->setUserId(1);	// obviously should be dynamic...
$display_settings = $Settings->getDisplaySettings();

//var_dump($display_settings);
if($display_settings['right_panel'] == 'show') {
	$right_panel_display = 'block';
} else {
	$right_panel_display = 'none';
}
?>

		</div><!--/span-->
    </div><!--/row-->

</div> <!-- end of CONTAINER div -->


 <style>
#panel_right {
	width:180px;
	height:500px;
	border:1px solid #ccc;
	background-color: #eee;
	float:right;
	padding:10px;
	top:44px;
	position: absolute;
	display:<?php echo $right_panel_display;?>;
	overflow: scroll;
}
</style>
<div id="panel_right">
	<?php include('views/panels/right.php');?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
<script src="bootstrap/js/bootstrap-modal.js"></script>
<script type="text/JavaScript" src="bootstrap/js/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script>

$.ajaxSetup ({  
        cache: false  
});  
var ajax_load = "<img src='bootstrap-modal-master/img/ajax-loader.gif' alt='loading...' />";

function populateTask(task_id, project_id) {

	
	var loadUrl = "index.php?route=ajax&sub=content&content=edit_task&task_id="+task_id+"&project_id="+project_id;  
          
    $("#EditTaskModal").html(ajax_load).load(loadUrl);  

    
}
</script>

<script> 
$(document).ready(function(){

	doc_width = $(document).width();

	$('#panel_right').css({ left: doc_width - 204});

	$("#button_hide").click(function () {
		$("#panel_right").hide("slide", { direction: "right" }, 500);

		// ajax call to hide the panel for this user
		$.ajax({
		  url: "index.php?route=ajax&sub=call&action=right_panel_hide",
		  context: document.body
		}).done(function() {
		 // alert("done");
		});
	});

	$("#button_show").click(function () {
		$("#panel_right").show("slide", { direction: "right" }, 500);

		// ajax call to show the panel for this user

		$.ajax({
		  url: "index.php?route=ajax&sub=call&action=right_panel_show",
		  context: document.body
		}).done(function() {
		//  alert("done");
		});

	});

});
</script>

<script>

$(document).ready(function() {

 

  	

  	//var topic = $("#topic").val();
  	var topic = 'uk';

  	

    $.getJSON('external/bbc_client.php?topic='+topic,function(data){

    	//alert(data.stories[1].title);

    	//alert(data.stories.length);

    	$('#content').empty();

    	for (var i = 0, len = data.stories.length; i < len; i++) {
    	//for (var i = 0, len = data.stories.length; i < 5; i++) {
            
            var title = data.stories[i].title;
            var description = data.stories[i].description;
            var link = data.stories[i].link;
            var thumbnail = data.stories[i].thumbnail;

            html_title = "<p>"+title+"</p>";
            html_description = "<p><small>"+description+"</small></p>";
            html_link = "<p><small><a href='"+link+"' target='_blank'>full story...</a></small></p>";
            html_thumbnail = "<p><img src='"+thumbnail+"'></p>";

            $('#content').append(html_title);
            $('#content').append(html_thumbnail);
            $('#content').append(html_description);
            $('#content').append(html_link);
            $('#content').append('<hr>');

        }

        $('#element').val('get news');
       
    						   
	});



   	return false;

  });



</script>
</body>
</html>