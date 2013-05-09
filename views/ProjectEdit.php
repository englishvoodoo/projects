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

	<div id="title_bar">
		<h2>Project Detail View</h2>
	</div>



	<div id="content">

		<form name="update_project_form" method="POST" action="index.php">
		<input type="hidden" name="route" value="project">
		<input type="hidden" name="sub" value="save">
		<input type="hidden" name="id" value="<?php echo $project_detail[0]['project_id'];?>">

		<div>Title</div>
		<div><input type="text" name="project_title" value="<?php echo $project_detail[0]['project_title'];?>"></div>

		<div>Summary</div>
		<div><input type="text" name="project_summary" value="<?php echo $project_detail[0]['project_summary'];?>"></div>

		<div>Description</div>
		<div><input type="text" name="project_description" value="<?php echo $project_detail[0]['project_description'];?>"></div>

		<div>&nbsp;</div>
		<div><input type="submit" value="update">

		</form>

	</div>

</div>