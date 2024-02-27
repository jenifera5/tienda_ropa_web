<?php
include_once 'config/parametro.php';
include_once 'controller/articuloController.php';
include_once 'controller/dashboardcontroller.php';
include_once 'controller/userController.php';
include_once 'controller/loginController.php';
include_once 'controller/registroController.php';
include_once 'controller/comprasController.php';
include_once 'controller/carritoController.php';
include_once 'controller/perfilController.php';
if(!isset($_GET['controller'])){
    header("Location:".url."?controller=Articulo");
}else{
    $nombre_controlador = $_GET['controller'].'Controller';
    
    if(class_exists($nombre_controlador)){
        $controller = new $nombre_controlador();

        if(isset($_GET['action']) &&  method_exists($controller, $_GET['action']) ){
            $action = $_GET['action'];
        }else{
            $action = action_default;
        }

        $controller->$action();
    }else{
        header("Location:".url."?controller=Articulo");
    }
}
if ($_GET['controller'] == 'Logout') {
    $controller = new LoginController();
    $controller->logout();
  }
  
?>
