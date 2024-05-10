<?php
function output_errors($username_error, $email_error) {
    ?>
    <div id="errors-div" class="login-container">
        <?php
        if ($username_error) { ?>
            <p>The username you are trying to register already exists.</p>
    
        <?php }
        if ($email_error) { ?>
            <p>The email you are trying to register already exists.</p>
        <?php } ?>
    </div>
<?php }
?>