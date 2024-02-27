<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once 'model/compras.php';
include_once 'model/articuloDAO.php';
include_once 'model/carrito.php';

class CarritoController {

    public function list() {
        
        if (!isset($_SESSION['id_usuario'])) {
            // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            header("Location: login.php");
            exit();
        }
          // Obtener la lista de artículos y compras
          $listaarticulos = ArticuloDAO::getAllArticulos();
          $listacompras = ComprasDAO::getComprasByUserId($_SESSION['id_usuario']);
  
          // Asegurarse de que el carrito está inicializado
          if (!isset($_SESSION['carrito'])) {
              $_SESSION['carrito'] = new Carrito();
          }
  
          // Obtener los artículos en el carrito
          $articulosEnCarrito = $_SESSION['carrito']->obtenerArticulos();
  
          // Crear una nueva instancia de Compra para almacenar datos temporales
          $compra = new Compras();
  
          // Calcular el precio total y el costo de envío basado en los artículos en el carrito
          $precio_total = $this->calcularNuevoPrecioTotal($_SESSION['carrito']);
          $costo_envio = $this->calcularCostoEnvio($_SESSION['carrito']);
  
          // Configurar los valores calculados en la instancia de Compra
          $compra->setIdUsuario($_SESSION['id_usuario'] ?? null);
          $compra->setPrecioTotal($precio_total);
          $compra->setCostoEnvio($costo_envio);
          $compra->setFechaCompra(date("Y-m-d H:i:s")); // Fecha actual
          $_SESSION['datosParaLaVista']['compraTemporal'] = $compra;


        
        
        
        $compras = $compra; 
        $view = 'views/cesta.php';
        include_once 'views/main.php';
    }
    
    

   
public function add() {
   
    if (isset($_GET['id'])) {
        $idarticulos = $_GET['id'];

        $articulo = ArticuloDAO::getArticuloByID($idarticulos);
        
        if ($articulo) {
            $_SESSION['carrito']->agregarArticulo($articulo);
        }
        
    }
    
    
    // Redirigir al usuario de vuelta a la página anterior
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}


public function delete() {
    if(isset($_GET['id'])){
        $idarticulos = $_GET['id'];
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = new Carrito(); // Asegúrate de inicializar si aún no existe
        }
        $carrito = $_SESSION['carrito'];
        $carrito->eliminarArticulo($idarticulos);
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }
}

    public function confirmacion() {
        if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito']->obtenerArticulos())) {
            // Lógica para confirmar la compra, calcular el precio total, etc.
            // Redirigir a la página de confirmación
            $view = 'views/confirmacionCompra.php';
            include_once 'views/main.php';
        } else {
            // No hay artículos en el carrito
            $this->error(); // Llama al método error si no hay nada en el carrito
        }
    }

public function error() {
    // Lógica para manejar errores, por ejemplo, si no se pudo completar la compra
    $view = 'views/errorCompra.php';
    include_once 'views/main.php';
}

private function calcularNuevoPrecioTotal($carrito) {
    $precio_total = 0;
    foreach ($carrito->obtenerArticulos() as $articulo) {
        $precio_total += $articulo->getPrecio();
    }
    return $precio_total;
}

private function obtenerIdCompra() {
  
    if (isset($_SESSION['idcompra'])) {
        return $_SESSION['idcompra'];
    }else {
        // Si no hay una compra en proceso, necesitarías manejar este caso.
        // Podrías redirigir al usuario, lanzar una excepción, o comenzar una nueva compra.
        // Dependerá de la lógica de tu aplicación.
        throw new Exception("No hay una compra en proceso.");
    }
}


public function actualizarEnvio() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['metodo_envio'] = $_POST['shipping_method'];
        // Asegúrate de recalcular el costo de envío y actualizar el precio total aquí si es necesario

        // Redirige a la lista del carrito para ver los cambios
        header("Location: ?controller=Carrito&action=list");
        exit();
    } else {
        // Redirige a la página de error si no se envía el formulario correctamente
        header("Location: ?controller=Carrito&action=error");
        exit();
    }
}


   
private function calcularCostoEnvio($carrito) {
    // Configuración de costos
    $costoEnvioFijo = 2.50; // Costo de envío estándar fijo
    $costoEnvioExpress = 5.00; // Costo de envío express
    $envioGratisArticulosMinimos = 5; // Cantidad mínima de artículos para envío gratis

    // Obtener la cantidad de artículos en el carrito
    $cantidadArticulos = count($carrito->obtenerArticulos());

    // Determinar si el envío express ha sido seleccionado
    $esEnvioExpress = isset($_SESSION['metodo_envio']) && $_SESSION['metodo_envio'] === 'express';

    // Si hay más de 5 artículos, el envío es gratuito
    if ($cantidadArticulos > $envioGratisArticulosMinimos) {
        return 0;
    }

    // Si no es envío gratuito, determinar el costo basado en la selección de envío express
    return $esEnvioExpress ? $costoEnvioExpress : $costoEnvioFijo;
}


public function handleRequest() {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'list':
                $this->list();
                break;
            case 'add':
                $this->add();
                break;
            case 'delete':
                $this->delete();
                break;
            case 'confirmacion':
                $this->confirmacion();
                break;
            case 'error':
                $this->error();
                break;
            // Añade más casos según sea necesario
        }
    }
}
}

// En algún lugar del script principal o punto de entrada
$controller = new CarritoController();
$controller->handleRequest();

?>

