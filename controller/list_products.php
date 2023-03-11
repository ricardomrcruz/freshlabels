<?php

//controller php treatments

//model inclusion
include './model/list_products.php';


if (!empty($_SESSION['message'])) {
    $msg .= $_SESSION['message'];
    unset($_SESSION['message']);
}


if (!user_is_admin()) {
    header('location: connexion.php');
    exit(); // on bloque l'exécution du code qui suit cette ligne.
}


if (isset($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id_product'])) {
    delete_product($_GET['id_product']);
    $_SESSION['message'] = '<div> The product n°' . $_GET['id_product'] . ' was deleted succesfully. </div>';
    header('location:listproducts.php');
}




$list_products = get_listproducts();
$list = '';
foreach ($list_products as $row) {
    $id_product = $row['id_product'];
    $category = $row['name_category'];
    $name = $row['name_product'];
    $defrost = $row['time_defrost'];
    $limit = $row['time_limit'];
    $image = $row['img_product'];
    $delete = '';


    if ($_SESSION['user']['status'] = 2) {
        $delete .= '<a href="?action=delete&id_product=' . $id_product . '" style="background-color:#D2042D; color:white;padding: 15px 20px; border: none; text-decoration: none; border-radius: 10px;" class="deletebtn">delete</a>';
    } else {
        $delete = '';
    }

    $list .= '<tr>
                   <td>' . $id_product . '</td>
                   <td>' . $name . '</td>
                   <td>' . $category . '</td>
                   <td> <img style="width: 160px;
                   height: 90px;
                   margin-right: .5rem;
                   border-radius: 5%;
                   vertical-align: middle;" 
                   src="./assets/img_products/' . $image . '" 
                   alt="' . $name . '"></td>
                   <td >' . $delete . '</td>
              </tr>';
}
