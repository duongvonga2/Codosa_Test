<?php
	require_once '../config.php';
	require_once '../models/dbModel.php';
	require_once 'controller.php';



	if(isset($_POST['submit'])){
		
		$facebook_id = $_SESSION['userData']['id']; //get facebook_id from session
		$youtube_link = $_POST['youtube_link']; // get youtube link
		$title_id = $_POST['title'];
		$subject_id = $_POST['subject'];
		$description = $_POST['description'];

		$start = strpos($youtube_link,'=') +1; //find the position to start get string in youtube's link.
		$youtube_token = substr($youtube_link, $start); // get the string which is id of the video


		$query="INSERT INTO videos (facebook_id, title_id, subject_id, youtube_link, description, status) VALUES ('$facebook_id','$title_id','$subject_id','$youtube_token','$description','Waiting')";
		$result = dbUpdateData($query);
		// echo $result;
		header('Location: /Codosa_Test/views/users/list_videos.php');
	}

?>

