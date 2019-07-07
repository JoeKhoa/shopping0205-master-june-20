<?php
require_once 'DBConnect.php';

class IndexModel extends DBConnect{
    function getSlides(){
        $sql = "SELECT * FROM slide WHERE status=1";
        return parent::getMoreRows($sql);
    }
    function getFeaturedProduct(){
        // status=1 --> sp dac biet
        $sql = "SELECT p.*, u.url
                FROM products p
                INNER JOIN page_url u
                ON p.id_url = u.id
                WHERE p.status=1
                AND p.deleted=0
                ORDER BY p.id DESC
                LIMIT 0,10"; // undeleted
        return $this->getMoreRows($sql);
    }
    function getBestSellerProducts(){
        $sql = "SELECT p.*, sum(quantity) as tongSL, u.url
                FROM products p
                INNER JOIN bill_detail d
                ON p.id = d.id_product
                INNER JOIN page_url u
                ON p.id_url = u.id
                WHERE p.deleted=0
                GROUP BY p.id
                ORDER BY tongSL DESC
                LIMIT 0,10";
        return $this->getMoreRows($sql);
    }
}

?>