<?php 
    require_once '../layouts/admin_header.php';

?>
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-6 text-center mt-5 p-5 ">
                <a class="action-part btn-outline-primary col-md-12" href="/Codosa_Test/views/admin/list_users.php">
                    <div class="">
                        <img src="/Codosa_Test/public/images/users.png">
                    </div>
                    
                </a>
                <p>LIST USERS</p>
            </div>
            <div class="col-md-6 mt-5 p-5 text-center">
                <a class="action-part  btn-outline-primary" href="/Codosa_Test/views/admin/list_videos.php">
                    <img src="/Codosa_Test/public/images/video-list.png">
                </a>
                <p>UPLOAD SUBJECT</p>
            </div>
        </div>
    </div>
<?php 
	require_once '..layouts/footer.php';
?>
