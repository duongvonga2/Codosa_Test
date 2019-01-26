<?php
    include_once 'views/layouts/header.php';
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 text-center mt-5 p-3 ">
                <a class="action-part btn-outline-primary col-md-12" href="views/users/user_info.php">
                    <div class="">
                        <img src="public/images/man-user.png">
                    </div>
                    
                </a>
                <p>UPDATE YOUR INFORMATION</p>
            </div>
            <div class="col-md-4 mt-5 p-3 text-center">
                <a class="action-part  btn-outline-primary" href="views/users/upload_video.php">
                    <img src="public/images/upload.png">
                </a>
                <p>UPLOAD SUBJECT</p>
            </div>
            <div class="col-md-4 mt-5 p-3 text-center">
                <a class="action-part  btn-outline-primary" href="views/users/list_videos.php">
                    <img src="public/images/video-list.png">
                </a>
                <p>YOUR VIDEOS</p>
            </div>
        </div>
    </div>

<?php
    include_once 'views/layouts/footer.php';
?>