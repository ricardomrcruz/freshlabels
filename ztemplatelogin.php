<?php

include 'inc/connect.inc.php'; //connetion to database
include 'inc/functions.inc.php'; //functions


$_SESSION['token'] = bin2hex(random_bytes(16));
print_r($_SESSION);

// if the user is already connected
if (user_is_connected()) {
    header('location: home.php');
}

// && isset($_POST['token']) && isset($_SESSION['user']['token'])

//USER LOGIN
if (isset($_POST['name_user']) && isset($_POST['pwd'])) {
    $name_user = trim($_POST['name_user']);
    $pwd = trim($_POST['pwd']);

    // we select the username and pwd from database
    $login = $pdo->prepare("SELECT * FROM user WHERE name_user = :name_user");
    $login->bindParam(':name_user', $name_user, PDO::PARAM_STR);
    $login->execute();



    if ($login->rowCount() > 0) {
        //we got the username before
        //to check out password presence
        $data = $login->fetch(PDO::FETCH_ASSOC);
        if (password_verify($pwd, $data['pwd'])) {

            

            // we save the user data in the session
            //
            $_SESSION['user'] = array();
            $_SESSION['user']['id_user'] = $data['id_user'];
            $_SESSION['user']['name_user'] = $data['name_user'];
            $_SESSION['user']['name_full'] = $data['name_full'];
            $_SESSION['user']['email'] = $data['email'];
            $_SESSION['user']['registration_date'] = $data['registration_date'];
            $_SESSION['user']['status'] = $data['status'];
            $_SESSION['user']['clicks'][$idcategory] = 0;
            // $_SESSION['user']['token'] = bin2hex(random_bytes(16));
            

            // google chart start (if not done, chart is not displayed at the debut, needs atleast one numeric value implemented from the start)

            $_SESSION['user']['clicks'][1]++;
            $_SESSION['user']['clicks'][2]++;
            $_SESSION['user']['clicks'][3]++;
            $_SESSION['user']['clicks'][4]++;
            $_SESSION['user']['clicks'][5]++;
            $_SESSION['user']['clicks'][6]++;
            $_SESSION['user']['clicks'][7]++;

            // direction to the dashboard main window
            header('location: home.php');
        } else {
            $msg .= '<div class="alert">Error with the username and/or password. </div>';
        }
    } else {
        $msg .= '<div class="alert">Error with the username and/or password. </div>';
    }
}



//display 
include 'inc/header.inc.php'; //html header

?>

<div class="bodylogin"></div>
<div class="loginbox">
    <h1>Welcome To The Safe Food Dashboard</h1>
    <h2>Login to your account</h2>
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
        
        <button type="submit">Login</button>
    </form>
</div>



</section>

<?php

include 'inc/footer.inc.php';
?>