<?php
// views/project/tab_files.php

$project_files = $data['project_files'];
?>

<div class="row-fluid">
	<div class="span4"><h4>Project Files</h4></div>
	<div class="span5"><a href="#AddFileModal" role="button" class="btn" data-toggle="modal">click here to upload a file</a></div>
</div>

<?php 
foreach($project_files as $file) {

	$file_src = $file['file_src'];

	echo "<div class='row-fluid'>
			<div class='span9'><a href='#EditTaskModal' data-toggle='modal'>".$file['file_src']."</a></div>
		</div>";

}
?>

<!-- Modal : AddFileModal -->
<div id="AddFileModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	
	<form method="POST" action="index.php" enctype="multipart/form-data">

	<div class="modal-header">
   		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
   		<h3 id="myModalLabel">Add file to project</h3>
	</div>
  
  	<div class="modal-body">
    		
		<input type="hidden" name="route" value="project">
		<input type="hidden" name="sub" value="add_file">
		<input type="hidden" name="project_id" value="<?php echo $project_detail[0]['project_id'];?>">

		<label for="file">Filename:</label>
		<input type="file" name="file" id="file">

	

	</div>
  	
  	<div class="modal-footer">
  	  	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  		<!--<button class="btn btn-primary">Save changes</button>-->
  		<input type="submit" value="add task" class="btn btn-primary">
  	</div>

  	</form>

</div> 		