<?php 
require_once("clase_carrusel.php");
$carrusel = new carrusel();
$carrusel->set("id_carrusel",$_GET["id_carrusel"]);

$resultado=$carrusel->eliminar();


echo "<script>location.href='admin.php'</script>";

 ?>