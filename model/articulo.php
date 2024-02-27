<?php

class Articulo
{
    private $idarticulos;
    private $nombre;
    private $precio;
    private $cantidad;
    private $img;
    private $descripcion;
    private $idcategoria;
    public function __construct() {}

    public function getIdarticulos()
    {
        return $this->idarticulos;
    }
    public function setIdarticulos($idarticulos)
    {
        $this->idarticulos = $idarticulos;
        return $this;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;


        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }


    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function getIdcategoria()
    {
        return $this->idcategoria;
    }

    public function setIdcategoria($idcategoria)
    {
        $this->idcategoria = $idcategoria;
        return $this;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    } 
      public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }
    public function addToCart($cantidad) {
        // Asumiendo que existe una instancia global o accesible del carrito
        global $carrito;

        // Llama a un método del carrito para agregar este artículo
        $carrito->agregarArticulo($this->idarticulos, $cantidad);
    }

    
 
}
?>