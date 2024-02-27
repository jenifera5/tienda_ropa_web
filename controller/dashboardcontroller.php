<?php

include_once 'model/articuloDAO.php';
include_once 'model/userDAO.php';
include_once 'model/categoriaDAO.php';
class DashboardController
{

    public function list()
    {
        $listaarticulos = ArticuloDAO::getAllArticulos();
        $view = 'views/admin/articulos/listado.php';
        include_once 'views/admin/dashboard.php';
    }
    
   public function editarticle()
   {
        $listacategorias = CategoriaDAO::getAllCategorias();
        $articulo = ArticuloDAO::getArticuloByID($_GET['id']);
        $view = 'views/admin/articulos/edit.php';
        include_once 'views/admin/dashboard.php';
    }
    public function addarticle()
    {
        $view = 'views/admin/articulos/add.php';
        include_once 'views/admin/dashboard.php';
    }


    public function listuser()
    {
        
             $listausuarios  = UserDAO::getAllUser();
            $view = 'views/admin/user/listado.php';
            include_once 'views/admin/dashboard.php';
           
      
    }

    public function adduser()
    {
        $view = 'views/admin/user/add.php';
        include_once 'views/admin/dashboard.php';
    }

    public function edituser()
    {
        $usuario = UserDAO::getUserByID($_GET['id']); 
        $view = 'views/admin/user/edit.php';
        include_once 'views/admin/dashboard.php';
    }
 
    
       
}
?>

