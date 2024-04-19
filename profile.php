<?php
include_once("database/connect.php");
include_once("templates/head.php");
include_once("templates/header.php");
include_once("templates/footer.php");

output_head("Smooth As Silk");
?>
<body>
    <?php output_header(); ?>
    <div class="profile-picture-container">
        <a id="profile-picture"><img src="./assets/user_profile.png" alt="profile picture"></a>    
    </div>
    <section id="profile-page">
        <h2>Profile</h2>
        <div class="profile-info">
            <p><strong>Username:</strong> <!-- TODO: Get username from database --></p>
            <p><strong>Name:</strong> <!-- TODO: Get name from database --></p>
            <p><strong>Email:</strong> <!-- TODO: Get email from database --></p>
        </div>
        <div class="profile-actions">
            <a href="edit-profile.php"><button>Edit Profile</button></a>
            <button onclick="changePassword()">Change Password</button>
        </div>
    </section>
    
    <?php output_footer(); ?>
</body>
</html>
