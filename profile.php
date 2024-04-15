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
        <a id="user-profile"><img src="./assets/usericon.png" alt="profile picture"></a>    
    </div>
    <section id="profile-page">
        <h2>Profile</h2>
        <form action="actions/update_profile.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="username" required>
            <label for="username">Name:</label>
            <input type="text" name="name" id="name" value="name" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="email" required>
            <input type="submit" value="Update">
        </form>
    </section>
    <?php output_footer(); ?>

</body>

</html>