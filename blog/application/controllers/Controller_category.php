<?php
	
	class Controller_category  extends Controller_index
	{
		function __construct()
		{
			$this->model = new Model_category();
			$this->view = new View();
			$this->model_archive = new Model_archive();
		}
		
		function action_index()
		{
			$this->load_archive();
			$data = $this->model->get_data();
			$this->view->generate('View_category.php', 'client.php', $data);
		}

		function action_beauty() {
			$this->load_archive();
			$data = $this->model->get_data(2);
			$this->view->generate('View_category.php', 'client.php', $data);
		}

		function action_cooking() {
			$this->load_archive();
			$data = $this->model->get_data(3);
			$this->view->generate('View_category.php', 'client.php', $data);
		}

		function action_travel() {
			$this->load_archive();
			$data = $this->model->get_data(1);
			$this->view->generate('View_category.php', 'client.php', $data);
		}
	}

?>