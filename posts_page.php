<?php
include_once ("database/connect.php");
include_once ("templates/head.php");
include_once ("templates/header.php");
include_once ("templates/footer.php");
output_head("Smooth As Silk");
?>
<?php output_header(); ?>

<body id="post-page">
    <nav id="link-tree">
        <ul>

        </ul>
    </nav>
    <section id="sort-bar">
        <div>
            <button>

            </button>
            <h3></h3>
        </div>
        <input type="number" name="number" value="20" min="20" max="50" step="15">
        <div>
            <select name="sort-option" id="">
                <option value="high-prices">Higher Prices</option>
                <option value="lower-prices">Lower Prices</option>
                <option value="recent-post">Recent Posts</option>
                <option value="older-post">Older Posts</option>
            </select>
        </div>
    </section>
    <aside id="filters">
        <header>
            <h1>Filtros</h1>
        </header>
        <article>
            <h2>titolo</h2>
        </article>
    </aside>
    <section id="posts-section">
        <article>
            <img src="" alt="">
            <h3></h3>
            <button></button>
            <button></button>
        </article>
    </section>
</body>

</html>