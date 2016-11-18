<?php
	class Model_main extends Model
	{
		public function get_data()
		{	
			$articles = $this->getArticlesList();
			$articles = $this -> getTagsList($articles);
			return $articles;
		}


		private function getArticlesList() {
			
			$query = $this->db->query("SELECT article.id, article.title, DATE_FORMAT(article.create_at,'%d %M %Y') AS date, article.full_text, user.name as user, category.name as category
				FROM article LEFT JOIN category ON article.category_id=category.id LEFT JOIN user ON article.author_id=user.id 
				WHERE article.published = 1
				ORDER BY article.create_at DESC");
			return $query->fetchAll();
		}

		private function getTagsList($data) {
			$res = array();
			$cnt = 0;
			foreach ($data as $article) {
				$query_tag = $this->db->prepare("SELECT tag.id, tag.name AS name, art_tag.article_id 
									FROM tag RIGHT JOIN (article RIGHT JOIN art_tag ON article.id = art_tag.article_id) ON tag.id = art_tag.tag_id
									WHERE art_tag.article_id = ? ");
				$query_tag->execute(array($article['id']));
				$art_tag = $query_tag->fetchAll();
				$article['tag'] = $art_tag;
				$res[$cnt] = $article;
				$cnt++;
			}
			// print_r($res);
			return $res;
		}



	}
?>