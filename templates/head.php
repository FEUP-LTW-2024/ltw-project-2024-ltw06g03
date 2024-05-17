<?php
function output_head(string $name, string $scriptName = "")
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.css" rel="stylesheet"
            integrity="sha512-MKxcSu/LDtbIYHBNAWUQwfB3iVoG9xeMCm32QV5hZ/9lFaQZJVaXfz9aFa0IZExWzCpm7OWvp9zq9gVip/nLMg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="icon" type="image/x-icon" href="assets/favicon.png">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"
            integrity="sha384-9NhfMwMkkA6dDFEyj5CxOiYaL6KqLjKINTJkR7e5SlZthrndR9oB/SJsi5PBNnjw"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.js"
            integrity="sha512-UOJe4paV6hYWBnS0c9GnIRH8PLm2nFK22uhfAvsTIqd3uwnWsVri1OPn5fJYdLtGY3wB11LGHJ4yPU1WFJeBYQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <?php if ($scriptName): ?>
            <script src="<?= $scriptName ?>" defer></script>
        <?php endif; ?>
    </head>
<?php }
?>