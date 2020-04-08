<?php

class Topic{
    
    public function __construct(){
        $this->db = Database::connect();
    }
    function getName() {
        return $this->name;
    }

    function getContenido() {
        return $this->contenido;
    }

    function setName($name) {
        $this->name = $this->db->real_escape_string($name);
    }

    function setContenido($contenido) {
        $this->contenido = $this->db->real_escape_string($contenido);
    }
    
    public function allTopicid($id){
        $data = false;
        $sql ="SELECT * FROM topic where id_us_topic = {$id}";
        $response = $this->db->query($sql);
         
    
        if($response && $response->num_rows >= 1 ){
            $data = $response;
        }
        
       
        return $data;
    }

    

    public function create($id_user, $id_cate) {
        //INSERT into topic VALUES(null, 1, 6, 'problema en php', '¡ayuda?')
        $sql = "INSERT INTO topic VALUES(null, $id_user, $id_cate, '{$this->getName()}','{$this->getContenido()}')";
        $result = $this->db->query($sql);
        if($result){
            $data=$result;
        }else{
           $data = false;
        }
        return $data;
        
    }
    
    public function editar(){
        $id = (int)$_GET['id'];
        $sql ="SELECT * FROM topic where id_topic = {$id}";
        $response = $this->db->query($sql);
      
        if($response && $response->num_rows == 1){
            $data=$response->fetch_object();
        }else{
           $data = false;
        }
        return $data;
    }
    
     public function editarNew($id_topic, $id_us_topic, $categoria){
        
        //UPDATE `topic` SET `id_topic`=[value-1],`id_us_topic`=[value-2],`id_categoria`=[value-3],`nombre`=[value-4],`contenido`=[value-5] WHERE 1
        $sql ="UPDATE topic SET id_us_topic= $id_us_topic, id_categoria= $categoria, nombre = '{$this->getName()}', contenido = '{$this->getContenido()}' where id_topic = $id_topic";
        $response = $this->db->query($sql);
        
        if($response){
            $data=$response;
        }else{
           $data = false;
        }
          
        return $data;
    }
    
    public function delete($id_topic){
        $sql = "DELETE FROM topic WHERE id_topic = {$id_topic}";
        $result = $this->db->query($sql);
      
        if($result){
            $data=$result;
        }else{
           $data = false;
        }
        return $data;
    }
    
    
    public function allTopic(){
        $sql ="SELECT * FROM topic ORDER BY id_topic DESC";
        $result = $this->db->query($sql);
      
        if($result){
            $data=$result;
        }else{
           $data = false;
        }
        return $data;
    }
    
     public function oneTopicid($id){
        $data = false;
        $sql ="SELECT * FROM topic where id_topic = {$id}";
        $response = $this->db->query($sql);
         
    
        if($response){
            $data = $response;
        }
        
       
        return $data;
    }
    
    public function search($busqueda){
        $sql="SELECT t.*, c.id, c.nombre AS 'cat' FROM topic t INNER JOIN categorias c where t.contenido like '%$busqueda%' AND t.id_categoria = c.id";
        $response = $this->db->query($sql);
          
        if($response){
            $data = $response;
        }
        
       
        return $data;
    }

    private $db;
    private $name;
    private $contenido;
    
}

