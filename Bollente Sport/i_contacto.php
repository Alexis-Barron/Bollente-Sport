<?php

require_once("clase_contacto.php");
$contacto = new contacto();
$contacto ->set("nombre",$_POST["nombre"]);
$contacto ->set("correo",$_POST["correo"]);
$contacto ->set("mensaje",$_POST["mensaje"]);

$resultado=$contacto ->insertar();

echo "<script>location.href='index.php'</script>";
?>