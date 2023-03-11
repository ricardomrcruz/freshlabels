<?php 


// MODEL SQL TREATMENTS
    //GET TOTAL PRODUCTS LIST
    //DELETE PRODUCT FROM DB



//GET TOTAL PRODUCTS LIST




function get_listproducts() {
    global $pdo;
    
    $listproducts = $pdo->query("SELECT a.id_product, name_category, name_product, time_defrost, time_limit, img_product 
    FROM product a, category c, relation_product_category r 
    WHERE c.id_category = r.id_category 
    AND a.id_product = r.id_product ORDER BY a.id_product DESC");
    
    return $listproducts->fetchAll(PDO::FETCH_ASSOC);
}

function delete_product($id_product) {
    global $pdo;

    $delete = $pdo->prepare("DELETE FROM product WHERE id_product = :id_product; ");
    $delete->bindParam(':id_product', $id_product, PDO::PARAM_STR);
    $delete->execute();
    
}








