<?php

require_once("clase_usuario.php");
$usuario = new usuario();
$usuario->set("usuario",$_POST["usuario"]);
$usuario->set("contrasena",$_POST["contrasena"]);
$usuario->set("nombre",$_POST["nombre"]);

$resultado=$usuario->insertar();

echo "<script>location.href='admin.php'</script>";
?>