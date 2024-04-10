<?php
    function output_header() {?>
        <header>
            <a href="index.php"><h1 id="logo-txt">SAS</h1></a>
            <input type="text" id="search-bar">
            <a href="login.php"><h1 id="login-btn">Login</h1></a> <!-- login page not implemented -->
            <a id="user-profile" href="profile.php"><img src="" alt="profile picture"></a> <!-- profile page not implemented -->
            <a href=""><img src="" alt="shopping cart"></a>
        </header>
    <?php }
?>