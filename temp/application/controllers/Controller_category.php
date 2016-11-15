<?php
	include "application/models/Model_archive.php";

	class Controller_category  extends Controller
	{
		function __construct()
		{
			$this->model = new Model_category();
			$this->view = new View();
			$this->model_archive = new Model_archive();
		}
		
		function action_index()
		{
			$data_archive = $this->model_archive->get_data();
			$data = $this->model->get_data();
			$this->view->generate('View_category.php', 'client.php', $data, $data_archive);
		}

		function action_beauty() {
			$data_archive = $this->model_archive->get_data();
			$data = $this->model->get_data(2);
			$this->view->generate('View_category.php', 'client.php', $data, $data_archive);
		}

		function action_cooking() {
			$data_archive = $this->model_archive->get_data();
			$data = $this->model->get_data(3);
			$this->view->generate('View_category.php', 'client.php', $data, $data_archive);
		}

		function action_travel() {
			$data_archive = $this->model_archive->get_data();
			$data = $this->model->get_data(1);
			$this->view->generate('View_category.php', 'client.php', $data, $data_archive);
		}
	}

?>