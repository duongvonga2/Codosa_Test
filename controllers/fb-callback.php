<?php
	require_once '../config.php';
	require_once '../models/dbModel.php';
	require_once 'controller.php';
	

	try{
		$accessToken = $helper->getAccessToken();
	}
	catch (\Facebook\Exceptions\FacebookResponseException $e){
		echo 'Response Exception: '. $e->getMessage();
		exit();
	}
	catch(\Facebook\Exceiptions\FacebookSDKException $e){
		echo 'SDK Exception: ' . $e->getMessage();
	}

	if(!$accessToken){
		header('Location: /Codosa_Test/views/login.php');
		exit();
	}

	$oAuth2Client = $fb->getOAuth2Client();
	if($accessToken->isLongLived()){
		$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
	}
	$response = $fb->get('/me?fields=id, first_name, last_name, email, picture.type(large)',$accessToken);  // get data with url
	$userData = $response->getGraphNode()->asArray(); // get data of user as an array
	$_SESSION['userData'] = $userData;
	$_SESSION['accessToken'] = $accessToken;





	// check if user is available, then not update users info to database
	$check=0;
	
	$check = isAppear('users', 'facebook_id = ' . $_SESSION['userData']['id']); //check users is appear or not;
	if(!$check){
		
		$query="INSERT INTO users (`facebook_id`, `first_name`, `last_name`, `email`, `avatar`) VALUES (" . $_SESSION['userData']['id'] . ",'" . $_SESSION['userData']['first_name'] . "','" . $_SESSION['userData']['last_name'] . "','" . $_SESSION['userData']['email'] . "','" . $_SESSION['userData']['picture']['url'] . "')";
		dbUpdateData($query);
	}

	header('Location: /Codosa_Test/index.php');
	exit();
?>