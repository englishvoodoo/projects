<?php
// views/page_footer.php
?>

		</div><!--/span-->
    </div><!--/row-->

</div> <!-- end of CONTAINER div -->


 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
<script src="bootstrap/js/bootstrap-modal.js"></script>
<script type="text/JavaScript" src="bootstrap/js/bootstrap.min.js"></script>
<script>

$.ajaxSetup ({  
        cache: false  
});  
var ajax_load = "<img src='bootstrap-modal-master/img/ajax-loader.gif' alt='loading...' />";

function populateTask(task_id, project_id) {

	
	var loadUrl = "index.php?route=ajax&sub=content&content=edit_task&task_id="+task_id+"&project_id="+project_id;  
    //$("#load_basic").click(function(){  
      
    $("#EditTaskModal").html(ajax_load).load(loadUrl);  

    //});

}
</script>
</body>
</html>