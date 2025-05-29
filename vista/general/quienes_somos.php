<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiénes_Somos</title>
    <link rel="stylesheet" href="../../libs/bootstrap-5.3.3-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../../libs/bootstrap-icons-1.11.3/a/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../libs/boxicons-2.1.4/css/boxicons.min.css">
    <link rel="icon" href="../../IMAGENES/Logotipo_sinsombrapng_Mesa de trabajo 1-02.png">
    <link rel="stylesheet" href="../../libs/flag-icons-main/css/flag-icons.min.css">
</head>
<body>
    
  <style>
    body {
      background: -webkit-linear-gradient(to right, #1CB5E0, #000046);
      background: linear-gradient(to right, #1CB5E0, #000046);
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
    }

    .container.contenido {
      max-width: 1000px;
      margin: 60px auto;
      background-color: rgba(255, 255, 255, 0.1);
      padding: 50px;
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      color: #fff;
    }

    h1 {
      text-align: center;
      color: #ffffff;
      margin-bottom: 30px;
    }

    p {
      font-size: 18px;
      line-height: 1.8;
      margin-bottom: 20px;
      color: #f1f1f1;
    }

    .highlight {
      color:rgb(0, 94, 255);
      font-weight: bold;
    }

    /* Footer */
    .footer-jys {
      background-color: #1f1f1f;
      color: #ffffff;
      font-family: 'Georgia', serif;
      padding: 0; /* Quitamos el padding general */
    }

    .footer-jys .container {
      padding: 0; /* Quitamos el padding interno del container del footer */
    }

    .footer-section {
      padding: 30px;
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
      padding-left: 0;
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

    .footer-bottom {
      background-color: #1f1f1f;
      padding: 15px;
      font-size: 13px;
    }
    .col-8{
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <div class="row justify-content-center align-items-center text-center">
    <!-- Versión para pantallas medianas en adelante -->
     <div class="col-1"></div>
    <div class="col-8 d-none d-md-flex flex-column justify-content-center align-items-center">
        <picture>
            <img src="../../IMAGENES/Logotipo_sinsombrapng_Mesa de trabajo 1-02.png" alt="LOGO JYS"
                style="width: 75%; max-width: 500px;" class="img-fluid">
        </picture>
        
    </div>

    <!-- Versión para móviles -->
    <div class="col-12 d-md-none d-flex flex-column justify-content-center align-items-center text-center">
        <picture>
            <img src="../../IMAGENES/Logotipo_sinsombrapng_Mesa de trabajo 1-02.png" alt="LOGO JYS" style="width: 100%;"
                class="img-fluid">
        </picture>
    </div>
</div>

  <!-- Sección de contenido -->
  <div class="container contenido">
    <h1>¿Quiénes somos?</h1>
    <p>
      En <span class="highlight">JYS PROMOTORES</span> somos más que una agencia de viajes:
      somos creadores de experiencias inolvidables. Desde hace más de 19 AÑOS, ayudamos a nuestros viajeros
      a descubrir destinos únicos, conectar con nuevas culturas y vivir aventuras que dejan huella.
    </p>
    <p>
      Nuestro equipo está conformado por apasionados del turismo, profesionales con amplia experiencia
      en planificación de viajes y atención personalizada. Nos encanta diseñar rutas a medida,
      recomendando cada detalle con el cariño y la dedicación que cada viaje merece.
    </p>
    <p>
      Ya sea que busques unas vacaciones relajantes, una escapada romántica, un viaje familiar o una aventura extrema,
      en <span class="highlight">JYS PROMOTORES</span> tenemos la experiencia, la pasión y las herramientas
      para hacer realidad ese viaje que tanto sueñas.
    </p>
    <p style="text-align: center; font-style: italic; color: #dcdcdc;">
      Viajar es vivir, y nosotros estamos aquí para acompañarte en cada paso del camino.
    </p>
  </div>
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

  <!-- Footer -->
  <footer class="footer-jys mt-5">
    <div class="container">
      <div class="row">

        <!-- Contacto -->
        <div class="col-md-4 footer-section">
          <h5>JYS PROMOTORES DE VIAJES Y TURISMO</h5>
          <p><i class="bi bi-geo-alt-fill"></i> Teruel, Huila - Colombia</p>
          <p><i class="bi bi-envelope-fill"></i> contacto@jysviajes.com</p>
          <p><i class="bi bi-phone-fill"></i> +57 314 314 4506</p>
        </div>

        <!-- Enlaces -->
        <div class="col-md-4 footer-section">
          <!-- <h5>Enlaces rápidos</h5> -->
          <ul>
            <!-- <li><a href="http://localhost/SIW-TURISMO/PaginaPrincipal.php">Inicio</a></li> -->
            <!-- <li><a href="http://localhost/SIW-TURISMO/quienes_somos.html">Quiénes somos</a></li> -->
            <!-- <li><a href="http://localhost/SIW-TURISMO/contactanos.html">Contáctanos</a></li> -->
          </ul>
        </div>

        <!-- Redes sociales -->
        <div class="col-md-4 footer-section">
          <h5>Síguenos</h5>
          <div class="redes-sociales">
            <a href="https://wa.me/573143144506" target="_blank"><i class="bi bi-whatsapp"></i></a>
            <a href="https://www.facebook.com/share/1aEM7MnAdN/" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="#" target="_blank"><i class="bi bi-instagram"></i></a>
            <a href="#" target="_blank"><i class="bi bi-youtube"></i></a>
          </div>
        </div>

      </div>


      <div class="text-center footer-bottom">
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