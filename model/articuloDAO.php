<?php


include_once 'config/database.php';
include_once 'articulo.php';


class ArticuloDAO
{


    public static function getAllArticulos()
    {
        
        $con = Database::connect();

        $stmt = $con->prepare("SELECT * FROM articulos");
        $stmt->execute();
        $result = $stmt->get_result();

        $listaarticulos = [];

        while ($articulo = $result->fetch_object('Articulo')) {
            $listaarticulos[] = $articulo;
        }

        return $listaarticulos;
    }
    public static function getArticuloByID($id) {
        $con = Database::connect();
        $stmt = $con->prepare("SELECT * FROM articulos WHERE idarticulos = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result) {
            $articulo = $result->fetch_object('Articulo');
            var_dump($articulo);
            $con->close();
            return $articulo;
        } else {
            $con->close();
            return null;
        }
    }
    

    public static function add($nombre, $precio, $descripcion, $idcategoria, $img)
    {
        $con = Database::connect();
        $stmt = $con->prepare("INSERT INTO articulos (nombre, precio, descripcion, img, idcategoria) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sdssi", $nombre, $precio, $descripcion, $img, $idcategoria);
        $stmt->execute();
        $con->close();
    }

    
    
    public static function edit($id, $nombre, $precio, $descripcion, $img, $idcategoria) {
        $con = Database::connect();
        $stmt = $con->prepare("UPDATE articulos SET nombre = ?, precio = ?, descripcion = ?, img = ?, idcategoria = ? WHERE idarticulos = ?");
        
        // Añadir var_dump() aquí para ver los valores que se van a actualizar
        var_dump($id, $nombre, $precio, $descripcion, $img, $idcategoria);
        
        $stmt->bind_param("sdssii", $nombre, $precio, $descripcion, $img, $idcategoria, $id);
        $stmt->execute();
        $con->close();
    }
    
    
    public static function delete($id)
    {
        $con = Database::connect();
        $stmt = $con->prepare("DELETE FROM articulos WHERE idarticulos = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $con->close();
    }
    public static function obtenerPrecioPorId($idarticulos) {
        $con = Database::connect();
        $stmt = $con->prepare("SELECT precio FROM articulos WHERE idarticulos = ?");
        $stmt->bind_param("i", $idarticulos);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $precio = $row['precio'];
            $con->close();
            return $precio;
        } else {
            $con->close();
            return false; // Devuelve false si no se encuentra el artículo con el ID dado
        }
    }

      
    public static function getArticulosEnCarrito() {
        // Asumiendo que estás usando sesiones para almacenar los IDs de los artículos del carrito
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $articulosEnCarrito = [];
        if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
            $con = Database::connect();
            foreach ($_SESSION['carrito'] as $idarticulos => $cantidad) {
                $stmt = $con->prepare("SELECT * FROM articulos WHERE idarticulos = ?");
                $stmt->bind_param("i", $idarticulos);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $articulo = $result->fetch_object('Articulo');
                    $articulo->cantidad = $cantidad; // Asumiendo que la clase Articulo tiene una propiedad cantidad
                    $articulosEnCarrito[] = $articulo;
                }
            }
            $con->close();
        }
        
        return $articulosEnCarrito;
    }

    
     
  
}
?>
