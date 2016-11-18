<div class = "content" id = "main">
	<div class="left">
		<article>
			<a class = "title" href=""><h2><?php echo $data['title']?></h2></a>
		        <p><?php echo $data['full_text']?></p>
		        <?php 
		        	if ($data["update_at"]) echo '<h4>Last update: '.$data["update_at"].'</h4>';
		        ?>
		                 <h3>Category:<?php echo $data["category"]?></h3>
		                    <h4><?php echo $data["create_at"] ?></h4>
		                    <h3>Author:<?php echo $data["user"] ?></h3>
		                    <div style = "clear:both"></div>
		                    <div class = "act">
		                        <a href = "" id = "vote1"><span class="sprite sprite-like"></span>(cnt)</a>
		                        <a href = "" id = "vote2"><span class="sprite sprite-dislike"></span>(cnt)</a>
		                        <a href = "#comment" id = "comment"><span class="sprite sprite-comment"></span>(cnt)</a>
		                        <a href = "" id = "fav" ><span class="sprite sprite-fav"></span></a>
		                    </div>
		                    <div style = "clear:both"></div>
		                    <h3>Tags: </h3>
							<div class = "tags">
							<?php $cnt = 0;
								while ($cnt < count($data['tag'])) {
									echo '<a href = "">'.$data['tag'][$cnt]['name'].'</a>'; 
									echo ' ';
									$cnt++;
								}
							?>
							</div>			
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
		</form>
	</div>