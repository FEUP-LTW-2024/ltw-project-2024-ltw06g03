<?php
    function output_header() {?>
        <nav id="navbar">
            <ul>
                <li><a href="index.php"><h1 id="logo-txt">SAS</h1></a></li>
                <li id="search-bar"><img src="./assets/search.png" alt="search icon"><input type="text" ></li>
                <li><a href="login.php"><h1 id="login-btn">Login</h1></a></li> <!-- login page not implemented -->
                <li><a id="user-profile" href="profile.php"><img src="./assets/usericon.png" alt="profile picture"></a></li> <!-- profile page not implemented -->
                <li><a href=""><img src="./assets/shopping-cart.png" alt="shopping cart"></a></li>
            </ul>
        </nav>

        <div class = "cartTab">
            <div class = "cartTabContent">
                <h1>Shopping Cart</h1>
                <ul>
                    <li>Item 1</li>
                    <li>Item 2</li>
                    <li>Item 3</li>
                    <li>Item 4</li>
                    <li>Item 5</li>
                </ul>
                <button>Checkout</button>
            </div>
        </div>
    <?php }
?>