<?php
	
	define('HOST_NAME', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '123');
	define('DB_NAME', 'codosa_test');

	// define('FILE_MAX_SIZE', 5000000);
	define('ARRAY_IMAGE_TYPE', array('png','jpg','jpeg','gif'));


	session_start();
	require_once "Facebook/autoload.php";
	$fb = new \Facebook\Facebook([
		'app_id' => '637465913375868',
		'app_secret' => 'd13b8521f643360482b2e4894dcb8293',
		'default_graph_version' => 'v2.2'
	]);

	$helper = $fb->getRedirectLoginHelper();



?>