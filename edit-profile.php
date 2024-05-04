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
            <div class="card-1">
                <img src="./assets/user_profile.png" alt="profile picture">
                <div class="profile-basic-info">
                    <div class="username-edit"><label class="labels">Username</label><input type="text" class="form-control" placeholder="username" value=""></div>
                    <div class="name-edit"><label class="labels">Name</label><input type="text" class="form-control" value="" placeholder="name"></div>
                </div>
            </div>
            <div class="card-2">                    
                <div class="profile-settings">
                    <div class="email-edit"><label class="label">Email</label><input type="text" class="form-control" placeholder="example@example.com" value=""></div>
                    <div class="password-edit"><label class="label">Password</label><input type="password" class="form-control" placeholder="password" value=""></div>
                    <div class="confirm-password-edit"><label class="label">Confirm Password</label><input type="password" class="form-control" placeholder="confirm password" value=""></div>
                </div>
                <div class="save-changes"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                
            </div>
        
        </div>
    </div>
    <?php output_footer(); ?>
    
</body>
</html>