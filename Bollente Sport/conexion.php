<?php

class conexion extends mysqli{
    function __construct(){
    
        parent::__construct("localhost","root","","bs");
    }
    public function cerrar()
{
    $this ->close();
}
public function consulta($sql){
    $datos=$this->query($sql);
    return $datos;
}
public function insercion($sql){
    $resultado=$this-> query($sql);
    if($resultado){
        return $this->insert_id;
    }else{
    return false;
}
}
}
?>