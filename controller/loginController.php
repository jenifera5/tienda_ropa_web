<?php
include_once 'model/userDAO.php';
include_once 'model/user.php';

class LoginController {
    public function showLoginForm() {
         $view ='views/login.php';
        include_once 'views/main.php';
    }
    
    public function login() {
        // La sesión debe comenzar al principio del método para evitar errores de cabecera
        session_start();

        // Asegúrate de no tener ningún espacio en blanco ni salida antes de este punto
        $username = $_POST['usuario'] ?? null;
        $password = $_POST['password'] ?? null;
        var_dump($username);
        var_dump($password);
    
    
        if (isset($username) && isset($password)) {
            $usuario = UserDAO::login($username, $password);
            var_dump($usuario);
            if ($usuario !== false) {
                $_SESSION['username'] = $usuario->getNombre();
                $_SESSION['id_usuario'] = $usuario->getIdusuario();
                $_SESSION['role'] = $usuario->getRole();
                $_SESSION['login_success'] = 'Has iniciado sesión correctamente.';
    
                if ($_SESSION['role'] === 'admin') {
                    header("Location: ?controller=User&action=listuser");
                    exit();
                } elseif ($_SESSION['role'] === 'cliente') {
                    header("Location: ?controller=Articulo&action=listarticle");
                    exit();
                } else {
                    header("Location: ?controller=Login&action=login");
                    exit();
                }
            } else {
                // Redirigir al usuario de vuelta al formulario de inicio de sesión con un mensaje de error
                $_SESSION['login_error'] = 'Inicio de sesión fallido. Las credenciales no son correctas.';
                header("Location: ?controller=Login&action=showLoginForm");
                exit();
            }
        } else {
            // Si no se establecen $username y $password, redirigir al formulario de inicio de sesión.
            header("Location: ?controller=Login&action=showLoginForm");
            exit();
        }
    }
    

    public function logout() {
        session_start();
        session_unset(); // Elimina todas las variables de sesión.
        session_destroy(); // Destruye la sesión.
    
        // Redirige al usuario a la página de inicio de sesión o a la página de inicio.
        header("Location: ?controller=Login&action=showLoginForm");
        exit();
      }
    

}
?>
