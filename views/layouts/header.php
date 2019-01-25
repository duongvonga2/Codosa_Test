<?php 
	session_start();

    if(!isset($_SESSION['accessToken'])){
        header('Location: /Codosa_Test/views/login.php');
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
    <!-- <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script> -->

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/Codosa_Test/index.php">Codosa Holding</a>
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="/Codosa_Test/views/users/user_info.php">Infomation</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/Codosa_Test/views/users/user_links.php">Up Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/Codosa_Test/views/users/list_youtube_links.php">List link</a>
              </li>
          </ul>
          <ul class="nav justify-content-end">
            <li class="nav-item">
                <span class="navbar-brand">Hi <?php echo $_SESSION['userData']['last_name'] . ' ' . $_SESSION['userData']['first_name'] ?></span>
            </li>
            <li class="nav-item ">
                <a class="mr-2" href="">
                    <img width="40" height="40" class="rounded-circle" src="<?php echo $_SESSION['userData']['picture']['url']; ?>">
                </a>
                
            </li>
            <li class="nav-item">
                <a href="/Codosa_Test/controllers/logoutController.php"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log out</button></a>

            </li>
          </ul>
        </div>
    </nav>