<?php
// views/ProjectList.php

$project_list = $data['project_list'];

?>

<div class="span3">
        	
    <div class="well sidebar-nav">

    	<?php include('views/ProjectSubNav.php'); ?>

     </div><!--/.well -->
     
</div><!--/span-->


<div class="span9">

	<div class="row-fluid">

		<div class="span9">
			<h2>Project List View</h2>
		</div>

	</div>

	<?php
		foreach($project_list as $project) {

			echo "<div class='row-fluid'>";
			echo "<div class='span9'><a href='index.php?route=project&amp;sub=detail&amp;id=".$project['project_id']."'>".$project['project_title']."</a></div>";
			echo "</div>";

		}
		?>

	
