<?php

include 'inc/connect.inc.php'; //connetion to database
include 'inc/functions.inc.php'; //functions


//display 

include 'inc/header.inc.php'; //html header


?>
<div class="return">
    <a href="home.php"><i class="fa-solid fa-arrow-rotate-left"></i></a>
</div>
<div class="usercontainer">
    <br>
    
    <div id="userbox" class="flex">
        <h1>User Account</h1>
        <ul class="leftuser">
            <li> <span>Username</span> </li>
            <hr>
            <li> <span>Fullname</span> </li>
            <hr>
            <li> <span>Email Adress</span> </li>
            <hr>
            <li> <span>Registered</span> </li>
            <hr>
            <li> <span>Account ID</span> </li>
        </ul>
        <ul class="rightuser">
            <li>&nbsp; &nbsp; &nbsp; &nbsp;<?php echo $_SESSION['user']['name_user']; ?></li>
            <hr>
            <li>&nbsp; &nbsp; &nbsp; &nbsp;<?php echo $_SESSION['user']['name_full']; ?> </li>
            <hr>
            <li>&nbsp; &nbsp; &nbsp; &nbsp;<?php echo $_SESSION['user']['email']; ?> </li>
            <hr>
            <li>&nbsp; &nbsp; &nbsp; &nbsp;<?php echo $_SESSION['user']['registration_date']; ?> </li>
            <hr>
            <li>&nbsp; &nbsp; &nbsp; &nbsp;<?php echo sprintf('%04s', $_SESSION['user']['id_user']); ?></li>
        </ul>
    </div>

    <div id="userbuttons" class="flex" >
    <a class="addproduct"href="listproducts.php"><span class="text">List Of Products </span> </a>
        <?php
        if ($_SESSION['user']['status'] = 2) {
            echo '
            <a class="addproduct" href="addproduct.php">Add Product</a>
            <a class="userregister"href="userregister.php">Register New User</a>';
            
            ;
        } else {
            echo '';
        } ?>
    </div>
 
    
</div>   
</section>

<?php

include 'inc/footer.inc.php';
?>