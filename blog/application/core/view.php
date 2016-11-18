<?php
	class View
		{

			public $data_a;
			
			function generate($content_view, $template_view, $data = null, $data_archive = NULL)
			{
				$data_archive = $this->data_a;
				// print_r($data_archive);
				include 'application/views/templates/'.$template_view;
			}

			function share($archive) {
				
				$this->data_a = $archive;
			}
		}
?>