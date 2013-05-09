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

	<div class="well">

		<div class="row-fluid">
			<div class="span2">Summary</div>
			<div class="span7"><?php echo $project_detail[0]['project_summary'];?></div>
		</div>

		<div class="row-fluid">
			<div class="span2">Description</div>
			<div class="span7"><?php echo $project_detail[0]['project_description'];?></div>
		</div>

		<div class="row-fluid">
			<div class="span2">&nbsp;</div>
			<div class="span7"><a href="index.php?route=project&amp;sub=edit&amp;id=<?php echo $project_detail[0]['project_id'];?>">EDIT</a> | <a href="index.php?route=project&amp;sub=delete&amp;id=<?php echo $project_detail[0]['project_id'];?>">delete</a></div>
		</div>

		<div class="row-fluid">
			<div class="span9"><hr /></div>
		</div>

		<div class="row-fluid">
			<div class="span4"><h4>Associated Tasks</h4></div>
			<div class="span5"><a href="#AddTaskModal" role="button" class="btn" data-toggle="modal">click here to add a task</a></div>
		</div>



		<?php 
		foreach($project_tasks as $task) {

			$tmp_status = $task['task_status'];
			if($tmp_status == 1) {
				$tmp_status = 'complete';
			} else {
				$tmp_status = 'ongoing';
			}

			echo "<div class='row-fluid'>
					<div class='span9'><a href='#EditTaskModal' data-toggle='modal' onclick='populateTask(".$task['task_id'].",".$project_detail[0]['project_id'].");'>".$task['task_title']."</a> [".$tmp_status."]</div>
				</div>";

		}
		?>

	</div>

	

	<!-- Modal : AddTaskModal -->
	<div id="AddTaskModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	
  		<form method="POST" action="index.php">

  		<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
    		<h3 id="myModalLabel">Add task to project</h3>
  		</div>
  
  		<div class="modal-body">
    		
			<input type="hidden" name="route" value="project">
			<input type="hidden" name="sub" value="add_task">

			<input type="hidden" name="project_id" value="<?php echo $project_detail[0]['project_id'];?>">
			<div>Title</div>
			<div><input type="text" name="task_title"></div>

			<div>Details</div>
			<div><input type="text" name="task_details"></div>

		</div>
  	
  		<div class="modal-footer">
  		  	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  	  		<!--<button class="btn btn-primary">Save changes</button>-->
  	  		<input type="submit" value="add task" class="btn btn-primary">
  		</div>

  		</form>

	</div> 

	<!-- Modal : EditTaskModal -->
	<div id="EditTaskModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	
  		

	</div> 


</div>


