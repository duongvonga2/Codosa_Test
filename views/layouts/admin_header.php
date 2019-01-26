<?php 
	session_start();

    if(!isset($_SESSION['user_name'])){ //if the session is not setup or destroy, redirect to login page
        header('Location: /Codosa_Test/views/admin/login.php');
        exit();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="/Codosa_Test/public/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/Codosa_Test/views/admin/index.php">Codosa Holding</a>
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="/Codosa_Test/views/admin/list_users.php">List Users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/Codosa_Test/views/admin/list_videos.php">List Videos</a>
              </li>
          </ul>
          <ul class="nav justify-content-end">
            <li class="nav-item">
                <span class="navbar-brand">Hi Admin</span>
            </li>
            <li class="nav-item ">
                <a class="mr-2" href="">
                    
                </a>
                
            </li>
            <li class="nav-item">
                <a href="/Codosa_Test/controllers/adminLogoutController.php"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log out</button></a>

            </li>
          </ul>
        </div>
    </nav>