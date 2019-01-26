<?php 
	session_start();

    if(!isset($_SESSION['accessToken'])){ //if the session is not setup or destroy, redirect to login page
        header('Location: /Codosa_Test/views/users/login.php');
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
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="/Codosa_Test/index.php">Codosa Holding</a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/Codosa_Test/views/users/user_info.php">Your Infomation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Codosa_Test/views/users/upload_video.php">Upload Video</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Codosa_Test/views/users/list_videos.php">Your Videos</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item show-info">
            <span class="navbar-brand">Hi <?php echo $_SESSION['userData']['last_name']?></span>
        </li>
        <li class="nav-item show-info ">
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

