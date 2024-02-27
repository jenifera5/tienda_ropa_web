<?php

class Categoria
{
    private $idcategoria;
    private $nombre;

    
    public function getIdcategoria()
    {
        return $this->idcategoria;
    }

  
    public function setIdcategoria($idcategoria)
    {
        $this->idcategoria = $idcategoria;

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
}