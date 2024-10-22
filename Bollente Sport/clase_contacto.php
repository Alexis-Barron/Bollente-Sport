<?php
class contacto{
    private $conexion;
    private $id_contacto;
    private $nombre;
    private $correo;
    private $mensaje;

    function __construct(){
    require_once("conexion.php");
    $this->conexion = new Conexion();
}
function set($atributo, $contenido){
    $this->$atributo=$contenido;
}
function insertar(){
    $sql="INSERT INTO contacto(id_contacto,nombre,correo,mensaje)VALUES(NULL, '{$this->nombre}','{$this->correo}','{$this->mensaje}')";
     $datos=$this->conexion->insercion($sql);
     return $datos;
}
function mostrar(){
    $sql="SELECT * FROM contacto";
     $datos=$this->conexion->consulta($sql);
     return $datos;
}

function eliminar(){
    $sql="DELETE FROM contacto WHERE id_contacto='{$this->id_contacto}'";
    $datos=$this->conexion->consulta($sql);
    return $datos;
}

}
?>