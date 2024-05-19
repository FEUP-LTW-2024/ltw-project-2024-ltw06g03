<?php
include_once("templates/head.php");
include_once("templates/header.php");
include_once("templates/footer.php");
include_once("database/connect.php");
include_once("actions/utils.php");

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

    <section id="admin-page">
        <div class = "admin-page-boxes">
            <div class="admin-box">
                <h2>Search Products</h2>
                <form method="post" action="" class = "search-box-admin">
                    <input type="text" name="product_search" placeholder="Search for products">
                    <button type="submit">Search</button>
                </form>

            </div>

            <div class="admin-box">
                <h2>Search Users</h2>
                <form method="post" class = "search-box-admin" action="">
                    <input type="text" name="user_search" placeholder="Search for users">
                    <button type="submit">Search</button>
                </form>
                
            </div>
        </div>
        
        <div class="search-results-admin">
            <h2>Search Results</h2>
            <div class="user-delete">
                <!-- User information -->
                <div class="user-info">
                    <p>Username: JohnDoe</p>
                    <p>Email: johndoe@example.com</p>
                    <p>Name: John Doe</p>
                </div>
                <!-- Delete icon -->
                <div class="delete-icon">
                    <img src="./assets/delete.png" alt="Delete">
                </div>
            </div>
            <div class="product-delete">
                <!-- Product information -->
                <div class="product-info">
                    <p>Name: Product 1</p>
                    <p>Price: $50</p>
                    <p>Seller: JohnDoe</p>
                </div>
                <!-- Delete icon -->
                <div class="delete-icon">
                    <img src="./assets/delete.png" alt="Delete">
                </div>
            </div>
        </div> 
    </section>

    <?php output_footer("EDU"); ?>
    
</body>
</html>
