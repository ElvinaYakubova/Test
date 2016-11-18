<section class="main">
                <div id="ri-grid" class="ri-grid ri-grid-size-2">
                    <img class="ri-loading-image" src="img/loading.gif"/>
                    <ul>
                    <?php
                    for ($i = 1; $i <= 30; $i++) {
                    	if ($i < 8) echo '<li><a href="#"><img src="img/cooking'.$i.'.jpg"/></a></li>';
                    	else echo '<li><a href="#"><img src="images/medium/'.$i.'.jpg"/></a></li>';
                    } ?>
                    </ul>
                </div>
            </section>
			<div class = "content" id = "main">
				<div class="left">
					<?php foreach ($data as $row) { ?>
					    	<article>
								<a class = "title" href="view/<?php echo $row['id']?>"><h2><?php echo $row['title']?></h2></a>
				                    <p><?php echo $row['full_text']?></p>
				                    <h4><?php echo $row["date"]?></h4>
				                    <h3>Category:<?php echo $row["category"]?></h3>
				                    <h3>Author:<?php echo $row["user"]?></h3>
									<div style = "clear:both"></div>
						                    <div class = "act">
						                        <a href = "" id = "vote1"><span class="sprite sprite-like"></span>(cnt)</a>
						                        <a href = "" id = "vote2"><span class="sprite sprite-dislike"></span>(cnt)</a>
						                        <a href = "#comment" id = "comment"><span class="sprite sprite-comment"></span>(cnt)</a>
						                        <a href = "" id = "fav" ><span class="sprite sprite-fav"></span></a>
						                    </div>
						                    <div style = "clear:both"></div>
						                    <h3>Tags: </h3>
						                    <?php $cnt = 0;
						                    echo '<div class = "tags">';
										    while ($cnt < count($row['tag'])) {
										    	echo '<a href = "">'.$row['tag'][$cnt]['name'].'</a>';
										    	echo ' ';
										    	$cnt++;
										    } ?>
											</div>
							</article>
					<?php	} ?>
						</div>
						
					