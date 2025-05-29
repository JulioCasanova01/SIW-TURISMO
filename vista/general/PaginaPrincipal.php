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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Página Principal JYS</title>
  <link href="../../libs/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="../../IMAGENES/Logotipo_sinsombrapng_Mesa de trabajo 1-02.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../libs/bootstrap-icons-1.11.3/a/bootstrap-icons.min.css">
  <link rel="stylesheet" href="style.css">

  <!-- http://localhost\SIW-TURISMO\vista\general\PaginaPrincipal.php -->

  <style>
    .menu-lateral {
      background-color: rgba(255, 255, 255, 0.6);
      border-radius: 10px;
      padding: 20px;
    }

    .btn-cart {
      background-color: #d4a73f;
      border-radius: 30px;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: white;
      margin-bottom: 15px;
    }

    .botones-superiores button {
      background: linear-gradient(to bottom, #fbb03b, #ff9f1a);
      border: none;
      border-radius: 20px;
      width: 100px;
      height: 30px;
      margin: 5px;
      box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }


    .switch-bottom {
      margin-top: 20px;
    }

    .frase-central {
      margin-top: 0px;
      font-style: italic;
      font-size: 18px;
      color: #002147;
    }

    .ayuda {
      position: absolute;
      /* O relative si lo necesitas dentro de un contenedor */
      top: 10px;
      left: 10px;
      /* Cambio importante: de right a left */
      z-index: 1000;
      width: 50px;
      height: 50px;
      cursor: pointer;
      transition: transform 0.3s ease;
    }
  </style>
</head>

<body>
  <a href="http://localhost/SIW-TURISMO/vista/general/contactanos.php">
  <div class="col-auto ayuda">
    <img src="../../IMAGENES/pregunta.png" class="ayuda" alt="Ayuda">
  </div>
  </a>

  <h1 style="font-family:Quintessential; text-align: center;" class="mt-3">JYS Promotores de Viajes y Turismo <br> <span
      class="mt-1" style="font-weight: bold;">RNT: 125482</span>
  </h1>
  <hr>

  <div class="col-auto botones-superiores">
    <button></button>
    <button></button>
    <button></button>
    <button></button>
    <button></button>
  </div>

  <div class="container-fluid py-3">

    <!-- Botón visible solo en móviles -->
    <div class="d-md-none text-center my-3">
      <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#menuMovil"
        style="background-color: #f39200;" aria-expanded="false" aria-controls="menuMovil">
        ☰ Menú
      </button>
    </div>



    <div class="row">
      <!-- Menú lateral -->
      <div class="col-md-3 col-lg-2 mb-4 order-md-1">
        <div id="menuMovil" class="collapse d-md-block">
          <div class="menu-lateral">
            <h6 class="text-center fw-bold">EXPLORA Y ARMA TU CARRITO DE VIAJES</h6>
            <div class="btn-cart">
              <a class="carrito text-center " href="http://localhost/SIW-TURISMO/vista/general/carrito.php"><span>🛒 Carrrito</span></a>
              <!-- <a class="a" href=""><span></span></a> -->
            </div>
            <a class="a" href="http://localhost\SIW-TURISMO/vista/general\productos.php">
              <p>🔘 Productos</p>
            </a>
            <!-- <a class="a" href="">
              <p>❤️ Favoritos</p>
            </a> -->
            <!-- <a class="a" href="">
              <p>⚡ Especiales</p>
            </a> -->
            <hr>
            <!-- <a class="a" href="">
              <p>⚙️ Configuración</p>
            </a> -->
            
            <a class="a" href="../../controlador/clientes_c.php?accion=salir"
              onclick="return confirm('¿Estás seguro de que deseas cerrar sesión?');">
              <p>⏏️ Salir</p>
            </a>
          </div>
        </div>
      </div>

      <div class="col-8 order-2 d-none d-md-flex justify-content-center align-items-center flex-column text-center">
        <picture>
          <img src="../../IMAGENES/Logotipo_sinsombrapng_Mesa de trabajo 1-02.png" alt="LOGO JYS"
            style="width: 75%; max-width: 500px;" class="img-fluid">
        </picture>
        <p class="mt-3 fw-bold">Explora, vive y disfruta... Nosotros nos encargamos del resto.</p>
      </div>
      <!-- <div class="col-1"></div> -->
      <div class="col-12 d-md-none">
        <picture><img style="width: 100%;" class="" src="../../IMAGENES/Logotipo_sinsombrapng_Mesa de trabajo 1-02.png"
            alt="LOGO JYS"></picture>
        <p style="text-align: center;">Explora, vive y disfruta... Nosotros nos encargamos del resto.</p>
      </div>
    </div>
  </div>



  <br><br><br>
  <!-- Botones sociales -->
  <div class="row">
    <div class="col-12">
      <div class="social-buttons text-center">
        <a href="https://wa.me/573143144506" target="_blank">
          <img src="../../IMAGENES/whatsapp.png" alt="WhatsApp">
        </a>
        <a href="https://www.facebook.com/share/1aEM7MnAdN/" target="_blank">
          <img src="../../IMAGENES/facebook.png" alt="Facebook">
        </a>
      </div>
    </div>
  </div>

  </div>

  <?php include('footer.php'); ?>


  <script src="../../libs/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>