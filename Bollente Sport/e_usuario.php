<?php 
require_once("clase_usuario.php");
$usuario = new usuario();
$usuario->set("id",$_GET["id"]);

$resultado=$usuario->eliminar();

echo "<script>location.href='admin.php'</script>";

 ?>