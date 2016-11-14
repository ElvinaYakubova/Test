<?php
	class View
		{
			
			function generate($content_view, $template_view, $data = null, $data_archive = null)
			{
				/*
				if(is_array($data)) {
					// преобразуем элементы массива в переменные
					extract($data);
				}
				*/
				
				include 'application/views/templates/'.$template_view;
			}
		}
?>