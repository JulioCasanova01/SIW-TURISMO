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
    <title>Productos JYS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../IMAGENES/Logotipo_sinsombrapng_Mesa de trabajo 1-02.png">

    <!-- Bootstrap CSS -->
    <link href="../../libs/bootstrap-5.3.3-dist/css/bootstrap-grid.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="../../libs/bootstrap-icons-1.11.3/a/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../libs/fontawesome-free-6.7.2-web/css/all.min.css">

    <style>
        body {
            background: linear-gradient(to right, #1CB5E0, #000046);
            color: white;
            padding-top: 60px;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            border-radius: 20px;
            background-color: #fff;
            color: black;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-icon {
            font-size: 3rem;
            color: #017C86;
        }

        .card-body h5 {
            font-weight: bold;
        }

        .btn-custom {
            background-color: #017C86;
            color: white;
        }

        .btn-custom:hover {
            background-color: #009CA6;
            color: white;
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

        /* .footer-bottom {
            text-align: center;
            margin-top: 30px;
            border-top: 1px solid #333;
            padding-top: 20px;
            font-size: 13px;
            color: #aaa;
        } */

        /* .frase-central {
            margin-top: 0px;
            font-style: italic;
            font-size: 18px;
            color: #002147;
        } */
         .a{
            text-decoration: none;
            color: #fff;
            font-weight: bold;
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

   
    <div class="row justify-content-center align-items-center text-center">
        <!-- Versión para pantallas medianas en adelante -->
         <div class="col-1"></div>
        <div class="col-8 d-none d-md-flex flex-column justify-content-center align-items-center">
            <picture>
                <img src="../../IMAGENES/Logotipo_sinsombrapng_Mesa de trabajo 1-02.png" alt="LOGO JYS"
                    style="width: 75%; max-width: 500px;" class="img-fluid">
            </picture>
            
        </div>
        <p class="mt-3 fw-bold col-8 d-none d-md-flex flex-column justify-content-center align-items-center">Explora, vive y disfruta... Nosotros nos encargamos del resto.</p>

        <!-- Versión para móviles -->
        <div class="col-12 d-md-none d-flex flex-column justify-content-center align-items-center text-center">
            <picture>
                <img src="../../IMAGENES/Logotipo_sinsombrapng_Mesa de trabajo 1-02.png" alt="LOGO JYS" style="width: 100%;"
                    class="img-fluid">
            </picture>
            <p class="mt-3 fw-bold">Explora, vive y disfruta... Nosotros nos encargamos del resto.</p>
        </div>
    </div>



    <div class="container">
        <!-- foreach -->
        <h1 class="text-center mb-5">Nuestros Productos</h1>
        <div class="row g-4">

            <!-- Paquetes turísticos -->
            <div class="col-md-6 col-lg-4">
                <div class="card text-center p-3">
                    <div class="card-icon mb-2">
                        <i class="fas fa-suitcase-rolling"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Paquetes turísticos</h5>
                        <p class="card-text">Explora destinos increíbles con todo incluido.</p>
                        <a href="http://localhost\SIW-TURISMO\vista/general/paquetes.php" class=" a btn btn-custom">Ver paquetes</a>
                    </div>
                </div>
            </div>

            <!-- Planes sencillos -->
            <div class="col-md-6 col-lg-4">
                <div class="card text-center p-3">
                    <div class="card-icon mb-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Planes individuales</h5>
                        <p class="card-text">Arma tu viaje con transporte, guía o actividad.</p>
                        <a href="http://localhost\SIW-TURISMO\vista/general/Planes.php" class="a btn btn-custom">Ver planes</a>
                    </div>
                </div>
            </div>

            <!-- Tours -->
            <div class="col-md-6 col-lg-4">
                <div class="card text-center p-3">
                    <div class="card-icon mb-2">
                        <i class='fas fa-bus-alt'></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Tours</h5>
                        <p class="card-text">Recorre lugares maravillosos con guías expertos.</p>
                        <a href="http://localhost\SIW-TURISMO\vista/general/Tours.php" class="a btn btn-custom">Ver tours</a>
                    </div>
                </div>
            </div>

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
                        <li><a href="http://localhost\SIW-TURISMO\vista/general/PaginaPrincipal.php">Inicio</a></li>
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

            <div class="text-center footer-bottom ">
                <p>&copy; <span id="year"></span> JYS PROMOTORES DE VIAJES Y TURISMO.<br>Todos los derechos reservados.</p>
                <small>Desarrollado por equipo JJV</small>
                <script>
                document.getElementById("year").textContent = new Date().getFullYear();
                </script>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="../../libs/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>