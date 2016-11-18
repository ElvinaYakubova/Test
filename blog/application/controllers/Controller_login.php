<?php
	class Controller_login  extends Controller_index
	{
		function __construct()
		{
			$this->view = new View();
			$this->model = new Model_login();
			$this->model_archive = new Model_archive();
		}
		
		function action_index()
		{
			session_start();
			// if (!$_SESSION['user']) {
			// 	header("Location:/myblog/login/");
			// 	// exit();
			// }
			if (isset($_POST['Email']) && isset($_POST['Login']) && isset($_POST['Password'])) $this->obr();
			$this->load_archive();
			$this->view->generate('View_login.php', 'client.php');
		}

		protected function obr(){
			$user_data[1] = $_POST['Email'];
			$user_data[2] = $_POST['Login'];
			$user_data[3] = $_POST['Password'];
			if (!empty($user_data[1]) && !empty($user_data[2]) && !empty($user_data[3])) {
				$data = $this->model->get_data($user_data);
				if(!empty($data)) {
					$_SESSION['user'] = $data['id'];
					header("Location:/myblog/adminpanel/");
					exit();
				}
				else {
					exit("User not found");
				}
			}
			else {
				exit("Enter data");
			}
		}
	}

?>