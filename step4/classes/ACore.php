<?php
	abstract class ACore {
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

		protected function get_header() {
			include 'header.php';
		}

		protected function get_menu() {
			include 'menu.php';
		}

		protected function get_right_bar(){
			echo '
	            <div class="right">
	            <form name ="search" action="" method = "post">
	                <input type = "search" class = "field" placeholder = "Search..." name = "find" />
	                <hr>
	                <div class = "archive">
	                    <h5>Archive</h5>';
			$year = $this->db->query("SELECT DISTINCT year(create_at) as year FROM article"); 
			// var_dump($res->fetch());
			while ($rowy = $year->fetch())
			{
				echo '<ul class = "hierarchy">
                        <li class = "year">
                            <input class="hide" id="'.$rowy["year"].'" type="checkbox">
                            <label for="'.$rowy["year"].'">'.$rowy["year"].'</label>';
                $month = $this->db->query("SELECT DISTINCT month(create_at) as month, MONTHNAME(create_at) AS monthname FROM article WHERE year(create_at) = ".$rowy["year"]." "); 
                echo '<div>';
                while ($rowm = $month->fetch())
				{			
                   	echo '<ul class = "hierarchy">
	                        <li class = "month">
	                            <input class="hide" id="'.$rowy["year"].'-'.$rowm["month"].'" type="checkbox">
	                                <label for="'.$rowy["year"].'-'.$rowm["month"].'">'.$rowm["monthname"].'</label>';
	                $article = $this->db->query("SELECT id, title FROM article WHERE year(create_at) = ".$rowy['year']." and  month(create_at) = ".$rowm['month']." ");
	                echo '<div>
			               	<ul class = "posts">';
	                while ($rowa = $article->fetch()) {
	                    echo'<li><a href = "?option=view&id_text='.$rowa['id'] .'">'.$rowa["title"].'</a></li>';
	                }
	                echo '
		                	    	</ul>
		                    	</div>
		                	</li>
	                    </ul>';
	            }
	            echo '</div>
                    </li>
                </ul>';
			}
			echo '</div>
			</div>
			<div style = "clear:both"></div>';
		}

		protected function get_footer() {
			include 'footer.php';
		}

		public function get_body() {
			if (isset($_POST['Email']) && isset($_POST['Login']) && isset($_POST['Password'])) $this->obr();
			$this->get_header();
			$this->get_menu();
			$this->get_content();
			$this->get_right_bar();
			$this->get_footer();
		}

		abstract function get_content();
	}
?>