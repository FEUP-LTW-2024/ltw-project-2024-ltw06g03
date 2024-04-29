<?php
include_once ("database/connect.php");
include_once ("templates/head.php");
include_once ("templates/header.php");
include_once ("templates/footer.php");
output_head("Smooth As Silk");
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
    <section id="sort-bar" class="outer-box-format">
        <div>
            <button>
                <img src="./assets/filter-icon.png" alt="">
            </button>
        </div>
        <div>
            <h4>posts per page</h4>
            <select name="numbers-per-page" id="">
                <option value="15">15</option>
                <option value="30">30</option>
                <option value="60">60</option>
            </select>        </div>
        <div>
            <h4>sort options</h4>
            <select name="sort-option" id="">
                <option value="high-prices">Higher Prices</option>
                <option value="lower-prices">Lower Prices</option>
                <option value="recent-post">Recent Posts</option>
                <option value="older-post">Older Posts</option>
            </select>
        </div>
    </section>
    <aside id="filters" class="outer-box-format">
        <header class="iner-box-format">
            <h2>Filtros</h2>
        </header>
        <article class="iner-box-format">
            <h3>titolo</h3>
        </article>
    </aside>
    <section id="posts-section" class="outer-box-format">
        <article class="iner-box-format">
            <img src="" alt="">
            <h4></h4>
            <button><img src="" alt=""></button>
            <button><img src="" alt=""></button>
        </article>
        <article class="iner-box-format">
            <img src="" alt="">
            <h4></h4>
            <button></button>
            <button></button>
        </article>
        <article class="iner-box-format">
            <img src="" alt="">
            <h4></h4>
            <button></button>
            <button></button>
        </article>
        <article class="iner-box-format">
            <img src="" alt="">
            <h4></h4>
            <button></button>
            <button></button>
        </article>
        <article class="iner-box-format">
            <img src="" alt="">
            <h4></h4>
            <button></button>
            <button></button>
        </article>
        <article class="iner-box-format">
            <img src="" alt="">
            <h4></h4>
            <button></button>
            <button></button>
        </article>
        <article class="iner-box-format">
            <img src="" alt="">
            <h4></h4>
            <button><img src="" alt=""></button>
            <button><img src="" alt=""></button>
        </article>
        <article class="iner-box-format">
            <img src="" alt="">
            <h4></h4>
            <button><img src="" alt=""></button>
            <button><img src="" alt=""></button>
        </article>
        <article class="iner-box-format">
            <img src="" alt="">
            <h4></h4>
            <button><img src="" alt=""></button>
            <button><img src="" alt=""></button>
        </article>
        <div id="page-number">
            <button><img src="" alt=""></button>
            <h4></h4>
            <button><img src="" alt=""></button>
        </div>
    </section>
    <?php output_footer("posts-footer"); ?>
</body>

</html>