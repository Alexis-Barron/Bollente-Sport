<?php
require_once("clase_servicio.php");

// Habilitar la depuración de errores (esto es para desarrollo, puedes eliminarlo en producción)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Crear el objeto servicio
$servicio = new servicio();

// Verificar si el archivo de imagen fue subido correctamente
if (isset($_FILES['imgs'])) {
    if ($_FILES['imgs']['error'] === UPLOAD_ERR_OK) {
        
        // Obtener la información del archivo
        $archivoTmp = $_FILES['imgs']['tmp_name'];
        $nombreArchivo = basename($_FILES['imgs']['name']);
        $rutaDestino = 'img/' . $nombreArchivo;  // Carpeta donde se almacenarán las imágenes
        
        // Verificar si el archivo es una imagen
        $mimeType = mime_content_type($archivoTmp);
        if (strpos($mimeType, 'image') !== false) {
            
            // Mover el archivo a la carpeta "img"
            if (move_uploaded_file($archivoTmp, $rutaDestino)) {
                // Establecer el valor de la imagen en el objeto de la clase
                $servicio->set("imgs", $rutaDestino);  // Guardar la ruta de la imagen
            } else {
                die('Error al mover la imagen al servidor.');
            }
        } else {
            die('El archivo no es una imagen válida.');
        }
    } else {
        die('Error al subir la imagen. Código de error: ' . $_FILES['imgs']['error']);
    }
} else {
    die('No se ha cargado ninguna imagen o hubo un error al cargarla.');
}

// Establecer el nombre y la descripción del servicio
if (isset($_POST['nombres']) && isset($_POST['descripcion'])) {
    $servicio->set("nombres", $_POST["nombres"]);
    $servicio->set("descripcion", $_POST["descripcion"]);
} else {
    die('Faltan los datos de nombre o descripción.');
}

// Insertar el servicio en la base de datos
$resultado = $servicio->insertar();

// Comprobar si la inserción fue exitosa
if ($resultado) {
    // Redirigir al administrador sin mostrar mensajes
    header("Location: admin.php");
    exit;
} else {
    die('Error al insertar el servicio en la base de datos.');
}
?>
