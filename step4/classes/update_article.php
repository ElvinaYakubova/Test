<?php
	class update_article extends ACore_Admin {
		public function get_content() {
			if ($_GET['id']) {
				$id_text = $_GET['id'];
			}
			else exit("Incorrect data");
			$text = $this->get_article_text($id_text);
		if ($text['author_id'] != $_SESSION['user'] && $_SESSION['user'] != 1) exit('Access denied');
		if (!$text['id']) exit("Article doesn't exist");
		echo '
				<div class="content">
	            	<div class = "admin">
	            	<form action = "" method = "post" id = "formArticle" name = "formArticle" onkeypress="if(event.keyCode == 13) return false;">
	                    <p>Choose category</p>
	                    <select name="category" id = "category" required>
	                        <option></option>';
	                        $query = $this->db->query("SELECT *	from category");
	                        while ($row = $query->fetch()) {
	                            echo '<option value = "'.$row["id"].'"';
	                            if ($text["category_id"] == $row["id"]) echo 'selected';
	                            	echo '>'.$row["name"].'</option>';
	                        }
	                    echo '
	                    </select>
	                    <input type = "hidden" name = "id" value = '.$text["id"].'>
	                    <textarea name = "title" id = "title" placeholder = "title" required="required" maxlength = "255">'.$text["title"].'</textarea>
	                    <textarea name = "intro" id = "intro" placeholder = "article preview" required="required" maxlength = "255">'.$text["intro_text"].'</textarea>
	                    <textarea name="editor1" id="editor1" rows="10" cols="80" required>'.$text["full_text"].'</textarea>
	                    <script>
	                        CKEDITOR.replace( "editor1" );
	                    </script>';
	                    $this->showtags();
	                    echo'
	                    <input type = "submit" value = "Save" id = "save" name = "save" />';
	                    if ($_SESSION['user'] == 1) echo'<input type = "submit" value = "Publish" id = "publish" name = "publish" />';
	                    echo'
	                    <a href="?option=admin" id = "back">Back</a>
	                </form>
                	<div id = "answer">';
                	if (isset($_SESSION["res"])) {
	            		echo $_SESSION["res"];
	            		unset($_SESSION["res"]);
	            	}
	            	echo '
	            	</div>
			        </div>
			    </div>';
		}
		protected function save() {
			$id = $_POST['id'];
			$title = $_POST['title'];
			$intro = $_POST['intro'];
			$full_text = $_POST['editor'];
			$category = $_POST['category'];
			$tag = explode(",", $_POST['tags']);
			//del all tags from this article
			$del = $this->db->prepare("DELETE FROM art_tag WHERE article_id = ?");
			$del->execute(array($id));
			if (($_POST['tags'])){
				if (!empty($tag)){
					foreach ($tag as $value) {
						$seltag = $this->db->prepare("SELECT * FROM tag WHERE name = ?");
						$seltag->execute(array($value));
						//if tag isn't exist -> add it to table "tag" and then to art_tag table
						if ($seltag->rowCount() == 0) {
							$insert = $this->db->prepare("INSERT INTO tag VALUES (NULL, ?)");
							$insert->execute(array($value));
							$lastId = $this->db->lastInsertId();
							$insert = $this->db->prepare("INSERT INTO art_tag VALUES (?,?)");
							$insert->execute(array($id, $lastId));
						}
						else {
							$row = $seltag->fetch();
							$insert = $this->db->prepare("INSERT INTO art_tag VALUES (?, ?)");
							$insert->execute(array($id,$row['id']));
						}
					}
				}
			}
			if (empty($title) || empty($intro) || empty($full_text) || empty($category)) {
				echo "Please enter data";
				exit;
			}
			$query = $this->db->prepare("UPDATE myblog.article 
				SET title = ?, update_at = NOW(), category_id = ?, intro_text = ?, full_text = ?, published = 0
				WHERE article.id = ? ");
			$query->execute(array($title, $category, $intro, $full_text, $id));
			echo "Your changes have been saved";
			// header("Location:?option=admin");
			exit;
		}

		protected function publish() {
			$id = $_POST['id'];
			$title = $_POST['title'];
			$intro = $_POST['intro'];
			$full_text = $_POST['editor'];
			$category = $_POST['category'];
			
			if (empty($title) || empty($intro) || empty($full_text) || empty($category)) {
				echo "Please enter data before publishing";
				exit;
			}
			$query = $this->db->prepare("UPDATE myblog.article 
				SET title = ?, update_at = NOW(), category_id = ?, intro_text = ?, full_text = ?
				WHERE article.id = ? ");
			$query->execute(array($title, $category, $intro, $full_text, $id));
			$query = $this->db->prepare("UPDATE myblog.article SET published = 1 WHERE article.id = ? ");
			$query->execute(array($id));
			echo "Successfully published";
			exit;
		}

		public function showtags() {
			$query = $this->db->prepare("SELECT tag.id, tag.name AS name, art_tag.article_id 
				FROM tag RIGHT JOIN (article RIGHT JOIN art_tag ON article.id = art_tag.article_id) ON tag.id = art_tag.tag_id
				WHERE art_tag.article_id = ? ");
			$query->execute(array($_GET['id']));
			echo '<div id = "tags">';
			while ($row = $query->fetch()) {
				// $idval = 'tag'.$row["id"];
				echo'<span>'.$row["name"].'</span>';
            }
            echo '<input type="text" value="" placeholder="Add a tag" /></div>';
		}

	}
?>