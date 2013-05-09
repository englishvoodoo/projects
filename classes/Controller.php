<?php
// classes/Controller.php
class Controller
{
	
	public $route;

	public function load($route) {

		//echo "<BR>route:".$route;

		$controller = ucfirst($route)."Controller";

		// load the relevant object
		require_once('classes/'.$controller.'.php');
		$this->controller = new $controller;

		return $this->controller;

	}
}