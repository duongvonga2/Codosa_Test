<?php 
require '../config.php';


 // $fb->destroySession();
 session_start();
 unset($_SESSION['user_name']);
 session_destroy();
 header("Location:/Codosa_Test/views/admin/index.php");

?>
