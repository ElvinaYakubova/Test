<?php
	class Model_category extends Model
	{
		public function get_data($id_cat){
			$query = $this->db->prepare("SELECT article.id, article.title, article.intro_text
						FROM article WHERE article.category_id = ? AND article.published = 1 ORDER BY article.create_at DESC LIMIT 0,4");
			$query->execute(array($id_cat));
			$res = $query->fetchAll();
			return $res;
		}

		
	}
?>