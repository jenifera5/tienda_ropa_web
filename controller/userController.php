<?php

include_once 'model/userDAO.php';



class UserController{
    
   
    

    public function list(){
     $listausuarios = UserDAO::getAllUser();  
    $view = 'views/admin/user/listado.php';
    include_once 'views/admin/dashboard.php';
    include_once 'views/main.php';
    }
    public function add(){
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password =$_POST['password'];
        $direccion = $_POST['direccion'];
        
        UserDAO::add($nombre,$email,$password,$direccion);


        header("Location:".url."?controller=Dashboard&action=adduser");
   
    }
    public function edit() {
        
            $id_usuario = $_POST['id']; 
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password']; // Considera dejar vacío si no se desea cambiar
            $direccion = $_POST['direccion'];
            $usuario = UserDAO::getUserByID($id_usuario);
            
            UserDAO::edit($id_usuario, $nombre, $email, $usuario->getPassword(), $direccion);
            $usuario = UserDAO::getUserByID($id_usuario);
            header("Location:".url."?controller=Dashboard&action=edituser");
        
    }


    public function delete() {
        if (isset($_GET['id'])) {
            $id_usuario = $_GET['id'];
            UserDAO::delete($id_usuario);
            
            header("Location:".url."?controller=Dashboard&action=listuser");
        }
    }
    


}

?>