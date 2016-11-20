<?php
	class Controller_create_article  extends Controller_admin
	{
		function __construct()
		{
			$this->view = new View();
			$this->model = new Model_create_article();
		}
		
		function action_index()
		{
			session_start();
			$data = $this->model->get_data();
			if ($_POST && $_POST['save_new'] == "Save") $this->model->save();
			$this->view->generate('View_create_article.php', 'admin.php', $data);
		}
	}

?>