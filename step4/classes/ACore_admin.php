<?php
	abstract class ACore_admin {
		protected $db;
		public function __construct() {
			if (!$_SESSION['user']) {
				header("Location:?option=login");
				// exit();
			}
			try {
				$this->db = new PDO("mysql:host=".HOST.";dbname=".DB.";charset=utf8", USER, PASS);
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e) {
			    die('Connection error: ' . $e->getMessage());
			}
		}

		protected function get_header() {
			include 'view/admin_header.php';
		}

		protected function get_menu() {
			include 'view/admin_menu.php';
		}		

		protected function get_footer() {
			include 'view/footer.php';
		}

		public function get_body() {
			if ($_POST && $_POST['name'] == "save") $this->save();
			else if ($_POST && $_POST['name'] == "publish") $this->publish();
			else if ($_POST) $this->obr(); 
			$this->get_header();
			$this->get_menu();
			$this->get_content();
			$this->get_footer();
		}

		abstract function get_content();

		protected function get_article_text($id) {
			$query = $this->db->prepare("SELECT id, title, intro_text, full_text, category_id, author_id from article WHERE id = ? ");
			$query->execute(array($id));
			$row = $query->fetch();
			return $row;

		}
	}
?>