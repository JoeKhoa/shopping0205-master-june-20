<?php
require_once 'Controller.php';
require_once 'models/TypeModel.php';
require_once 'helpers/Pager.php';


class TypeController extends Controller{
    static function getTypePage(){
        if(!isset($_GET['link'])){
            header('Location: 404.html');
            return;
        }
        $url = $_GET['link'];

        // echo $url;
        // echo '<br>'.'line 16 of the typeController.php';
        // die;

        // $urlPage= $_GET['page'];
        // echo $urlPage;
        // die;

        $model = new TypeModel();
        $type = $model->getTypeByUrl($url);
        
        if(!$type){
            header('Location: 404.html');
            return;
        }
        $qty = 8;
        $page = 1;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }

        $position = ($page-1)*$qty;
        $products = $model->getProductByType($url, $position, $qty);
        $totalProduct = count($model->getProductByType($url));

        echo '<pre>';
        print_r( $model->getProductBytype($url) );
        echo '<br>'.'line 42 Type Controller';
        die; // NOTE THIS 

        $totalPage = ceil($totalProduct/$qty);
        
        // echo $totalPage; die;

        $pager = new Pager($totalProduct, $page, $qty, 3);
        $showPagination = $pager->showPagination();

        $data = [
            'products'=> $products,
            'nameType'=> $type->name,
            'totalPage'=>$totalPage,
            // 'urlPage'=>$urlPage,
            'showPagination'=>$showPagination


        ];
        

        return parent::loadView('type', $data['nameType'], $data);
    }
}
?>