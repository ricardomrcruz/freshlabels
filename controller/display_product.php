<?php

//controller php treatments


//model inclusion
include './model/manage_product.php';

// display product cards

$category_id = $_GET['productcat'];
$list_products = get_products($category_id);
$displayprod = '';
foreach ($list_products as $row) {
    $id = $row['id_product'];
    $category = $row['name_category'];
    $name = $row['name_product'];
    $defrost = $row['time_defrost'];
    $limit = $row['time_limit'];
    $image = $row['img_product'];


    // 
    $displayprod .= '
    <a style="display:inline;position: relative;cursor:pointer;" onclick="openPopup(' . $id . ')">
    <img style="width:360px; height:240px;position: relative;margin: 10px 5px" class="catpic" src="./assets/img_products/' . $image . '" alt="' . $name . '">
    <p style="display:inline;position: absolute;bottom:3px;left: 0;px;font-size: 30px;
    color: #fff;background: linear-gradient(to top, rgba(0, 0, 0, 0.85), transparent); width:360px;padding:100px 0 10px 10px;border-radius: 3px;margin: 10px 5px; " id="catcardtext">' . $name . '</p>
    </a>
    <div class="popup" id="popup-' . $id . '">
        <div class="closepopup"><button onclick="closePopup(' . $id . ')"><i class="fa-solid fa-rectangle-xmark"></i></button></div>
        <h2>Choose the type of label:</h2>
        <div class="center">
            <a class="defrost"  href="pdf_defrost.php?product=' . $id . '" target="_blank"  onclick="closePopup(' . $id . ') ><i class="fa-solid fa-snowflake"></i> Defrost Label</a>
            <a class="expiration" href="pdf_expiration.php?product=' . $id . '"target="_blank" ><i class="fa-regular fa-clock"></i> Expiration Date</a>
        </div>
    </div>';
}
