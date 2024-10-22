<?php
require_once("clase_carrusel.php");

// Habilitar la depuración de errores (esto es para desarrollo, puedes eliminarlo en producción)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Crear el objeto carrusel
$carrusel = new carrusel();

// Verificar si el archivo de imagen fue subido correctamente
if (isset($_FILES['imgc'])) {
    if ($_FILES['imgc']['error'] === UPLOAD_ERR_OK) {
        
        // Obtener la información del archivo
        $archivoTmp = $_FILES['imgc']['tmp_name'];
        $nombreArchivo = basename($_FILES['imgc']['name']);
        $rutaDestino = 'img/' . $nombreArchivo;  // Carpeta donde se almacenarán las imágenes
        
        // Verificar si el archivo es una imagen
        $mimeType = mime_content_type($archivoTmp);
        if (strpos($mimeType, 'image') !== false) {
            
            // Mover el archivo a la carpeta "img"
            if (move_uploaded_file($archivoTmp, $rutaDestino)) {
                // Establecer el valor de la imagen en el objeto de la clase
                $carrusel->set("imgc", $rutaDestino);  // Guardar la ruta de la imagen
            } else {
                die('Error al mover la imagen al servidor.');
            }
        } else {
            die('El archivo no es una imagen válida.');
        }
    } else {
        die('Error al subir la imagen. Código de error: ' . $_FILES['imgc']['error']);
    }
} else {
    die('No se ha cargado ninguna imagen o hubo un error al cargarla.');
}

// Insertar el carrusel en la base de datos
$resultado = $carrusel->insertar();

// Comprobar si la inserción fue exitosa
if ($resultado) {
    // Redirigir al administrador sin mostrar mensajes
    header("Location: admin.php");
    exit;
} else {
    die('Error al insertar el carrusel en la base de datos.');
}
?>
