<?php
	class Controller_adminpanel  extends Controller_admin
	{
		function __construct()
		{
			$this->view = new View();
			$this->model = new Model_adminpanel();
		}
		
		function action_index()
		{
			session_start();
			if (!$_SESSION['user']) {
				header("Location:/myblog/login/");
				// exit();
			}
			if ($_SESSION['user'] == 1)  $data = $this->model->get_data_admin();
            else  $data = $this->model->get_data_author();
            $this->view->generate('View_adminpanel.php', 'admin.php', $data);
			
		}
	}

?>