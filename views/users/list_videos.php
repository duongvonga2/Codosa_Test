<?php 
	include_once '../../config.php';
	include_once '../../models/dbModel.php';
	include_once '../../controllers/controller.php';
	include_once '../layouts/header.php';
	
	//get data from videos table with facebokk_id condition
	$list_videos=dbGetRowsWithCondition('videos', 'facebook_id='.$_SESSION['userData']['id'] ); 
?>
	<div class="container-fluid ">
		<div class="text-center">
			<h1>LIST VIDEOS</h1>
		</div>
		<?php 
			while($video = $list_videos->fetch_assoc()){ 
				//get data from titles table with _id condition
				$title = dbGetRowsWithCondition('titles','id=' . $video['title_id'])->fetch_assoc();

				//get data from subjects table with _id condition
				$subject = dbGetRowsWithCondition('subjects','id=' . $video['subject_id'])->fetch_assoc();
		?>
				<a class="row col-md-6 border border-primary offset-md-3 mt-3 px-2 py-2 btn-outline-primary" href="/Codosa_Test/views/admin/video_detail.php?id=<?php echo $video['id'] ?>">
					<div class="col-sm-8">
						<iframe width="400" height="225"  class="video_show" src="https://www.youtube.com/embed/<?php echo $video['youtube_link'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<div class="col-sm-4" style="display: flex; align-items: center;">
						<div>
							<p><i class="fab fa-font-awesome-flag"> </i> <?php echo $title['title_name'] ?></p>
							<p><i class="fas fa-book"></i></i> <?php echo $subject['subject_name'] ?></p>
							<p><i class="fas fa-align-justify"></i> <?php echo $video['description'] ?></p>
							<p><i class="fas fa-sync-alt"></i> <?php echo $video['status'] ?></p>
						</div>
						
					</div>
				</a>
		<?php } ?>
			</tbody>
		</table>
	</div>

<?php 
	include_once '../layouts/footer.php';
?>

