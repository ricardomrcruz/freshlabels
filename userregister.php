<?php

include 'inc/connect.inc.php'; //connetion to database
include 'inc/functions.inc.php'; //functions
include 'controller/userregister.php'; // user registration treatments

if( ! user_is_admin() ){
    header('location: home.php');
    exit(); //on bloque l'execution du code qui suit cette ligne
}


//display 
include 'inc/header.inc.php'; //html header

?>

<div class="return">
            <a href="user.php"><i class="fa-solid fa-arrow-rotate-left"></i></a>
        </div>
<div class="registerbox">
    <h1>Register a new user</h1>
    <?php echo $msg; ?>
    
    <form method="POST" class="registerform" action="">
        <div class="txtfield">
            <input type="text" name="name_user" id="name_user" required autocomplete="off">
            <span></span>
            <label for="name_user">Username</label>

        </div>
        <div class="txtfield">
            <input type="text" name="name_full" id="name_full" required autocomplete="off">
            <span></span>
            <label for="name_full">Fullname</label>
        </div>
        <div class="txtfield">
            <input type="text" name="email" id="email" required autocomplete="off">
            <span></span>
            <label for="email">Email</label>
        </div>
        <div class="txtfield">
            <input type="text" name="pwd" id="pwd" required autocomplete="off">
            <span></span>
            <label for="pwd">Password</label>
        </div>
        <button type="submit">Submit new user</button>
    </form>
</div>


<?php
include 'inc/footer.inc.php';
?>