<?php
require_once("clase_usuario.php");

$usuario = new Usuario();  // Cambié la primera letra a mayúscula para seguir la convención de clases en PHP

// Verificar que se reciban los datos del formulario
if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
    // Asignar los valores a los atributos del objeto usuario
    $usuario->set("usuario", $_POST["usuario"]);
    $usuario->set("contrasena", $_POST["contrasena"]);

    // Validar usuario
    $resultado = $usuario->validar();  // Ejecutamos la validación

    // Verificar si se obtuvo un resultado
    if ($resultado && $resultado->num_rows > 0) {
        // Obtener los datos del usuario
        $datos = $resultado->fetch_assoc();  // Usar fetch_assoc() para obtener los datos del usuario

        // Iniciar la sesión y guardar los datos del usuario
        session_start();
        $_SESSION["usuario"] = $_POST["usuario"];
        $_SESSION["id_usuario"] = $datos["id"];  // Asegúrate de que "id" coincida con el campo real en la base de datos

        // Redirigir a admin.php
        echo "<script>location.href='admin.php';</script>";
        exit;  // Terminar la ejecución para evitar que el código siga ejecutándose
    } else {
        // Si no se encuentran resultados, redirigir a index.php
        echo "<script>location.href='index.php';</script>";
        exit;  // Terminar la ejecución para evitar que el código siga ejecutándose
    }
} else {
    // Si no se recibieron los datos del formulario, redirigir a index.php
    echo "<script>location.href='index.php';</script>";
    exit;  // Terminar la ejecución para evitar que el código siga ejecutándose
}
?>
