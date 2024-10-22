<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
}

include("clase_usuario.php");
$usuario = new usuario();
$registros = $usuario->mostrar();

require_once("clase_contacto.php");
$contacto = new contacto();
$registros2 = $contacto->mostrar();

require_once("clase_comentario.php");
$comentario = new comentario();
$registros3 = $comentario->mostrar();

require_once("clase_servicio.php");
$servicio = new servicio();
$registros4 = $servicio->mostrar();

require_once("clase_carrusel.php");
$carrusel = new carrusel();
$registros5 = $carrusel->mostrar();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketing Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
<style>
        html {
            scroll-behavior: smooth;
        }

        /* Animación para la apertura del menú */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-100%);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animación para el cierre del menú */
        @keyframes slideOut {
            from {
                opacity: 1;
                transform: translateY(0);
            }
            to {
                opacity: 0;
                transform: translateY(-100%);
            }
        }

        /* Estilo inicial del menú oculto */
        #mobile-menu {
            opacity: 0;
            transform: translateY(-100%);
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        /* Clase para aplicar la animación de apertura */
        .menu-open {
            animation: slideIn 0.5s ease-out forwards;
        }

        /* Clase para aplicar la animación de cierre */
        .menu-close {
            animation: slideOut 0.5s ease-in forwards;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

<header class="bg-white shadow" data-aos="fade-down" data-aos-duration="1000" data-aos-once="true">
    <nav class="container mx-auto flex justify-between items-center p-5">
        <div class="text-2xl font-bold">
            <img src="img/logo2.png" alt="Rhynos XXL Gaming" class="h-16 transition-transform duration-300 ease-in-out hover:scale-110 hover:shadow-lg"> 
        </div>
        <div class="hidden md:flex space-x-6">
            <a href="index.php" class="text-gray-700 hover:text-blue-500">Inicio</a>
            <a href="#" id="open-modalu" class="text-gray-700 hover:text-blue-500 cursor-pointer">Nuevo usuario</a>
            <a href="#" id="open-modals" class="text-gray-700 hover:text-blue-500 cursor-pointer">Nuevo servicio</a>
            <a href="#" id="open-modalc" class="text-gray-700 hover:text-blue-500 cursor-pointer">Nueva imaguen carrusel</a>
        </div>
        <div class="md:hidden">
            <button id="menu-button" class="focus:outline-none transform transition-transform duration-300 ease-in-out hover:scale-105">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </nav>
    <div id="mobile-menu" class="hidden md:hidden transition-all duration-500 ease-in-out transform scale-y-0 origin-bottom">
        <div class="flex flex-col bg-white shadow-lg p-4">
            <a href="index.php" class="py-2 text-gray-700 hover:text-blue-500">Inicio</a>
            <a href="#" id="open-modalum" class="py-2 text-gray-700 hover:text-blue-500">Nuevo usuario</a>
            <a href="#" id="open-modalsm" class="py-2 text-gray-700 hover:text-blue-500">Nuevo servicio</a>
            <a href="#" id="open-modalm" class="py-2 text-gray-700 hover:text-blue-500">Nuevo carrusel</a>
        </div>
    </div>
</header>

    <!--Tabla de usuarios-->
<section class="flex-grow" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-center">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">Apartado de usuarios</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 text-center">Usuario</th>
                        <th class="px-6 py-3 border-b border-gray-200 text-center">Contraseña</th>
                        <th class="px-6 py-3 border-b border-gray-200 text-center">Nombre</th>
                        <th class="px-6 py-3 border-b border-gray-200 text-center">Eliminar</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php while ($elemento = mysqli_fetch_array($registros)): ?>
                        <tr class="hover:bg-gray-50 transition ease-in-out duration-300">
                            <td class="px-6 py-4 border-b border-gray-200 text-center"><?= $elemento["usuario"] ?></td>
                            <td class="px-6 py-4 border-b border-gray-200 text-center"><?= $elemento["contrasena"] ?></td>
                            <td class="px-6 py-4 border-b border-gray-200 text-center"><?= $elemento["nombre"] ?></td>
                            <td class="px-6 py-4 border-b border-gray-200 text-center"><a href="e_usuario.php?id=<?= $elemento['id'] ?>" class="text-red-500 hover:text-red-700 transform transition-transform duration-300 hover:scale-110 hover:rotate-45"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

   <!--Tabla de contacto-->
<section class="flex-grow" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-center">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">Apartado de contactos</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 text-center">Nombre</th>
                        <th class="px-6 py-3 border-b border-gray-200 text-center">Correo</th>
                        <th class="px-6 py-3 border-b border-gray-200 text-center">Mensaje</th>
                        <th class="px-6 py-3 border-b border-gray-200 text-center">Eliminar</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php while ($elemento2 = mysqli_fetch_array($registros2)): ?>
                        <tr class="hover:bg-gray-50 transition ease-in-out duration-300">
                            <td class="px-6 py-4 border-b border-gray-200 text-center"><?= $elemento2["nombre"] ?></td>
                            <td class="px-6 py-4 border-b border-gray-200 text-center"><?= $elemento2["correo"] ?></td>
                            <td class="px-6 py-4 border-b border-gray-200 text-center"><?= $elemento2["mensaje"] ?></td>
                            <td class="px-6 py-4 border-b border-gray-200 text-center"><a href="e_contacto.php?id_contacto=<?=$elemento2['id_contacto'] ?>" class="text-red-500 hover:text-red-700 transform transition-transform duration-300 hover:scale-110 hover:rotate-45"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


   <!--Tabla de comentario-->
   <section class="flex-grow" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-center">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">Apartado de comentario</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 text-center">Nombre</th>
                        <th class="px-6 py-3 border-b border-gray-200 text-center">comentario</th>
                        <th class="px-6 py-3 border-b border-gray-200 text-center">Eliminar</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php while ($elemento3 = mysqli_fetch_array($registros3)): ?>
                        <tr class="hover:bg-gray-50 transition ease-in-out duration-300">
                            <td class="px-6 py-4 border-b border-gray-200 text-center"><?= $elemento3["nombret"] ?></td>
                            <td class="px-6 py-4 border-b border-gray-200 text-center"><?= $elemento3["mensajet"] ?></td>
                            <td class="px-6 py-4 border-b border-gray-200 text-center"><a href="e_comentario.php?id_comentario=<?=$elemento3['id_comentario'] ?>" class="text-red-500 hover:text-red-700 transform transition-transform duration-300 hover:scale-110 hover:rotate-45"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

  <!--Tabla de servicio-->
  <section class="flex-grow" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-center">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">Apartado de servicios</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 text-center">Nombre</th>
                        <th class="px-6 py-3 border-b border-gray-200 text-center">descripcion</th>
                        <th class="px-6 py-3 border-b border-gray-200 text-center">Imaguen</th>
                        <th class="px-6 py-3 border-b border-gray-200 text-center">Eliminar</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php while ($elemento4 = mysqli_fetch_array($registros4)): ?>
                        <tr class="hover:bg-gray-50 transition ease-in-out duration-300">
                            <td class="px-6 py-4 border-b border-gray-200 text-center"><?= $elemento4["nombres"] ?></td>
                            <td class="px-6 py-4 border-b border-gray-200 text-center"><?= $elemento4["descripcion"] ?></td>
                            <td class="px-6 py-4 border-b border-gray-200 text-center"><img src="<?= $elemento4["imgs"] ?>" alt="Imagen del servicio" class="w-32 h-32 object-cover mx-auto"></td>
                            <td class="px-6 py-4 border-b border-gray-200 text-center"><a href="e_servicio.php?id_servicio=<?=$elemento4['id_servicio'] ?>" class="text-red-500 hover:text-red-700 transform transition-transform duration-300 hover:scale-110 hover:rotate-45"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

  <!--Tabla de carrusel-->
  <section class="flex-grow" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-center">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">Apartado de carrusel</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 text-center">Imaguen del carrusel</th>
                        <th class="px-6 py-3 border-b border-gray-200 text-center">Eliminar</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php while ($elemento5 = mysqli_fetch_array($registros5)): ?>
                        <tr class="hover:bg-gray-50 transition ease-in-out duration-300">
                            <td class="px-6 py-4 border-b border-gray-200 text-center"><img src="<?= $elemento5["imgc"] ?>" alt="Imagen del carrusel" class="w-32 h-32 object-cover mx-auto"></td>
                            <td class="px-6 py-4 border-b border-gray-200 text-center"><a href="e_carrusel.php?id_carrusel=<?=$elemento5['id_carrusel'] ?>" class="text-red-500 hover:text-red-700 transform transition-transform duration-300 hover:scale-110 hover:rotate-45"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Pie de Página -->
<footer class="bg-gray-800 text-white py-6 mt-auto w-full" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
    <div class="container mx-auto text-center px-6">
        <div class="mb-4">
            <img src="img/logo2.png" alt="Logo Rhynos XXL" class="h-16 mx-auto mb-2 transition-transform transform hover:scale-110">
            <p class="text-lg font-bold">Rhynos XXL Gaming</p>
        </div>
        <p class="mb-4 text-sm sm:text-base">Tu socio en marketing digital y crecimiento empresarial.</p>
        <p class="text-xs sm:text-sm">© 2024 Rhynos XXL. Todos los derechos reservados.</p>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  AOS.init({
    duration: 1000, // Duración de la animación en milisegundos
    once: true, // Si quieres que la animación solo suceda una vez
  });
</script>



 <!-- Modal usuario -->
 <div id="mymodalu" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="rounded-3xl transform transition-transform duration-300 scale-75">
        <div class="border-8 border-transparent rounded-xl bg-white dark:bg-gray-900 shadow-xl p-8 m-2">
            <h1 class="text-5xl font-bold text-center dark:text-gray-300 text-gray-900">Insertar nuevo usuario</h1>
            <br><br>
            <form action="i_usuario.php" method="post" class="space-y-6">
                <div class="flex items-center mb-4">
                    <input id="usuario" name="usuario" class="border p-3 shadow-md rounded-lg w-full focus:ring-2 focus:ring-blue-500 transition transform hover:scale-105 duration-300" type="text" placeholder="Usuario" required />
                </div>
                <div class="flex items-center mb-4">
                    <input id="Contrasena" name="contrasena" class="border p-3 shadow-md rounded-lg w-full focus:ring-2 focus:ring-blue-500 transition transform hover:scale-105 duration-300" type="password" placeholder="Contraseña" required />
                </div>
                <div class="flex items-center mb-4">
                    <input id="nombre" name="nombre" class="border p-3 shadow-md rounded-lg w-full focus:ring-2 focus:ring-blue-500 transition transform hover:scale-105 duration-300" type="text" placeholder="Nombre" required />
                </div>
                <button class="w-full p-3 mt-4 text-white bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg hover:scale-105 transition transform duration-300" type="submit">Ingresar</button>
            </form>
            <button id="close-modalu" class="absolute top-2 right-4 text-gray-600 hover:text-gray-900 transition transform hover:scale-105">
                <i class="fas fa-times fa-2x"></i>
            </button>
        </div>
    </div>
</div>

<!-- Modal usuarios movil -->
<div id="mymodalum" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="rounded-3xl transform transition-transform duration-300 scale-75">
        <div class="border-8 border-transparent rounded-xl bg-white dark:bg-gray-900 shadow-xl p-8 m-2">
            <h1 class="text-5xl font-bold text-center dark:text-gray-300 text-gray-900">Insertar nuevo usuario</h1>
            <br><br>
            <form action="i_usuario.php" method="post" class="space-y-6">
                <div class="flex items-center mb-4">
                    <input id="usuario" name="usuario" class="border p-3 shadow-md rounded-lg w-full focus:ring-2 focus:ring-blue-500 transition transform hover:scale-105 duration-300" type="text" placeholder="Usuario" required />
                </div>
                <div class="flex items-center mb-4">
                    <input id="Contrasena" name="contrasena" class="border p-3 shadow-md rounded-lg w-full focus:ring-2 focus:ring-blue-500 transition transform hover:scale-105 duration-300" type="password" placeholder="Contraseña" required />
                </div>
                <div class="flex items-center mb-4">
                    <input id="nombre" name="nombre" class="border p-3 shadow-md rounded-lg w-full focus:ring-2 focus:ring-blue-500 transition transform hover:scale-105 duration-300" type="text" placeholder="Nombre" required />
                </div>
                <button class="w-full p-3 mt-4 text-white bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg hover:scale-105 transition transform duration-300" type="submit">Ingresar</button>
            </form>
            <button id="close-modalum" class="absolute top-2 right-4 text-gray-600 hover:text-gray-900 transition transform hover:scale-105">
                <i class="fas fa-times fa-2x"></i>
            </button>
        </div>
    </div>
</div>

<!-- Modal servicio -->
<div id="mymodals" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="rounded-3xl transform transition-transform duration-300 scale-75">
        <div class="border-8 border-transparent rounded-xl bg-white dark:bg-gray-900 shadow-xl p-8 m-2">
            <h1 class="text-5xl font-bold text-center dark:text-gray-300 text-gray-900">Insertar nuevo servicio</h1>
            <br><br>
            <form action="i_servicio.php" method="post" enctype="multipart/form-data" class="space-y-6">

                <!-- Campo para el nombre del servicio -->
                <div class="flex items-center mb-4">
                    <input id="nombres" name="nombres" class="border p-3 shadow-md rounded-lg w-full focus:ring-2 focus:ring-blue-500 transition transform hover:scale-105 duration-300" type="text" placeholder="Nombre de servicio" required />
                </div>
                
                <!-- Campo para la descripción del servicio -->
                <div class="flex items-center mb-4">
                    <input id="descripcion" name="descripcion" class="border p-3 shadow-md rounded-lg w-full focus:ring-2 focus:ring-blue-500 transition transform hover:scale-105 duration-300" type="text" placeholder="Descripción del servicio" required />
                </div>

                <!-- Campo para la imagen -->
                <div class="flex items-center mb-4">
                    <label class="block text-gray-700 mb-2">Imagen del servicio</label>
                    <div class="flex items-center space-x-4">
                        <!-- Input de tipo file (oculto) -->
                        <input id="imgs" name="imgs" type="file" class="hidden" accept="image/*" required />
                        
                        <!-- Label como botón para seleccionar la imagen -->
                        <label for="imgs" class="cursor-pointer bg-gray-200 p-3 rounded-lg text-center font-semibold text-gray-600 border border-gray-300 hover:bg-gray-300 transition duration-300">
                            Subir imagen
                        </label>
                    
                        <!-- Texto donde se muestra el nombre del archivo -->
                        <span id="file-name" class="text-gray-500 text-sm">No has seleccionado ninguna imagen</span>
                    </div>
                </div>
                
                <!-- Botón para enviar el formulario -->
                <button class="w-full p-3 mt-4 text-white bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg hover:scale-105 transition transform duration-300" type="submit">Subir</button>
            </form>
            
            <!-- Botón para cerrar el modal -->
            <button id="close-modals" class="absolute top-2 right-4 text-gray-600 hover:text-gray-900 transition transform hover:scale-105">
                <i class="fas fa-times fa-2x"></i>
            </button>
        </div>
    </div>
</div>

<script>
    // Mostrar el nombre del archivo y la vista previa de la imagen cuando se selecciona una imagen
    document.getElementById('imgs').addEventListener('change', function(e) {
        const fileName = e.target.files.length > 0 ? e.target.files[0].name : 'No has seleccionado ninguna imagen';
        document.getElementById('file-name').textContent = fileName;
    });
</script>



<!-- Modal servicio movil -->
<div id="mymodalsm" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="rounded-3xl transform transition-transform duration-300 scale-75">
        <div class="border-8 border-transparent rounded-xl bg-white dark:bg-gray-900 shadow-xl p-8 m-2">
            <h1 class="text-5xl font-bold text-center dark:text-gray-300 text-gray-900">Insertar nuevo servicio</h1>
            <br><br>
            <form action="i_servicio.php" method="post" enctype="multipart/form-data" class="space-y-6">

                <!-- Campo para el nombre del servicio -->
                <div class="flex items-center mb-4">
                    <input id="nombres" name="nombres" class="border p-3 shadow-md rounded-lg w-full focus:ring-2 focus:ring-blue-500 transition transform hover:scale-105 duration-300" type="text" placeholder="Nombre de servicio" required />
                </div>
                
                <!-- Campo para la descripción del servicio -->
                <div class="flex items-center mb-4">
                    <input id="descripcion" name="descripcion" class="border p-3 shadow-md rounded-lg w-full focus:ring-2 focus:ring-blue-500 transition transform hover:scale-105 duration-300" type="text" placeholder="Descripción del servicio" required />
                </div>

                <!-- Campo para la imagen -->
                <div class="flex items-center mb-4">
                    <label class="block text-gray-700 mb-2">Imagen del servicio</label>
                    <div class="flex items-center space-x-4">
                        <!-- Input de tipo file (oculto) -->
                        <input id="imgs" name="imgs" type="file" class="hidden" accept="image/*" required />
                        
                        <!-- Label como botón para seleccionar la imagen -->
                        <label for="imgs" class="cursor-pointer bg-gray-200 p-3 rounded-lg text-center font-semibold text-gray-600 border border-gray-300 hover:bg-gray-300 transition duration-300">
                            Subir imagen
                        </label>
                    
                        <!-- Texto donde se muestra el nombre del archivo -->
                        <span id="file-name" class="text-gray-500 text-sm">No has seleccionado ninguna imagen</span>
                    </div>
                </div>
                
                <!-- Botón para enviar el formulario -->
                <button class="w-full p-3 mt-4 text-white bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg hover:scale-105 transition transform duration-300" type="submit">Subir</button>
            </form>
            
            <!-- Botón para cerrar el modal -->
            <button id="close-modalsm" class="absolute top-2 right-4 text-gray-600 hover:text-gray-900 transition transform hover:scale-105">
                <i class="fas fa-times fa-2x"></i>
            </button>
        </div>
    </div>
</div>

<script>
    // Mostrar el nombre del archivo y la vista previa de la imagen cuando se selecciona una imagen
    document.getElementById('imgs').addEventListener('change', function(e) {
        const fileName = e.target.files.length > 0 ? e.target.files[0].name : 'No has seleccionado ninguna imagen';
        document.getElementById('file-name').textContent = fileName;
    });
</script>

<!-- Modal carrusel -->
<div id="mymodalc" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="rounded-3xl transform transition-transform duration-300 scale-75">
        <div class="border-8 border-transparent rounded-xl bg-white dark:bg-gray-900 shadow-xl p-8 m-2">
            <h1 class="text-5xl font-bold text-center dark:text-gray-300 text-gray-900">Insertar nueva imagen del carrusel</h1>
            <br><br>
            <form action="i_carrusel.php" method="post" enctype="multipart/form-data" class="space-y-6">

                <!-- Campo para la imagen -->
                <div class="flex items-center mb-4">
                    <label class="block text-gray-700 mb-2">Imagen del carrusel</label>
                    <div class="flex items-center space-x-4">
                        <!-- Input de tipo file (oculto) -->
                        <input id="imgc" name="imgc" type="file" class="hidden" accept="image/*" required />
                        
                        <!-- Label como botón para seleccionar la imagen -->
                        <label for="imgc" class="cursor-pointer bg-gray-200 p-3 rounded-lg text-center font-semibold text-gray-600 border border-gray-300 hover:bg-gray-300 transition duration-300">
                            Subir imagen
                        </label>
                    
                        <!-- Texto donde se muestra el nombre del archivo -->
                        <span id="file-name1" class="text-gray-500 text-sm">No has seleccionado ninguna imagen</span>
                    </div>
                </div>
                
                <!-- Botón para enviar el formulario -->
                <button class="w-full p-3 mt-4 text-white bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg hover:scale-105 transition transform duration-300" type="submit">Subir</button>
            </form>
            
            <!-- Botón para cerrar el modal -->
            <button id="close-modalc" class="absolute top-2 right-4 text-gray-600 hover:text-gray-900 transition transform hover:scale-105">
                <i class="fas fa-times fa-2x"></i>
            </button>
        </div>
    </div>
</div>

<script>
    // Mostrar el nombre del archivo cuando se selecciona una imagen
    document.getElementById('imgc').addEventListener('change', function(e) {
        const fileName = e.target.files.length > 0 ? e.target.files[0].name : 'No has seleccionado ninguna imagen';
        document.getElementById('file-name1').textContent = fileName;
    });
</script>

<!-- Modal carrusel movil -->
<div id="mymodalm" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="rounded-3xl transform transition-transform duration-300 scale-75">
        <div class="border-8 border-transparent rounded-xl bg-white dark:bg-gray-900 shadow-xl p-8 m-2">
            <h1 class="text-5xl font-bold text-center dark:text-gray-300 text-gray-900">Insertar nueva imagen del carrusel</h1>
            <br><br>
            <!-- El formulario ahora tiene el id "modalForm" para referenciarlo en el script -->
            <form id="mymodalm" action="i_carrusel.php" method="post" enctype="multipart/form-data" class="space-y-6">

                <!-- Campo para la imagen -->
                <div class="flex items-center mb-4">
                    <label class="block text-gray-700 mb-2">Imagen del carrusel</label>
                    <div class="flex items-center space-x-4">
                        <!-- Input de tipo file (oculto) -->
                        <input id="imgc" name="imgc" type="file" class="hidden" accept="image/*" required />
                        
                        <!-- Label como botón para seleccionar la imagen -->
                        <label for="imgc" class="cursor-pointer bg-gray-200 p-3 rounded-lg text-center font-semibold text-gray-600 border border-gray-300 hover:bg-gray-300 transition duration-300">
                            Subir imagen
                        </label>
                    
                        <!-- Texto donde se muestra el nombre del archivo -->
                        <span id="file-name5" class="text-gray-500 text-sm">No has seleccionado ninguna imagen</span>
                    </div>
                </div>
                
                <!-- Botón para enviar el formulario -->
                <button class="w-full p-3 mt-4 text-white bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg hover:scale-105 transition transform duration-300" type="submit">Subir</button>
            </form>
            
            <!-- Botón para cerrar el modal -->
            <button id="close-modalm" class="absolute top-2 right-4 text-gray-600 hover:text-gray-900 transition transform hover:scale-105">
                <i class="fas fa-times fa-2x"></i>
            </button>
        </div>
    </div>
</div>

<script>
    // Mostrar el nombre del archivo cuando se selecciona una imagen
    document.getElementById('imgc').addEventListener('change', function(e) {
        const fileName = e.target.files.length > 0 ? e.target.files[0].name : 'No has seleccionado ninguna imagen';
        document.getElementById('file-name5').textContent = fileName;
    });
</script>

<script>
    const openModalmobilButtonm = document.getElementById('open-modalm');
    const modalmobilm = document.getElementById('mymodalm');
    const closeModalmobilButtonm = document.getElementById('close-modalm');

    // Abrir modal carrusel
    openModalmobilButtonm.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar navegación
        modalmobilm.classList.remove('hidden'); // Mostrar el modal
        setTimeout(() => {
            modalmobilm.firstElementChild.classList.remove('scale-75'); // Aplicar la escala normal
        }, 75); // Pequeño retraso para que la animación funcione
    });

    // Cerrar modal
    closeModalmobilButtonm.addEventListener('click', () => {
        modalmobilm.firstElementChild.classList.add('scale-75'); // Volver a la escala reducida
        setTimeout(() => {
            modalmobilm.classList.add('hidden'); // Ocultar el modal después de la animación
        }, 400); // Tiempo de la animación
    });

    // Cerrar modal al hacer clic fuera
    modalmobilm.addEventListener('click', (e) => {
        if (e.target === modalmobilm) {
            modalmobilm.firstElementChild.classList.add('scale-75'); // Volver a la escala reducida
            setTimeout(() => {
                modalmobilm.classList.add('hidden'); // Ocultar el modal después de la animación
            }, 300); // Tiempo de la animación
        }
    });
