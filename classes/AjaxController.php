<?php
// classes/AjaxController.php
class AjaxController extends Controller
{
	
	public function __construct()
	{

		require_once('classes/Ajax.php');
		require_once('classes/Helper.php');

	}

	public function callAction()
	{

		$Helper = new Helper();

		$action = $_REQUEST['action'];

		$user_id = 1;

		if($action == 'right_panel_hide') {
			$Helper->settingUpdate($user_id, 'right_panel', 'hide');

		}

		if($action == 'right_panel_show') {
			$Helper->settingUpdate($user_id, 'right_panel', 'show');
		}

	}

	public function contentAction()
	{

		$content = $_REQUEST['content'];

		//echo "<BR>content:".$content;

		$AjaxFactory = new AjaxFactory();
		$AjaxFactory->setContentType($content);
		$Ajax = $AjaxFactory->build();

		#if($content == 'edit_task') {
		#	$Ajax = new AjaxTask();
		#} else {
		#	$Ajax = new Ajax();
		#}

		$return_content = $Ajax->getContent($content);

		echo $return_content;

	}
}