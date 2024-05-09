<?php
    function output_header() {?>
        <nav id="navbar">
            <ul>
                <li id="logo-li"><a href="index.php"><h1 id="logo-txt">SAS</h1></a></li>
                <li id="search-bar"><img src="./assets/search.png" alt="search icon"><input type="text" ></li>
                <li><a href="login.php"><h1 id="login-btn">Login</h1></a></li> <!-- login page not implemented -->
            </ul>
        </nav>
    <?php }

    function output_logged_in_header() {?>
        <nav id="navbar">
            <ul>
                <li id="logo-li"><a href="index.php"><h1 id="logo-txt">SAS</h1></a></li>
                <li id="search-bar"><img src="./assets/search.png" alt="search icon"><input type="text" ></li>
                <li><a id="user-profile" href="profile.php"><img src="./assets/usericon.png" alt="profile picture"></a></li> <!-- profile page not implemented -->
                <li><a href=""><img src="./assets/shopping-cart.png" alt="shopping cart"></a></li>
                <li><a href="../actions/logout.php">Logout</a></li>
            </ul>
        </nav>
    <?php }
?>