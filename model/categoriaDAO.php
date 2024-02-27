<?php
include_once 'config/database.php';
include_once 'categoria.php';
class CategoriaDAO
{

public static function getAllCategorias()

{
    $con = Database :: connect();

    $stmt =$con ->prepare("SELECT* FROM categorias");
    $stmt ->execute();
    $result = $stmt ->get_result();

    $listacategorias= [];

    while($categoria= $result->fetch_object('Categoria')){
        $listacategorias[] = $categoria;

    }
   
   $con->close();
   return $listacategorias;
}

}