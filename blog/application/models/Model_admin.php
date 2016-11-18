<?php
	class Model_adminpanel extends Model
	{
		public function get_data_author(){
			$query = $this->db->prepare("SELECT article.id, article.title, user.name as user_name, category.name as cat_name, article.create_at, article.published 
    							from user RIGHT JOIN (category RIGHT JOIN article ON category.id = article.category_id) ON user.id = article.author_id
    							WHERE (user.id = ?) ORDER BY article.create_at DESC");
			$res = $query->fetch();
			return $res;
		}
		public function get_data_admin(){
			$query = $this->db->prepare("SELECT article.id, article.title, user.name as user_name, category.name as cat_name, article.create_at, article.published  
                                from user RIGHT JOIN (category RIGHT JOIN article ON category.id = article.category_id) ON user.id = article.author_id
                                WHERE (user.id = ? or user.role = 2) ORDER BY article.create_at DESC");
			$query->execute(array($_SESSION['user']));
			$res = $query->fetch();
			return $res;
		}

		
	}
?>