<?php  


// USER REGISTRATION
if( isset($_POST['name_user']) && isset($_POST['name_full']) && isset($_POST['email']) && isset($_POST['pwd']) ) {
    $name_user = trim($_POST['name_user']);
    $name_full = trim($_POST['name_full']);
    $email = trim($_POST['email']);
    $pwd = trim($_POST['pwd']);

    // control variable
    $error = false;

    //FORM REQUIREMENTS


    //USERNAME
    //length between 8 and 14

    $length_username = iconv_strlen($name_user);
    if($length_username < 8 || $length_username > 14) {
        $msg .= '<div class="alert ">Attention, the username must have between 8 and 14 characters. </div>';
        $error = true;
    }

    // caracterss accepted (only numbers and letters and underscores)
    $verif_characters = preg_match('#^[A-Za-z0-9_]+$#', $name_user);

    if( ! $verif_characters ){
        $msg .= '<div class="alert"> Attention, the username should be composed only by numbers, letters and underscores. </div>';
        $error = true;
    }

    //to check out if the username is available in the database (index unique)
    $verif_username = $pdo->prepare("SELECT * FROM user WHERE name_user = :name_user");
    $verif_username->bindParam(':name_user', $name_user, PDO::PARAM_STR);
    $verif_username->execute();
    if($verif_username->rowCount() > 0){
        $msg .= '<div class="alert">Attention, this username is not available or is already registered. </div>';
        $error = true;
    }
    
    
    //FULL NAME
    //length between 8 and 14

    $length_fullname = iconv_strlen($name_full);
    if($length_fullname > 50) {
        $msg .= '<div class="alert ">Attention, the full name chosen is too big to be used. </div>';
        $error = true;
    }

    // characterss accepted (only letters and spaces)
    $verif_characters2 = preg_match('#^[a-zA-Z\s]+$#', $name_full);

    if( ! $verif_characters2 ){
        $msg .= '<div class="alert"> Attention, the username should be composed only by letters and space characters. </div>';
        $error = true;
    }

    //to check out if the username is available in the database (index unique)
    $verif_username2 = $pdo->prepare("SELECT * FROM user WHERE name_full = :name_full");
    $verif_username2->bindParam(':name_full', $name_full, PDO::PARAM_STR);
    $verif_username2->execute();
    if($verif_username2->rowCount() > 0){
        $msg .= '<div class="alert">Attention, your full name is not available or is already registered. </div>';
        $error = true;
    }

    // EMAIL
    //email format

    if( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg .= '<div class="alert">Attention, the email format is incorrect. </div>';
        $error = true;
    }

    //email availability
    $verif_mail = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $verif_mail->bindParam(':email', $email, PDO::PARAM_STR);
    $verif_mail->execute();
    if($verif_mail->rowCount() > 0) {
        $msg .= '<div class="alert">Attention, the email used is not available or already registered. </div>';
        $error = true;
    }

    //PASSWORD
    // minimum 6char requirement

    if(iconv_strlen($pwd) < 6) {
        $msg .= '<div class="alert"> Attention, password must have atleast 6 characters. </div>';
        $error = true;
    }

    //saving the data in the database
    if($error == false){
        
        //encryptation of the password
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);

        // USER STATUS

        // 1 = Regular Users. Quality manager.
        // 2 = Admin Owner. (add product options available)
    
    $datasave = $pdo->prepare("INSERT INTO user (name_user, name_full, email, pwd, registration_date, status) VALUES (:name_user, :name_full, :email, :pwd, CURDATE(), 1)");
    $datasave->bindParam(':name_user', $name_user, PDO::PARAM_STR);
    $datasave->bindParam(':name_full', $name_full, PDO::PARAM_STR);
    $datasave->bindParam(':email', $email, PDO::PARAM_STR);
    $datasave->bindParam(':pwd', $pwd, PDO::PARAM_STR);
    $datasave->execute();

    header('location:user.php');
    }

}