</script>


<script>
    const openModalButton = document.getElementById('open-modalu');
    const modal = document.getElementById('mymodalu');
    const closeModalButton = document.getElementById('close-modalu');
    const openModalButtons = document.getElementById('open-modals');
    const modals = document.getElementById('mymodals');
    const closeModalButtons = document.getElementById('close-modals');
    const openModalButtonc = document.getElementById('open-modalc');
    const modalc = document.getElementById('mymodalc');
    const closeModalButtonc = document.getElementById('close-modalc');


    // Abrir modal
    openModalButton.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar navegación
        modal.classList.remove('hidden'); // Mostrar el modal
        setTimeout(() => {
            modal.firstElementChild.classList.remove('scale-75'); // Aplicar la escala normal
        }, 75); // Pequeño retraso para que la animación funcione
    });

    // Cerrar modal
    closeModalButton.addEventListener('click', () => {
        modal.firstElementChild.classList.add('scale-75'); // Volver a la escala reducida
        setTimeout(() => {
            modal.classList.add('hidden'); // Ocultar el modal después de la animación
        }, 400); // Tiempo de la animación
    });

    // Cerrar modal al hacer clic fuera
    modalc.addEventListener('click', (e) => {
        if (e.target === modalc) {
            modalc.firstElementChild.classList.add('scale-75'); // Volver a la escala reducida
            setTimeout(() => {
                modalc.classList.add('hidden'); // Ocultar el modal después de la animación
            }, 300); // Tiempo de la animación
        }
    });

    // Abrir modal servicio 
    openModalButtons.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar navegación
        modals.classList.remove('hidden'); // Mostrar el modal
        setTimeout(() => {
            modals.firstElementChild.classList.remove('scale-75'); // Aplicar la escala normal
        }, 75); // Pequeño retraso para que la animación funcione
    });

    // Cerrar modal
    closeModalButtons.addEventListener('click', () => {
        modals.firstElementChild.classList.add('scale-75'); // Volver a la escala reducida
        setTimeout(() => {
            modals.classList.add('hidden'); // Ocultar el modal después de la animación
        }, 400); // Tiempo de la animación
    });

    // Cerrar modal al hacer clic fuera
    modals.addEventListener('click', (e) => {
        if (e.target === modals) {
            modals.firstElementChild.classList.add('scale-75'); // Volver a la escala reducida
            setTimeout(() => {
                modals.classList.add('hidden'); // Ocultar el modal después de la animación
            }, 300); // Tiempo de la animación
        }
    });

     // Abrir modal carrusel 
     openModalButtonc.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar navegación
        modalc.classList.remove('hidden'); // Mostrar el modal
        setTimeout(() => {
            modalc.firstElementChild.classList.remove('scale-75'); // Aplicar la escala normal
        }, 75); // Pequeño retraso para que la animación funcione
    });

    // Cerrar modal
    closeModalButtonc.addEventListener('click', () => {
        modalc.firstElementChild.classList.add('scale-75'); // Volver a la escala reducida
        setTimeout(() => {
            modalc.classList.add('hidden'); // Ocultar el modal después de la animación
        }, 400); // Tiempo de la animación
    });

    // Cerrar modal al hacer clic fuera
    modalc.addEventListener('click', (e) => {
        if (e.target === modals) {
            modalc.firstElementChild.classList.add('scale-75'); // Volver a la escala reducida
            setTimeout(() => {
                modalc.classList.add('hidden'); // Ocultar el modal después de la animación
            }, 300); // Tiempo de la animación
        }
    });

     // Funcionalidad del menú móvil
    const menuButton = document.getElementById('menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const openModalmobilButton = document.getElementById('open-modalum');
    const modalmobil = document.getElementById('mymodalum');
    const closeModalmobilButton = document.getElementById('close-modalum');
    const openModalmobilButtons = document.getElementById('open-modalsm');
    const modalmobils = document.getElementById('mymodalsm');
    const closeModalmobilButtons = document.getElementById('close-modalsm');

// Abrir o cerrar el menú móvil
    menuButton.addEventListener('click', () => {
    const isHidden = mobileMenu.classList.contains('hidden');

    if (isHidden) {
        // Mostrar el menú y aplicar la animación de apertura
        mobileMenu.classList.remove('hidden'); // Aseguramos que el menú esté visible
        mobileMenu.classList.remove('menu-close'); // Si estaba cerrado, eliminamos la animación de cierre
        mobileMenu.classList.add('menu-open');  // Aplicamos la animación de apertura
    } else {
        // Aplicar la animación de cierre
        mobileMenu.classList.remove('menu-open'); // Quitamos la animación de apertura si estaba activa
        mobileMenu.classList.add('menu-close');  // Aplicamos la animación de cierre
        setTimeout(() => {
            mobileMenu.classList.add('hidden');  // Ocultamos el menú después de la animación
        }, 500); // Esperamos la duración de la animación (500ms)
    }

    // Animación de botón de menú
    menuButton.classList.toggle('scale-105');
    setTimeout(() => {
        menuButton.classList.toggle('scale-100');
    }, 300);
});

 // Abrir modal
 openModalmobilButton.addEventListener('click', (e) => {
    e.preventDefault(); // Evitar navegación
    modal.classList.remove('hidden'); // Mostrar el modal
    setTimeout(() => {
        modal.firstElementChild.classList.remove('scale-75'); // Aplicar la escala normal
    }, 75); // Pequeño retraso para que la animación funcione
});

  // Cerrar modal
  closeModalmobilButton.addEventListener('click', () => {
    modal.firstElementChild.classList.add('scale-75'); // Volver a la escala reducida
    setTimeout(() => {
        modal.classList.add('hidden'); // Ocultar el modal después de la animación
    }, 400); // Tiempo de la animación
});

// Cerrar modal al hacer clic fuera
modalmobil.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.firstElementChild.classList.add('scale-75'); // Volver a la escala reducida
        setTimeout(() => {
            modal.classList.add('hidden'); // Ocultar el modal después de la animación
        }, 300); // Tiempo de la animación
    }
});


 // Abrir modal servicio
 openModalmobilButtons.addEventListener('click', (e) => {
    e.preventDefault(); // Evitar navegación
    modals.classList.remove('hidden'); // Mostrar el modal
    setTimeout(() => {
        modals.firstElementChild.classList.remove('scale-75'); // Aplicar la escala normal
    }, 75); // Pequeño retraso para que la animación funcione
});

  // Cerrar modal
  closeModalmobilButtons.addEventListener('click', () => {
    modals.firstElementChild.classList.add('scale-75'); // Volver a la escala reducida
    setTimeout(() => {
        modals.classList.add('hidden'); // Ocultar el modal después de la animación
    }, 400); // Tiempo de la animación
});

// Cerrar modal al hacer clic fuera
modalmobils.addEventListener('click', (e) => {
    if (e.target === modals) {
        modals.firstElementChild.classList.add('scale-75'); // Volver a la escala reducida
        setTimeout(() => {
            modals.classList.add('hidden'); // Ocultar el modal después de la animación
        }, 300); // Tiempo de la animación
    }
});

</script>
</body>
</html>
