<?php
Class Compras
{
private $idcompra;
private $precio_total;
private $fecha_compra;
private $costo_envio;
private $id_usuario;

public function __construct() {}

public function getIdcompra()
{
    return $this->idcompra;
}
public function setIdcompra($idcompra)
{
    $this->idcompra = $idcompra;
    return $this;
}
public function getPrecioTotal()
{
    return $this->precio_total; 
}
public function setPrecioTotal($precio_total)
{
    $this->precio_total=$precio_total;
    return $this;
}
public function getFechaCompra()
{
    return $this->fecha_compra; 
}

public function setFechaCompra($fecha_compra)
{
    $this->fecha_compra = $fecha_compra; 
    return $this; 
}

public function getCostoenvio()
{
    return $this->costo_envio; 
}
public function setCostoenvio($costo_envio)
{
    $this->costo_envio=$costo_envio;
    return $this; 
}
public function getIdusuario()
{
    return $this->id_usuario;
}
public function setIdusuario($id_usuario)
{
    $this->id_usuario = $id_usuario;
    return $this;
}
}
?>