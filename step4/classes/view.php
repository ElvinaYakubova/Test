<?php
	class view extends ACore {
		public function get_content(){
			echo '<div class = "content" id = "main">
					<div class="left">';
			if (!$_GET['id_text']) {
				echo 'Incorrect data';
			}
			else {
				$id_text = (int)$_GET['id_text'];
				if (!$id_text){
					echo 'Incorrect data';
				}
				else {
					$query = $this->db->prepare("SELECT article.title, DATE_FORMAT(article.create_at,'%d %M %Y') AS create_at, DATE_FORMAT(article.update_at,'%d %M %Y') AS update_at,
						article.full_text, user.name as user, category.name as category
						FROM article LEFT JOIN category ON article.category_id=category.id LEFT JOIN user ON article.author_id=user.id 
						WHERE article.id = ?");
					$query->execute(array($id_text));
					$row = $query->fetch();
					if(!$row) echo 'Article does not exist';
					else {
						echo '<article>
						<a class = "title" href=""><h2>'.$row['title'].'</h2></a>
		                    <p>'.$row['full_text'].'</p>';
		                    if ($row["update_at"]) echo '<h4>Last update: '.$row["update_at"].'</h4>';
		                    echo'
		                    <h3>Category: '.$row["category"].'</h3>
		                    <h4>'.$row["create_at"].'</h4>
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
		                    $query = $this->db->prepare("SELECT tag.id, tag.name AS name, art_tag.article_id 
								FROM tag RIGHT JOIN (article RIGHT JOIN art_tag ON article.id = art_tag.article_id) ON tag.id = art_tag.tag_id
								WHERE art_tag.article_id = ? ");
							$query->execute(array($id_text));
							echo '<div class = "tags">';
							while ($row = $query->fetch()) echo '<a href = "">'.$row["name"].'</a>';
							echo '</div>			
		                </article>					
							<form action = "" method = "post">
			                    <a name = "comment"></a>
			                    <label for="message">Live a reply</label>
			                    <textarea placeholder = "Enter your comment" name = "message" id = "message"></textarea>
			                    <label for="email">Email</label>
			                    <input type = "email" class = "field" placeholder = "Enter email" name = "email" id = "email"/>
			                    <label for="name">Name</label>
			                    <input type = "text" class = "field" placeholder = "Enter name" name = "name" id = "name" />
			                    <input type = "submit" value = "Post Comment" id = "postcom" name = "send" />
			                </form>';
					}
				}
			}
			echo '</div>';
		}
	}
?>