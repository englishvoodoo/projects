<?php
// views/ProjectEdit.php

$project_detail = $data['project_detail'];

//var_dump($project_detail);
?>
<div class="span3">
        	
    <div class="well sidebar-nav">

    	<?php include('views/ProjectSubNav.php'); ?>

     </div><!--/.well -->
     
</div><!--/span-->

<div class="span9">

<div id="main_content">

	
	<div id="content">

		<form name="update_project_form" method="POST" action="index.php">
		<input type="hidden" name="route" value="project">
		<input type="hidden" name="sub" value="save">
		<input type="hidden" name="id" value="<?php echo $project_detail[0]['project_id'];?>">

		<fieldset>
		<legend>Project Detail</legend>
		<label>Title</label>
		<input type="text" name="project_title" value="<?php echo $project_detail[0]['project_title'];?>">

		<label>Summary</label>
		<input type="text" name="project_summary" value="<?php echo $project_detail[0]['project_summary'];?>">

		<label>Description</label>
		<textarea name="project_description" id="project_description"><?php echo $project_detail[0]['project_description'];?></textarea>

		<label>&nbsp;</label>
		<button type="submit" class="btn">update</button>

		</fieldset>

		</form>

	</div>

</div>