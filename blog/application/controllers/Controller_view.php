<?php
	
	class Controller_view  extends Controller_index
	{
		function __construct()
		{
			$this->model = new Model_view();
			$this->view = new View();
			$this->model_archive = new Model_archive();
		}
		
		function action_view($id)
		{
			$data = $this->model->get_data($id);
			$this->load_archive();
			$this->view->generate('View_article.php', 'client.php', $data);
		}
	}

?>