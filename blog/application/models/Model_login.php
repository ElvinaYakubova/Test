
<?php
	class Model_login extends Model
	{
		public function get_data(){
			$user_data[1] = $_POST['Email'];
			$user_data[2] = $_POST['Login'];
			$user_data[3] = $_POST['Password'];
			if (!empty($user_data[1]) && !empty($user_data[2]) && !empty($user_data[3])) {
				$query = $this->db->prepare("SELECT id from user WHERE email = ? AND name = ? AND password = ?");
				$query->execute(array($user_data[1], $user_data[2], $user_data[3]));
				$res = $query->fetch();
				if(!empty($res)) {
					$_SESSION['user'] = $res['id'];
					header("Location:/myblog/adminpanel/");
					exit();
				}
				else {
					$res = "User not found";
				}
			}
			else {
				$res = "Enter data";
			}

			return $res;
		}
		
	}
?>