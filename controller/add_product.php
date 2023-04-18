<?php


//controller php treatments


//model inclusion
include './model/product_manager.php';


// PRODUCT REGISTRATION ADD PRODUCT FORM

if (isset($_POST['name_product']) && isset($_POST['id_category']) && isset($_POST['time_defrost']) && isset($_POST['time_limit']) && isset($_FILES['img_product']) && isset($_POST['token2']) && isset($_POST['submit'])) {

    $name_product = trim($_POST['name_product']);
    $id_category = trim($_POST['id_category']);

    // control variable

    $error = false;

    //FORM REQUIREMENTS

    //Product name
    //length max 25 char

    $length_prodname = iconv_strlen($name_product);
    if ($length_prodname > 25) {
        $msg .= '<div class="alert ">Attention, the product name must have less than 25 characters. </div>';
        $error = true;
    }

    // times

    $time_defrost = $_POST['time_defrost'];
    $time_limit = $_POST['time_limit'];

    //Image

    $img_name = $_FILES['img_product']['name'];
    $img_size = $_FILES['img_product']['size'];
    $tmp_name = $_FILES['img_product']['tmp_name'];

    //image size limit  1,048,576b 1mb     

    if ($img_size > 1050000) {
        $msg .= '<div class="alert ">Sorry, your image file is too large (1MB max). </div>';
        $error = true;
    }

    //verifyng the file extension with image extensions

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);

    $allowed_exs = array("jpg", "jpeg", "png");

    if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
        $img_upload_path = 'assets/img_products/' . $new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
    } else {
        $msg .= "<div class= 'alert'>Sorry, you can't upload files of this type </div>";
        $error = true;
    }


    //saving the data in the database
    if ($error == false) {
        
        $_SESSION['token2'] = $_POST['token2'];
        
        $create_product = new ManageProduct($pdo);

        $create_product->create_product($name_product, $id_category, $time_defrost, $time_limit, $new_img_name);

        // directing to the dashboard main window
        header('location: home.php');
    }
}
