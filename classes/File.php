<?php
// classes/File.php

class File
{

	public function __construct()
	{

		// establish a database connection
		require_once('classes/Database.php');

		$Database = new Database();

		$this->conn = $Database->connect();

	}

	public function setFile($file)
	{

		$this->file = $file;

	}
	
	public function validateFile()
	{

		// check the uploaded file
		$flag_extension = true;
		$flag_size = true;

		// verify the file extension
		$allowedExts = array("gif", "jpeg", "jpg", "png");

		$extension = explode('.',$this->file["name"])[1];

		if(!in_array($extension, $allowedExts)) {

			$flag_extension = false;

		}


		if($this->file["type"] != "image/gif" && 
			$this->file["type"] != "image/jpeg" &&
			$this->file["type"] != "image/jpg" &&
			$this->file["type"] != "image/pjpeg" &&
			$this->file["type"] != "image/x-png" &&
			$this->file["type"] != "image/png" 
			) {

			$flag_extension = false;

		}


		
		// verify the file size
		if($this->file["size"] > 2000000) {

			$flag_size = false;

		}

		// if we have an upload error code return this
		if ($this->file["error"] > 0) {
    			
    		//echo "Return Code: ".$_FILES["file"]["error"];
    		//exit();
    		return FALSE;

    	}

    	if(!$flag_extension) {

    		//echo "<BR>Problem with file extension";exit();
    		return FALSE;

    	}

    	if(!$flag_size) {

    		//echo "<BR>Problem with file size";exit();
    		return FALSE;

    	}

		#echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		#echo "Type: " . $_FILES["file"]["type"] . "<br>";
		#echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		#echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    	if (file_exists("uploads/" . $this->file["name"])) {
      
      		echo $this->file["name"] . " already exists. ";

      		return FALSE;
      
      	} else {
      
      		return TRUE;
      		
      	}

	}

	public function storeFile($project_id)
	{

		move_uploaded_file($this->file["tmp_name"],
      			"uploads/" . $this->file["name"]);
      	

		$stmt = $this->conn->prepare("INSERT INTO files (project_id, file_src) VALUES (?, ?)");
		$stmt->execute(array($project_id, $this->file["name"]));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $rows;

	}

}