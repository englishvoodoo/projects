<?php
// classes/Task.php

class Task
{

	public function __construct()
	{

		// establish a database connection
		require_once('classes/Database.php');

		$Database = new Database();

		$this->conn = $Database->connect();

	}
	
	public function setId($task_id)
	{

		$this->task_id = $task_id;

	}

	public function getDetails()
	{

		$stmt = $this->conn->prepare("SELECT * FROM tasks WHERE task_id = ?");
		$stmt->execute(array($this->task_id));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $rows;

	}

}