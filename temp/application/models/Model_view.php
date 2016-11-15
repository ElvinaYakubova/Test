<?php
	class Model_view extends Model
	{
		public function get_data($id_text){
			$art = $this->getArticleById($id_text);
		    $art = $this -> getTagsById($art, $id_text);
			return $art;
		}

		private function getArticleById($id_text){
			$query = $this->db->prepare("SELECT article.id, article.title, DATE_FORMAT(article.create_at,'%d %M %Y') AS create_at, DATE_FORMAT(article.update_at,'%d %M %Y') AS update_at,
						article.full_text, user.name as user, category.name as category
						FROM article LEFT JOIN category ON article.category_id=category.id LEFT JOIN user ON article.author_id=user.id 
						WHERE article.id = ?");
			$query->execute(array($id_text));
			return $query->fetch();
		}


		private function getTagsById($article, $id_text) {
			$query = $this->db->prepare("SELECT tag.id, tag.name AS name, art_tag.article_id 
								FROM tag RIGHT JOIN (article RIGHT JOIN art_tag ON article.id = art_tag.article_id) ON tag.id = art_tag.tag_id
								WHERE art_tag.article_id = ? ");
			$query->execute(array($id_text));
			$art_tag = $query->fetchAll();
		    $article['tag'] = $art_tag;
			return $article;
		}

	}
?>