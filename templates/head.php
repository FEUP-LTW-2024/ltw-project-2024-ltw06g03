<?php
function output_head(string $name, string $scriptName)
{ ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $name ?></title>
        <link href="style/style.css" rel="stylesheet">
        <link href="style/layout.css" rel="stylesheet">
        <link href="style/responsive.css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="assets/favicon.png">
        <script src="<?= $scriptName ?>"></script>
    </head>
<?php }
?>