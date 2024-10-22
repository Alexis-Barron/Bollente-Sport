<?php
class comentario{
    private $conexion;
    private $nombret;
    private $id_comentario;
    private $mensajet;

    function __construct(){
    require_once("conexion.php");
    $this->conexion = new Conexion();
}
function set($atributo, $contenido){
    $this->$atributo=$contenido;
}
function insertar(){
    $sql="INSERT INTO comentario(id_comentario,nombret,mensajet)VALUES(NULL, '{$this->nombret}','{$this->mensajet}')";
     $datos=$this->conexion->insercion($sql);
     return $datos;
}
function mostrar(){
    $sql="SELECT * FROM comentario";
     $datos=$this->conexion->consulta($sql);
     return $datos;
}

function eliminar(){
    $sql="DELETE FROM comentario WHERE id_comentario='{$this->id_comentario}'";
    $datos=$this->conexion->consulta($sql);
    return $datos;
}

}
?>