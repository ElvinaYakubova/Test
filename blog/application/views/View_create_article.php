<div class="content">
	            	<div class = "admin">
	            	<form action = "" method = "post" id = "formArticle" name = "formArticle" onkeypress="if(event.keyCode == 13) return false;">
	                    <p>Choose category</p>
	                    <select name="category" id = "category" required>
	                        <option></option>
	                        <?php foreach ($data as $row) { ?>
	                            <option value = <?php echo $row["id"]; ?> ><?php echo $row["name"]; ?></option>';
	                        <?php } ?>
	                    </select>
	                    <textarea name = "title" id = "title" placeholder = "title" required="required" maxlength = "255"></textarea>
	                    <textarea name = "intro" id = "intro" placeholder = "article preview" required="required" maxlength = "255"></textarea>
	                    <textarea name="editor1" id="editor1" rows="10" cols="80" required></textarea>
	                    <script>
	                        CKEDITOR.replace( "editor1" );
	                    </script>
	                    <input type = "text" value = "" id = "tag" placeholder="Add tags separated by commas" name = "tag"/>
	                    <input type = "submit" value = "Save" id = "save_new" name = "save_new" />
	                    <a href="/myblog/adminpanel" id = "back">Back</a>
	                    <h3><?php 
	                    		if (isset($_SESSION['answ'])) {
	                    				echo $_SESSION['answ']; 
	                    				unset($_SESSION['answ']);
	                    		}
	                    	?> 
	                    </h3>
	                </form>
			        </div>
			    </div>