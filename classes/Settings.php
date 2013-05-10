<?php
// classes/Settings.php
class Settings
{
	
	public function __construct()
	{

		// establish a database connection
		require_once('classes/Database.php');

		$Database = new Database();

		$this->conn = $Database->connect();

	}

	public function setUserId($user_id)
	{

		$this->user_id = $user_id;

	}

	public function getDisplaySettings()
	{

		$return_array = array();

		$stmt = $this->conn->prepare("SELECT * FROM settings WHERE setting_type = ? AND user_id = '".$this->user_id."'");
		$stmt->execute(array('right_panel'));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach($rows as $row) {

			$return_array['right_panel'] = $row['setting_val'];

		}

		return $return_array;

	}

	

}