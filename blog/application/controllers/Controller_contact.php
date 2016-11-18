<?php
	
	class Controller_contact  extends Controller_index
	{
		function __construct()
		{
			$this->view = new View();
			$this->model_archive = new Model_archive();
		}
		
		function action_index()
		{
			$this->load_archive();
			$this->view->generate('View_contact.php', 'client.php');

		}
	}

?>