<?php
// classes/View.php
class View
{
	
	public $page;
	public $data;

	public function __construct()
	{

		

	}

	public function header()
	{

		// load the main page header
		include('views/page_header.php');

	}

	public function footer()
	{

		// load the main page footer
		include('views/page_footer.php');

	}

	public function render($page, $data)
	{

		// read in the template view

		$view_page = 'views/'.$page.'.php';

		include($view_page);

	}
}