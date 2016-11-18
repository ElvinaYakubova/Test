<?php
	class Controller_adminpanel  extends Controller_admin
	{
		function __construct()
		{
			$this->view = new View();
			$this->model = new Model_adminpanel();
		}
		
		function action_index()
		{
			session_start();
			if (!$_SESSION['user']) {
				header("Location:/myblog/login/");
				// exit();
			}
			if ($_SESSION['user'] != 1)  $data = $this->model->get_data_admin();
            else  $data = $this->model->get_data_author();
            // print_r($data);
            $this->view->generate('View_adminpanel.php', 'admin.php', $data);
			
		}

		// protected function obr(){
		// 	$user_data[1] = $_POST['Email'];
		// 	$user_data[2] = $_POST['Login'];
		// 	$user_data[3] = $_POST['Password'];
		// 	if (!empty($user_data[1]) && !empty($user_data[2]) && !empty($user_data[3])) {
		// 		$data = $this->model->get_data($user_data);
		// 		print_r($data);
		// 		if(!empty($data)) {
		// 			$_SESSION['user'] = $row['id'];
		// 			header("Location:/myblog/admin/");
		// 			exit();
		// 		}
		// 		else {
		// 			exit("User not found");
		// 		}
		// 	}
		// 	else {
		// 		exit("Enter data");
		// 	}
		// }
	}

?>