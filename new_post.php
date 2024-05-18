<?php
include_once ("templates/head.php");
include_once ("templates/header.php");
include_once ("templates/footer.php");
include_once ("database/connect.php");
include_once("actions/utils.php");
$db = getDatabaseConnection('database/database.db');

$stmt = $db->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll();

output_head("Smooth As Silk");

session_start();

if ($_SESSION['logged_in'] != true) {
    header("Location: http://localhost:9000/index.php");
    exit;
}

if (!is_seller($_SESSION['user_email'])) {
    header("Location: http://localhost:9000/index.php");
    exit;
}

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
                <select name="category" id="category-sel" class="box-input background-color-green text-beige">
                    <?php
                    foreach($categories as $category) {
                        echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
                    }
                    ?>
                </select>
                <label for="title">Title:</label>
                <input type="text" name="title" required>
                <label for="brand">Brand:</label>
                <input type="text" name="brand" id="brand-inp" required>
                <label for="model">Model:</label>
                <input type="text" id="model-inp" name="model" required>
                <label for="condition">Condition:</label>
                <select name="condition" id="condition-sel" class="box-input background-color-green text-beige">
                    <option value="New">New</option>
                    <option value="Used">Used</option>
                </select>
                <label for="price">Price:</label>
                <input type="number" name="price" required>
                <label for="description">Description:</label>
                <textarea name="description" id="description"  class="box-input background-color-green text-beige"></textarea>
                <label for="image">Item Image:</label>
                <input type="file" name="image" required>
                <input type="submit" value="Create Post" id="create-post-button">
            </form>
        </div>
    </section>

    <?php output_footer("new-post-footer"); ?>
</body>
<?php
?>