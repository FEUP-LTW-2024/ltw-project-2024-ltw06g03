<?php
include_once("database/connect.php");
include_once("templates/head.php");
include_once("templates/header.php");
include_once("templates/footer.php");

output_head("Smooth As Silk");
?>
<body>
    <?php output_header(); ?>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-1">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img src="./assets/user_profile.png" alt="profile picture">

        <div class="col-2">
            <div class="card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Username</label><input type="text" class="form-control" placeholder="username" value=""></div>
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" value="" placeholder="name"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="example@example.com" value=""></div>
                    <div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control" placeholder="password" value=""></div>
                    <div class="col-md-12"><label class="labels">Confirm Password</label><input type="password" class="form-control" placeholder="confirm password" value=""></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
    </div>
</div>
    <?php output_footer(); ?>
    
</body>
</html>