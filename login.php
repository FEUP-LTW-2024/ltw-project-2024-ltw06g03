<?php

include_once("templates/head.php");
include_once("templates/header.php");

output_head("Smooth As Silk");
output_header();
?>

<body>
    <section>
        <div id="login">
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
        <div id="register">
            <form action="actions/register.php" method="post">

            </form>
        </div>
    </section>
</body>