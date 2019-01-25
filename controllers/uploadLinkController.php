<?php
	require_once '../config.php';
	require_once '../models/dbModel.php';
	require_once 'controller.php';



	if(isset($_POST['youtube_link'])){
		
		$facebook_id = $_SESSION['userData']['id'];
		$youtube_link = $_POST['youtube_link'];
		$title_id = $_POST['title'];
		$subject_id = $_POST['subject'];
		$description = $_POST['description'];

		$start = strpos($youtube_link,'=') +1;
		$youtube_token = substr($youtube_link, $start);


		$query="INSERT INTO user_uploads (facebook_id, title_id, subject_id, youtube_link, description, status) VALUES ('$facebook_id','$title_id','$subject_id','$youtube_token','$description','waiting')";
		$result = updateData($query);
		echo $result;
		header('Location: /Codosa_Test/views/users/list_youtube_links.php');
		// echo $query;
	}

?>

