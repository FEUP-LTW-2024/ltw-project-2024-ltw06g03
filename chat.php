<?php
include_once ("database/connect.php");
include_once ("templates/head.php");
include_once ("templates/header.php");
include_once ("templates/footer.php");

$db = getDatabaseConnection("database/database.db");


output_head("Smooth As Silk");
session_start();
?>

<body id="chat-page-body">
    <?php
    if ($_SESSION['logged_in'] === true) {
        output_logged_in_header();
    } else {
        output_header();
    }
    ?>
    <aside class="outer-box-format background-color-very-dark-green">
        <h2>Chats</h2>
        <ul>
            <li><a href="chat.php">User1</a></li>
            <li><a href="chat.php">User2</a></li>
            <li><a href="chat.php">User3</a></li>
            <li><a href="chat.php">User4</a></li>
            <li><a href="chat.php">User5</a></li>
            <li><a href="chat.php">User6</a></li>
            <li><a href="chat.php">User7</a></li>
            <li><a href="chat.php">User8</a></li>
            <li><a href="chat.php">User9</a></li>
            <li><a href="chat.php">User10</a></li>
        </ul>

    </aside>
    <section class="outer-box-format background-color-very-dark-green">
        <div id="reciver">
            <article class="iner-box-format background-color-green"></article>
        </div>
        <div id="sender">
            <article class="iner-box-format background-color-bright-green"></article>
        </div>
        <div id="message-bar" class="iner-box-format  background-color-green">
            <input type="text">
        </div>
    </section>
</body>

</html>