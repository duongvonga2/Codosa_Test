<?php 
require_once '../config.php';
require_once '../models/dbModel.php';
require_once 'controller.php';

$target_dir = "uploads/"; //the folder to upload image

$target_front_id_card = $target_dir . basename($_FILES["front-id-card"]["name"]);
$target_backsite_id_card = $target_dir . basename($_FILES["backsite-id-card"]["name"]);
$target_selfie_img = $target_dir . basename($_FILES["selfie-img"]["name"]);

//get the image 's type'
$front_id_card_type = strtolower(pathinfo($target_front_id_card,PATHINFO_EXTENSION));
$backsite_id_card_type = strtolower(pathinfo($target_backsite_id_card,PATHINFO_EXTENSION));
$selfie_img_type = strtolower(pathinfo($target_selfie_img,PATHINFO_EXTENSION));



if(isset($_POST["submit"])) {
    
    //check is an image?    
    if(isImage('front-id-card') && isImage('backsite-id-card') && isImage('selfie-img')) {
        
        //check is it right type
        if(isRightType($front_id_card_type) && isRightType($backsite_id_card_type) && isRightType($selfie_img_type)){
        	
            // check the file has exist yet, if insert the url of images to database
            if(isFileExist($target_front_id_card) || isFileExist($target_backsite_id_card) || isFileExist($target_selfie_img)){
        		echo "one image uploaded";
        	}
        	else{
                //upload the image to uploads folder
        		move_uploaded_file($_FILES["front-id-card"]["tmp_name"], $target_front_id_card);
        		move_uploaded_file($_FILES["backsite-id-card"]["tmp_name"], $target_backsite_id_card);
        		move_uploaded_file($_FILES["selfie-img"]["tmp_name"], $target_selfie_img);


        		//insert url of images to database
        		$query = "UPDATE users SET front_id_card = '$target_front_id_card', backside_id_card = '$target_backsite_id_card', selfie = '$target_selfie_img', status='Waiting' WHERE facebook_id = " . $_SESSION['userData']['id'];
        		dbUpdateData($query);

        		// echo $query;
        	}
        }
        else echo 'type not allow';
    } 
    else {
        echo " is not an image." ;
    }
    header('Location: ../views/users/user_info.php');
}




?>

