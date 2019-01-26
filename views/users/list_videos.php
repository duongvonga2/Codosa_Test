<?php 
	include_once '../../config.php';
	include_once '../../models/dbModel.php';
	include_once '../../controllers/controller.php';
	include_once '../layouts/header.php';
	
	$list_videos=dbGetRowsWithCondition('videos', 'facebook_id='.$_SESSION['userData']['id'] );
	// $data=$result->fetch_assoc();
?>
	<div class="container-fluid">
		<table class="table mt-5">
			<thead>
				<tr>
					<th>ID</th>
					<th>Videos</th>
					<th>Title</th>
					<th>Subject</th>
					<th>Description</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					while($video = $list_videos->fetch_assoc()){ 
						$title = dbGetRowsWithCondition('titles','id=' . $video['title_id'])->fetch_assoc();
						$subject = dbGetRowsWithCondition('subjects','id=' . $video['subject_id'])->fetch_assoc();
				?>
				<tr>
					<td><?php echo $video['id'] ?></td>
				    <td>
				    	<iframe class="video_show" src="https://www.youtube.com/embed/<?php echo $video['youtube_link'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				    </td>
				    <td><?php echo $title['title_name'] ?></td>
				    <td><?php echo $subject['subject_name'] ?></td>
				    <td><?php echo $video['description'] ?></td>
				    <td><?php echo $video['status'] ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

<?php 
	include_once '../layouts/footer.php';
?>

