<?php 
	include_once 'layouts/header.php';
?>

<div class="container-fluid">
	<div class="col-md-6 offset-md-3 mt-5">
		<div class="text-center">
			<img class="rounded-circle" src="<?php echo $_SESSION['userData']['picture']['url'] ?>">
		</div>
		<div class="basic-info">
			<p><i class="fas fa-user"></i> <?php echo $_SESSION['userData']['last_name'] . ' ' . $_SESSION['userData']['first_name']?></p>
			<p><i class="fas fa-envelope"></i> <?php echo $_SESSION['userData']['email'] ?></p>

			
		</div>
		<form action="/Codosa_Test/controllers/uploadImageController.php" method="POST">
		  	<div class="form-group text-center">
			    <label class="btn btn-primary" for="upload-img">upload personal card</label>
			    <input type="file" id="upload-img" name="img">
		  	</div>
		  	<input type="submit" name="submit" value="submit">
		</form>


	</div>
</div>
