<?php

// MODEL SQL TREATMENTS


//CATEGORIES DATA FETCH DASHBOARD DISPLAY 


function get_categories() {
    global $pdo; //global to get variable from connect.php to this function
    $category_list = $pdo->query("SELECT * FROM category");
    return $category_list->fetchAll(PDO::FETCH_ASSOC);
}

function display_categories(){
    global $pdo;

    $stmt = $pdo->prepare("SELECT id_category, name_category, img_category FROM category");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
}


//ADD PRODUCT FORM DATA INSERT 

function create_product($name_product, $id_category, $time_defrost, $time_limit, $new_img_name){
    
    global $pdo;
    
    $datasave = $pdo->prepare("INSERT INTO product (name_product, time_defrost, time_limit, img_product) VALUES (:name_product, :time_defrost, :time_limit, :img_product)");
        
    $datasave->bindParam(':name_product', $name_product, PDO::PARAM_STR);
    $datasave->bindParam(':time_defrost', $time_defrost, PDO::PARAM_STR);
    $datasave->bindParam(':time_limit', $time_limit, PDO::PARAM_STR);
    $datasave->bindParam(':img_product', $new_img_name, PDO::PARAM_STR);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $datasave->execute();
            

    $id_product = $pdo->lastInsertId();

    $relationsave = $pdo->prepare("INSERT INTO relation_product_category (id_product, id_category) VALUES (:id_product, :id_category)");
    $relationsave->bindParam(':id_product', $id_product, PDO::PARAM_STR);
    $relationsave->bindParam(':id_category', $id_category, PDO::PARAM_STR);
    $relationsave->execute();
}

//PRODUCTS FROM CATEGORY SLUG DISPLAY FETCH


function get_products($category_id) {
    global $pdo;
    
    $getprodcat = $pdo->prepare("SELECT a.id_product, name_category, name_product, time_defrost, time_limit, img_product 
    FROM product a, category c, relation_product_category r 
    WHERE c.id_category = r.id_category 
    AND a.id_product = r.id_product
    AND c.id_category = :category_id");
    $getprodcat->bindParam(':category_id', $category_id, PDO::PARAM_INT);
    $getprodcat->execute();
    
    return $getprodcat->fetchAll(PDO::FETCH_ASSOC);
}

// LABEL DATA FETCH

function get_product_data($product_id) {
    global $pdo;
    
    $getproddata = $pdo->prepare("SELECT a.id_product, name_category, name_product, time_defrost, time_limit, img_product 
    FROM product a, category c, relation_product_category r 
    WHERE c.id_category = r.id_category 
    AND a.id_product = r.id_product
    AND a.id_product = :product_id");
    $getproddata->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $getproddata->execute();
    
    return $getproddata->fetchAll(PDO::FETCH_ASSOC);
}




