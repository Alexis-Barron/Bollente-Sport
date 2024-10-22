<?php

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
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bollente Sport (BS)</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="icon" href="img/logo2.png" type="image/png">

    
    <!--Hoja de stilo-->
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

<body>

<!--Header-->
<header class="bg-white shadow" data-aos="fade-down" data-aos-duration="1000" data-aos-once="true">
    <nav class="container mx-auto flex justify-between items-center p-5">
        <div class="text-2xl font-bold" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
            <img src="img/logo2.png" alt="Rhynos XXL Gaming" class="h-16 transition-transform duration-300 ease-in-out hover:scale-110 hover:shadow-lg"> 
        </div>
        <div class="hidden md:flex space-x-6" data-aos="fade-right" data-aos-duration="1000" data-aos-once="true">
            <a href="index.php" class="text-gray-700 hover:text-blue-500">Inicio</a>
            <a href="#sobre-nosotros" class="text-gray-700 hover:text-blue-500">Sobre Nosotros</a>
            <a href="#nuestros-servicios" class="text-gray-700 hover:text-blue-500">Nuestros Servicios</a>
            <a href="#contacto" class="text-gray-700 hover:text-blue-500">Contacto</a>
            <a href="#comentarios" class="text-gray-700 hover:text-blue-500">Comentarios</a>
            <a href="#" id="open-modal" class="text-gray-700 hover:text-blue-500">Inicio de sesión</a>
        </div>
        <div class="md:hidden" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
            <button id="menu-button" class="focus:outline-none transform transition-transform duration-300 ease-in-out hover:scale-105">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </nav>
    <div id="mobile-menu" class="hidden md:hidden transition-all duration-500 ease-in-out transform scale-y-0 origin-bottom" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
        <div class="flex flex-col bg-white shadow-lg p-4">
            <a href="index.php" class="py-2 text-gray-700 hover:text-blue-500">Inicio</a>
            <a href="#sobre-nosotros" class="py-2 text-gray-700 hover:text-blue-500">Sobre Nosotros</a>
            <a href="#nuestros-servicios" class="py-2 text-gray-700 hover:text-blue-500">Nuestros Servicios</a>
            <a href="#contacto" class="py-2 text-gray-700 hover:text-blue-500">Contacto</a>
            <a href="#comentarios" class="py-2 text-gray-700 hover:text-blue-500">Comentarios</a>
            <a href="#" id="open-modalmobil" class="py-2 text-gray-700 hover:text-blue-500">Inicio de sesión</a>
        </div>
    </div>
</header>

<!--Sobre nosotros-->
<main class="container mx-auto flex flex-col p-5">
        
        <section id="sobre-nosotros" class="bg-gray-100 rounded-lg shadow p-6 mb-8 flex flex-col md:flex-row items-center" data-aos="fade-up">
            <img src="img/logo2.png" alt="Descripción de la imagen" class="w-full md:w-1/2 h-auto rounded-lg mb-4 md:mb-0 md:mr-4 md:order-1" data-aos="fade-right">
            <div class="w-full md:w-1/2 md:order-2" data-aos="fade-left">
                <h2 class="text-2xl font-bold mb-4">Sobre Nosotros</h2>
                <p class="text-gray-700 mb-4">
                    En <strong>Bollente Sport (BS)</strong>, Somos una sociedad que busca Presentar Profesionalmente las diferentes disciplinas deportivas que se practican en Sinaloa, si buscas publicidad de tu negocio contáctanos.
                </p>

                <a href="https://wa.me/526951029477?text=Estoy%20interesado%20en%20el%20servicio." class="inline-block bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-300 ease-in-out transform hover:scale-105" data-aos="fade-up">
                    Contáctanos
                </a>
            </div>
        </section>
</main>

<!--Nuestros servicios-->
<main class="container mx-auto flex flex-col p-5">
        <section id="nuestros-servicios" class="bg-gray-100 rounded-lg shadow p-6 mb-8" data-aos="fade-up">
            <h2 class="text-2xl font-bold mb-6 text-center" data-aos="zoom-in">Nuestros Servicios</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php while ($elemento4 = mysqli_fetch_array($registros4)): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                <img src="<?= $elemento4["imgs"] ?> " alt="Diseño Web" class="w-full h-48 object-cover">

                    <div class="p-4">
                        <h3 class="text-xl font-bold mb-2"><?= $elemento4["nombres"] ?></h3>
                        <p class="text-gray-700"><?= $elemento4["descripcion"] ?></p>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </section>
</main>

