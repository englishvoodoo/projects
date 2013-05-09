<?php
// classes/AjaxController.php
class AjaxController extends Controller
{
	
	public function __construct()
	{

		require_once('classes/Ajax.php');

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