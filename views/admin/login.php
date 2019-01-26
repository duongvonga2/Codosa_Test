<?php
    require_once '../../config.php';
    if(isset($_SESSION['user_name'])){ //if the session was setted up, redirect to index.php
        header('Location: /Codosa_Test/views/admin/index.php');
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
                <form action="" id="login" method="POST" class="needs-validation" novalidate>
                	<div class="form-group row mb-4">
                		<div class="col-sm-12">
	                		<input type="text" name="user_name" class="form-control" placeholder="User name" required>
	                    	<div class="invalid-tooltip">
					          Please write user's name
					        </div>
					    </div>
                	</div>
                	<div class="col-sm-12">
                		<div class="form-group row mb-4">
	                		<input type="password" name="password" placeholder="password" class="form-control" required >
	                    	<div class="invalid-tooltip">
					          Please complete the password
					        </div>
	                	</div>
                	</div>
                	<div class="col-sm-12">
                		<p id="warning" style="color: red;"></p>
                	</div>
                	<div class="form-group mt-3">
                		 <input type="submit" value="Login" name="login" class="btn btn-primary" >
             		</div>                                                                           
                </form>
            </div>
            
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script>
    	
    	(function() {
		  'use strict';
		  window.addEventListener('load', function() {
		    // Fetch all the forms we want to apply custom Bootstrap validation styles to
		    var forms = document.getElementsByClassName('needs-validation');
		    // Loop over them and prevent submission
		    var validation = Array.prototype.filter.call(forms, function(form) {
		      form.addEventListener('submit', function(event) {
		        if (form.checkValidity() === false) {
		          event.preventDefault();
		          event.stopPropagation();
		        }
		        form.classList.add('was-validated');
		      }, false);
		    });
		  }, false);
		})();

		$(document).ready(function () {
			$("#login").submit(function(e) {
				e.preventDefault(); // avoid to execute the actual submit of the form.
			    var form = $(this);
			    $.ajax({
		           type: "POST",
		           url: '/Codosa_Test/controllers/adminLoginController.php',
		           data: form.serialize(), // serializes the form's elements.
		           success: function(res){
		               if(res==0){ // if login fail, show the warning, else redirect to index
		               	document.getElementById('warning').innerHTML = 'user_name or password is incorrect';
		               }
		               else {
		               	window.location.replace("index.php");
		               }			               
		           },
		           error: function(err){			    
		           	alert(err);
		           }
		        });			    
			});
		});
    </script>
</body>
</html>
