<?php
    require_once '../../config.php';
    
    $redirectURL = "http://localhost/Codosa_Test/controllers/fb-callback.php";
    $permission = ['email']; //optional permission
    $loginURL = $helper->getLoginUrl($redirectURL, $permission); // get url to login facebook

    if(isset($_SESSION['accessToken'])){ //if the session was setted up, redirect to index.php
        header('Location: /Codosa_Test/index.php');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        <div class="row  mt-5">

             <div class="col-md-4 offset-md-4 justify-content-center" align="center">
                 <h1>Codosa Holding</h1>
                <form>
                    <input type="text" name="mail" class="form-control" placeholder="email" ><br>
                    <input type="password" name="password" placeholder="password" class="form-control" ><br>
                    <input type="submit" value="log in" class="btn btn-primary mb-3" >
                    <input type="button" onclick="window.location= '<?php echo $loginURL; ?>'" value="log in with Facebook" class="btn btn-primary mb-3" >
                </form>
            </div>
            
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
