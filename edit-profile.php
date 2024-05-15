<?php
include_once("templates/head.php");
include_once("templates/header.php");
include_once("templates/footer.php");
include_once("templates/register_errors.php");
session_start();

output_head("Smooth As Silk");
?>
<body>
    <?php 
    if ($_SESSION['logged_in'] === true) {
        output_logged_in_header();
    } else {
        output_header(); 
    } ?>
    <div class="container">
        <div class="row">
            <div class="card-1">
                <div class="photo-edit">
                    <img id="profile-picture" src="./assets/user_profile.png" alt="profile picture">
                    <input type="file" id="profile-photo" class="form-control-file" accept="image/*" style="display: none;">
                    <button class="button-edit" id="choose-btn">Choose File</button>
                </div>
                <div class="profile-basic-info">
                    <div class="username-edit">
                        <label class="labels">Username</label>
                        <input type="text" class="form-control" placeholder="username" value="">
                    </div>
                    <div class="name-edit">
                        <label class="labels">Name</label>
                        <input type="text" class="form-control" value="" placeholder="name"></div>
                </div>
            </div>
            <div class="card-2">                    
                <div class="profile-settings">
                    <div class="email-edit">
                        <label class="label">Email</label>
                        <input type="text" class="form-control" placeholder="example@example.com" value="">
                    </div>
                    <div class="password-edit">
                        <label class="label">Password</label>
                        <input type="password" class="form-control" placeholder="password" value="">
                    </div>
                    <div class="confirm-password-edit">
                        <label class="label">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="confirm password" value="">
                    </div>
                </div>
                <div class="save-changes">
                    <button class="button-edit" id="save-btn" type="button">Save Profile</button>
                </div>
                
            </div>
        
        </div>
    </div>
    <?php output_footer("EDU"); ?>
    <script>
        document.getElementById('choose-btn').addEventListener('click', function() {
            document.getElementById('profile-photo').click();
        });

        document.getElementById('profile-photo').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const profilePicture = document.getElementById('profile-picture');
                profilePicture.src = e.target.result;
            };

            reader.readAsDataURL(file);
        });

        document.getElementById('save-btn').addEventListener('click', function() {
            window.location.href = 'profile.php';
            alert('Profile successfully updated!');
        });
    </script>
</body>
</html>