<!-- Carrusel -->
<main class="container mx-auto flex flex-col p-5">
    <section class="mb-8" data-aos="fade-up">
        <h2 class="text-2xl font-bold mb-4 text-center">Nuestros Proyectos</h2>

        <!-- Contenedor Swiper responsivo -->
        <div class="swiper mySwiper max-w-[600px] mx-auto px-2 sm:px-4" data-aos="zoom-in">
            <div class="swiper-wrapper">
                <?php while ($elemento5 = mysqli_fetch_array($registros5)): ?>
                    <div class="swiper-slide" data-aos="fade-right">
                        <img src="<?= $elemento5["imgc"] ?>" alt="Proyecto 1" class="w-full h-full object-cover rounded-lg">
                    </div>
                <?php endwhile; ?>
            </div>
            <!-- Paginación -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- AOS JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
        // Inicializar Swiper con efecto cubo
        var swiper = new Swiper(".mySwiper", {
            effect: "cube",  // Efecto cubo
            grabCursor: true,  // Muestra el cursor de agarre
            cubeEffect: {
                slideShadows: true,  // Activa las sombras del slide
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 3000, // Cambia de imagen cada 5 segundos
                disableOnInteraction: false, // No desactiva el autoplay cuando el usuario interactúa
            },
            slidesPerView: 1, // Siempre una imagen por vez
            centeredSlides: true, // Mantiene el carrusel centrado
            loop: true, // Carrusel infinito
        });
    </script>

    <!-- Estilos CSS -->
    <style>
        /* Ajustamos las imágenes para que se ajusten bien en el carrusel */
        .swiper-slide {
            width: 100%; /* Asegura que las imágenes ocupen todo el contenedor */
            height: 100%; /* Asegura que las imágenes tengan la altura correcta */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            width: 100%; /* Ancho 100% del contenedor */
            height: auto; /* Mantiene la proporción de la imagen */
            object-fit: cover; /* Mantiene la proporción sin deformar la imagen */
            border-radius: 15px; /* Bordes redondeados para el efecto */
        }

        /* Asegura que el carrusel se vea bien en todos los tamaños */
        .mySwiper {
            width: 450px; /* Ancho fijo del carrusel */
            height: 350px; /* Altura fija del cubo */
        }

        /* Ajustes responsivos */
        @media (max-width: 1024px) {
            .mySwiper {
                width: 350px; /* Ajusta el ancho para pantallas más pequeñas */
                height: 250px; /* Ajusta la altura para pantallas más pequeñas */
            }
        }

        @media (max-width: 768px) {
            .mySwiper {
                width: 280px; /* Ajusta el ancho para móviles */
                height: 200px; /* Ajusta la altura para móviles */
            }
        }

        /* Alineación de la paginación */
        .swiper-pagination {
            bottom: 20px; /* Coloca la paginación en la parte inferior */
        }
    </style>
    <br><br><br>
</main>


<!-- Testimonios -->
<main class="container mx-auto flex flex-col p-5">

    <section id="comentarios" class="bg-gray-100 rounded-lg shadow p-6 mb-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Comentarios</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php while ($elemento3 = mysqli_fetch_array($registros3)): ?>
                <!-- Card individual para cada testimonio -->
                <div class="bg-white rounded-lg shadow-md p-6 transition-transform duration-300 hover:shadow-lg hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                    <!-- Comentario -->
                    <p class="text-gray-700 italic"><?= $elemento3["mensajet"] ?></p>
                    <!-- Nombre del testimonio -->
                    <h4 class="font-bold mt-2">- <?= $elemento3["nombret"] ?></h4>
                </div>
            <?php endwhile; ?>
        </div>
        <br>

        <!-- Botón para agregar testimonio -->
        <div class="flex justify-center">
            <a href="#" id="open-modal1" class="block text-center bg-blue-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-600 transition duration-300 transform hover:scale-105" data-aos="fade-up" data-aos-delay="200">Agregar un comentario</a>
        </div>
    </section>
</main>

<!-- AOS JS inicialización -->
<script>
  AOS.init({
    duration: 1000, // Duración de la animación en milisegundos
    once: true, // Si quieres que la animación solo suceda una vez
  });
</script>


