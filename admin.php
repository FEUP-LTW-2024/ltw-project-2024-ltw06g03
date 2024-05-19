<?php
include_once("templates/head.php");
include_once("templates/header.php");
include_once("templates/footer.php");
include_once("database/connect.php");
include_once("actions/utils.php");
include_once("templates/admin.php");

output_head("Smooth As Silk");
session_start();

if (isset($_SESSION['user_email']) && !is_admin($_SESSION['user_email'])) {
    header("Location: http://localhost:9000/index.php");
    exit;
}

if (isset($_GET['product'])) {
    $product = $_GET['product'];
    $products = get_products_admin($product);
}

if (isset($_GET['user'])) {
    $user = $_GET['user'];
    $users = get_users_admin($user);
}

if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $categories = get_categories($category);
}

?>

<body>
    <?php 

    if ($_SESSION['logged_in'] === true) {
        output_logged_in_header();
    } else {
        output_header(); 
    } ?>

    <section id="admin-page" class="page">
        <div class = "admin-page-boxes">
            <div class="admin-box">
                <h2>Search Products</h2>
                <form method="get" action="admin.php" class = "search-box-admin">
                    <input type="text" name="product" placeholder="Search for products">
                    <button type="submit">Search</button>
                </form>

            </div>

            <div class="admin-box">
                <h2>Search Users</h2>
                <form method="get" class = "search-box-admin" action="admin.php">
                    <input type="text" name="user" placeholder="Search for users">
                    <button type="submit">Search</button>
                </form>                
            </div>
            <div class="admin-box">
                <h2>Search Categories</h2>
                <form method="get" class = "search-box-admin" action="admin.php">
                    <input type="text" name="category" placeholder="Search for category">
                    <button type="submit">Search</button>
                </form>                
            </div>
            <div class="admin-box">
                <h2>Add Categories</h2>
                <div class="search-box-admin">
                    <input type="text" placeholder="Enter new category" id="cat-text">
                    <button id="new-cat">Add</button>
                </div>                
            </div>
        </div>
        
        <div class="search-results-admin">
            <h2>Search Results</h2>
            <?php
            foreach ($users as $user) {
                output_user_info($user);
            }

            foreach($products as $product) {
                output_product_info($product);
            }
            foreach ($categories as $category) {
                output_category($category);
            }
            ?>
        </div> 
    </section>

    <?php output_footer("EDU"); ?>
    
    <script>
        const userButtons = document.querySelectorAll('.user-delete button');
        const productButtons = document.querySelectorAll('.product-delete button');
        const promoteButtons = document.querySelectorAll('.promote button');
        const deleteCatButtons = document.querySelectorAll('.cat-btn');

        userButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const id = event.target.closest('button').dataset.id;
                const formData = new FormData();

                formData.append('id', id);
                
                fetch('actions/delete_user.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'success') {
                        alert('User deleted!');
                        window.location.href = 'admin.php';
                    } else {
                        alert('Failed to delete user: ' + data);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting user.');
                });
            })
        });

        productButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const id = event.target.closest('button').dataset.id;
                const formData = new FormData();

                formData.append('id', id);
                
                fetch('actions/delete_item.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'success') {
                        alert('Item deleted!');
                        window.location.href = 'admin.php';
                    } else {
                        alert('Failed to delete item: ' + data);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting item.');
                });
            })
        });

        promoteButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const id = event.target.closest('button').dataset.id;
                const formData = new FormData();

                formData.append('id', id);
                
                fetch('actions/promote.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'success') {
                        alert('User is now admin!');
                        window.location.href = 'admin.php';
                    } else {
                        alert('Failed to promote to admin: ' + data);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while promoting to admin.');
                });
            })
        });

        deleteCatButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const id = event.target.closest('button').dataset.id;
                const formData = new FormData();

                formData.append('id', id);
                
                fetch('actions/delete_category.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'success') {
                        alert('Category deleted!');
                        window.location.href = 'admin.php';
                    } else {
                        alert('Failed to delete category: ' + data);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while promoting to admin.');
                });
            })
        });

        document.querySelector('#new-cat').addEventListener('click', (event) => {
            const category = document.querySelector('#cat-text').value;

            const formData = new FormData();
            formData.append('category', category);
            
            fetch('actions/new_category.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'success') {
                        alert('New category added!');
                    } else {
                        alert('Failed to add category: ' + data);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while adding the category.');
                });

        })
    </script>

</body>
</html>
