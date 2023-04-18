<?php

//controller php treatments


//model inclusion
include './model/display_data.php';
include './model/product_manager.php';


$categoryData = new CategoriesData($pdo);

// DISPLAY OF CATEGORY LIST IN ADD PRODUCT FORM

$optionsCat = $categoryData->display_categories();
$options = '';
foreach ($optionsCat as $select) {
    $name = $select['name_category'];
    $idcat = $select['id_category'];

    $options .= '<option value="' . $idcat . '">' . $name . '</option>';
}

// DISPLAY OF THE CATEGORY CARDS IN HOME.PHP AND INDIVIDUAL CATEGORY MENUS

$rows = $categoryData->display_categories();
$displaycat = '';
foreach ($rows as $row) {
    $image = $row['img_category'];
    $name = $row['name_category'];
    $idcat = $row['id_category'];


    $displaycat .= '
    <a style=" display:inline; position: relative;" href="products.php?productcat=' . $idcat . '">
    <img style=" width:300px; height:200px; position: relative;margin: 10px 5px; border-radius: 3px;" class="catpic" src="' . $image . '" alt="' . $name . '">
    <p style=" display: inline; position: absolute; bottom:6px;left: 0; font-size: 30px;
    color: #fff; background: linear-gradient(to top, rgba(0, 0, 0, 0.85), transparent); width:300px; padding: 100px 0 10px 10px; border-radius: 3px; margin: 10px 5px;" id="catcardtext">' . $name . '</p></a>';
}


