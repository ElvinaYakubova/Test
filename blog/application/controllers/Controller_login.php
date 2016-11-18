<?php
	class Controller_login  extends Controller_index
	{
		function __construct()
		{
			$this->view = new View();
			$this->model = new Model_login();
			$this->model_archive = new Model_archive();
		}
		
		function action_index()
		{
			session_start();
			$data = null;
			if (isset($_POST['Email']) && isset($_POST['Login']) && isset($_POST['Password'])) $data = $this->model->get_data();
			$this->load_archive();
			$this->view->generate('View_login.php', 'client.php', $data);
		}
	}

?>