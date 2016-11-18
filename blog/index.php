<?php
	//Front Controller


	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	require_once 'application/core/model.php';
	require_once 'application/core/view.php';
	require_once 'application/core/controller.php';
	require_once 'application/core/Controller_index.php';
	require_once 'application/core/Controller_admin.php';
	require_once 'application/core/Router.php';

	Router::start();
?>