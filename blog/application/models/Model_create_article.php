<?php
	class Model_create_article extends Model
	{
		public function get_data(){
			$query = $this->db->query("SELECT *	from category");
			$res = $query->fetchAll();
			return $res;
		}
		public function save() {
			$title = $_POST['title'];
			$author = $_SESSION['user'];
			$intro = $_POST['intro'];
			$full_text = $_POST['editor1'];
			$category = $_POST['category'];
			if (empty($title) || empty($intro) || empty($full_text) || empty($category)) {
				$_SESSION['answ'] = "Please enter data";
			}
			$query = $this->db->prepare("INSERT INTO myblog.article (id, title, author_id, create_at, update_at, category_id, intro_text, full_text) 
				VALUES (NULL, ?, ?, CURDATE(), NULL, ?, ?, ?) ");
			$query->execute(array($title, $author, $category, $intro, $full_text));
			$id = $this->db->lastInsertId();
			if (($_POST['tag'])){
				$tag = explode(",", $_POST['tag']);
				if (!empty($tag)){
					foreach ($tag as $value) {
						$query = $this->db->prepare("SELECT * FROM tag WHERE name = ?");
						$query->execute(array($value));
						//if tag isn't exist -> add it to table "tag" and then to art_tag table
						if ($query->rowCount() == 0) {
							$insert = $this->db->prepare("INSERT INTO tag VALUES (NULL, ?)");
							$insert->execute(array($value));
							$lastId = $this->db->lastInsertId();
							$insert = $this->db->prepare("INSERT INTO art_tag VALUES (?,?)");
							$insert->execute(array($id, $lastId));
						}
						else {
							$row = $query->fetch();
							$insert = $this->db->prepare("INSERT INTO art_tag VALUES (?, ?)");
							$insert->execute(array($id,$row['id']));
						}
					}
				}
			}
			if (!isset($_SESSION['answ'])) {
				$_SESSION['answ'] = "Successfully saved";
				 // header("Location:/myblog/adminpanel/");
			}
		}
	}
?>