<!--Contacto-->
<main id="contacto" class="container mx-auto flex flex-col p-5">
    <!-- Sección de Contacto -->
    <section id="contacto" class="bg-gray-100 rounded-lg shadow p-6 mb-8">
        <h2 class="text-2xl font-bold mb-6 text-center" data-aos="fade-up" data-aos-delay="100">Contáctanos</h2>
        
        <!-- Contenedor del formulario de contacto -->
        <div class="flex justify-center items-center">
            <div class="bg-white rounded-lg shadow-md p-6 transition-transform duration-300 hover:shadow-lg hover:scale-105" data-aos="fade-up" data-aos-delay="200" style="max-width: 500px; width: 100%;">
                <!-- Formulario de contacto -->
                <form action="i_contacto.php" method="POST">
                    <div class="mb-4">
                        <input type="text" name="nombre" placeholder="Tu nombre" required="" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">
                    </div>
                    <div class="mb-4">
                        <input type="email" name="correo" placeholder="Tu correo electrónico" required="@"  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">
                    </div>
                    <div class="mb-4">
                        <textarea name="mensaje" rows="4" placeholder="Tu mensaje" required="" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-gray-800 text-white py-2 rounded-lg font-semibold transition-transform transform hover:scale-110 focus:outline-none">Enviar mensaje</button>
                </form>
            </div>
        </div>

        <!-- Información adicional -->
        <div class="text-center mt-6">
            <p class="text-lg font-semibold text-gray-700" data-aos="fade-up" data-aos-delay="300">También puedes encontrarnos en nuestras redes sociales:</p>
            <div class="flex justify-center space-x-4 mt-4" data-aos="fade-up" data-aos-delay="400">
                <a href="https://wa.me/1234567890" target="_blank" class="text-gray-700 transition-transform transform hover:scale-110">
                    <i class="fab fa-whatsapp fa-2x"></i>
                </a>
                <a href="https://facebook.com/tu_pagina" target="_blank" class="text-gray-700 transition-transform transform hover:scale-110">
                    <i class="fab fa-facebook fa-2x"></i>
                </a>
                <a href="https://instagram.com/tu_pagina" target="_blank" class="text-gray-700 transition-transform transform hover:scale-110">
                    <i class="fab fa-instagram fa-2x"></i>
                </a>
            </div>
        </div>
    </section>
</main>

<!-- AOS JS inicialización -->
<script>
  AOS.init({
    duration: 1000, // Duración de la animación en milisegundos
    once: true, // Si quieres que la animación solo suceda una vez
  });
</script>


   <!-- Pie de Página -->
<footer class="bg-gray-800 text-white py-6 mt-auto w-full" data-aos="fade-up">
    <div  class="container mx-auto text-center px-6">
        <!-- Logo y Texto Principal -->
        <div class="mb-4">
            <!-- Logo ajustable según el tamaño -->
            <img src="img/logo2.png" alt="Logo Rhynos XXL" class="h-16 mx-auto mb-2 transition-transform transform hover:scale-110">
            <p class="text-lg font-bold">Bollente Sport (BS)</p>
        </div>
        <p class="mb-4 text-sm sm:text-base">Tu socio en publicidad y marketing.</p>
        <p class="text-xs sm:text-sm">© 2024 Bollente Sport (BS). Todos los derechos reservados.</p>
    </div>
</footer>




 <!-- Modal inicio de sesion-->
<div id="mymodal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="rounded-3xl transform transition-transform duration-300 scale-75">
        <div class="border-8 border-transparent rounded-xl bg-white dark:bg-gray-900 shadow-xl p-8 m-2">
            <h1 class="text-5xl font-bold text-center dark:text-gray-300 text-gray-900">Inicio de sesión</h1>
            <br><br>
            <form action="inicio.php" method="post" class="space-y-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-user fa-2x text-black mr-3 transition transform hover:scale-105 duration-300"></i>
                    <input id="usuario" name="usuario" class="border p-3 shadow-md rounded-lg w-full focus:ring-2 focus:ring-blue-500 transition transform hover:scale-105 duration-300" type="text" placeholder="Usuario" required />
                </div>
                <div class="flex items-center mb-4">
                    <i class="fas fa-lock fa-2x text-black mr-3 transition transform hover:scale-105 duration-300"></i>
                    <input id="Contrasena" name="contrasena" class="border p-3 shadow-md rounded-lg w-full focus:ring-2 focus:ring-blue-500 transition transform hover:scale-105 duration-300" type="password" placeholder="Contraseña" required />
                </div>
                <button class="w-full p-3 mt-4 text-white bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg hover:scale-105 transition transform duration-300" type="submit">Ingresar</button>
            </form>
            <button id="close-modal" class="absolute top-2 right-4 text-gray-600 hover:text-gray-900 transition transform hover:scale-105">
                <i class="fas fa-times fa-2x"></i>
            </button>
        </div>
    </div>
</div>

