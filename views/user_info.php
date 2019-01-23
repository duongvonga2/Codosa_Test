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
		<form action="/Codosa_Test/controllers/uploadImageController.php" method="POST" enctype="multipart/form-data"> 
		  	<div class="form-group text-center">
			    <label class="btn btn-primary" for="front-id-card">upload front Id card</label>
			    <input type="file" id="front-id-card" name="front-id-card">
		  	</div>
		  	<div class="form-group text-center">
			    <label class="btn btn-primary" for="backsite-id-card">upload backsite Id card</label>
			    <input type="file" id="backsite-id-card" name="backsite-id-card">
		  	</div>
		  	<div class="form-group text-center">
			    <label class="btn btn-primary" for="selfie-img">upload selfie image</label>
			    <input type="file" id="selfie-img" name="selfie-img">
		  	</div>
		  	<input type="submit" name="submit" value="submit">
		</form>


	</div>
</div>
