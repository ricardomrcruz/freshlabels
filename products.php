<?php

include 'inc/connect.inc.php'; //connetion to database
include 'inc/functions.inc.php'; //functions
include 'inc/cookie.php'; //cookie status
include 'controller/display_product.php'; //display products
// include 'controller/label_data.php'; //display products

// user acess restriction if session is closed
if (!user_is_connected()) {
    header('location: login.php');
}

//display 

include 'inc/header.inc.php'; //html header
include 'inc/nav.inc.php'; //html navbar


?>

<div class="main">
    <section class="category__body">
        <?php echo $displayprod; ?>
    </section>
</div>

</section>



<?php

include 'inc/footer.inc.php';
?>