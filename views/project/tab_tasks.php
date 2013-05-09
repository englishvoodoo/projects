<?php
// views/project/tab_tasks.php

$project_tasks = $data['project_tasks'];

//var_dump($project_tasks);
?>
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

