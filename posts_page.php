<?php
include_once ("database/connect.php");
include_once ("templates/head.php");
include_once ("templates/header.php");
include_once ("templates/footer.php");
$db = getDatabaseConnection('database/database.db');


$numbersPerPage = isset($_POST['numbers-per-page']) ? $_POST['numbers-per-page'] : 10; // Default to 10 if not set
$sortOption = isset($_POST['sort-option']) ? $_POST['sort-option'] : 'recent-post'; // Default to 'recent-post' if not set
$numbersPerPage = filter_var($numbersPerPage, FILTER_VALIDATE_INT);

// Dynamically build SQL query based on parameters
switch ($sortOption) {
    case 'high-prices':
        $orderBy = 'price DESC';
        break;
    case 'lower-prices':
        $orderBy = 'price ASC';
        break;
    case 'recent-post':
        $orderBy = 'date DESC';
        break;
    case 'older-post':
        $orderBy = 'date ASC';
        break;
    default:
        $orderBy = 'date DESC';
}

if (isset($_GET['id'])) {
    // If category ID is set, filter by category
    $stmt = $db->prepare('SELECT * FROM categories WHERE id = ?');
    $stmt->execute(array($_GET['id']));
    $category = $stmt->fetch();

    $stmt = $db->prepare("SELECT * FROM items JOIN post_categories ON items.id = post_categories.item_id WHERE post_categories.category_id = :id ORDER BY $orderBy LIMIT :numbersPerPage");
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->bindParam(':numbersPerPage', $numbersPerPage, PDO::PARAM_INT);
    $stmt->execute();
    $posts = $stmt->fetchAll();
} else {
    // If no category ID, fetch all posts
    $stmt = $db->prepare("SELECT * FROM items ORDER BY $orderBy LIMIT :numbersPerPage");
    $stmt->bindParam(':numbersPerPage', $numbersPerPage, PDO::PARAM_INT);
    $stmt->execute();
    $posts = $stmt->fetchAll();
}

output_head("Smooth As Silk", "scripts/post-page-script.js");
?>

<body id="post-page">
    <?php output_header(); ?>
    <nav id="link-tree">
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="post_page.php">POSTS</a></li>
            <?php
            // Check if 'id' is set in the URL parameter
            if (isset($_GET['id'])) {
                echo '<li><a href="posts_page.php?id=' . $category['id'] . '">' . strtoupper(htmlspecialchars($category['name'])) . '</a></li>';
            }

            // Check if 'sr' is set in the URL parameter
            if (isset($_GET['sr'])) {
                echo '<li>' . strtoupper(htmlspecialchars($_GET['sr'])) . '</li>';
            }
            ?>
        </ul>
    </nav>
    <section id="sort-bar" class="outer-box-format background-color-very-dark-green">
        <div>
            <button class="box-input background-color-dark-green">
                <img src="./assets/filter-icon.png" alt="">
            </button>
        </div>
        <div>
            <h4>posts per page</h4>
            <select name="numbers-per-page" id="numbers-per-page" class="box-input background-color-dark-green">
                <option value="15">15</option>
                <option value="30">30</option>
                <option value="60">60</option>
            </select>
        </div>
        <div>
            <h4>sort options</h4>
            <select name="sort-option" id="sort-option" class="box-input background-color-dark-green">
                <option value="high-prices">Higher Prices</option>
                <option value="lower-prices">Lower Prices</option>
                <option value="recent-post">Recent Posts</option>
                <option value="older-post">Older Posts</option>
            </select>
        </div>
    </section>
    <aside id="filters" class="outer-box-format background-color-very-dark-green">
        <header class="iner-box-format background-color-dark-green">
            <button>
                <h2>Filter</h2>
            </button>
        </header>
        <article class="iner-box-format background-color-dark-green">
            <h3>Price</h3>
            <div id="slider"></div>
        </article>
        <article class="iner-box-format background-color-dark-green">
            <h3>Condition</h3>
            <select name="Condition" id="" class="box-input background-color-bright-green">
                <option value="used">Used</option>
                <option value="new">New</option>
            </select>
        </article>

    </aside>
    <section id="posts-section" class="outer-box-format background-color-very-dark-green">
        <?php
        foreach ($posts as $post) {
            // Display the post
            echo '<article class="iner-box-format background-color-dark-green">';
            echo '<h3><a href=""> ' . htmlspecialchars($post['title']) . '</a></h3>';
            echo '<img src="./assets/noimg.png" alt="">';//open post image
            echo '<h4 class="text-box-format" id="price">' . htmlspecialchars($post['price']) . '</h4>';
            echo '<h4 class="text-box-format">' . htmlspecialchars($post['description']) . '</h4>';
            echo '<button><img src="./assets/heartempty.png" alt=""><h5>Add to Wishlist</h5></button>';
            echo '<button><img src="./assets/shopping-cart.png" alt=""><h5>Add to Cart</h5></button>';
            echo '</article>';
        }
        echo $htmlPosts;

        ?>
    </section>
    <div id="page-number">
        <button><img src="" alt=""></button>
        <h4></h4>
        <button><img src="" alt=""></button>
    </div>
    <?php output_footer("posts-footer"); ?>

</body>

</html>