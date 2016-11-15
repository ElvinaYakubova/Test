<?php
	class View
		{
			
			function generate($content_view, $template_view, $data = null, $data_archive = null)
			{
				
				include 'application/views/templates/'.$template_view;
			}
		}
?>