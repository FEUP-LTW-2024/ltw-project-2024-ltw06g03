<?php
    function output_header(string $username = "Login") {?>
        <header id="navbar">
            <ul>
                <li id="logo-li"><a href="index.php"><h1 id="logo-txt" class="barcode">SAS</h1></a></li>
                <li id="search-bar"><img src="./assets/search.png" alt="search icon"><input type="text" ></li>
                <li><a href="login.php"><h1 id="login-btn">Login</h1></a></li> <!-- login page not implemented -->
            </ul>
        </header>
    <?php }

    function output_logged_in_header() {?>
        <header id="navbar">
            <ul>
                <li id="logo-li"><a href="index.php"><h1 id="logo-txt" class="barcode">SAS</h1></a></li>
                <li id="search-bar"><img src="./assets/search.png" alt="search icon"><input type="text" ></li>
                <li><a id="user-profile" href="profile.php"><img src="./assets/usericon.png" alt="profile picture"></a></li> <!-- profile page not implemented -->
                <li><a href=""><img src="./assets/shopping-cart.png" alt="shopping cart"></a></li>
                <li><a href="../actions/logout.php">Logout</a></li>
            </ul>
        </header>

        <div class = "cartTab">
            <div class = "cartTabContent">
                <h1>Shopping Cart</h1>
                <div class = "cartItems">
                    <div class = "cartItem">
                        <div class = "cartItemImg">
                            <img class src = "./assets/madeirense.jpg" alt = "item">
                        </div>
                        <div class = "cartItemName">
                            Product Name
                        </div>
                        <div class = "cartItemPrice">
                            0.00
                        </div>
                        <div class = "cartItemQuantity">
                            <span class = "less">-</span>
                            <span>1</span>
                            <span class = "more">+</span>
                        </div>
                    </div>
                </div>           
            </div>
            <div class = "btn">
                <button class = "close">Close</button>
                <button class = "check">Checkout</button>
            </div>
        </div>
        
        <script>
            document.querySelector('.close').addEventListener('click', function() {
                document.querySelector('.cartTab').style.display = 'none';
            });
        </script>
    <?php }
?>