<?php 
require_once 'controller.php';

$target_dir = "uploads/";

$target_front_id_card = $target_dir . basename($_FILES["front-id-card"]["name"]);
$target_backsite_id_card = $target_dir . basename($_FILES["backsite-id-card"]["name"]);
$target_selfie_img = $target_dir . basename($_FILES["selfie-img"]["name"]);

$front_id_card_type = strtolower(pathinfo($target_front_id_card,PATHINFO_EXTENSION));
$backsite_id_card_type = strtolower(pathinfo($target_backsite_id_card,PATHINFO_EXTENSION));
$selfie_img_type = strtolower(pathinfo($target_selfie_img,PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    
    if(isImage('front-id-card') && isImage('backsite-id-card') && isImage('selfie-img')) {
        if(isRightType($front_id_card_type) && isRightType($backsite_id_card_type) && isRightType($selfie_img_type)){
        	if(isFileExist($target_front_id_card) || isFileExist($target_backsite_id_card) || isFileExist($target_selfie_img)){
        		echo "one image uploaded";
        	}
        	else{
        		move_uploaded_file($_FILES["front-id-card"]["tmp_name"], $target_front_id_card);
        		move_uploaded_file($_FILES["backsite-id-card"]["tmp_name"], $target_backsite_id_card);
        		move_uploaded_file($_FILES["selfie-img"]["tmp_name"], $target_selfie_img);


        		$db = new Database();
        		$query = "UPDATE users SET front_id_card = '$target_front_id_card', backside_id_card = '$target_backsite_id_card', selfie = '$target_selfie_img' WHERE facebook_id = " . $_SESSION['userData']['id'];
        		$db->updateData($query);
        		// echo $query;
        	}
        }
        else echo 'type not allow';
    } 
    else {
        echo " is not an image." ;
    }
    // header('Location: ../views/user_info.php');
}




?>

