<?php
include_once("database/connect.php");
include_once("templates/head.php");
include_once("templates/header.php");
include_once("templates/footer.php");
/*
$db= getDatabaseConnection("");
$stmt = $db->prepare('SELECT * FROM categories') ;
$stmt->execute();
$categories = $stmt->fetchAll();*/

output_head("Smooth As Silk");

session_start();
?>
<body>
    <?php 
    if ($_SESSION['logged_in'] === true) {
        output_logged_in_header();
    } else {
        output_header(); 
    }
    ?>
    <h1 id="big-logo">SAS</h1>
    <section id="main-page">
        <div class="arrow"><a href=""><img src="" alt=""></a></div>
        <ul>
            <?php
                // foreach($categories as $category) {
                //     echo "<li><a href=''>" . $category['name'] . "</a></li>";
                // }
            ?>
            <li><a href="">Category</a></li>
            <li><a href="">Category</a></li>
            <li><a href="">Category</a></li>
            <li><a href="">Category</a></li>
            <li><a href="">Category</a></li>
            <li><a href="">Category</a></li>
            <li><a href="">Category</a></li>
            <li><a href="">Category</a></li>
            <li><a href="">Category</a></li>
            <li><a href="">Category</a></li>
        </ul>
        <div class="arrow"><a href=""><img src="" alt=""></a></div>
    </section>
    <?php output_footer("index-footer"); ?>
</body>

</html>