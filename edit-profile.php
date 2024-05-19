<?php
include_once("templates/head.php");
include_once("templates/header.php");
include_once("templates/footer.php");
include_once("templates/register_errors.php");
include_once("database/connect.php");
include_once("actions/utils.php");

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
                    <img id="profile-picture" src="<?php
                    $v = pfp_exists($_SESSION['user_email']);
                    if ($v) {
                        echo $v;
                    } else{
                        echo './assets/user_profile.png';
                    }
                    ?>" alt="profile picture">
                    <input type="file" id="profile-photo" class="form-control-file" accept="image/*" style="display: none;">
                    <button class="button-edit" id="choose-btn">Choose File</button>
                </div>
                <div class="profile-basic-info">
                    <div class="username-edit">
                        <label class="labels">Username</label>
                        <input type="text" class="form-control" placeholder="<?php
                        echo get_seller_username(get_id_from_email($_SESSION['user_email']));
                        ?>" value="">
                    </div>
                    <div class="name-edit">
                        <label class="labels">Name</label>
                        <input type="text" class="form-control" value="" placeholder="<?php
                        echo get_seller_name(get_id_from_email($_SESSION['user_email']));
                        ?>"></div>
                </div>
            </div>
            <div class="card-2">                    
                <div class="profile-settings">
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
                    <?php
                    if (!is_seller($_SESSION['user_email'])) { 
                        echo '<button class="button-edit" id="seller-btn" type="button">Become a Seller</button>';
                    } else {
                        echo '<button class="button-edit" id="seller-btn" type="button" style="display:none">Become a Seller</button>';
                    }
                    if (!is_buyer($_SESSION['user_email'])) {
                        echo '<button class="button-edit" id="buyer-btn" type="button">Become a Buyer</button>';
                    } else {
                        echo '<button class="button-edit" id="buyer-btn" type="button" style="display:none">Become a Buyer</button>';
                    }
                    ?>
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
            const username = document.querySelector('.username-edit input').value;
            const name = document.querySelector('.name-edit input').value;
            const password = document.querySelector('.password-edit input').value;
            const confirmPassword = document.querySelector('.confirm-password-edit input').value;
            const profilePhoto = document.getElementById('profile-photo').files[0];

            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }

            const formData = new FormData();
            formData.append('username', username);
            formData.append('name', name);
            formData.append('password', password);
            if (profilePhoto) {
                formData.append('profile_photo', profilePhoto);
            }

            fetch('actions/update_profile.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    alert('Profile successfully updated!');
                    window.location.href = 'profile.php';
                } else {
                    alert('Failed to update profile: ' + data);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the profile.');
            });
        });

        document.getElementById('seller-btn').addEventListener('click', function() {
            fetch('actions/become_seller.php', {
                method: 'POST',
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    alert('You are now a seller');
                    window.location.href = 'profile.php';
                } else {
                    alert('Failed to become a seller');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the profile.');
            });
        });

        document.getElementById('buyer-btn').addEventListener('click', function() {
            fetch('actions/become_buyer.php', {
                method: 'POST',
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    alert('You are now a buyer');
                    window.location.href = 'profile.php';
                } else {
                    alert('Failed to become a buyer');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the profile.');
            });
        });
    </script>
</body>
</html>