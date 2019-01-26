<?php 
	require_once '../../config.php';
    include_once '../../models/dbModel.php';
	include_once '../../controllers/controller.php';
    require_once '../layouts/admin_header.php';

    if(isset($_GET['id'])){
    	$video = dbGetRowsWithCondition('videos','id='.$_GET['id'])->fetch_assoc();
    	$user = dbGetRowsWithCondition('users', 'facebook_id='.$video['facebook_id'])->fetch_assoc();
    	$title=dbGetRowsWithCondition('titles','id=' . $video['title_id'])->fetch_assoc();
		$subject = dbGetRowsWithCondition('subjects','id='.$video['subject_id'])->fetch_assoc();
?>
	<div class="container-fluid">
		<div class=" row col-md-6 offset-md-3 border border-primary px-2 py-2 mt-5">
			<div class="col-sm-3 text-center">
				<img width="150" src="<?php echo $user['avatar']?>">
			</div>
			<div class="col-sm-9" style="display: flex; align-items: center;">
				<div>
					<p><i class="fas fa-user"></i> <?php echo $user['last_name'] . ' ' . $user['first_name']?></p>
					<p><i class="fas fa-envelope"></i> <?php echo $user['email']?></p>
					
				</div>
			</div>
		</div>
		<div class="row px-5 py-5 mt-3" style="display: flex;">
			<div class="col-md-6">
				<div>
					<iframe width="400" height="225"  class="video_show" src="https://www.youtube.com/embed/<?php echo $video['youtube_link'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	
				</div>
				
			</div>
			<div class="col-md-6 " >
				<div>
					<h4><i class="fab fa-font-awesome-flag mb-3"> </i> <?php echo $title['title_name'] ?></h4>
					<h4><i class="fas fa-book mb-3"></i></i> <?php echo $subject['subject_name'] ?></h4>
					<h4><i class="fas fa-align-justify mb-3"></i> <?php echo $video['description'] ?></h4>
					<h4><i class="fas fa-sync-alt mb-3"></i> <?php echo $video['status'] ?></h4>
				</div>
				<div class="row">
					<?php 
						if($video['status'] == 'waiting') {
					?>
							<div class="col-sm-4">
								<a href="/Codosa_Test/controllers/adminAcceptVideoController.php?action=waiting&id=<?php echo $_GET['id'] ?>"><button class="btn btn-primary btn-block">Waiting</button></a>
							</div>
							<div class="col-sm-4">
								<a href="/Codosa_Test/controllers/adminAcceptVideoController.php?action=accept&id=<?php echo $_GET['id'] ?>"><button class="btn btn-secondary btn-block">Accept</button></a>
							</div>
							<div class="col-sm-4">
								<a href="/Codosa_Test/controllers/adminAcceptVideoController.php?action=ban&id=<?php echo $_GET['id'] ?>"><button class="btn btn-secondary btn-block">Ban</button></a>
							</div>
					<?php }
						else if($video['status'] == 'accept'){ 
					?>
							<div class="col-sm-4">
								<a href="/Codosa_Test/controllers/adminAcceptVideoController.php?action=waiting&id=<?php echo $_GET['id'] ?>"><button class="btn btn-secondary btn-block">Waiting</button></a>
							</div>
							<div class="col-sm-4">
								<a href="/Codosa_Test/controllers/adminAcceptVideoController.php?action=accept&id=<?php echo $_GET['id'] ?>"><button class="btn btn-success btn-block">Accept</button></a>
							</div>
							<div class="col-sm-4">
								<a href="/Codosa_Test/controllers/adminAcceptVideoController.php?action=ban&id=<?php echo $_GET['id'] ?>"><button class="btn btn-secondary btn-block">Ban</button></a>
							</div>
					<?php 
						}
						else {
					?>
							<div class="col-sm-4">
								<a href="/Codosa_Test/controllers/adminAcceptVideoController.php?action=waiting&id=<?php echo $_GET['id'] ?>"><button class="btn btn-secondary btn-block">Waiting</button></a>
							</div>
							<div class="col-sm-4">
								<a href="/Codosa_Test/controllers/adminAcceptVideoController.php?action=accept&id=<?php echo $_GET['id'] ?>"><button class="btn btn-secondary btn-block">Accept</button></a>
							</div>
							<div class="col-sm-4">
								<a href="/Codosa_Test/controllers/adminAcceptVideoController.php?action=ban&id=<?php echo $_GET['id'] ?>"><button class="btn btn-danger btn-block">Ban</button></a>
							</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
<?php 
	}
	require_once '../layouts/footer.php';
?>