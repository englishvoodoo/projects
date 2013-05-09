<?php
// classes/Ajax.php

class dummy_class
{

	
}

class AjaxFactory
{

	public function setContentType($contentType)
	{

		$this->contentType = $contentType;
	}

	public function build()
	{

		$my_obj = "Ajax_".$this->contentType;
		$AjaxContent = new $my_obj;

		return $AjaxContent;

	}
}

abstract class Ajax
{

	public abstract function getContent();
	
}

class Ajax_edit_task extends Ajax
{

	public function getContent()
	{

		require_once('classes/Task.php');

		$task_id = $_REQUEST['task_id'];
		$project_id = $_REQUEST['project_id'];

		$content_type = 'modal';
		$return_content = '';

		$Task = new Task();
		$Task->setId($task_id);

		$full_task = $Task->getDetails();

		$task_title 	= $full_task[0]['task_title'];
		$task_details 	= $full_task[0]['task_details'];
		$task_status 	= $full_task[0]['task_status'];

		$sel_status_1 = '';
		$sel_status_0 = '';
		if($task_status == 1) {
			$sel_status_1 = 'selected';
		} else {
			$sel_status_0 = 'selected';
		}

		$return_content .= '<form method="POST" action="index.php">
  		<input type="hidden" name="task_id" value="'.$task_id.'">
  		<input type="hidden" name="project_id" value="'.$project_id.'">

  		<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
    		<h3 id="myModalLabel">Edit task</h3>
  		</div>
  
  		<div class="modal-body">
    		
			<input type="hidden" name="route" value="project">
			<input type="hidden" name="sub" value="add_task">

			
			<div>Title</div>
			<div><input type="text" name="task_title" value="'.$task_title.'"></div>

			<div>Details</div>
			<div><input type="text" name="task_details" value="'.$task_details.'"></div>

			<div>Status</div>
			<div>
				<select name="task_status">
					<option value="0" '.$sel_status_0.'>Ongoing</option>
					<option value="1" '.$sel_status_1.'>Complete</option>
				</select>
			</div>

		</div>
  	
  		<div class="modal-footer">
  		  	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  	  		<input type="submit" value="Save" class="btn btn-primary">
  		</div>

  		</form>';

		

		return $return_content;

	}

}

	
	
