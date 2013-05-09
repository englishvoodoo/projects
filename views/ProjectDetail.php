<?php
// views/ProjectDetail.php

$project_detail = $data['project_detail'];
$project_tasks = $data['project_tasks'];

//var_dump($project_detail);
?>
<div class="span3">
        	
    <div class="well sidebar-nav">

    	<?php include('views/ProjectSubNav.php'); ?>

     </div><!--/.well -->
     
</div><!--/span-->

<div class="span9">

	<div class="row-fluid">

		<div class="span9">
			<h3><?php echo $project_detail[0]['project_title'];?></h3>
		</div>

	</div>

	

	<div class="row-fluid">

		<div class="span9">
			<ul class="nav nav-tabs">
			  <li><a href="#main" data-toggle="tab">Main</a></li>
			  <li><a href="#tasks" data-toggle="tab">Tasks</a></li>
			  <li><a href="#files" data-toggle="tab">Files</a></li>
			  <li><a href="#stats" data-toggle="tab">Stats</a></li>
			</ul>
		</div>

		

	</div>

	<div class="row-fluid">
		<div class="span9">
			<div class="tab-content">
			  <div class="tab-pane active" id="main">
			  	<?php include('views/project/tab_main.php');?>
			  </div>
			  <div class="tab-pane" id="tasks">
			  	<?php include('views/project/tab_tasks.php');?>
			  </div>
			  <div class="tab-pane" id="files">
			  	<?php include('views/project/tab_files.php');?>
			  </div>
			  <div class="tab-pane" id="stats">
			  	<?php include('views/project/tab_stats.php');?>
			  </div>
			</div>
		</div>
	</div>

	 


</div>


