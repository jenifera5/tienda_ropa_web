<?php


include_once 'model/articuloDAO.php';


class ArticuloController{


    public function list()
    {
        $listaarticulos = ArticuloDAO::getAllArticulos();
        $view = 'views/articulos/listado.php';
        include_once 'views/main.php';
    }

    
    public function add()
    {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $idcategoria = $_POST['idcategoria'];
        $imagen = $_FILES['img'];
        $imagen_nombre = $imagen['name'];
        $imagen_tmp = $imagen['tmp_name'];

        if ($imagen['error'] !== UPLOAD_ERR_OK) {
            die("Error al cargar el archivo. Código de error: " . $imagen['error']);
        }

        move_uploaded_file($imagen_tmp, 'carpeta_destino/' . $imagen_nombre);

        ArticuloDAO::add($nombre, $precio, $descripcion, $idcategoria, $imagen_nombre);

        header("Location:" . url . "?controller=Dashboard&action=addarticle");
    }


   
    public function edit() {
            $id= $_POST['id'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $descripcion = $_POST['descripcion'];
            $idcategoria = $_POST['idcategoria'];
            
            // Chequea si se subió una nueva imagen
            $imagen_nombre = null;
            if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                $imagen = $_FILES['img'];
                $imagen_nombre = $imagen['name'];
                $imagen_tmp = $imagen['tmp_name'];
                move_uploaded_file($imagen_tmp, 'carpeta_destino/' . $imagen_nombre);
            } else {
                // Si no hay nueva imagen, conserva la existente
                $articuloActual = ArticuloDAO::getArticuloByID($idarticulos);
                $imagen_nombre = $articuloActual->getImg();
            }
            var_dump($id, $nombre, $precio, $descripcion, $idcategoria, $imagen_nombre);
            ArticuloDAO::edit($id, $nombre, $precio, $descripcion, $idcategoria, $imagen_nombre);
            header("Location:".url."?controller=Dashboard&action=list");
            exit();
    }
   
    public function delete(){
      
        if(isset($_GET['id'])){
            $idarticulos = $_GET['id'];
    
            ArticuloDAO::delete($idarticulos);
    
           
         
           header("Location:".url."?controller=Dashboard&action=list");
        }
    }
    

    public function detail(){
        echo '<h1>Datos Articulo</h1>';
    }


}

?>