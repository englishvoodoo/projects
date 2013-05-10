<?php
// index.php



session_start();

require_once('classes/Session.php');

$Session = new Session();

require_once('classes/Controller.php');


if(isset($_REQUEST['route'])) {
	$route = $_REQUEST['route'];
} else {
	$route = 'project';
}

// project
// user
// task

// load the appropriate controller
$Controller = new Controller();
$current_controller = $Controller->load($route);

//var_dump($current_controller);

if(isset($_REQUEST['sub'])) {
	$sub = $_REQUEST['sub'].'Action';
} else {
	$sub = 'indexAction';
}

//echo "<BR>sub:".$sub;

$current_controller->$sub();

// project/list
// project/detail
// project/add

// user/list
// user/details
// user/add

// task/list
// task/detail
// task/add

