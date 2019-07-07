<?php
require_once 'DBConnect.php';

class CartModel extends DBConnect{
    
    function findProductById($id){
        $sql = "SELECT p.id, p.name, p.image, p.price,
                p.promotion_price, u.url 
                FROM products p
                INNER JOIN page_url u
                ON p.id_url = u.id
                WHERE p.id = $id
                AND p.deleted = 0";
        // print_r($sql);
        // die;
        return $this->getOneRow($sql);


    }
}


?>