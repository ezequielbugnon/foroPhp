<?php

require_once 'models/user.php';

class userController{


    public function login(){
        require_once "views/user/login.php";
    }

    public function register(){
        require_once "views/user/register.php";
    }

    public function signin(){
            
            if(isset($_POST['submit'])){
                if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['email']) && !empty($_POST['password'])){
                    
                    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			        $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
			        $email = isset($_POST['email']) ? $_POST['email'] : false;
			        $password = isset($_POST['password']) ? $_POST['password'] : false;
                    
                    
                    $usuario = new User();
                    $usuario->setNombre($nombre);
                    $usuario->setApellido($apellido);
                    $usuario->setEmail($email);
                    $usuario->setPassword($password);

                    $save = $usuario->save();
                    if($save){
                        $_SESSION['register'] = "complete";
                    }else{
                        $_SESSION['register'] = "failed";
                    }
                

                } else{ 
                    $_SESSION['datos'] = "faltan datos";
                   
                }
                header('Location:register');
            }
             
    }
    
    public function log(){
        if(isset($_POST['submit'])){
           if(!empty($_POST['email']) && !empty($_POST['password'])){
               $email = isset($_POST['email']) ? $_POST['email'] : false;
               $password = isset($_POST['password']) ? $_POST['password'] : false;
               
               if($email && $password){
                   $usuario = new User();
                   $usuario->setEmail($email);
                   $usuario->setPassword($password);
                   $loguear = $usuario->login();
                   
                   if($loguear){
                       $_SESSION['logueado']=['nombre' => $loguear->nombre];
                        $_SESSION['identity']=['id' =>$loguear->id,
                                                'estatus' => $loguear->rol
                                              ];
                         header('Location:'. base_url.'user/perfil' );
                       
                   }else{
                       $_SESSION['logueado']='failed';
                        header('Location:'. base_url.'user/login' );
                   }
               }
           }else{
                       $_SESSION['logueado']='failed';
                        header('Location:'. base_url.'user/login' );
           }
        }
    }
    
    public function logout(){
        $destroy = Utils::deleteSession('logueado');
        $destroyed = Utils::deleteSession('identity');
        if($destroy && $destroyed){
            header('Location:'. base_url );
        }
        
    }
    
    public function perfil(){
        require_once "views/user/perfil.php";
    }
}