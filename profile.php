<?php
include_once("templates/head.php");
include_once("templates/header.php");
include_once("templates/footer.php");
include_once("templates/register_errors.php");
include_once("database/connect.php");
include_once("actions/utils.php");

output_head("Smooth As Silk");
session_start();
?>
<body>
    <?php 
    if ($_SESSION['logged_in'] === true) {
        output_logged_in_header();
    } else {
        output_header(); 
    } ?>
    <div class="profile-picture-container">
        <a id="profile-picture"><img src="<?php
        $v = pfp_exists($_SESSION['user_email']);
        if ($v) {
            echo $v;
        } else{
            echo './assets/user_profile.png';
        }
        ?>" alt="profile picture"></a>    
    </div>
    <section id="profile-page">
        <div class="profile-item-username">
                <p><strong>
                    <?php
                    echo get_seller_username(get_id_from_email($_SESSION['user_email']));
                    ?>
                </strong></p>
        </div>
        
        <div class="profile-info">
            <div class="profile-item">
                <p><strong>
                    <?php
                    echo get_seller_name(get_id_from_email($_SESSION['user_email']));
                    ?>
                </strong></p>
            </div>
            <div class="profile-item">
                <p><strong>
                    <?php
                    echo $_SESSION['user_email'];
                    ?>
                </strong></p>
            </div>
        </div>
        <div class="profile-actions">
            <a href="edit-profile.php"><button>Edit Profile</button></a>
            <?php
            if (is_seller($_SESSION['user_email'])) { ?>
            <a href="seller-items.php"><button>My Selling Items</button></a>
            <?php }
            if (is_buyer($_SESSION['user_email']) || is_seller($_SESSION['user_email'])) { ?>
            <a href="my_orders.php"><button>My Orders</button></a>
            <?php }
            if (is_admin($_SESSION['user_email'])) { ?>
            <a href="admin.php"><button>Admin</button></a>
            <?php } ?>
        </div>
    </section>
    
    <?php output_footer("EDU"); ?>
</body>
</html>