<?php

//controller php treatments

//model inclusion
include './model/manage_product.php';

// display product cards

$product_id = $_GET['product'];
$data_product = get_product_data($product_id);
foreach ($data_product as $row) {
    $id = $row['id_product'];
    $category = $row['name_category'];
    $name = $row['name_product'];
    $defrost = $row['time_defrost'];
    $limit = $row['time_limit'];
    $image = $row['img_product'];
}

// Converting the time msql data into seconds
// DEFROST MAX TIME

$defrost_arr = explode(':', $defrost);
$defrost_seconds = $defrost_arr[0] * 3600 + $defrost_arr[1] * 60 + $defrost_arr[2];

// Add defrost time to current timestamp
$future_defrost = time() + $defrost_seconds;

// Convert timestamp to datetime string
$defrost_date_limit = date('d-m-Y H:i', $future_defrost);

//EXPIRATION DATE

$expiration_arr = explode (':', $limit);
$expiration_seconds = $expiration_arr[0] * 3600 + $expiration_arr[1] * 60 + $expiration_arr[2];

$future_limit = time() + $expiration_seconds;

$expiration_date = date('d-m-Y H:i', $future_limit);

// CurDate
$date = date('d-m-Y H:i');