<?php
include_once 'config/database.php';
include_once 'user.php';


class UserDAO
{


    public static function getAllUser()
    {
        $con = Database::connect();

        $stmt = $con->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        $result = $stmt->get_result();

        $listausuarios = [];

        while ($usuario = $result->fetch_object('User')) {
            $usuario->setPassword($usuario->getPasswordCifrada());
            $listausuarios[] = $usuario;
        }

        return $listausuarios;
    }
    public static function getUserByID($id_usuario)
    {
        $con = Database::connect();
        $stmt = $con->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        $usuario = $result->fetch_object('User');

        $con->close();

        return $usuario;
    }
    public static function add($nombre, $email, $password, $direccion)
    {
        $con = Database::connect();
    
       
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $stmt = $con->prepare("INSERT INTO usuarios (nombre, email, password, direccion) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $email, $hashedPassword, $direccion);
        $stmt->execute();
    
        $con->close();
    }
    
    
        public static function edit($id_usuario, $nombre, $email, $password, $direccion)
        {
            $con = Database::connect();
        
           
            if (!empty($password)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $con->prepare("UPDATE usuarios SET nombre=?, email=?, password=?, direccion=? WHERE id_usuario =?");
                $stmt->bind_param("ssssi", $nombre, $email, $hashedPassword, $direccion, $id_usuario);
            } else {
              
                $stmt = $con->prepare("UPDATE usuarios SET nombre=?, email=?, direccion=? WHERE id_usuario =?");
                $stmt->bind_param("sssi", $nombre, $email, $direccion, $id_usuario);
            }
        
            $stmt->execute();
            $con->close();
        }
    

    public static function delete($id) {
        $con = Database::connect();
        $stmt = $con->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $con->close();
    }
    public static function login($username, $password) {
        $con = Database::connect();
        $stmt = $con->prepare("SELECT * FROM usuarios WHERE nombre = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows === 1) {
            $usuario = $result->fetch_object('User');
            if (password_verify($password, $usuario->getPassword())) {
                // La contraseña es correcta
                $con->close();
                return $usuario;
            } else {
                // La contraseña es incorrecta
                $con->close();
                return false;
            }
        } else {
            // No se encontró el usuario
            $con->close();
            return false;
        }
    }
    public static function getHistorialComprasByUserID($id_usuario) {
        $con = Database::connect();
        
        $stmt = $con->prepare("SELECT * FROM compras WHERE id_usuario = ?");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $historialCompras = [];
        
        while ($compra = $result->fetch_assoc()) {
            // Agregar la compra al historial de compras
            $historialCompras[] = $compra;
        }
        
        $con->close();
        
        return $historialCompras;
    }
    
    
    
  

}


?>
