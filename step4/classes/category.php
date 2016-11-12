<?php
	class category extends ACore {
	
		public function get_content(){
			echo '<div class = "content" id = "main">
					<div class="left">';
			if (!$_GET['id_category']) {
				echo 'Incorrect data';
			}
			else {
				$id_cat = (int)$_GET['id_category'];
				if (!$id_cat){
					echo 'Incorrect data';
				}
				else {
					$query = $this->db->prepare("SELECT article.id, article.title, article.intro_text
						FROM article WHERE article.category_id = ? AND article.published = 1 ORDER BY article.create_at DESC");
					$query->execute(array($id_cat));
					echo '<div class = "preview">';
					$res = $query->fetchAll();
					foreach ($res as $row) 
					{
						echo'
						<div class = "article">
		                    <img src="img/beauty1.jpg" alt="Image1" title="Image1" />
		                    <h3>'.$row["title"].'</h3>
		                    <p>'.$row["intro_text"].'</p>
		                    <a href="?option=view&id_text='.$row['id'].'" title= "Read more">Read more</a>
		                </div>';
					}
					echo '</div>';
					if (!$res) echo "Page can't be found";
					else {
						echo'
						<div class = "arrowl"><a href= ""><span class="sprite sprite-left"></span></a></div>
	               		<div class = "arrowr"><a href= ""><span class="sprite sprite-right"></span></a></div>';
	               	}
				}
			}
			echo '</div>';
		}
	}
?>
