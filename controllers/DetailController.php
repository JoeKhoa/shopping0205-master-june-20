<?php
require_once 'Controller.php';
require_once 'models/DetailModel.php';

class DetailController extends Controller{
    function getDetailPage(){
        if(!isset($_GET['link'])){
            header('Location:404.html');
            return;
        }
        $url = $_GET['link'];
        $model = new DetailModel();
        $product = $model->getDetailProduct($url);
        if(!$product){
            header('Location:404.html');
            return;
        }
        $idType = $product->id_type;
        $relatedProducts = $model->getRelatedProducts($idType, $product->id);
        // print_r($relatedProducts);
        // die;
        $title = $product->name;
        $data = [
            'product'=>$product,
            'relatedProducts'=>$relatedProducts
        ];
        return parent::loadView('detail',$title, $data);
    }
}


?>