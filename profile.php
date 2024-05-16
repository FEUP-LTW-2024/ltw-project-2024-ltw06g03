<?php
include_once("templates/head.php");
include_once("templates/header.php");
include_once("templates/footer.php");
include_once("templates/register_errors.php");
include_once("database/connect.php");

output_head("Smooth As Silk");
session_start();
?>
<body>
    <?php 
    if ($_SESSION['logged_in'] === true) {
        output_logged_in_header();
    } else {
        output_header(); 
    } ?>
    <div class="profile-picture-container">
        <a id="profile-picture"><img src="./assets/user_profile.png" alt="profile picture"></a>    
    </div>
    <section id="profile-page">
        <div class="profile-item-username">
                <p><strong>Username</strong> <!-- TODO: Get username from database --></p>
        </div>
        
        <div class="profile-info">
            
            <div class="profile-item">
                <p><strong>Name</strong> <!-- TODO: Get name from database --></p>
            </div>
            <div class="profile-item">
                <p><strong>Email</strong> <!-- TODO: Get email from database --></p>
            </div>
        </div>
        <div class="profile-actions">
            <a href="edit-profile.php"><button>Edit Profile</button></a>
        </div>
    </section>
    
    <?php output_footer("EDU"); ?>
</body>
</html>