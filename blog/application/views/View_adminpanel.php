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
                        <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td><?php echo $row["id"]?></td>
                                    <td><?php echo $row["title"]?></td>
                                    <td><?php echo $row["user_name"]?></td>
                                    <td><?php echo $row["cat_name"]?></td>
                                    <td><?php echo $row["create_at"]?></td>
                                    <td>
                                        <input type="radio" 
                                         <?php if ($row["published"] == 1) echo 'checked'; ?>
                                        disabled>
                                        <a href=/myblog/update_article/<?php echo $row["id"]; ?>><span class="sprite sprite-edit"></span></a>
                                        <a href=/myblog/delete_article/<?php echo $row["id"]; ?> onclick="return confirm(\'are you sure?\') ? true : false;"><span class="sprite sprite-delete"></span></a>
                                    </td>
                                </tr>
                        <?php }  ?>
                        
                            </tbody>
                        </table>
		            </div>
		        </div>
		