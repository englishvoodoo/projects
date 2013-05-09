<?php
// classes/Helper.php
class Helper
{
	

	function redirect($location)
	{

		header("Location: ".$location);
		exit();

	}

}