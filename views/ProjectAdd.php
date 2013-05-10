<?php
// views/ProjectAdd.php

//echo "<BR>msg:".$data['msg'];
?>
<div class="span3">
        	
    <div class="well sidebar-nav">

    	<?php include('views/ProjectSubNav.php'); ?>

     </div><!--/.well -->
     
</div><!--/span-->

<div class="span9">

<div id="main_content">

	<div id="content">

		<form name="new_project_form" method="POST" action="index.php">
		<input type="hidden" name="route" value="project">
		<input type="hidden" name="sub" value="save">

		<fieldset>
    	<legend>Create a new project</legend>
    	<label>Title</label>
		<input type="text" name="project_title" id="project_title" placeholder='Your project title'>

		<label>Summary</label>
		<input type="text" name="project_summary" id="project_summary">

		<label>Description</label>
		<textarea name="project_description" id="project_description"></textarea>

		<label></label>
		<button type="submit" class="btn">create project</button>

		</fieldset>
		</form>

	</div>

</div>