<?php
include_once 'model/userDAO.php';
include_once 'model/user.php'; // Asegúrate de incluir la clase User

class PerfilController {
    public function list() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();

        }
        
        $usuario = null;
        $historialCompras = []; // Inicializar el array del historial de compras

        if (isset($_SESSION['id_usuario'])) {
            $id_usuario = $_SESSION['id_usuario'];
            $usuario = UserDAO::getUserByID($id_usuario);
            // Asumiendo que existe un método getHistorialComprasByUserID en UserDAO o una clase similar
            $historialCompras = ComprasDAO::getHistorialComprasByUserID($id_usuario);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['id_usuario'])) {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $direccion = $_POST['direccion'];
            UserDAO::edit($id_usuario, $nombre, $email, $usuario->getPassword(), $direccion);
            // Recargar la información actualizada del usuario
            $usuario = UserDAO::getUserByID($id_usuario);
        }

        // Incluir la vista y pasar las variables $usuario y $historialCompras
        $view = 'views/perfil.php';
        
        include_once 'views/main.php';
    }
}
?>


