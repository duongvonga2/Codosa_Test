<?php 
    require_once '../../config.php';
    include_once '../../models/dbModel.php';
	include_once '../../controllers/controller.php';
    require_once '../layouts/admin_header.php';

    $list_users = dbGetAllRows('users');
?>
	<div class="container-fluid">
		<?php while($user = $list_users->fetch_assoc()){ ?>

		<a class="row col-md-6 border border-primary offset-md-3 mt-3 px-2 py-2 btn-outline-primary" href="/Codosa_Test/views/admin/user_detail.php?id=<?php echo $user['id'] ?>">
			<div class="col-sm-3"><img width="150" src="<?php echo $user['avatar']?>"></div>
			<div class="col-sm-9" style="display: flex; align-items: center;">
				<div>
					<p><i class="fas fa-user"></i> <?php echo $user['last_name'] . ' ' . $user['first_name']?></p>
					<p><i class="fas fa-envelope"></i> <?php echo $user['email']?></p>
					<p><i class="fas fa-sync-alt"></i> <?php echo $user['status'] ?></p>
				</div>
				
			</div>
		</a>
		<?php } ?>
	</div>
<?php 
	require_once '../layouts/footer.php';
?>
