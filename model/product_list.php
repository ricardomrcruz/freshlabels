<?php


// MODEL SQL TREATMENTS
//GET TOTAL PRODUCTS LIST
//DELETE PRODUCT FROM DB



//GET TOTAL PRODUCTS LIST


class ListProducts
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function get_listproducts()
    {
        $listproducts = $this->pdo->query("SELECT a.id_product, name_category, name_product, time_defrost, time_limit, img_product 
    FROM product a, category c, relation_product_category r 
    WHERE c.id_category = r.id_category 
    AND a.id_product = r.id_product ORDER BY a.id_product DESC");

        return $listproducts->fetchAll(PDO::FETCH_ASSOC);
    }
}

function get_listproducts()
{
    global $pdo;

    $listproducts = $pdo->query("SELECT a.id_product, name_category, name_product, time_defrost, time_limit, img_product 
    FROM product a, category c, relation_product_category r 
    WHERE c.id_category = r.id_category 
    AND a.id_product = r.id_product ORDER BY a.id_product DESC");

    return $listproducts->fetchAll(PDO::FETCH_ASSOC);
}
