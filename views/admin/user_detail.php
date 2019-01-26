<?php 
    require_once '../../config.php';
    include_once '../../models/dbModel.php';
	include_once '../../controllers/controller.php';
    require_once '../layouts/admin_header.php';

    if(isset($_GET['id'])){
    	$user = dbGetRowsWithCondition('users','id='.$_GET['id'])->fetch_assoc(); //get rows in table users with id condition
    
    // $list_users = dbGetAllRows('users');
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
						<p><i class="fas fa-sync-alt"></i> <?php echo $user['status'] ?></p>
					</div>
					
				</div>
			</div>

			<table class="table">
				<tr>
					<th>Front id card</th>
					<th>Backside id card</th>
					<th>Selfie</th>
					<th>Status</th>
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
					<td style="vertical-align: middle;">
						
						<?php 
						// show the active status, waiting is blue(class primary), accept is green(class success), ban is red(class danger)
							if($user['status']=='Waiting'){ 
						?>
							<div>
								<p><a href="/Codosa_Test/controllers/adminAcceptImageController.php?action=waiting&id=<?php echo $_GET['id'] ?>" class="mb-2">
									<button class="btn btn-primary btn-block">Waiting</button>
								</a></p>
								<p><a href="/Codosa_Test/controllers/adminAcceptImageController.php?action=accept&id=<?php echo $_GET['id'] ?>" class="mb-2">
									<button class="btn btn-secondary btn-block ">Accept</button>
								</a></p>
								<p><a href="/Codosa_Test/controllers/adminAcceptImageController.php?action=ban&id=<?php echo $_GET['id'] ?>">
									<button class="btn btn-secondary btn-block">Ban</button>
								</a></p>
							</div>
						
						<?php
							}
							else if($user['status']=='Accept'){
						?>
							<div>
								<p><a href="/Codosa_Test/controllers/adminAcceptImageController.php?action=waiting&id=<?php echo $_GET['id'] ?>" class="mb-2">
									<button class="btn btn-secondary btn-block">Waiting</button>
								</a></p>
								<p><a href="/Codosa_Test/controllers/adminAcceptImageController.php?action=accept&id=<?php echo $_GET['id'] ?>" class="mb-2">
									<button class="btn btn-success btn-block ">Accept</button>
								</a></p>
								<p><a href="/Codosa_Test/controllers/adminAcceptImageController.php?action=ban&id=<?php echo $_GET['id'] ?>">
									<button class="btn btn-secondary btn-block">Ban</button>
								</a></p>
							</div>
						<?php
							}
							else {
						?>
							<div>
								<p><a href="/Codosa_Test/controllers/adminAcceptImageController.php?action=waiting&id=<?php echo $_GET['id'] ?>" class="mb-2">
									<button class="btn btn-secondary btn-block">Waiting</button>
								</a></p>
								<p><a href="/Codosa_Test/controllers/adminAcceptImageController.php?action=accept&id=<?php echo $_GET['id'] ?>" class="mb-2">
									<button class="btn btn-secondary btn-block ">Accept</button>
								</a></p>
								<p><a href="/Codosa_Test/controllers/adminAcceptImageController.php?action=ban&id=<?php echo $_GET['id'] ?>">
									<button class="btn btn-danger btn-block">Ban</button>
								</a></p>
							</div>
						<?php
							} 
						?>

					</td>
				</tr>
			</table>
		
	</div>

<?php 
	}
	require_once '../layouts/footer.php';
?>
