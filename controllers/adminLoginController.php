<?php 
require_once '../config.php';
require_once '../models/dbModel.php';
require_once 'controller.php';


if(isset($_POST['user_name'])){

	$user_name = $_POST['user_name'];
	$pass = md5($_POST['password']); //encode the password user has entered

	$user=dbgetRowsWithCondition('admins',"user_name ='".$user_name."'")->fetch_assoc(); //get data from table users in database by colum user_name

	if(!$user || $pass != $user['password']){ // if $user is null or $password not right respone 0 to client
		echo 0;
	}
	else if($pass == $user['password']) {	//if password is right respone 1 to client
		// header('Location: http://stackoverflow.com');
		$_SESSION['user_name'] = $user_name; //setup session
		echo 1; 
	}


}
?>
