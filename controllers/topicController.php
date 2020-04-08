<?php
require_once 'models/topic.php';
require_once 'models/comentarios.php';
class topicController{
    
    public function __construct() {
        $this->id_user = (int)$_SESSION['identity']['id'];
    }
    
    public function index(){
        $topic = new Topic();
        $all = $topic->allTopic();
        if($all){
          
            $cantidad =  $all->num_rows;
            $cantidad_por_pagina = 5;
            $total_page = ceil($cantidad / $cantidad_por_pagina);
        }
        require_once "views/topic/topic.php";
    }
    
    public function create() {
       if(isset($_POST['submit'])){
           
           if(!empty($_POST['tema']) && !empty($_POST['categoria']) && !empty($_POST['contenido'])){
              
               $tema = isset($_POST['tema'])? $_POST['tema'] : false;
               $categoria = isset($_POST['categoria'])? $_POST['categoria'] : false;
               $contenido = isset($_POST['contenido'])? $_POST['contenido'] : false;
              
               $topic = new Topic();
               $topic->setName($tema);
               $topic->setContenido($contenido);
               $respose = $topic->create($this->id_user, $categoria);
             
               if($respose){
                   $_SESSION['topic']='create';
                   
               }else{
                    $_SESSION['topic']='failed';
               }
           
           }else{
                $_SESSION['topic']='failed';
           }
              header('Location:'.base_url.'user/perfil');   
       }
        header('Location:'.base_url.'user/perfil');
    }
    
    public function delete(){
        $topic = new Topic();
        $id_topic = $_GET['id'];
        $delete = $topic->delete((int)$id_topic);
       
        if($delete){
            $_SESSION['topic']='delete';
            
        }else{
             $_SESSION['topic']='failed';
            
        }
          header('Location:'.base_url.'user/perfil');
       
    }
    
    public function editar(){
        $topic = new Topic();
        $edicion = $topic->editar();
        
        if($edicion){
            $_SESSION['editar']= $edicion;
            $ed = $edicion;
            require_once 'views/user/perfil.php';
        }else{
            $_SESSION['editar']=false;
             header('Location:'.base_url.'user/perfil');
        }
        
       
    }
    
     public function editarNew(){
    
         if(isset($_POST['submit'])){
             if(!empty($_POST['tema']) && !empty($_POST['categoria']) && !empty($_POST['contenido']) && !empty($_POST['id_topic'])){
               $tema = isset($_POST['tema'])? $_POST['tema'] : false;
               $categoria = isset($_POST['categoria'])? (int)$_POST['categoria'] : false;
               $contenido = isset($_POST['contenido'])? $_POST['contenido'] : false;
               $id = isset( $_SESSION['identity']['id'])? (int)$_SESSION['identity']['id']:false;
               $id_topic = isset($_POST['id_topic'])? (int)$_POST['id_topic'] : false;
               
               $topic = new Topic();
               $topic->setName($tema);
               $topic->setContenido($contenido);
               $result = $topic->editarNew($id_topic, $id, $categoria);
               
               if($result){
                   $_SESSION['editarNew']='completed';
               }else{
                  $_SESSION['editarNew']='No completed'; 
               }
             }else{
                  $_SESSION['editarNew']='No completed'; 
                 header('Location:'.base_url.'user/perfil');
             }
             header('Location:'.base_url.'user/perfil');
         }
       
       
    }
    
    
    public function show() {
        $params = $_REQUEST['id'];
        $topic = new Topic();
        $result = $topic->oneTopicid($params);
        $comentario = new Comentarios();
        $comment = $comentario->commentBytopic($params);
     
        require_once 'views/topic/oneTopic.php';
    }
    
    
    public function search(){
        $busqueda =$_POST['search'];
    
        if($busqueda){
            $topic = new Topic();
            $response = $topic->search($busqueda);
            if($response){
          
                $cantidad =  $response->num_rows;
                $cantidad_por_pagina = 5;
                $total_page = ceil($cantidad / $cantidad_por_pagina);
              }
                require_once "views/topic/search.php";
        }
    }

    

    private $id_user;
}