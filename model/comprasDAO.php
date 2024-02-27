<?php
include_once 'config/database.php';
include_once 'compras.php';
class comprasDAO
{
    public static function getAllCompras()
    {
        
        $con = Database::connect();

        $stmt = $con->prepare("SELECT * FROM compras");
        $stmt->execute();
        $result = $stmt->get_result();

        $listacompras = [];

        while ($compras = $result->fetch_object('Compras')) {
            $listacompras[] = $compras;
        }

        return $listacompras;
    }
    public static function realizarCompra($compra) {

       $con = Database::connect();

        // Preparar la consulta SQL para insertar una nueva compra
        $stmt = $con->prepare("INSERT INTO compras (id_usuario, precio_total, fecha_compra, costo_envio) VALUES (?, ?, ?, ?)");

        // Vincular los datos de la compra a la consulta
        $stmt->bind_param("idsd",
        $compra->getIdUsuario(), 
        $compra->getPrecioTotal(), 
        $compra->getFechaCompra(), 
        $compra->getCostoEnvio()
    );
          // Ejecutar la consulta
          $resultado = $stmt->execute();

          $con->close();
  
          // Devolver true si la operación fue exitosa, de lo contrario false
          return $resultado;
    }


    
    public function actualizarPrecioTotalCompra($idCompra, $nuevoPrecioTotal) {
        $con = Database::connect();
        $stmt = $con->prepare("UPDATE compras SET precio_total = ? WHERE idcompra = ?");
        $stmt->bind_param("di", $nuevoPrecioTotal, $idCompra);
        $resultado = $stmt->execute();
        $con->close();
        return $resultado;
    }
    
    public static function getHistorialComprasByUserID($id_usuario) {
        $con = Database::connect();
        $stmt = $con->prepare("SELECT * FROM compras WHERE id_usuario = ?");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        $historialCompras = [];

        while ($compra = $result->fetch_object('Compras')) {
            $historialCompras[] = $compra;
        }

        $con->close();

        return $historialCompras;
    }
    public static function crearCompra($compra) {
        $con = Database::connect();

        // Preparar la consulta SQL para insertar una nueva compra
        $stmt = $con->prepare("INSERT INTO compras (id_usuario, precio_total, fecha_compra, costo_envio) VALUES (?, ?, ?, ?)");

        // Vincular los datos de la compra a la consulta
        $stmt->bind_param("idss",
            $compra->getIdUsuario(),
            $compra->getPrecioTotal(),
            $compra->getFechaCompra(),
            $compra->getCostoEnvio()
        );

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el ID de la compra recién insertada
        $idCompra = $con->insert_id;

        $con->close();

        // Devolver el ID de la compra
        return $idCompra;
    }
   
    public static function getComprasByUserId($userId) {
        $con = Database::connect();
        $stmt = $con->prepare("SELECT * FROM compras WHERE id_usuario = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        $compras = [];
        while ($compra = $result->fetch_object('Compras')) {
            $compras[] = $compra;
        }

        $con->close();
        return $compras;
}

        
}
?>