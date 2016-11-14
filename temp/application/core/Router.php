<?php

	class Router
	{
	
		static function start()
		{
			$controller_name = 'main';
			$action_name = 'index';

			$routes = explode('/', $_SERVER['REQUEST_URI']);

			//get controller name
			if (!empty($routes[2]))
			{
				$controller_name = $routes[2];
			}

			//get action name
			if (!empty($routes[3]))
			{
				$action_name = $routes[3];
			}

			$model_name = 'Model_'.$controller_name;
			$controller_name = 'Controller_'.$controller_name;
			$action_name = 'action_'.$action_name;

			// add file with class of model

			$model_file = strtolower($model_name).'.php';
			$model_path = "application/models/".$model_file;
			if(file_exists($model_path))
			{
				include "application/models/".$model_file;
			}

			// add file with class of controller
			$controller_file = strtolower($controller_name).'.php';
			$controller_path = "application/controllers/".$controller_file;
			if(file_exists($controller_path))
			{
				include "application/controllers/".$controller_file;
			}

			else Router::ErrorPage404();

			$controller = new $controller_name;
			$action = $action_name;

			if(method_exists($controller, $action))
			{
				$controller->$action();
			}
			else Router::ErrorPage404();
			
		}


		function ErrorPage404()
		{
	        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
	        header('HTTP/1.1 404 Not Found');
			header("Status: 404 Not Found");
			header('Location:'.$host.'404');
	    }

		/*private $routes;

		public function __construct()
		{
				$routesPath = '/application/config/routes.php';
				$this->routes = include($routesPath);
		}

		private function getURI()
		{
			if(!empty($_SERVER['REQUEST_URI'])) {
				return trim($_SERVER['REQUEST_URI'], '/');
			}
		}

		public function run() 
		{
			$uri = $this->getURI();
			
			foreach ($this->routes as $uriPattern => $path) {
				echo "<br>$uriPattern->$path";
			}
		}*/

	}

?>