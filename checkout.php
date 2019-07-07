<?php
require_once 'controllers/CheckoutController.php';

if(isset($_POST['btnCheckout'])){
       return CheckoutController::postCheckout();
}


return CheckoutController::getCheckoutPage();
?>