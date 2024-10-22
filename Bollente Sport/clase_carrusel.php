<?php
class carrusel{
    private $conexion;
    private $id_carrusel;
    private $imgc;

 
    function __construct(){
    require_once("conexion.php");
    $this->conexion = new Conexion();
}
function set($atributo, $contenido){
    $this->$atributo=$contenido;
}
function insertar(){
    $sql="INSERT INTO carrusel (id_carrusel,imgc)VALUES(NULL,'{$this->imgc}')";
     $datos=$this->conexion->insercion($sql);
     return $datos;
}
function mostrar(){
    $sql="SELECT * FROM carrusel";
     $datos=$this->conexion->consulta($sql);
     return $datos;
}

function eliminar(){
    $sql="DELETE FROM carrusel WHERE id_carrusel='{$this->id_carrusel}'";
    $datos=$this->conexion->consulta($sql);
    return $datos;
}

}
?>