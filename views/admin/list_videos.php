<?php 
    require_once '../../config.php';
    include_once '../../models/dbModel.php';
	include_once '../../controllers/controller.php';
    require_once '../layouts/admin_header.php';

    $list_videos = dbGetAllRows('videos');
?>
	<div class="container-fluid">
		<?php 
			while($video = $list_videos->fetch_assoc()){ 
				$title=dbGetRowsWithCondition('titles','id=' . $video['title_id'])->fetch_assoc();
				$subject = dbGetRowsWithCondition('subjects','id='.$video['subject_id'])->fetch_assoc();
				$user = dbGetRowsWithCondition('users', 'facebook_id='.$video['facebook_id'])->fetch_assoc();
		?>

		<a class="row col-md-6 border border-primary offset-md-3 mt-3 px-2 py-2 btn-outline-primary" href="/Codosa_Test/views/admin/video_detail.php?id=<?php echo $video['id'] ?>">
			<div class="col-sm-8">
				<iframe width="400" height="225"  class="video_show" src="https://www.youtube.com/embed/<?php echo $video['youtube_link'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="col-sm-4" style="display: flex; align-items: center;">
				<div>
					<p><i class="fas fa-user"></i> <?php echo $user['last_name'] . ' ' . $user['first_name'] ?></p>
					<p><i class="fab fa-font-awesome-flag"> </i> <?php echo $title['title_name'] ?></p>
					<p><i class="fas fa-book"></i></i> <?php echo $subject['subject_name'] ?></p>
					<p><i class="fas fa-align-justify"></i> <?php echo $video['description'] ?></p>
					<p><i class="fas fa-sync-alt"></i> <?php echo $video['status'] ?></p>
				</div>
				
			</div>
		</a>
		<?php } ?>
	</div>
<?php 
	require_once '../layouts/footer.php';
?>