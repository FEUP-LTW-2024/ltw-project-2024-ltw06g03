<?php
include_once ("templates/head.php");
include_once ("templates/header.php");
include_once ("templates/footer.php");

output_head("Smooth As Silk");

session_start();

?>
<body id="new-post-body">
    <?php 
    if ($_SESSION['logged_in'] === true) {
        output_logged_in_header();
    } else {
        output_header(); 
    }
    ?>
    <?php output_footer("new-post-footer"); ?>
</body>
<?php
?>