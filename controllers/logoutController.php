<?php


 require '../config.php';


 // $fb->destroySession();
 session_start();
 unset($_SESSION['userdata']);
 unset($_SESSION['access_Token']);
 session_destroy();
 header("Location:/Codosa_Test/index.php");


?>