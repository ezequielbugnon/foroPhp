<?php


class Comentarios{
    public function __construct() {
        $this->db = Database::connect();
    }
    
    public function create($id_topic, $comentarios, $id_user){
        $sql ="INSERT INTO comentarios VALUES(NULL, $id_user, '$comentarios', $id_topic)";
        $save = $this->db->query($sql);
       
        if($save){
            $data = $save;
        }else{
            $data = false;
        }
     
        return $data;
    }
    
     public function commentBytopic($id){
            
        $sql ="SELECT c.*,u.nombre FROM comentarios c INNER JOIN usuarios u WHERE c.id_topic_comment = $id and c.id_usuario = u.id";
        $result = $this->db->query($sql);
      
        if($result){
            $data=$result;
        }else{
           $data = false;
        }
        return $data;
    
    }
    
    public function delete($id){
        $sql = "DELETE FROM comentarios WHERE id_comentarios = $id";
          $result = $this->db->query($sql);
          
        if($result){
            $data=$result;
        }else{
           $data = false;
        }
        return $data;
    }

    
    private $db;
   
    
}

