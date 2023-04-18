<?php


//USER LOGIN

// conditions and security 


if (isset($_POST['name_user']) && isset($_POST['pwd']) && isset($_POST['token'])) {
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


            // we save the user data in the session + tkn
            //
            $_SESSION['user'] = array();
            $_SESSION['user']['id_user'] = $data['id_user'];
            $_SESSION['user']['name_user'] = $data['name_user'];
            $_SESSION['user']['name_full'] = $data['name_full'];
            $_SESSION['user']['email'] = $data['email'];
            $_SESSION['user']['registration_date'] = $data['registration_date'];
            $_SESSION['user']['status'] = $data['status'];
            $_SESSION['user']['clicks'][$idcategory] = 0;

            //token form control

            $_SESSION['token'] = $_POST['token'];




            // 2nd token cookie 4h sesssion
            // you can check out the cookie timeout settings in cookie.php 

            $cookie_tkn = bin2hex(random_bytes(32));
            $cookie_limit = time() + 14400;
            setcookie('tkncookie', $cookie_tkn, $cookie_limit, '/', '', false, true);

            $_SESSION['cookie_limit'] = $cookie_limit;

            //click adds for google charts

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
