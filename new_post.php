<?php
include_once ("templates/head.php");
include_once ("templates/header.php");
include_once ("templates/footer.php");
include_once ("database/connect.php");
$db= getDatabaseConnection("database.db");

output_head("Smooth As Silk");

session_start();

?>
<body id="new-post-body">
    <?php 
    if ($_SESSION['logged_in'] === true) {
        output_logged_in_header();
    } else {
        output_header(); 
    }
    ?>
    <section id="login-sec" class="login-container">
        <div id="login-div">
            <h1>New Post</h1>
            <form action="actions/new_post.php" method="post" enctype="multipart/form-data">
                <label for="category">Category:</label>
                <select name="category" id="category-sel">
                    <?php
                    $categories = array(
                        'Electronics',
                        'Clothing',
                        'Furniture',
                        'Books',
                        'Automobiles',
                        'Kitchen Appliances',
                        'Gardening',
                        'Sports Equipment',
                        'Musical Instruments',
                        'Toys',
                        'Art Supplies',
                        'Pet Supplies'
                    );

                    foreach($categories as $category) {
                        echo "<option value=\"$category\">$category</option>";
                    }
                    ?>
                </select>
                <label for="brand">Brand:</label>
                <input type="text" name="brand" id="brand-inp">
                <label for="model">Model:</label>
                <input type="text" id="model-inp" name="model">
                <label for="condition">Condition:</label>
                <select name="condition" id="condition-sel">
                    <option value="new">New</option>
                    <option value="used">Used</option>
                </select>
                <label for="price">Price:</label>
                <input type="number" name="price">
                <label for="image">Item Image:</label>
                <input type="file">
                <input type="submit" value="Create Post">
            </form>
        </div>
    </section>

    <?php output_footer("new-post-footer"); ?>
</body>
<?php
?>