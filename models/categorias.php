<?php

class Categorias{
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    public function categoria($id){
        $sql = "SELECT c.id, t.contenido, t.id_topic from categorias c INNER JOIN topic t WHERE c.id = t.id_categoria";
        $response = $this->db->query($sql);
        if($response){
            $data = $response;
        }else{
            $data = false;
        }
       
        return $data;
    }
    
   

    
    private  $db;
}