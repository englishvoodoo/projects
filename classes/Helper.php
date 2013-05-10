<?php
// classes/Helper.php
class Helper
{
	
	public function __construct()
	{

		// establish a database connection
		require_once('classes/Database.php');

		$Database = new Database();

		$this->conn = $Database->connect();

	}

	function redirect($location)
	{

		header("Location: ".$location);
		exit();

	}

	public function settingUpdate($user_id, $setting_type, $setting_val) {

		
		$sqltext = "UPDATE settings SET setting_type = '".$setting_type."', setting_val = '".$setting_val."' WHERE user_id = '".$user_id."'";
		$this->conn->exec($sqltext);
		

	}

}