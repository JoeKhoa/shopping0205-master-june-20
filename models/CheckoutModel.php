<?php
require_once 'DBConnect.php';
class CheckoutModel extends DBConnect{

    function insertCustomer($name, $gender, $email, $address, $phone){
        $sql = "INSERT INTO customers
                (name, gender, email, address, phone)
                VALUES 
                ('$name', '$gender', '$email', '$address', '$phone')";
        $check = $this->executeQuery($sql);
        if($check) return $this->getRecentIdInsert();
        return false;
    }
    function insertBill($idCustomer, $dateOrder, $total, $promtPrice, $paymentMethod, $note, $token, $tokenDate, $status = 0){
        $sql = "INSERT INTO bills(id_customer, date_order, total, promt_price, payment_method, note, token, token_date, status)
        VALUES ($idCustomer, '$dateOrder', $total, $promtPrice, '$paymentMethod', '$note', '$token', '$tokenDate', $status)";

        return $this->executeQuery($sql) == true ? $this->getRecentIdInsert() : false;

    }
    function insertBillDetail($idBill, $idProduct, $quantity, $price, $discountPrice){
        $sql = "INSERT INTO bill_detail(id_bill, id_product, quantity,price, discount_price)
        VALUES ($idBill, $idProduct, $quantity, $price, $discountPrice)";
        return $this->executeQuery($sql);
    }
}

?>