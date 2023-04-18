<?php

//controller php treatments

//model inclusion
include './model/label_data.php';

//label data management
//we catch the id product in the slug and apply it in the function

$labelData= new ProductLabelData($pdo);
$product_id = $_GET['product'];
$data_product = $labelData->get_product_data($product_id);


// we pick the first element of the array because we only need to fetch one row of the table which is actually the first and only one via slug

$name = $data_product[0]['name_product'];
$defrost = $data_product[0]['time_defrost'];
$limit = $data_product[0]['time_limit'];
$id = $data_product[0]['id_product'];



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