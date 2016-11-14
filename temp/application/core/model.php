<?php
	define("HOST", "localhost");
	define("USER", "root");
	define("PASS", "vertrigo");
	define("DB", "myblog");
	class Model
	{
		protected $db;
		public function __construct() {
			try {
				$this->db = new PDO("mysql:host=".HOST.";dbname=".DB.";charset=utf8", USER, PASS);
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e) {
			    die('Connection error: ' . $e->getMessage());
			}
		}
		// public function get_data()
		// {
		// }
		public function get()
		{		
		}
	}
?>