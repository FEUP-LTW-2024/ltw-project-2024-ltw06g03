<?php
include_once ("database/connect.php");
include_once ("templates/head.php");
include_once ("templates/header.php");
include_once ("templates/footer.php");
$db= getDatabaseConnection("database.db");
$stmt = $db->prepare('SELECT * FROM categories') ;
$stmt->execute();
$categories = $stmt->fetchAll();

output_head("Smooth As Silk");
?>

<body id="main-page-body">
    <?php output_header(); ?>
    <h1 id="big-logo">SAS</h1>
    <section id="main-page">
        <button class="arrow-right"><img src="./assets/arrowleft.png" alt="arrow-right"></button>

        <ul>
            <?php
                foreach ($categories as $category) {
                    echo "<li><a href=''>" . $category['name'] . "</a></li>";
                }
            ?>
        </ul>
        <button class="arrow-left"><img src="./assets/arrowright.png" alt="arrow-left"></button>

    </section>
    <?php output_footer("index-footer"); ?>
</body>

</html>