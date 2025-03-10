<?php

include_once("templates/head.php");
include_once("templates/header.php");
include_once("templates/footer.php");
include_once("templates/register_errors.php");

output_head("Smooth As Silk");
output_header();
?>

<body id="login-body">
    <?php
        if (isset($_GET['username']) || isset($_GET['email'])) {
            output_errors(isset($_GET['username']), isset($_GET['email']));
        }
    ?>
    <section id="login-sec" class="login-container">
        <div id="login-div">
            <h1>Login</h1>
            <form action="actions/login.php" method="post">
                <label for="email">
                    Email
                    <input type="email" name="email">
                </label>
                <label for="password">
                    Password
                    <input type="password" name="password">
                </label>
                <input type="submit" value="Login">
            </form>
        </div>
        <div id="separator"></div>
        <div id="register-div">
            <h1>Register</h1>
            <form action="actions/register.php" method="post">
                <label for="email">
                    Email
                    <input type="email" name="email">
                </label>
                <label for="password">
                    Password
                    <input type="password" name="password">
                </label>
                <label for="name">
                    Name
                    <input type="text" name="name">
                </label>
                <label for="username">
                    Username
                    <input type="text" name="username">
                </label>
                <div id="buyer-seller">
                    <label for="buyer">
                        Seller
                        <input type="checkbox" name ="buyer" class="align-center" value="buyer">
                    </label>
                    <label for="seller">
                        Buyer
                        <input type="checkbox" name="seller" class="align-center" value="seller">
                    </label>
                </div>
                <input type="submit" value="Register">
            </form>
        </div>
    </section>
    <?php output_footer("login-footer"); ?>
</body>