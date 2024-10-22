<?php

require_once("clase_comentario.php");
$comentario = new comentario();

$comentario->set("nombret",$_POST["nombret"]);
$comentario->set("mensajet",$_POST["mensajet"]);

$resultado=$comentario ->insertar();

echo "<script>location.href='index.php'</script>";
?>