<?php
include_once ("database/connect.php");
include_once ("templates/head.php");
include_once ("templates/header.php");
include_once ("templates/footer.php");
include_once ("actions/utils.php");
session_start();

$db = getDatabaseConnection("database/database.db");


$id = get_id_from_email($_SESSION['user_email']);
$query = "SELECT * FROM chat WHERE sender_id = :id";
$stmt = $db->prepare($query);
$stmt->execute([':id' => $id]);
$chats = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($_GET['chat_id'])) {
    $chat_id = intval($_GET['chat_id']);

    $query = "SELECT * FROM messages WHERE chat_id = :chat_id";
    $stmt = $db->prepare($query);
    $stmt->execute([':chat_id' => $chat_id]);
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $reciverid = $messages[0]['receiver_id'];
}


output_head("Smooth As Silk", "scripts/chat-script.js");
?>
<script>
    const chat_id = <?php echo $chat_id; ?>;
    const sender_id = <?php echo $id; ?>; 
    const receiver_id = <?php echo $reciverid; ?>; 
</script>
<body id="chat-page-body">
    <?php
    if ($_SESSION['logged_in'] === true) {
        output_logged_in_header();
    } else {
        output_header();
    }
    ?>
    <aside id="chats" class="outer-box-format background-color-very-dark-green">
        <h2>Chats</h2>
        <ul>
            <?php
            foreach ($chats as $chat) {
                $username = getUsernameFromId($chat['receiver_id']);
                echo '<li class="iner-box-format background-color-green"><a href="chat.php?chat_id=' . $chat['id'] . '">' . $username . '</a></li>';            }
            ?>
        </ul>

    </aside>
    <section class="outer-box-format background-color-very-dark-green">
        <div id="chat-box">
            
            <?php
            if (isset($_GET['chat_id'])) {
                foreach ($messages as $message) {
                    if ($message['sender_id'] == $id) {
                        echo '<article class="iner-box-format background-color-bright-green sended-message">';
                    } else {
                        echo '<article class="iner-box-format background-color-green received-message">';
                    }
                    echo '<h4>' . htmlspecialchars($message['message']) . '</h4>';
                    echo '</article>';
                }
            }
            ?>
        </div>
        <div id="message-bar" class="outer-box-format  background-color-green">
            <input type="text" id="message-text">
            <button id="send-message"><img src="./assets/send-arrow.png" alt=""></button>
        </div>
    </section>
    <?php output_footer("posts-footer"); ?>
</body>

</html>