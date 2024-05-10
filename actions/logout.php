<?php
session_start();
session_destroy();
header("Location: http://localhost:9000/index.php");
exit;
?>