<!-- Modal inicio de secion movil -->
<div id="mymodalmobil" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="rounded-3xl transform transition-transform duration-300 scale-75">
        <div class="border-8 border-transparent rounded-xl bg-white dark:bg-gray-900 shadow-xl p-8 m-2">
            <h1 class="text-5xl font-bold text-center dark:text-gray-300 text-gray-900">Inicio de sesión</h1>
            <br><br>
            <form action="inicio.php" method="post" class="space-y-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-user fa-2x text-black mr-3 transition transform hover:scale-105 duration-300"></i>
                    <input id="usuario" name="usuario" class="border p-3 shadow-md rounded-lg w-full focus:ring-2 focus:ring-blue-500 transition transform hover:scale-105 duration-300" type="text" placeholder="Usuario" required />
                </div>
                <div class="flex items-center mb-4">
                    <i class="fas fa-lock fa-2x text-black mr-3 transition transform hover:scale-105 duration-300"></i>
                    <input id="Contrasena" name="contrasena" class="border p-3 shadow-md rounded-lg w-full focus:ring-2 focus:ring-blue-500 transition transform hover:scale-105 duration-300" type="password" placeholder="Contraseña" required />
                </div>
                <button class="w-full p-3 mt-4 text-white bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg hover:scale-105 transition transform duration-300" type="submit">Ingresar</button>
            </form>
            <button id="close-modalmobil" class="absolute top-2 right-4 text-gray-600 hover:text-gray-900 transition transform hover:scale-105">
                <i class="fas fa-times fa-2x"></i>
            </button>
        </div>
    </div>
</div>

<!-- Modal comentario -->
<div id="mymodal1" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="rounded-3xl transform transition-transform duration-300 scale-75">
        <div class="border-8 border-transparent rounded-xl bg-white dark:bg-gray-900 shadow-xl p-8 m-2">
            <h1 class="text-5xl font-bold text-center dark:text-gray-300 text-gray-900">Agregar comentario</h1>
            <br><br>
            <form action="i_comentario.php" method="post" class="space-y-6">
                <div class="flex items-center mb-4">
                    <input id="nombret" name="nombret" class="border p-3 shadow-md rounded-lg w-full focus:ring-2 focus:ring-blue-500 transition transform hover:scale-105 duration-300" type="text" placeholder="Tu nombre" required />
                </div>
                <div class="flex items-center mb-4">
                    <input id="mensajet" name="mensajet" class="border p-3 shadow-md rounded-lg w-full focus:ring-2 focus:ring-blue-500 transition transform hover:scale-105 duration-300" type="text" placeholder="Agregue su comentario" required />
                </div>
                <button class="w-full p-3 mt-4 text-white bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg hover:scale-105 transition transform duration-300" type="submit">Ingresar</button>
            </form>
            <button id="close-modal1" class="absolute top-2 right-4 text-gray-600 hover:text-gray-900 transition transform hover:scale-105">
                <i class="fas fa-times fa-2x"></i>
            </button>
        </div>
    </div>
</div>

<!--Java script-->
<script>
    const openModalButton = document.getElementById('open-modal');
    const modal = document.getElementById('mymodal');
    const closeModalButton = document.getElementById('close-modal');
    const openModalButton1 = document.getElementById('open-modal1');
    const modal1 = document.getElementById('mymodal1');
    const closeModalButton1 = document.getElementById('close-modal1');
    
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
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.firstElementChild.classList.add('scale-75'); // Volver a la escala reducida
            setTimeout(() => {
                modal.classList.add('hidden'); // Ocultar el modal después de la animación
            }, 300); // Tiempo de la animación
        }
    });

    // Abrir modal
    openModalButton1.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar navegación
        modal1.classList.remove('hidden'); // Mostrar el modal
        setTimeout(() => {
            modal1.firstElementChild.classList.remove('scale-75'); // Aplicar la escala normal
        }, 75); // Pequeño retraso para que la animación funcione
    });

    // Cerrar modal
    closeModalButton1.addEventListener('click', () => {
        modal1.firstElementChild.classList.add('scale-75'); // Volver a la escala reducida
        setTimeout(() => {
            modal1.classList.add('hidden'); // Ocultar el modal después de la animación
        }, 400); // Tiempo de la animación
    });

    // Cerrar modal al hacer clic fuera
    modal1.addEventListener('click', (e) => {
        if (e.target === modal1) {
            modal1.firstElementChild.classList.add('scale-75'); // Volver a la escala reducida
            setTimeout(() => {
                modal1.classList.add('hidden'); // Ocultar el modal después de la animación
            }, 300); // Tiempo de la animación
        }
    });


   // Funcionalidad del menú móvil
    const menuButton = document.getElementById('menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const openModalmobilButton = document.getElementById('open-modalmobil');
    const modalmobil = document.getElementById('mymodalmobil');
    const closeModalmobilButton = document.getElementById('close-modalmobil');

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

</script>

</body>
</html>
