<?php
require_once 'DBConnect.php';
    
class DetailModel extends DBConnect{
    function getDetailProduct(string $url){
        // $sql = "SELECT p.* 
        //         FROM products p
        //         INNER JOIN page_url u
        //         ON p.id_url = u.id
        //         WHERE url = '$url'
        //         AND p.deleted=0";
        $sql = "SELECT * 
                FROM products
                WHERE id_url = (
                    SELECT u.id
                    FROM page_url u
                    WHERE url = '$url'
                )
                AND deleted=0";
        return parent::getOneRow($sql);
    }
    function getRelatedProducts(int $idType, int $idProduct){
        $sql = "SELECT p.*, u.url
                FROM products p
                INNER JOIN page_url u
                ON p.id_url = u.id
                WHERE id_type=$idType
                AND p.id <> $idProduct";
        return parent::getMoreRows($sql);      
    }   
}

?>