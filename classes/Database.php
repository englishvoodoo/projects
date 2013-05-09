<?php
// classes/Database.php

class Database
{

	private $host = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $db = 'projects';

	public static function connect()
	{

		$conn = new PDO('mysql:host=localhost;dbname=projects', 'root', '');

		return $conn;

	}
	
}