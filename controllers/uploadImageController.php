<?php 
require_once 'controller.php';

$statusMsg='';

$targetDir = 'uploads/';
$fileName = basename($_FILES['img']['name']);
echo 'file name: '. $fileName;
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
$allowType = array('jpg', 'png' , 'jpeg', 'gif');

if(isset($_POST['submit']) && !empty($_FILES['img']['name'])){
	if(in_array($fileType, $allowType)){
		if(move_uploaded_file($_FILES['img']['tmp_name'],$targetFilePath)){
			$db=new Database();
			$query="UPDATE users SET selfie=$fileName WHERE id=6";
			$db->updateData($query);
		}
		else {
			$statusMsg = 'file upload fail';
		}

	}
	else {
		$statusMsg = 'not allow type of image';
	}
}
else {
	$statusMsg = 'select img to upload';
}
echo $statusMsg;
?>

