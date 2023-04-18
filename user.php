<?php

include 'inc/connect.inc.php'; //connetion to database
include 'inc/functions.inc.php'; //functions
include 'inc/cookie.php'; //cookie status

// user acess restriction if session is closed
if( ! user_is_connected()) {
    header('location: index.php');
}

//display 

include 'inc/header.inc.php'; //html header
include 'inc/nav2.inc.php'; //html navbar



?>
<!-- <div class="return">
    <a href="home.php"><i class="fa-solid fa-arrow-rotate-left"></i></a>
</div> -->
<div class="mainuser">
    <br>
    
    <div id="userbox" class="flex">
        <h1>User Profile</h1>
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

    

    
 
    
</div> 
    <div class="flex">
        <div class="mainuser2" >
        <div id="columnchart_values" style="margin:auto; width: 900px; height: 420px; text-align:center"></div>
        </div>  
        <div class="mainuser2" >
        <div id="piechart_3d" style="margin:auto; width: 900px; height: 420px; text-align:center"></div>
        </div> 
    </div> 
</section>

<?php

include 'inc/footer.inc.php';
?>