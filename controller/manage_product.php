<?php

//controller php treatments


//model inclusion
include './model/manage_product.php';


//categories previously fetched to treated to a select box options

$categories = get_categories();
$options = '';
foreach ($categories as $sub_array) {
    $options .= '<option value="' . $sub_array['id_category'] . '">' . $sub_array['name_category'] . '</option>';
}

$rows = display_categories();
$displaycat = '';
foreach ($rows as $row) {
    $image = $row['img_category'];
    $name = $row['name_category'];
    $idcat = $row['id_category'];


    $displaycat .= '
    <a style="display:inline;position: relative;" href="products.php?productcat=' . $idcat . '" >
    <img style="width:360px; height:240px;position: relative;margin: 10px 5px" class="catpic" src="' . $image . '" alt="' . $name . '">
    <p style="display:inline;position: absolute;bottom:3px;left: 0;px;font-size: 30px;
    color: #fff;background: linear-gradient(to top, rgba(0, 0, 0, 0.85), transparent); width:360px;padding:100px 0 10px 10px;border-radius: 3px;margin: 10px 5px; " id="catcardtext">' . $name . '</p>
    </a>';
}

// 


//product registration (add product form)
if (isset($_POST['name_product']) && isset($_POST['id_category']) && isset($_POST['time_defrost']) && isset($_POST['time_limit']) && isset($_FILES['img_product']) && isset($_POST['submit'])) {

    $name_product = trim($_POST['name_product']);
    $id_category = trim($_POST['id_category']);

    // control variable

    $error = false;

    //FORM REQUIREMENTS

    //Product name
    //length max 25 char

    $length_username = iconv_strlen($name_product);
    if ($length_username > 25) {
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

    //image size limit         

    if ($img_size > 500000) {
        $msg .= '<div class="alert ">Sorry, your image file is too larg. </div>';
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

        create_product($name_product, $id_category, $time_defrost, $time_limit, $new_img_name);

        // directing to the dashboard main window
        header('location: home.php');
    }
}
