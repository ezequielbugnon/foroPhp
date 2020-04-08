<?php
require_once 'config/db.php';
require_once 'models/topic.php';
class Utils{
    

    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }
    
    public static function obtenerCat($db){
      
        $sql = "SELECT * FROM categorias ORDER BY  id DESC;";
        $result = $db->query($sql);
       
        if($result && $result->num_rows >= 1){
            $data = $result;
            
        }else{
            $data = false;
        }
     
        return $data;
    }
    
    public static function show(){
        $topic = new Topic();
        $result = $topic->allTopicid((int)$_SESSION['identity']['id']);
       
        if(!$result){
            $result = false;
        }
     ;
      
        return $result;
    }
    
     public static function  allTopic($limit, $cantidad, $db){
        $sql ="SELECT t.*, u.nombre AS 'nombre', c.nombre AS 'categoria' FROM topic t INNER JOIN usuarios u, categorias c WHERE t.id_us_topic = u.id AND t.id_categoria = c.id ORDER BY t.id_topic DESC limit $limit, $cantidad";
        $result = $db->query($sql);
      
        if($result){
            $data=$result;
        }else{
           $data = false;
        }
        return $data;
    }
    
   
    
    
    
   
}
