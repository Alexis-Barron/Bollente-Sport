<?php 
require_once("clase_comentario.php");
$comentario = new comentario();
$comentario->set("id_comentario",$_GET["id_comentario"]);

$resultado=$comentario->eliminar();


echo "<script>location.href='admin.php'</script>";

 ?>