<?php
require_once 'Controller.php';
require_once 'models/CartModel.php';
require_once 'helpers/Cart.php';

session_start();
class CartController extends Controller{
    static function getCartPage(){
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $data = [
            'cart' => $cart
            // tai sao lai co the print $_SESSION o day while 'line 56'  ? 
        ];
        // echo '<pre>';
        // print_r($data);
        // die;
        return parent::loadView('cart','Giỏ hàng  ', $data);
    }
    static function addToCart(){    
        if( !isset($_POST['id'])){
            echo json_encode( 
            [
                'success' => false,
                'message' => ' Missing  ID product',
                'data' => null
            ]);
            return false;
        }
        $id = $_POST['id'];
        $qty = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
        $model = new CartModel();
        $product = $model->findProductById($id);

        if(!$product){
            echo json_encode([
            'success' => false,
            'message' => 'missing product ! ',
            'data' => null
            ]);
            return false;
        } 
        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $cart = new Cart($oldCart);
        echo '<pre>';
        $cart->add($product, $qty);
        $_SESSION['cart'] = $cart;

        // echo '<pre>';
        // print_r($_SESSION['cart']);

        // echo $_SESSION['cart'];
        // die;
        // echo json_encode([
        //     'success' => true,
        //     'message' => ' You have got the products !',
        //     'data' => [
        //         'product_name' => $product->name
        //     ]
        // ]);
            // why the object in $_SESSION 's not able to be printed in Window Browser
        echo json_encode([
            'success' => true,
            'message' => 'Add to cart success!',
            'data' => [
                'product_name' => $product->name
            ]
        ]) ;
        
        return false; // why 's this ? 
    }

    static function deleteCart(){

        if( !isset($_POST['id'])){
            echo json_encode([
                'success' => false,
                'data' => null
            ]);
            return false;
        }

        $id = $_POST['id'];
        // echo $id.'test';
        // die;

        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        $_SESSION['cart'] = $cart;
        echo json_encode([
            'success' => true,
            'totalPrice' => number_format($cart->totalPrice),
            'promtPrice' => number_format($cart->promtPrice)
        ]);
        // echo 'have come deleteCart yet, try more ';

        return false;
    }


    static function updateCart(){
        if(!isset($_POST['id'])){
            echo json_encode([
                'success' => false,
                'message' => 'Missing id product!',
                'data' => null
            ]) ;
            return false;
        }
        if(!isset($_POST['quantity']) || $_POST['quantity']<=0){
            echo json_encode([
                'success' => false,
                'message' => 'Invalid quantity!',
                'data' => null
            ]) ;
            return false;
        }
        $id = $_POST['id'];
        $qty = $_POST['quantity'];

        // echo $id.'-';
        // echo $qty;
        // die;


        $model = new CartModel();
        $product = $model->findProductById($id);
        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $cart = new Cart($oldCart);
        $cart->update($product, $qty);
        $_SESSION['cart'] = $cart;

        // echo '<pre>';
        //     print_r($cart);
        // die;

        echo json_encode([
            'success' => true,
            'totalPrice' => number_format($cart->totalPrice),
            'promtPrice' => number_format($cart->promtPrice),
            'price' => number_format($cart->items[$id]['price']),
            'totalQty' => number_format($cart->totalQty)
        ]);
    }
    static function deleleAllCart(){
        $allId = $_POST['id'];
        // echo ($allId['id'][1]);
        foreach($allId as $id) {
            // echo $id.'<br>';
            $_POST['id'] = $id;
            CartController::deleteCart();
        }

    }



}

?>