<?php
	class Model_archive extends Model
	{

		public function get_data()
		{	

			$query = $this->db->query("SELECT year(create_at) AS year,  month(create_at) as month, MONTHNAME(create_at) AS monthname,  id, title FROM article
		 		GROUP BY year, month, id");
		 	$cnt = 0;
			while ($row = $query->fetch()) {
				$res[$cnt++] = $row;
			
			}
			return $res;
		}

	}
?>