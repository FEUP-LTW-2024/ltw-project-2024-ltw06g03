<?php
    function output_header() {?>
        <nav id="navbar">
            <ul>
                <li><a href="index.php"><h1 id="logo-txt">SAS</h1></a></li>
                <li><img src="./assets/search.png" alt="shopping cart"></li>
                <li><input type="text" id="search-bar"></li>
                <li><a href="login.php"><h1 id="login-btn">Login</h1></a></li> <!-- login page not implemented -->
                <li><a id="user-profile" href="profile.php"><img src="./assets/usericon.png" alt="profile picture"></a></li> <!-- profile page not implemented -->
                <li><a href=""><img src="./assets/shopping-cart.png" alt="shopping cart"></a></li>
            </ul>
        </nav>
    <?php }
?>