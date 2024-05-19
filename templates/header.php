<?php
include_once("../database/connect.php");
include_once("cart_item.php");

function output_header(string $username = "Login") {
?>
    <header id="navbar">
        <ul>
            <li id="logo-li"><a href="index.php"><h1 id="logo-txt" class="barcode">SAS</h1></a></li>
            <li id="search-bar">
                <button type="submit" id="search-button">
                    <img src="./assets/search.png" alt="search icon">
                </button>
                <input type="text">
            </li>
            <li><a href="login.php"><h1 id="login-btn">Login</h1></a></li> 
        </ul>
    </header>
    <script>
         document.getElementById('search-button').addEventListener('click', function() {
            const search = document.querySelector('#search-bar input').value;
            window.location.href = `posts_page.php?name=${search}`;
         })
    </script>
<?php
}

function output_logged_in_header() {
    $db = getDatabaseConnection("database/database.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $user_email = $_SESSION['user_email'];
    $stmt = $db->prepare('SELECT COUNT(*) AS is_seller FROM users JOIN seller ON users.id = seller.user_id WHERE users.email = :email');
    $stmt->bindParam(':email', $user_email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
    <header id="navbar">
        <ul>
            <li id="logo-li"><a href="index.php"><h1 id="logo-txt" class="barcode">SAS</h1></a></li>
            <li id="search-bar">
                <button type="submit" id="search-button">
                    <img src="./assets/search.png" alt="search icon">
                </button>
                <input type="text">
            </li>
            <?php
            if ($result['is_seller'] > 0) {
                echo '<li id="new-post"><a href="new_post.php"><h1 id="new-post-text">+</h1></a></li>';
            }
            ?>
            <li><a href="chat.php"><img src="" alt="chat picture"></a></li>
            <li><a id="user-profile" href="profile.php"><img src="./assets/usericon.png" alt="profile picture"></a></li> <!-- profile page not implemented -->
            <li><a href=""><img id="cart-icon" src="./assets/shopping-cart.png" alt="shopping cart"></a></li>
            <li><a href="../actions/logout.php">Logout</a></li>
        </ul>
    </header>

    <div class = "cartTab">
            <div class = "cartTabContent">
                <h1>Shopping Cart</h1>
                <div class = "cartItems">
                    <?php
                    $items = $_SESSION['cart'];
                    foreach ($items as $item) {
                        output_cart_item($item['id'], $item['quantity']);
                    }
                    ?>
                </div>           
            </div>
            <div class = "btn">
                <button class = "close">Close</button>
                <a href="checkout.php"><button class = "checkout-btn">Checkout</button></a>
            </div>
        </div>

        <script>
            document.querySelectorAll('.less').forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.dataset.itemId;

                    const item = {
                        id: itemId
                    };

                    fetch('actions/less.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(item)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        } else {
                            console.log('Failed to decrement quantity');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            });

            document.querySelectorAll('.more').forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.dataset.itemId;

                    const item = {
                        id: itemId
                    };

                    fetch('actions/more.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(item)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        } else {
                            console.log('Failed to increment quantity');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            });
        </script>
        
        <script>
            document.getElementById('search-button').addEventListener('click', function() {
                const search = document.querySelector('#search-bar input').value;
                window.location.href = `posts_page.php?name=${search}`;
            })

            if (localStorage.getItem('cartTabVisible') === 'true') {
                document.querySelector('.cartTab').style.display = 'grid';
            } else {
                document.querySelector('.cartTab').style.display = 'none';
            }

            document.querySelector('#cart-icon').addEventListener('click', function(event) {
                event.stopPropagation(); 
                document.querySelector('.cartTab').style.display = 'grid';
                localStorage.setItem('cartTabVisible', 'true'); 
            });

            // Event listener for the close button
            document.querySelector('.close').addEventListener('click', function() {
                document.querySelector('.cartTab').style.display = 'none';
                localStorage.setItem('cartTabVisible', 'false'); 
            });

            document.querySelector('.checkout-btn').addEventListener('click', function() {
                document.querySelector('.cartTab').style.display = 'none';
                localStorage.setItem('cartTabVisible', 'false'); 
            });

            document.addEventListener('click', function(event) {
                if (!event.target.closest('.cartTab') && !event.target.closest('#cart-icon')) {
                    document.querySelector('.cartTab').style.display = 'none';
                    localStorage.setItem('cartTabVisible', 'false'); 
                }
            });
        </script>
<?php
}
