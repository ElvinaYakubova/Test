<?php
	class admin extends ACore_admin {
		public function get_content() {
			echo '
				<div class="content">
	            	<div class = "admin">';
                    if (isset($_SESSION["res"])) {
                        echo $_SESSION["res"];
                        unset($_SESSION["res"]);
                    }
                    echo'
	            	<a name = "showtable"></a><table id="myTable" class="tablesorter">
                    <caption><h2>Articles</h2></caption>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                     </thead>
                        <tbody>';
                        if ($_SESSION['user'] != 1) {
                            $query = $this->db->prepare("SELECT article.id, article.title, user.name as user_name, category.name as cat_name, article.create_at, article.published 
    							from user RIGHT JOIN (category RIGHT JOIN article ON category.id = article.category_id) ON user.id = article.author_id
    							WHERE (user.id = ?) ORDER BY article.create_at DESC");
                        }
                        else { //admin
                            $query = $this->db->prepare("SELECT article.id, article.title, user.name as user_name, category.name as cat_name, article.create_at, article.published  
                                from user RIGHT JOIN (category RIGHT JOIN article ON category.id = article.category_id) ON user.id = article.author_id
                                WHERE (user.id = ? or user.role = 2) ORDER BY article.create_at DESC");
                        }
                        $query->execute(array($_SESSION['user']));
                        
                        while ($row = $query->fetch()) {
                            echo '
                                <tr>
                                    <td>'.$row["id"].'</td>
                                    <td>'.$row["title"].'</td>
                                    <td>'.$row["user_name"].'</td>
                                    <td>'.$row["cat_name"].'</td>
                                    <td>'.$row["create_at"].'</td>
                                    <td>
                                        <input type="radio"';
                                        if ($row["published"] == 1) echo 'checked';
                                        echo ' disabled>
                                        <a href="?option=update_article&id='.$row["id"].'"><img src="img/edit.png" alt="edit" /></a>
                                        <a href="?option=delete_article&id='.$row["id"].'" onclick="return confirm(\'are you sure?\') ? true : false;"><img src="img/delete.png" alt="delete" /></a>
                                    </td>
                                </tr>';
                        }
                        echo '
                            </tbody>
                        </table>
		            </div>
		        </div>';
		}
	}
?>
