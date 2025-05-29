<?php
session_start();
if (!isset($_SESSION['id_cliente'])) {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLANES - JYS</title>
    <link rel="icon" href="../../IMAGENES/Logotipo_sinsombrapng_Mesa de trabajo 1-02.png">
    <link rel="stylesheet" href="../../libs/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../libs/bootstrap-icons-1.11.3/a/bootstrap-icons.min.css">
    <style>
        body {
            background: linear-gradient(to right, #1CB5E0, #000046);
            color: white;
            padding-top: 60px;
            font-family: 'Segoe UI', sans-serif;
        }

        .card-title {
            color: #017C86;
            font-weight: bold;
        }

        .card-text {
            font-size: 0.95rem;
        }

        .btn-paquete {
            background-color: #017C86;
            color: #fff;
        }

        .btn-paquete:hover {
            background-color: #009CA6;
        }

        .titulo-principal {
            color: #fff;
            text-align: center;
            margin-top: 30px;
            margin-bottom: 20px;
        }

        .carousel-item {
            height: 500px;
            background-color: #fff;
        }

        .carousel-item video,
        .carousel-item img {
            object-fit: cover;
            height: 100%;
            width: 100%;
            border-radius: 15px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #017C86;
            border-radius: 50%;
        }

        .carousel-caption {
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            padding: 10px 20px;
        }

        .footer-jys {
            background-color: #1f1f1f;
            color: #ffffff;
            font-family: 'Georgia', serif;
            padding: 40px 20px 20px 20px;
            border-top: 3px solid #00bcd4;
        }

        .footer-section h5 {
            margin-bottom: 15px;
            font-size: 18px;
        }

        .footer-section p,
        .footer-section a {
            color: #ccc;
            font-size: 14px;
            text-decoration: none;
        }

        .footer-section a:hover {
            color: #00bcd4;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .redes-sociales a {
            color: white;
            font-size: 22px;
            margin-right: 10px;
            transition: color 0.3s ease;
        }

        .redes-sociales a:hover {
            color: #00bcd4;
        }
    </style>
</head>



<body>

        <!-- Botón flotante para regresar -->
    <button onclick="window.history.back()" 
        style="
            position: fixed;
        bottom: 20px;
        left: 20px;
        z-index: 9999;
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 50px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        cursor: pointer;
        transition: all 0.3s ease;
    ">
    ⬅ Volver
    </button>

    <div id="carouselJYS" class="carousel slide container mt-5" data-bs-ride="carousel" interval="3000">
        <div class="carousel-inner rounded-4 shadow">

            <!-- Video-->
            <div class="carousel-item shadow active">
                <video autoplay loop muted playsinline>
                    <source src="../../IMAGENES/video.mp4" type="video/mp4">
                    Tu navegador no soporta el video.
                </video>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Explora con JYS</h5>
                    <p>Tu aventura comienza aquí</p>
                </div>
            </div>

            <!-- GIF -->
            <div class="carousel-item shadow">
                <img src="../../IMAGENES/ejecafetero.jpg" class="d-block w-100" alt="Aventura en movimiento">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Aventura sin límites</h5>
                    <p>Descubre destinos únicos con nosotros</p>
                </div>
            </div>

            <!-- Imagen -->
            <div class="carousel-item shadow">
                <img src="../../IMAGENES/playa_caribena.jpg" class="d-block w-100" alt="Playa paradisíaca">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Playas Caribeñas</h5>
                    <p>Relájate bajo el sol</p>
                </div>
            </div>

            <!-- Imagen -->
            <div class="carousel-item shadow">
                <img src="../../IMAGENES/guatapé.jpeg" class="d-block w-100" alt="Playa paradisíaca">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Explora con JYS</h5>
                    <p>Tu aventura comienza aquí</p>
                </div>
            </div>

        </div>

        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselJYS" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselJYS" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <div class="container">
        <h1 class="titulo-principal">Nuestros Planes individuales</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <!-- Paquete 1 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="../../IMAGENES/playa.jpg" class="card-img-top" alt="Playa Caribeña">
                    <div class="card-body">
                        <h5 class="card-title">Playa Caribeña</h5>
                        <p class="card-text">Disfruta de 5 días y 4 noches en las playas más hermosas del Caribe con
                            todo incluido.</p>
                        <button class="btn btn-paquete w-100">Añadir al Carrito</button>
                    </div>
                </div>
            </div>

            <!-- Paquete 2 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="../../IMAGENES/cafetero.jpg" class="card-img-top" alt="Eje Cafetero">
                    <div class="card-body">
                        <h5 class="card-title">plan individual Eje Cafetero</h5>
                        <p class="card-text">Conoce los paisajes, fincas y cultura del café colombiano. 3 días y 2
                            noches.</p>
                        <button class="btn btn-paquete w-100">Añadir al Carrito</button>
                    </div>
                </div>
            </div>

            <!-- Paquete 3-->
            <!-- <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="../../IMAGENES/aventura.jpg" class="card-img-top" alt="Aventura">
                    <div class="card-body">
                        <h5 class="card-title">Aventura en la Naturaleza</h5>
                        <p class="card-text">Rafting, senderismo, cascadas y más. 4 días de adrenalina en entornos
                            naturales.</p>
                        <button class="btn btn-paquete w-100">Añadir al Carrito</button>
                    </div>
                </div>
            </div> -->

            <!-- Paquete 4 -->
            <!-- <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="../../IMAGENES/cultural.jpg" class="card-img-top" alt="Cultura y Tradición">
                    <div class="card-body">
                        <h5 class="card-title">Cultura y Tradición</h5>
                        <p class="card-text">Sumérgete en la historia y cultura de Colombia. 3 días y 2 noches.</p>
                        <button class="btn btn-paquete w-100">Añadir al Carrito</button>
                    </div>
                </div>

            </div> --> 

            <!-- Paquete 5 -->

            <!-- Agrega más paquetes aquí... -->

        </div>
    </div>

    <!-- Footer corregido -->
    <footer class="footer-jys mt-5">
        <div class="container">
            <div class="row">

                <!-- Contacto -->
                <div class="col-md-4 footer-section mb-4">
                    <h5>JYS PROMOTORES DE VIAJES Y TURISMO</h5>
                    <p><i class="bi bi-geo-alt-fill"></i> Teruel, Huila - Colombia</p>
                    <p><i class="bi bi-envelope-fill"></i> contacto@jysviajes.com</p>
                    <p><i class="bi bi-phone-fill"></i> +57 314 314 4506</p>
                </div>

                <!-- Enlaces -->
                <div class="col-md-4 footer-section mb-4">
                    <h5>Enlaces rápidos</h5>
                    <ul>
                        <li><a href="http://localhost\SIW-TURISMO/vista/general/PaginaPrincipal.php">Inicio</a></li>
                        <li><a href="http://localhost/SIW-TURISMO/vista/general/productos.php">Planes turísticos</a></li>
                        <li><a href="http://localhost/SIW-TURISMO/vista/general/quienes_somos.php">Quiénes somos</a></li>
                        <li><a href="http://localhost/SIW-TURISMO/vista/general/contactanos.php">Contáctanos</a></li>
                    </ul>
                </div>

                <!-- Redes sociales -->
                <div class="col-md-4 footer-section mb-4">
                    <h5>Síguenos</h5>
                    <div class="redes-sociales">
                        <a href="https://wa.me/573143144506" target="_blank"><i class="bi bi-whatsapp"></i></a>
                        <a href="https://www.facebook.com/share/1aEM7MnAdN/" target="_blank"><i
                                class="bi bi-facebook"></i></a>
                        <a href="#" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="#" target="_blank"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom text-center">
                <p>&copy; <span id="year"></span> JYS PROMOTORES DE VIAJES Y TURISMO.<br>Todos los derechos reservados.</p>
                <small>Desarrollado por equipo JJV</small>
                <script>
                document.getElementById("year").textContent = new Date().getFullYear();
                </script>
            </div>
        </div>
    </footer>
    <script src="../../libs/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>