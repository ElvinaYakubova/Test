<?php
	class login extends ACore {
	
		public function get_content(){
			echo '
			<div class="content">
            	<div class="left">
	                <form method="POST" action="">
	                	<label for="Email">Email</label>
	                    <input type = "text" class = "field" placeholder = "Email" name = "Email" id = "Email" required/>
	                    <label for="Login">Login</label>
	                    <input type = "text" class = "field" placeholder = "Login" name = "Login" id = "Login" required/>
	                    <label for="Password">Password</label>
	                    <input type = "Password" class = "field" placeholder = "Password" name = "Password" id = "Password" required/>
	                    <input type = "submit" value = "Send" id = "send" name = "send" />
	                </form>
	            </div>
	        </div>';
		}

		protected function obr(){
			$email = $_POST['Email'];
			$login = $_POST['Login'];
			$password = $_POST['Password'];
			if (!empty(email) && !empty($login) && !empty($password)) {
				//$password = md5($password);
				$query = $this->db->prepare("SELECT id from user WHERE email = ? AND name = ? AND password = ?");
				$query->execute(array($email, $login, $password));
				$count = $query->rowCount();
				$row = $query->fetch();
				if($count == 1) {
					$_SESSION['user'] = $row['id'];
					header("Location:?option=admin");
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
