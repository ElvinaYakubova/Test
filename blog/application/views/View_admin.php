				<div class="content">
	            	<div class = "admin">
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
                        <tbody>
                            <?php print_r($data); ?>
                        
                       <!--  while ($row = $query->fetch()) {
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
                                        <a href="?option=update_article&id='.$row["id"].'"><span class="sprite sprite-edit"></span></a>
                                        <a href="?option=delete_article&id='.$row["id"].'" onclick="return confirm(\'are you sure?\') ? true : false;"><span class="sprite sprite-delete"></span></a>
                                    </td>
                                </tr>';
                        }
                        echo ' -->
                            </tbody>
                        </table>
		            </div>
		        </div>
		
