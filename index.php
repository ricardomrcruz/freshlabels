<?php

include 'inc/connect.inc.php'; //connetion to database
include 'inc/functions.inc.php'; //functions
include 'controller/login.php'; //login conditions

// if the user is already connected
 if( user_is_connected()){
     header('location: home.php');
 }
$_SESSION['token'] = bin2hex(random_bytes(32));
$_SESSION['token2'] = bin2hex(random_bytes(32));



//display 
include 'inc/header.inc.php'; //html header

?>

<div class="bodylogin"></div>
<div class="loginbox">
    <h1>Login</h1>
    <hr class="hrhr">
    <?php echo $msg; ?>
    <form method="POST" class="registerform" action="">
        <div class="txtfield">
            <input type="text" name="name_user" id="name_user" required autocomplete="off">
            <span></span>
            <label for="name_user">Username</label>
        </div>
        <div class="txtfield">
            <input type="password" name="pwd" id="pwd" required autocomplete="off">
            <span></span>
            <label for="pwd">Password</label>
        </div>
        <input type="hidden" name="token" value="<?=$_SESSION['token'];?>">
        <button id="submitbutton" type="submit">LOGIN</button>
    </form>
</div>



</section>

<?php

include 'inc/footer.inc.php';
?>