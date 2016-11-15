         <div class="right">
	            <form name ="search" action="" method = "post">
	                <input type = "search" class = "field" placeholder = "Search..." name = "find" />
	                <hr>
	                <div class = "archive">
	                    <h5>Archive</h5>
			<?php 
				$cnt = count($data_archive);
				$i = $cnt;
				$year = 0;
				$year_prev = 0;
				while($i--) {
					$year = $data_archive[$i]['year'];
					if ($year != $year_prev) { //уникальный год
						$year_prev = $year;
						$month = -1;
						$month_prev = -1;
						echo '<ul class = "hierarchy">
	                        	<li class = "year">
	                            	<input class="hide" id="'.$year.'" type="checkbox">
	                            	<label for="'.$year.'">'.$year.'</label>
	                            	<div>';
		                            $j = $i+1;
		                            while($j--) {
		                            	if ( $data_archive[$j]['year'] != $year) break; //если год поменялся, выходим из цикла поиска месяцев
			                            $month =  $data_archive[$j]['month'];
			                            if ($month != $month_prev) { //уникальный месяц
			                            	$month_prev = $month;
			                            	
			                            	echo '<ul class = "hierarchy">
							                        <li class = "month">
							                            <input class="hide" id="'.$year.'-'.$month.'" type="checkbox">
							                                <label for="'.$year.'-'.$month.'">'. $data_archive[$j]['monthname'].'</label>
							                                <div>
					               								<ul class = "posts">';
					               								$k = $j+1;
					               								while($k--) {
					               									if ( $data_archive[$k]['month'] != $month) break; //если неподходящий месяц, то выходим
					               									echo '<li><a href = "view/'.$data_archive[$k]['id'].'">'. $data_archive[$k]['title'].'</a></li>';
					               								}
					               								echo '
									                	    	</ul>
									                    	</div>
									                	</li>
								                    </ul>';
								        }
							    	}
							    echo '</div>
		                    </li>
		                </ul>';
					}
				} ?>
				</div>
			</div>
			<div style = "clear:both"></div>
		