<?php 
require '../config.php';


 // $fb->destroySession();
 session_start();
 unset($_SESSION['user_name']);
 // unset($_SESSION['access_Token']);
 session_destroy();
 header("Location:/Codosa_Test/views/admin/index.php");

?>
