<?php
	class delete_article extends ACore_admin {
		public function get_content() {
			if ($_GET["id"]) {
				$id_text = $_GET["id"];
				$query = $this->db->prepare("DELETE FROM art_tag WHERE article_id = ?");
				$query->execute(array($id_text));
				$query = $this->db->prepare("DELETE FROM article WHERE article.id = ? ");
				$query->execute(array($id_text));
				$count = $query->rowCount();
				if ($count == 1) $_SESSION['res']  = "Successfully deleted";
				else $_SESSION['res']  = "Error";
				header("Location:?option=admin");
			}
			else {
				exit("Incorrect data");
			}
		}
	}
?>