
<?php
require_once 'controllers/CartController.php';

if(isset($_POST['action'])){
    if($_POST['action'] === 'add')
        return CartController::addToCart();
    if($_POST['action'] === 'delete')
        return CartController::deleteCart();
    if($_POST['action'] === 'update')
        return CartController::updateCart();
    if($_POST['action'] === 'deleteAll')
        return CartController::deleleAllCart();
}
// show page cart

return CartController::getCartPage();


?>