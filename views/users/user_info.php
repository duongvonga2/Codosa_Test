<?php 
	include_once '../../config.php';
	include_once '../../models/dbModel.php';
	include_once '../../controllers/controller.php';
	include_once '../layouts/header.php';
	
	$user=dbGetRowsWithCondition('users', 'facebook_id='.$_SESSION['userData']['id'] )->fetch_assoc();
	// $data=$result->fetch_assoc();
?>

<div class="container-fluid">
	<div class="row col-md-6 offset-md-3 border border-primary px-2 py-2 mt-5">
		<div class="col-sm-3 text-center">
			<img width="150" src="<?php echo $user['avatar']?>">
		</div>
		<div class="col-sm-9" style="display: flex; align-items: center;">
			<div>
				<p><i class="fas fa-user"></i> <?php echo $user['last_name'] . ' ' . $user['first_name']?></p>
				<p><i class="fas fa-envelope"></i> <?php echo $user['email']?></p>
				<p><i class="fas fa-sync-alt"></i> <?php echo $user['status'] ?></p>
			</div>
			
		</div>
	</div>
	<table class="table">
		<tr>
			<th>Front id card</th>
			<th>Backside id card</th>
			<th>Selfie</th>

		</tr>

		<tr>
			<td>
				<img src="/Codosa_Test/controllers/<?php echo $user['front_id_card'] ?>">
			</td>
			<td>
				<img src="/Codosa_Test/controllers/<?php echo $user['backside_id_card'] ?>">
			</td>
			<td>
				<img src="/Codosa_Test/controllers/<?php echo $user['selfie'] ?>">
			</td>	
			
		</tr>
	</table>
	<hr>
	<form action="/Codosa_Test/controllers/uploadImageController.php" method="POST" enctype="multipart/form-data" class="text-center mt-5 mb-5 	">
		<h1>UPLOAD YOUR IMAGE</h1> 
		<div class="row">
		  	<div class=" col-md-4 form-group">
		  		<div class="col-sm-12">
		  			<label class="btn btn-primary btn-block" for="front-id-card">upload front Id card</label>
			    	<input type="file" onchange="readURL(this,'#front');" class="non-display" id="front-id-card"  name="front-id-card">
			    </div>
			    <div class="col-sm-12">
			    	<!-- <img  src="#" alt="your image" /> -->
			    	<img class="full-width"  id="front" src="../../controllers/<?php echo $user['front_id_card'] ?>">
			    </div>
			    
		  	</div>
		  	<div class="col-md-4 form-group">
			    <div class="col-sm-12">
			    	<label class="btn btn-primary btn-block" for="backsite-id-card">upload backsite Id card</label>
			    	<input type="file" onchange="readURL(this,'#backside');" class="non-display" id="backsite-id-card" name="backsite-id-card">
				</div>
				<div class="col-sm-12">
					<!-- <img  src="#" alt="your image" /> -->
			    	<img class="full-width" id="backside" src="../../controllers/<?php echo $user['backside_id_card'] ?>">
			    </div>
		  	</div>
		  	<div class="col-md-4 form-group">
		  		<div class="col-sm-12">
			    	<label class="btn btn-primary btn-block" for="selfie-img">upload selfie image</label>
			    	<input type="file" onchange="readURL(this,'#selfie');" class="non-display" id="selfie-img" name="selfie-img">
				</div>
				<div class="col-sm-12">
			    	<img class="full-width" id="selfie" src="../../controllers/<?php echo $user['selfie'] ?>">
			    </div>
		  	</div>
		  	<div class="col-md-6 offset-md-3 text-center">
		  		<input type="submit" class="btn btn-success" name="submit" value="submit">
		  	</div>
		  	
	  	</div>
	</form>
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