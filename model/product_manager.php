<?php 

// CLASS DEDICATED TO CREATE AND DELETE PRODUCT
// create product addproduct.php
// delete product listproducts.php

class ManageProduct{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function create_product($name_product, $id_category, $time_defrost, $time_limit, $new_img_name){
    
    
        
        $datasave = $this->pdo->prepare("INSERT INTO product (name_product, time_defrost, time_limit, img_product) VALUES (:name_product, :time_defrost, :time_limit, :img_product)");
            
        $datasave->bindParam(':name_product', $name_product, PDO::PARAM_STR);
        $datasave->bindParam(':time_defrost', $time_defrost, PDO::PARAM_STR);
        $datasave->bindParam(':time_limit', $time_limit, PDO::PARAM_STR);
        $datasave->bindParam(':img_product', $new_img_name, PDO::PARAM_STR);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $datasave->execute();
                
    
        $id_product = $this->pdo->lastInsertId();
    
        $relationsave = $this->pdo->prepare("INSERT INTO relation_product_category (id_product, id_category) VALUES (:id_product, :id_category)");
        $relationsave->bindParam(':id_product', $id_product, PDO::PARAM_STR);
        $relationsave->bindParam(':id_category', $id_category, PDO::PARAM_STR);
        $relationsave->execute();
    }

    
    public function delete_product($id_product) {
        
    
        $delete = $this->pdo->prepare("DELETE FROM product WHERE id_product = :id_product; ");
        $delete->bindParam(':id_product', $id_product, PDO::PARAM_STR);
        $delete->execute();
        
    }

}