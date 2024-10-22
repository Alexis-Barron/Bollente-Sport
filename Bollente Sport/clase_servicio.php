<?php
class servicio{
    private $conexion;
    private $id_servicio;
    private $nombres;
    private $descripcion;
    private $imgs;

 
    function __construct(){
    require_once("conexion.php");
    $this->conexion = new Conexion();
}
function set($atributo, $contenido){
    $this->$atributo=$contenido;
}
function insertar(){
    $sql="INSERT INTO servicio(id_servicio,nombres,descripcion,imgs)VALUES(NULL, '{$this->nombres}','{$this->descripcion}','{$this->imgs}')";
     $datos=$this->conexion->insercion($sql);
     return $datos;
}
function mostrar(){
    $sql="SELECT * FROM servicio";
     $datos=$this->conexion->consulta($sql);
     return $datos;
}

function eliminar(){
    $sql="DELETE FROM servicio WHERE id_servicio='{$this->id_servicio}'";
    $datos=$this->conexion->consulta($sql);
    return $datos;
}

}
?>