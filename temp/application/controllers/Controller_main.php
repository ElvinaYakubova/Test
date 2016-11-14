<?php
	include "application/models/Model_archive.php";

	class Controller_main  extends Controller
	{
		function __construct()
		{
			$this->model = new Model_main();
			$this->view = new View();
			$this->model_archive = new Model_archive();
		}
		
		function action_index()
		{
			$data_archive = $this->model_archive->get_data();
			$data = $this->model->get_data();
			$this->view->generate('View_main.php', 'client.php', $data, $data_archive);
		}

		function action_view($id) {
			$data_archive = $this->model_archive->get_data();
			$data = $this->model->get_data_byID($id);
			$this->view->generate('View_article.php', 'client.php', $data, $data_archive);
		}
	}

?>