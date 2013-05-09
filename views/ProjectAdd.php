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

	<div id="title_bar">
		<h2>Project Add View</h2>
	</div>



	<div id="content">

		<form name="new_project_form" method="POST" action="index.php">
		<input type="hidden" name="route" value="project">
		<input type="hidden" name="sub" value="save">

		<div>Title</div>
		<div><input type="text" name="project_title" id="project_title"></div>

		<div>Summary</div>
		<div><input type="text" name="project_summary" id="project_summary"></div>

		<div>Description</div>
		<div><input type="text" name="project_description" id="project_description"></div>

		<div>&nbsp;</div>
		<div><input type="submit" value="create project"></div>

		</form>

	</div>

</div>