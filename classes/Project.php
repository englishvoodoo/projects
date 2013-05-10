<?php
// classes/Project.php

class Project
{

	public function __construct()
	{

		// establish a database connection
		require_once('classes/Database.php');

		$Database = new Database();

		$this->conn = $Database->connect();

	}

	public function saveTask($data)
	{

		$task_id		= $data['task_id'];
		$task_title 	= $data['task_title'];
		$task_details 	= $data['task_details'];
		$task_status	= $data['task_status'];

		if($task_id) {
			$sqltext = "UPDATE tasks SET 
							task_title = '".$task_title."',
							task_details = '".$task_details."',
							task_status = '".$task_status."'  
							WHERE task_id = '".$task_id."'";
		} else {
			$sqltext = "INSERT INTO tasks (
								project_id, 
								task_title, 
								task_details
							) VALUES (
								'".$this->project_id."',
								'".$task_title."',
								'".$task_details."')";
		}
		$result = $this->conn->query($sqltext);

	}

	public function getTasks()
	{


		$stmt = $this->conn->prepare("SELECT * FROM tasks WHERE project_id = ?");
		$stmt->execute(array($this->project_id));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $rows;

	}

	public function getFiles()
	{


		$stmt = $this->conn->prepare("SELECT * FROM files WHERE project_id = ?");
		$stmt->execute(array($this->project_id));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $rows;

	}

	public function getList()
	{

		$sqltext = "SELECT * FROM projects ORDER BY project_id DESC";
		$result = $this->conn->query($sqltext);

		return $result;

	}

	public function setId($id)
	{

		$this->project_id = $id;

	}

	public function getDetails()
	{

		#$sqltext = "SELECT * FROM projects WHERE project_id = '".$this->project_id."'";
		#$result = $this->conn->fetchAll($sqltext);

		$stmt = $this->conn->prepare("SELECT * FROM projects WHERE project_id=?");
		$stmt->execute(array($this->project_id));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $rows;

	}

	public function delete()
	{

		$stmt = $this->conn->prepare("DELETE FROM projects WHERE project_id =?");
		$stmt->execute(array($this->project_id));

		return TRUE;

	}

	public function save($data)
	{

		// nb : this should be a prepared statement *****

		if($data['project_id'] != '') {

			$sqltext = "UPDATE projects SET 
							project_title = '".$data['project_title']."',
							project_summary = '".$data['project_summary']."',
							project_description = '".$data['project_description']."' 
							WHERE project_id = '".$data['project_id']."'";
			//echo "<BR>sqltext:".$sqltext;
			$this->conn->query($sqltext);

			$project_id = $data['project_id'];
			return $project_id;

		} else {

			$sqltext = "INSERT INTO projects (
							project_title,
							project_summary,
							project_description
							) VALUES (
							'".$data['project_title']."',
							'".$data['project_summary']."',
							'".$data['project_description']."')";
			//echo "<BR>sqltext:".$sqltext;
			$this->conn->query($sqltext);

			$project_id = $this->conn->lastInsertId();
			return $project_id;
		}
		

	}

}