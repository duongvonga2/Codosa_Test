<?php
	require_once '../config.php';

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
	header('Location: /Codosa_Test/index.php');
	exit();
?>