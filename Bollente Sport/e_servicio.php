<?php 
require_once("clase_servicio.php");
$servicio = new servicio();
$servicio->set("id_servicio",$_GET["id_servicio"]);

$resultado=$servicio->eliminar();


echo "<script>location.href='admin.php'</script>";

 ?>