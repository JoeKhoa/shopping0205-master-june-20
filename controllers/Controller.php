<?php
// session_start();

require_once 'models/TypeModel.php';

class Controller{
    /**
     * @param string $view
     * @param string $title
     * @param array $data
     */
    static function loadView(string $view = 'index', string $title="Home Page", array $data = []){
        $m = new TypeModel();
        $categories = $m->getCategory();
        require_once 'views/master.view.php';
    }
    function error404(){
        return Controller::loadView('404', "404 Not Found!");
    }
}


?>