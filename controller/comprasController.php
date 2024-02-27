<?php
include_once 'model/comprasDAO.php';
include_once 'model/articuloDAO.php';
include_once 'model/carrito.php';
include_once 'model/compras.php';
// Asegúrate de que la sesión se inicia en el script que incluye este controlador o en el punto de entrada de la aplicación.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class ComprasController {
   
    

    public function iniciarProcesoDeCompra() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito']->obtenerArticulos())) {
                $carrito = $_SESSION['carrito'] ?? new Carrito();

                $compra = new Compras();
                $compra->setIdUsuario($_SESSION['id_usuario']);
                // Calcula el costo de envío basado en la selección del usuario
                $costoEnvio = $this->calcularCostoEnvio($carrito, $_SESSION['metodo_envio']);
                $compra->setCostoEnvio($costo_envio);
                // Calcula el precio total incluyendo el costo de envío
                $precio_total = $this->calcularPrecioTotal($carrito) + $costo_envio;
                $compra->setPrecioTotal($precio_total);
                $compra->setFechaCompra(date("Y-m-d H:i:s"));
                $idCompra = ComprasDAO::crearCompra($compra);
                if ($idCompra) {
                    $_SESSION['idcompra'] = $idCompra;
                    header("Location: ?controller=Compras&action=confirmacionCompra");
                    exit();
                } else {
                    // Manejo de errores si la inserción falla
                    header("Location: ?controller=Carrito&action=error");
                    exit();
                }
            } else {
                // Redirige si el carrito está vacío o no existe
                header("Location: ?controller=Carrito&action=list");
                exit();
            }
        } else {
            // Redirige si no es una solicitud POST
            header("Location: ?controller=Carrito&action=list");
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
    


    private function calcularPrecioTotal($carrito) {
        // Calcula el precio total de los artículos en el carrito
        $precio_total = 0;
        foreach ($carrito->obtenerArticulos() as $articulo) {
            $precio_total += $articulo->getPrecio();
        }
        return $precio_total;
    }


    
    public function procesarCompra() {
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['carrito']) && !empty($_SESSION['carrito']->obtenerArticulos())) {
            $carrito = $_SESSION['carrito'];
            $compra = new Compras();
            $compra->setIdUsuario($_SESSION['id_usuario'] ?? null);
            $precioTotal = $this->calcularNuevoPrecioTotal($carrito);
            
            // Asignar el precio total y otros valores a $compra
            $compra->setIdUsuario($_SESSION['id_usuario'] ?? null);
            $compra->setCostoEnvio($this->calcularCostoEnvio());
            $compra->setPrecioTotal($this->calcularPrecioTotal($carrito));
            $compra->setFechaCompra(date("Y-m-d H:i:s"));
            $comprasDAO = new ComprasDAO();
            if ($comprasDAO->realizarCompra($compra)) {
                $_SESSION['carrito']->vaciarCarrito();
               
                header("Location: ".url."?controller=Carrito&action=confirmacion");
                exit;
            } else {
               
                header("Location: ".url."?controller=Carrito&action=error");
                exit;
            }
        }
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

   
public function confirmacion() {
    if (isset($_SESSION['idcompra'])) {
        // Si no se ha establecido en la sesión, obtén la información de la compra
        if (!isset($_SESSION['datosParaLaVista']['compra'])) {
            $_SESSION['datosParaLaVista']['compra'] = ComprasDAO::getCompraById($_SESSION['idcompra']);
        }
        
        // Cargar la vista de confirmación
        $view = 'views/confirmacionCompra.php';
        include_once 'views/main.php';
    } else {
        // Si no hay ID de compra, redirige al error o maneja como consideres
        $this->error();
    }
}
    public function error() {
        // Lógica para manejar la vista de error
        $view = 'views/errorCompra.php';
        include_once 'views/main.php';
    }
   
    public function finalizarCompra() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asegurarse de que hay un carrito y que no está vacío
            if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito']->obtenerArticulos())) {
                $carrito = $_SESSION['carrito'] ?? new Carrito();

            $compra = new Compras();
            $compra->setIdUsuario($_SESSION['id_usuario']);
            // Calcula el costo de envío basado en la selección del usuario
            $costoEnvio = $this->calcularCostoEnvio($carrito, $_SESSION['metodo_envio']);
            $compra->setCostoEnvio($costo_envio);
            // Calcula el precio total incluyendo el costo de envío
            $precio_total = $this->calcularPrecioTotal($carrito) + $costo_envio;
            $compra->setPrecioTotal($precio_total);
            $compra->setFechaCompra(date("Y-m-d H:i:s"));
                
                // Crear un nuevo registro de compra
                $carrito = $_SESSION['carrito'];
                $compra = new Compras();
                // Puedes necesitar establecer más detalles aquí, como ID de usuario, etc.
                // ...
                $idCompra = ComprasDAO::crearCompra($compra);
                
                // Comprobar si la compra fue creada correctamente
                if ($idCompra) {
                    // Vaciar el carrito después de una compra exitosa
                    $_SESSION['carrito']->vaciarCarrito();
                    
                    // Guardar el ID de la compra para la confirmación
                    $_SESSION['idcompra'] = $idCompra;
                    
                    // Redirigir a la página de confirmación
                    header("Location: ?controller=Compras&action=confirmacion");
                    exit;
                } else {
                    // Manejar el error de la creación de la compra
                    header("Location: ?controller=Compras&action=error");
                    exit;
                }
            } else {
                // Redirigir al carrito si está vacío o no se ha iniciado la compra
                header("Location: ?controller=Carrito&action=list");
                exit;
            }
        } else {
            // Redirigir si el método no es POST
            header("Location: ?controller=Carrito&action=list");
            exit;
        }
    }
    
    
}
?>


