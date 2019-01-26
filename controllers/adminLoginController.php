<?php 
require_once '../config.php';
require_once '../models/dbModel.php';
require_once 'controller.php';


if(isset($_POST['user_name'])){
	$user_name = $_POST['user_name'];
	$pass = md5($_POST['password']); //encode the password user has entered

	$user=dbgetRowsWithCondition('admins',"user_name ='".$user_name."'")->fetch_assoc();

	if(!$user || $pass != $user['password']){
		echo 0;
	}
	else if($pass == $user['password']) {
		// header('Location: http://stackoverflow.com');
		$_SESSION['user_name'] = $user_name;
		echo 1;
	}


}
?>
