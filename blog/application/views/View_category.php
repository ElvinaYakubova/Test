<div class = "content" id = "main">
	<div class="left">
		<div class = "preview">

			<?php foreach ($data as $row) 
			{ ?>
				
			<div class = "article">
		                    <img src="/myblog/img/beauty1.jpg" alt="Image1" title="Image1" />
		                    <h3><?php echo $row["title"] ?></h3>
		                    <p><?php echo $row["intro_text"] ?></p>
		                    <a href=../view/<?php echo $row['id']?> title= "Read more">Read more</a>
		    </div>
		    <?php } ?>
		</div>
		<div class = "arrowl">
			<a href= ""><span class="sprite sprite-left"></span></a>
		</div>
	    <div class = "arrowr">
	    	<a href= ""><span class="sprite sprite-right"></span></a>
	    </div>

	</div>