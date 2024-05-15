<?php
include_once ("database/connect.php");
include_once ("templates/head.php");
include_once ("templates/header.php");
include_once ("templates/footer.php");

$db= getDatabaseConnection("database.db");
$stmt = $db->prepare('SELECT * FROM categories') ;
$stmt->execute();
$categories = $stmt->fetchAll();



output_head("Smooth As Silk", "scripts/post-page-script.js");
?>

<body id="post-page">
    <?php output_header(); ?>
    <nav id="link-tree">
        <ul>
            <li><a href="">HOME</a></li>
            <li><a href="">POSTS</a></li>
            <li><a href="">CENAS</a></li>
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
            <select name="numbers-per-page" id="" class="box-input background-color-dark-green">
                <option value="15">15</option>
                <option value="30">30</option>
                <option value="60">60</option>
            </select>
        </div>
        <div>
            <h4>sort options</h4>
            <select name="sort-option" id="" class="box-input background-color-dark-green">
                <option value="high-prices">Higher Prices</option>
                <option value="lower-prices">Lower Prices</option>
                <option value="recent-post">Recent Posts</option>
                <option value="older-post">Older Posts</option>
            </select>
        </div>
    </section>
    <aside id="filters" class="outer-box-format background-color-very-dark-green">
        <header class="iner-box-format background-color-dark-green">
            <h2>Filtros</h2>
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
        <article class="iner-box-format background-color-dark-green">
            <h3>Gender</h3>
            <select name="Gender" id="" class="box-input background-color-bright-green">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="Other">Other</option>
            </select>
        </article>
        <article class="iner-box-format background-color-dark-green">
            <h3>Sise</h3>
            <select name="Sise" id="" class="box-input background-color-bright-green">
                <option value="xxs">XXS</option>
                <option value="xs">XS</option>
                <option value="s">S</option>
                <option value="m">M</option>
                <option value="l">L</option>
                <option value="xl">XL</option>
                <option value="xxl">XXL</option>
            </select>
        </article>
    </aside>
    <section id="posts-section" class="outer-box-format background-color-very-dark-green">
        <article class="iner-box-format background-color-dark-green" >
            <h3 ><a href="index.php"> Post Name</a></h3>
            <img src="./assets/noimg.png" alt="">
            <h4 class="text-box-format">asiudaiosdiohasidi asoid oasidio aosidhioasiodoiasdio oas d oasod aosd aosidoas
                doais doasj doiajsodjasodij asoidj aosidj oasijd oasidj oasidj oajd oasijd osa</h4>
            <button><img src="./assets/heartempty.png" alt="">
                <h5>Add to Wishlist</h5>
            </button>
            <button><img src="./assets/shopping-cart.png" alt="">
                <h5>Add to Cart</h5>
            </button>
        </article>
        
    </section>
    <div id="page-number">
        <button><img src="" alt=""></button>
        <h4></h4>
        <button><img src="" alt=""></button>
    </div>
    <?php output_footer("posts-footer"); ?>
</body>

</html>