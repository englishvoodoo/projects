<?php
// views/ProjectDetail.php

$project_id = $data['project_id'];
$project_details = $data['project_details'];

//var_dump($project_details);

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
		<h2><?php echo $project_details[0]['project_title'];?> : add task</h2>
	</div>



	<div id="content">

		<form method="POST" action="index.php">
		<input type="hidden" name="route" value="project">
		<input type="hidden" name="sub" value="add_task">

		<input type="hidden" name="id" value="<?php echo $project_id;?>">
		<div>Title</div>
		<div><input type="text" name="task_title"></div>

		<div>Details</div>
		<div><input type="text" name="task_details"></div>

		<div><input type="submit" value="add task">

		</form>

	</div>

</div>