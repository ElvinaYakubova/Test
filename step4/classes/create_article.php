<?php
	class create_article extends ACore_Admin {
		public function get_content() {
		echo '
				<div class="content">
	            	<div class = "admin">
	            	<form action = "" method = "post" id = "formArticle" name = "formArticle" onkeypress="if(event.keyCode == 13) return false;">
	                    <p>Choose category</p>
	                    <select name="category" id = "category" required>
	                        <option></option>';
	                        $query = $this->db->query("SELECT *	from category");
	                        while ($row = $query->fetch()) {
	                            echo '<option value = "'.$row["id"].'">'.$row["name"].'</option>';
	                        }
	                    echo '
	                    </select>
	                    <textarea name = "title" id = "title" placeholder = "title" required="required" maxlength = "255"></textarea>
	                    <textarea name = "intro" id = "intro" placeholder = "article preview" required="required" maxlength = "255"></textarea>
	                    <textarea name="editor1" id="editor1" rows="10" cols="80" required></textarea>
	                    <script>
	                        CKEDITOR.replace( "editor1" );
	                    </script>
	                    <input type = "text" value = "" id = "tag" placeholder="Add tags separated by commas" name = "tag"/>
	                    <input type = "submit" value = "Save" id = "save_new" name = "save_new" />
	                    <a href="?option=admin" id = "back">Back</a>
	                </form>
			        </div>
			    </div>';
		}
		protected function obr() {
			$title = $_POST['title'];
			$author = $_SESSION['user'];
			$intro = $_POST['intro'];
			$full_text = $_POST['editor1'];
			$category = $_POST['category'];
			if (empty($title) || empty($intro) || empty($full_text) || empty($category)) {
				echo "Please enter data";
				exit;
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
			$_SESSION['res'] = "Successfully saved";
			header("Location:?option=admin");
			exit;
		}
	}
?>