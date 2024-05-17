<?php
include_once ("database/connect.php");
include_once ("templates/head.php");
include_once ("templates/header.php");
include_once ("templates/footer.php");
$db = getDatabaseConnection('database/database.db');

$stmt = $db->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll();

// Get parameters from POST request
$numbersPerPage = isset($_POST['numbers-per-page']) ? $_POST['numbers-per-page'] : 15;
$sortOption = isset($_POST['sort-option']) ? $_POST['sort-option'] : 'recent-post';
$categoryFilter = isset($_POST['category']) ? $_POST['category'] : 'all';
$conditionFilter = isset($_POST['condition']) ? $_POST['condition'] : 'all';
$priceMin = isset($_POST['price-min']) ? $_POST['price-min'] : 0;
$priceMax = isset($_POST['price-max']) ? $_POST['price-max'] : 100000;
$brandModel = isset($_POST['brand-model']) ? $_POST['brand-model'] : 'all';

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

// Build the SQL query dynamically based on filters
$query = "SELECT * FROM items WHERE price BETWEEN :priceMin AND :priceMax";
$params = [
    ':priceMin' => $priceMin,
    ':priceMax' => $priceMax,
    ':numbersPerPage' => $numbersPerPage
];

if ($categoryFilter !== 'all') {
    $query .= " AND category_id = :categoryId";
    $params[':categoryId'] = $categoryFilter;
}

if ($conditionFilter !== 'all') {
    $query .= " AND condition = :condition";
    $params[':condition'] = $conditionFilter;
}

if ($brandModel !== 'all') {
    $query .= " AND brand = :brandModel";
    $params[':brandModel'] = $brandModel;
}

$query .= " ORDER BY $orderBy LIMIT :numbersPerPage";

$stmt = $db->prepare($query);
$stmt->execute($params);
$posts = $stmt->fetchAll();


output_head("Smooth As Silk", "scripts/post-page-script.js");
?>

<body id="post-page">
    <?php output_header(); ?>
    <nav id="link-tree">
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="posts_page.php">POSTS</a></li>
            <?php if (isset($_GET['category'])): ?>
                <li><a
                        href="posts_page.php?category=<?php echo $category['id']; ?>"><?php echo strtoupper(htmlspecialchars($category['name'])); ?></a>
                </li>
            <?php else: ?>
                <li><a href="posts_page.php?category=default_category_id">Default Category Name</a></li>
            <?php endif; ?>
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
                <option value="recent-post">Recent Posts</option>
                <option value="high-prices">Higher Prices</option>
                <option value="lower-prices">Lower Prices</option>
                <option value="older-post">Older Posts</option>
            </select>
        </div>
    </section>
    <aside id="filters" class="outer-box-format background-color-very-dark-green">
        <header class="iner-box-format background-color-dark-green">
            <h2>Filters</h2>
        </header>
        <article class="iner-box-format background-color-dark-green">
            <h3>Price</h3>
            <div id="slider"></div>
        </article>
        <article class="iner-box-format background-color-dark-green">
            <h3>Condition</h3>
            <select name="Condition" id="condition" class="box-input background-color-bright-green">
                <option value="all"></option>
                <option value="Used">Used</option>
                <option value="New">New</option>
            </select>
        </article>
        <article class="iner-box-format background-color-dark-green">
            <h3>Category</h3>
            <select name="category" id="category" class="box-input background-color-bright-green">
                <option value="all"></option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>"><?php echo htmlspecialchars($category['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </article>
        <article class="iner-box-format background-color-dark-green">
            <h3>Brand/Model</h3>
            <select name="brand-model" id="brand-model" class="box-input background-color-bright-green">
                <option value="all"></option>
                <option value="1">Brand/Model 1</option>
                <option value="2">Brand/Model 2</option>
            </select>
        </article>
    </aside>
    <section id="posts-section" class="outer-box-format background-color-very-dark-green">
        <?php
        $htmlPosts = '';

        foreach ($posts as $post) {
            // Generate HTML markup for each article
            $htmlPosts .= '<article class="iner-box-format background-color-dark-green">';
            $htmlPosts .= '<h3><a href=""> ' . htmlspecialchars($post['title']) . '</a></h3>';
            $htmlPosts .= '<img src="./assets/noimg.png" alt="">';//open post image
            $htmlPosts .= '<h4 class="text-box-format" id="price">' . htmlspecialchars($post['price']) . '</h4>';
            $htmlPosts .= '<h4 class="text-box-format">' . htmlspecialchars($post['description']) . '</h4>';
            $htmlPosts .= '<button><img src="./assets/heartempty.png" alt=""><h5>Add to Wishlist</h5></button>';
            $htmlPosts .= '<button><img src="./assets/shopping-cart.png" alt=""><h5>Add to Cart</h5></button>';
            $htmlPosts .= '</article>';
        }

        // Echo the HTML markup for articles
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