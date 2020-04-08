<?php
require_once 'models/comentarios.php';
class comentarioController{
    
    public function publicar(){
      if($_POST){
          if(!empty($_POST['id_topic']) && !empty($_POST['comentarios'])){
               $id_topic = isset($_POST['id_topic'])?(int)$_POST['id_topic'] : false;
               $comentarios = isset($_POST['comentarios'])? $_POST['comentarios'] : false;
               $id_user = (int)$_SESSION['identity']['id'];
               
               $comment = new Comentarios();
              $result = $comment->create($id_topic, $comentarios, $id_user);
              if($result){
                   $_SESSION['comment']= 'created';
              }else{
                  $_SESSION['comment']= 'failed';
              }
              
          }
      }
      header('Location:'.base_url.'topic/show&id='.$_POST['id_topic'].'');
    }
    
    
    public function delete(){
        $id = $_REQUEST['id'];
        $division = explode(" ",$_REQUEST['id']);
        
        if($division){
            $comment = new Comentarios();
            $result = $comment->delete($division[0]);
          
              if($result){
                   $_SESSION['comment']= 'eliminado';
              }else{
                  $_SESSION['comment']= 'no eiminado';
              }
        }
        header('Location:'.base_url.'topic/show&id='.$division[1]);
    }
}
