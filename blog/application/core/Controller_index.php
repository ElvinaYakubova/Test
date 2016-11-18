<?php
	include "application/models/Model_archive.php";

	class Controller_index  extends Controller
	{
		function __construct()
		{
			$this->view = new View();
			$this->model_archive = new Model_archive();
		}
		
		function load_archive()
		{
			
			$data_archive = $this->model_archive->get_data();
			$this->view->share($data_archive);
		}

		
	}

?>