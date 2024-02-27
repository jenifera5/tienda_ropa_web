<?php
class Carrito {
    private $articulos;
 
    public function __construct() {
        $this->articulos = [];
    }

    public function agregarArticulo($articulo) {
        $this->articulos[] = $articulo;
    }

    public function obtenerArticulos() {
        return $this->articulos;
    }

    public function eliminarArticulo($idarticulos) {
        // Filtrar los artículos para eliminar el que tiene el ID especificado
        $this->articulos = array_filter($this->articulos, function($articulo) use ($idarticulos) {
            // Suponiendo que el artículo tiene un método getId() para obtener su ID
            return $articulo->getIdarticulos() != $idarticulos;
        });

        // Reindexar el array para evitar índices vacíos después de la eliminación
        $this->articulos = array_values($this->articulos);
    }
   
    public function añadirArticuloAlCarrito($articulo) {
        // Añade el artículo al array de artículos
        $this->articulos[] = $articulo;
    }
    
    public function calcularPrecioTotal() {
        $precio_total= 0;
        foreach ($this->articulos as $articulo) {
            $precio_total += $articulo->getPrecio(); // Asume que $articulo tiene un método getPrecio()
        }
        return $precio_total;
    }
    public function vaciarCarrito() {
        $this->articulos = [];
    }
    
}
?>