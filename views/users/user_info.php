<?php 
	include_once '../../config.php';
	include_once '../../models/dbModel.php';
	include_once '../../controllers/controller.php';
	include_once '../layouts/header.php';
	
	$result=dbGetRowsWithCondition('users', 'facebook_id='.$_SESSION['userData']['id'] );
	$data=$result->fetch_assoc();
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
		  	<div class=" row form-group">
		  		<div class="col-md-6 align-end">
		  			<label class="btn btn-primary" for="front-id-card">upload front Id card</label>
			    	<input type="file" onchange="readURL(this,'#front');" class="non-display" id="front-id-card"  name="front-id-card">
			    </div>
			    <div class="col-md-6 align-start">
			    	<!-- <img  src="#" alt="your image" /> -->
			    	<img width="100" id="front" src="../../controllers/<?php echo $data['front_id_card'] ?>">
			    </div>
			    
		  	</div>
		  	<div class="row form-group">
			    <div class="col-md-6 align-end">
			    	<label class="btn btn-primary" for="backsite-id-card">upload backsite Id card</label>
			    	<input type="file" onchange="readURL(this,'#backside');" class="non-display" id="backsite-id-card" name="backsite-id-card">
				</div>
				<div class="col-md-6 align-start">
					<!-- <img  src="#" alt="your image" /> -->
			    	<img width="100" id="backside" src="../../controllers/<?php echo $data['backside_id_card'] ?>">
			    </div>
		  	</div>
		  	<div class="row form-group">
		  		<div class="col-md-6 align-end">
			    	<label class="btn btn-primary" for="selfie-img">upload selfie image</label>
			    	<input type="file" onchange="readURL(this,'#selfie');" class="non-display" id="selfie-img" name="selfie-img">
				</div>
				<div class="col-md-6 align-start">
			    	<img id="selfie" width="100" src="../../controllers/<?php echo $data['selfie'] ?>">
			    </div>
		  	</div>
		  	<div class="text-center mt-3"><input type="submit" class="btn btn-success" name="submit" value="submit"></div>
		  	
		</form>


	</div>
</div>

<script>
	function readURL(input,tag_id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(tag_id)
                    .attr('src', e.target.result)
                    .width(100)
                    // .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php 
	include_once '../layouts/footer.php';
?>