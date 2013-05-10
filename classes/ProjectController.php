<?php
// classes/ProjectController.php
class ProjectController extends Controller
{
	
	public function __construct()
	{

		//echo "<BR>ProjectController constructor...";

		require_once('classes/View.php');
		$this->view = new View();

		require_once('classes/Project.php');
		require_once('classes/Helper.php');
		require_once('classes/File.php');

	}

	public function indexAction()
	{

		// load the default view
		$data = array(
					'msg'	=> 'Welcome to Projects',
					);

		$this->view->header();
		$this->view->render('ProjectIndex', $data);
		$this->view->footer();

	}

	public function add_fileAction()
	{

		$project_id = $_REQUEST['project_id'];

		$File = new File();

		$File->setFile($_FILES["file"]);

		if(!$File->validateFile()) {

			echo "<BR>invalid file";

		} else {

			$File->storeFile($project_id);

		}

		// redirect to the ProjectDetail screen
		$Helper = new Helper();
		$Helper->redirect('index.php?route=project&sub=detail&id='.$project_id);
	
	}

	public function add_taskAction()
	{

		$project_id = $_REQUEST['project_id'];

		if(isset($_REQUEST['task_id'])) {
			$task_id = $_REQUEST['task_id'];
		} else {
			$task_id = '';
		}

		if(isset($_REQUEST['task_status'])) {
			$task_status = $_REQUEST['task_status'];
		} else {
			$task_status = '';
		}

		$Project = new Project();
		$Project->setId($project_id);

		if($_POST) {

			$task_title	= $_POST['task_title'];
			$task_details = $_POST['task_details'];

			$data = array(
						'task_id'		=> $task_id,
						'task_title'	=> $task_title,
						'task_details'	=> $task_details,
						'task_status'	=> $task_status,
						);

			$Project->saveTask($data);
			

			// redirect to the ProjectDetail screen
			$Helper = new Helper();
			$Helper->redirect('index.php?route=project&sub=detail&id='.$project_id);


		} else {

			$project_details = $Project->getDetails();

			$data = array(
						'project_id'		=> $project_id,
						'project_details'	=> $project_details,
						);

			$this->view->header();
			$this->view->render('ProjectAddTask', $data);
			$this->view->footer();



		}

	}

	public function listAction()
	{

		// get all projects
		$Project = new Project();
		$project_list = $Project->getList();

		$data = array(
					'project_list'	=> $project_list,
					);

		$this->view->header();
		$this->view->render('ProjectList', $data);
		$this->view->footer();

	}

	public function saveAction()
	{

		if(isset($_POST['id'])) {
			$project_id = $_POST['id'];
		} else {

			$project_id = '';
		}
		//echo "<BR>project_id:".$project_id;exit();
		$project_title = $_POST['project_title'];
		$project_summary = $_POST['project_summary'];
		$project_description = $_POST['project_description'];

		// validate the input data
		// ...


		$data = array(
					'project_id'			=> $project_id,
					'project_title'			=> $project_title,
					'project_summary'		=> $project_summary,
					'project_description'	=> $project_description,
					);
//var_dump($data);exit();
		// save the record
		$Project = new Project();
		$project_id = $Project->save($data);

		// redirect to the ProjectDetail screen
		$Helper = new Helper();
		$Helper->redirect('index.php?route=project&sub=detail&id='.$project_id);

	}

	public function editAction()
	{

		$project_id=$_REQUEST['id'];

		$Project = new Project();
		$Project->setId($project_id);

		$project_detail = $Project->getDetails();

		$data = array(
					'project_detail'	=> $project_detail,
					);

		$this->view->header();
		$this->view->render('ProjectEdit', $data);
		$this->view->footer();

	}

	public  function deleteAction()
	{

		$project_id=$_REQUEST['id'];

		$Project = new Project();
		$Project->setId($project_id);
		$Project->delete();

		// redirect to the ProjectList screen
		$Helper = new Helper();
		$Helper->redirect('index.php?route=project&sub=list');

	}

	public function detailAction()
	{

		$project_id = $_REQUEST['id'];

		$Project = new Project();
		$Project->setId($project_id);
		$project_detail = $Project->getDetails();

		$project_tasks = $Project->getTasks();

		$project_files = $Project->getFiles();

		$data = array(
					'project_detail'	=> $project_detail,
					'project_tasks'		=> $project_tasks,
					'project_files'		=> $project_files,
					);

		$this->view->header();
		$this->view->render('ProjectDetail', $data);
		$this->view->footer();

	}

	public function addAction()
	{


		$data = array(
					'msg'	=> 'Project Add View',
					);

		$this->view->header();
		$this->view->render('ProjectAdd', $data);
		$this->view->footer();

	}

}