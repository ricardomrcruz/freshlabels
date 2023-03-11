<?php

include 'inc/connect.inc.php'; //connetion to database
include 'inc/functions.inc.php'; //functions



// user acess restriction if session is closed
if( ! user_is_connected()) {
    header('location: login.php');
}


//display 

include 'inc/header.inc.php'; //html header
include 'inc/nav.inc.php'; //html navbar
include 'controller/manage_product.php' //display cat


?>       
        
        <div class="main"> 
            <section class="category__body">
           <?php echo $displaycat; ?>
            </section>
        </div>
        </section>
        
   
<?php

include 'inc/footer.inc.php';
?>

    