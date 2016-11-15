<?php
	include "application/models/Model_archive.php";

	class Controller_view  extends Controller
	{
		function __construct()
		{
			$this->model = new Model_view();
			$this->view = new View();
			$this->model_archive = new Model_archive();
		}
		
		function action_view($id)
		{
			$data_archive = $this->model_archive->get_data();
			$data = $this->model->get_data($id);
			$this->view->generate('View_article.php', 'client.php', $data, $data_archive);
		}
	}

?>