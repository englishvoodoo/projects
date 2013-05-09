<?php
// views/project/tab_main.php
?>
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

		

	</div>

	

	