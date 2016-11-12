<?php
	class main extends ACore {
	
		public function get_content(){
			echo '
			<section class="main">
                <div id="ri-grid" class="ri-grid ri-grid-size-2">
                    <img class="ri-loading-image" src="img/loading.gif"/>
                    <ul>';
                    for ($i = 1; $i <= 30; $i++) {
                    	if ($i < 8) echo '<li><a href="#"><img src="img/cooking'.$i.'.jpg"/></a></li>';
                    	else echo '<li><a href="#"><img src="images/medium/'.$i.'.jpg"/></a></li>';
                    }
                    echo'</ul>
                </div>
            </section>';
			echo '<div class = "content" id = "main">
			<div class="left">';
			$query = $this->db->query("SELECT article.id, article.title, DATE_FORMAT(article.create_at,'%d %M %Y') AS date, article.full_text, user.name as user, category.name as category
				FROM article LEFT JOIN category ON article.category_id=category.id LEFT JOIN user ON article.author_id=user.id 
				WHERE article.published = 1
				ORDER BY article.create_at DESC");
			while ($row = $query->fetch())
			{
				echo '<article>
				<a class = "title" href="?option=view&id_text='.$row['id'] .'"><h2>'.$row['title'].'</h2></a>
                    <p>'.$row['full_text'].'</p>
                    <h4>'.$row["date"].'</h4>
                    <h3>Category: '.$row["category"].'</h3>
                    <h3>Author: '.$row["user"].'</h3>
					<div style = "clear:both"></div>
		                    <div class = "act">
		                        <a href = "" id = "vote1"><span class="sprite sprite-like"></span>(cnt)</a>
		                        <a href = "" id = "vote2"><span class="sprite sprite-dislike"></span>(cnt)</a>
		                        <a href = "#comment" id = "comment"><span class="sprite sprite-comment"></span>(cnt)</a>
		                        <a href = "" id = "fav" ><span class="sprite sprite-fav"></span></a>
		                    </div>
		                    <div style = "clear:both"></div>
		                    <h3>Tags: </h3>';
							$query_tag = $this->db->prepare("SELECT tag.id, tag.name AS name, art_tag.article_id 
								FROM tag RIGHT JOIN (article RIGHT JOIN art_tag ON article.id = art_tag.article_id) ON tag.id = art_tag.tag_id
								WHERE art_tag.article_id = ? ");
							$query_tag->execute(array($row['id']));
							echo '<div class = "tags">';
							while ($row_tag = $query_tag->fetch()) echo '<a href = "">'.$row_tag['name'].'</a>';
							echo '</div>
                </article>';
			}
			echo '</div>';
		}
	}
?>
