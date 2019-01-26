	<?php 
	require_once '../config.php';
	require_once '../models/dbModel.php';
	require_once 'controller.php';

	if(isset($_GET['action'])){
		$status = '';
		if($_GET['action'] == 'waiting'){
			$status='Waiting';
		}
		else if($_GET['action'] == 'accept'){
			$status = 'Accept';
		}
		else $status='Ban';

		$query="UPDATE 	videos SET status='$status' WHERE id=".$_GET['id'];
		$check=dbUpdateData($query); //update status of user's video to database;

		header('Location: /Codosa_Test/views/admin/list_videos.php'); //redirect to list videos page
	}

?>

