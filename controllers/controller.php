<?php 
	require_once '../config.php';
	require_once '../models/dbModel.php';
	
	// check data is appear in DB or not, if yes return true, else return false
	function isAppear($table_name, $condition){
		$db = new Database;
		$result = $db->getRowsWithCondition($table_name,$condition);
		$count = mysqli_num_rows($result);
		echo "num of rows: " . $count;
		$db->disconnectDB();
		if($count==0){
			return false;
		}
		else return true;

	}


?>

