<?php 
	require_once '../config.php';
	require_once '../models/dbModel.php';
	
	$allowType =  array('jpg','png', 'jpeg', 'gif');
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


	function isImage($img_name){
		$check = getimagesize($_FILES[$img_name]['tmp_name']);
		if($check){
			return true;
		}
		return false;
	}

	function isFileExist($target_file){
		if(file_exists($target_file)){
			return true;
		}
		else return false;
	}

	function isTooLarge($size_file){
		if($size_file>MAX_FILE_SIZE){
			return true;
		}
		else return false;
	}

	function isRightType($type_file){
		if(in_array($type_file, $allowType)){
			return true;
		}
		else return false;
	}

?>

