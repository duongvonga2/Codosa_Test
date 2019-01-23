<?php 
require_once 'controller.php';

$target_dir = "uploads/";

$target_front_id_card = $target_dir . basename($_FILES["front-id-card"]["name"]);
$target_backsite_id_card = $target_dir . basename($_FILES["backsite-id-card"]["name"]);
$target_selfie_img = $target_dir . basename($_FILES["selfie_img"]["name"]);

$front_id_card_type = strtolower(pathinfo($target_front_id_card,PATHINFO_EXTENSION));
$backsite_id_card_type = strtolower(pathinfo($target_backsite_id_card,PATHINFO_EXTENSION));
$selfie_img_type = strtolower(pathinfo($target_selfie_img,PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    
    if(isImage('front-id-card')) {
        echo "front id card is an image - " . $check_front_id_card["mime"] . ".";
    } 
    else {
        echo "front id card is not an image." ;
    }
    if(isImage('backsite-id-card')) {
        echo "backsite id card is an image - " . $check_backsite_id_card["mime"] . ".";
    } 
    else {
        echo "backsite id card is not an image." ;
    }
    if(isImage('selfie_img')) {
        echo "selfie_img is an image - " . $check_selfie_img["mime"] . ".";
    } 
    else {
        echo "selfie_img is not an image." ;
    }

}


if(isFileExist($target_file)  && !isRightType($imageFileType)){
    echo "Sorry, your file was not uploaded.";
} 
else {
    if (move_uploaded_file($_FILES["upload-img"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["upload-img"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



?>

