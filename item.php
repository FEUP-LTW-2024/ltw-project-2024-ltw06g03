<?php
include_once ("templates/head.php");
include_once ("templates/header.php");
include_once ("templates/footer.php");
include_once("actions/item.php");
include_once("templates/item.php");

output_head("Smooth As Silk");

session_start();

?>

<body id="item-body">
  <?php
    if ($_SESSION['logged_in'] === true) {
        output_logged_in_header();
    } else {
        output_header(); 
    }
    if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') {
        $item_id = $_GET['id'];
        $item_info = get_item_info($item_id);
        output_item($item_info);
    }
    output_footer("new-post-footer");
  ?>
</body>