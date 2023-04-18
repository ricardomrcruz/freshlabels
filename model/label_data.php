<?php

// MODEL SQL TREATMENTS


// LABEL DATA FETCH
// dedicated to fetch the data displayed in the label
// see controller label_data.php

class ProductLabelData {
    private $pdo; 

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function get_product_data($product_id) {
        $getproddata = $this->pdo->prepare("SELECT a.id_product, c.id_category, name_category, name_product, time_defrost, time_limit, img_product 
        FROM product a, category c, relation_product_category r 
        WHERE c.id_category = r.id_category 
        AND a.id_product = r.id_product
        AND a.id_product = :product_id");
    $getproddata->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $getproddata->execute();

    return $getproddata->fetchAll(PDO::FETCH_ASSOC);

    }
}