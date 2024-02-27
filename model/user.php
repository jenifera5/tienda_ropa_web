<?php
class User
{


private $id_usuario;
private $nombre;
private $email;
private $password;
private $direccion;

private $role;


public function __construct()
{
    
   
}
public function getIdusuario()
    {
        return $this->id_usuario;
    }
    
    public function setIdusuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
        return $this;
    }
    public function getNombre()
    {
    return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail( $email)
    {
        $this->email= $email;
        return $this;
    }
   

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword( $password)
    {
        $this->password= $password;
        return $this;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

   
    public function setDireccion( $direccion)
    {
        $this->direccion= $direccion;
        return $this;
    }

  
    public function getPasswordCifrada()
    {
        return '********';
    }
    
  
    public function getRole() {
        return $this->role;
    }
    
    public function setRole($role) {
        $this->role = $role;
        return $this;
    }


   



}
?>