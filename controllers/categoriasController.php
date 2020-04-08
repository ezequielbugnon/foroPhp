<?php

require_once 'models/categorias.php';

class categoriasController{
    


    public function index(){
        $params = $_REQUEST['categoria'];
        $categorias = new Categorias();
        $result = $categorias->categoria($params);
       
        require_once 'views/categorias/categorias.php';
    }
    
}

