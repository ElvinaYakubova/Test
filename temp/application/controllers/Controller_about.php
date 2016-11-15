<?php
	include "application/models/Model_archive.php";

	class Controller_about  extends Controller
	{
		function __construct()
		{
			$this->view = new View();
			$this->model_archive = new Model_archive();
		}
		
		function action_index()
		{
			$data = NULL;
			$data_archive = $this->model_archive->get_data();
			$this->view->generate('View_about.php', 'client.php', $data, $data_archive);
		}
	}

?>