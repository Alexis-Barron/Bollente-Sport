<?php
class usuario{
    private $conexion;
    private $id;
    private $usuario;
    private $contrasena;
    private $nombre;

    function __construct(){
    require_once("conexion.php");
    $this->conexion = new Conexion();
}
function set($atributo, $contenido){
    $this->$atributo=$contenido;
}
function insertar(){
    $sql="INSERT INTO usuarios(id,usuario,contrasena,nombre)VALUES(NULL, '{$this->usuario}','{$this->contrasena}','{$this->nombre}')";
     $datos=$this->conexion->insercion($sql);
     return $datos;
}
function mostrar(){
    $sql="SELECT * FROM usuarios";
     $datos=$this->conexion->consulta($sql);
     return $datos;
}

function eliminar(){
    $sql="DELETE FROM usuarios WHERE id='{$this->id}'";
    $datos=$this->conexion->consulta($sql);
    return $datos;
}


function validar(){
    $sql="SELECT * FROM usuarios WHERE usuario='{$this->usuario}' AND contrasena='{$this->contrasena}'";
    $datos=$this->conexion->consulta($sql);
    return $datos;
}

}
?>