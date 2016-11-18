<?php
	class Model_login extends Model
	{
		public function get_data($user_data){
			$query = $this->db->prepare("SELECT id from user WHERE email = ? AND name = ? AND password = ?");
			$query->execute(array($user_data[1], $user_data[2], $user_data[3]));
			$res = $query->fetch();
			return $res;
		}

		
	}
?>