<?php 
require_once("clase_contacto.php");
$contacto = new contacto();
$contacto->set("id_contacto",$_GET["id_contacto"]);

$resultado=$contacto->eliminar();


echo "<script>location.href='admin.php'</script>";

 ?>