<?php 
	include_once '../../config.php';
	include_once '../../models/dbModel.php';
	include_once '../../controllers/controller.php';
	include_once '../layouts/header.php';
	//get all rows from titles table
	$list_titles = dbGetAllRows('titles'); 
	// get all rows from subjects table
	$list_subjects = dbGetAllRows('subjects'); 
?>
	<div class=" mt-5">
		<form action="/Codosa_Test/controllers/uploadVideoController.php" method="POST" class="needs-validation col-md-12 row" novalidate>
			<div class="col-md-6">
				
				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="youtube_link" ><strong>Link youtube :</strong></label>
					<div class="col-sm-9">
						<input type="text" name="youtube_link" onkeyup="showVideo()" class="form-control" id="youtube_link" required  >
						<div class="invalid-tooltip">
				          Please complete your link.
				        </div>
				        
					</div>
					<div class="col-sm-9 offset-sm-3">
						<div id="embed_video" class="mt-3"></div>
					</div>
				</div> 
				
			</div>
			<div class="col-md-6 border-left border-success">
				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="title"><strong>Select title</strong></label>
					<div class="col-sm-9">
						<select class="form-control" id="title" name="title" required>
							<option value="" selected>Select Title</option>
							

							<?php
							//show all title to option tag 
								while($title = $list_titles->fetch_assoc()){ 
							?>
									<option value="<?php echo $title['id'] ?>"><?php echo $title['title_name']?></option>
							<?php 
								} 
							?>
							
							
						</select>
						<div class="invalid-tooltip">
				          Please select the title.
				        </div>
					</div>
				</div>
				<div class="form-group row mt-5">
					<label class="col-sm-3 col-form-label" for="subject"><strong>Select Subject</strong></label>
					<div class="col-sm-9">
						<select class="form-control" id="subject" name="subject" required>
							<option value="" selected>Select Subject</option>
							
							<?php 
							//show all subject to option tag
								while($subject = $list_subjects->fetch_assoc()){ 
							?>
									<option value="<?php echo $subject['id'] ?>"><?php echo $subject['subject_name']?></option>
							<?php 
								} 
							?>
							
						</select>
						<div class="invalid-tooltip">
				          Please select the subject.
				        </div>
					</div>
				</div>
				<div class="form-group row mt-5">
					<label class="col-sm-3 col-form-label" for="description">
						<strong>Description</strong>
					</label>
					<div class="col-sm-9">
						<textarea class="form-control" id="description" name="description" placeholder="Description" required></textarea>
						<div class="invalid-tooltip">
				          Please complete the description.
				        </div>
					</div>
				</div>
			</div>
			<div class="col-md-6 offset-md-3">
			<div class="form-group row justify-content-center mt-3">
			    
			      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
		
			</div>
		</div>
		</form>
	</div>



	<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
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

		var count=0;
		//show video when input the url from youtube
		function showVideo(){
			count++;
			var link = document.getElementById('youtube_link').value;
			
			var start= link.indexOf('v')+2;//get the start position to get the id of the video
			var end = link.length;
			var video_char = link.substring(start,end); //get id of the video

			var tag_embed = '<iframe class="video_show" src="https://www.youtube.com/embed/' + video_char + '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
			console.log('count: ',count,tag_embed);
			document.getElementById('embed_video').innerHTML= tag_embed;
		}

	</script>
<?php

	include_once '../layouts/footer.php'; 
?>
