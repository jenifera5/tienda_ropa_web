<?php
include_once 'model/userDAO.php';
class RegistroController
{
    public function showRegistroForm()
    {
        $view = 'views/registro.php';
        include_once 'views/main.php';
    }

    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['usuario'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $direccion = $_POST['direccion'];

            // Aquí debes agregar lógica para validar y procesar el registro
            UserDAO::add($nombre, $email, $password, $direccion);

            // Redirige a donde desees después del registro
            header("Location:" . url . "?controller=Login&action=showLoginForm");
        }
    }
}
?>