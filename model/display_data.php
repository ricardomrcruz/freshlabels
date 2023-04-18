<?php

// MODEL SQL TREATMENTS


//CATEGORIES DATA FETCH DASHBOARD DISPLAY 
// dedicated also to display the list of options in the add prod form.

class CategoriesData {
    
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    
    public function display_categories(){
        $category_display = $this->pdo->prepare("SELECT * FROM category");
        $category_display->execute();
        return $category_display->fetchAll(PDO::FETCH_ASSOC);
    }
}


//DISPLAY PRODUCTS FROM CATEGORY SLUG FETCH
class DisplayProduct{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function get_products($category_id){
    
    $getprodcat = $this->pdo->prepare("SELECT a.id_product, name_category, name_product, time_defrost,time_limit, img_product 
    FROM product a, category c, relation_product_category r 
    WHERE c.id_category = r.id_category 
    AND a.id_product = r.id_product
    AND c.id_category = :category_id");
    $getprodcat->bindParam(':category_id', $category_id, PDO::PARAM_INT);
    $getprodcat->execute();
    
    return $getprodcat->fetchAll(PDO::FETCH_ASSOC);
    }
}

