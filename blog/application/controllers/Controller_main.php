<?php
	class Controller_main  extends Controller_index
	{
		function __construct()
		{
			$this->model = new Model_main();
			$this->view = new View();
			$this->model_archive = new Model_archive();
		}
		
		function action_index()
		{
			$data = $this->model->get_data();
			$this->load_archive();
			$this->view->generate('View_main.php', 'client.php', $data);
		}

		
	}

?>