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

		$query="UPDATE 	users SET status='$status' WHERE id=".$_GET['id'];
		$check=dbUpdateData($query); // update status of user's image to database
		// if($check==1) echo 1;
		// else echo 0;
		header('Location: /Codosa_Test/views/admin/list_users.php'); //redirect to list users page

	}

?>

