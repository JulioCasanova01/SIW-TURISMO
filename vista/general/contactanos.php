
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTÁCTANOS</title>
    <link rel="stylesheet" href="../../libs/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../libs/bootstrap-icons-1.11.3/a/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../libs/boxicons-2.1.4/css/boxicons.min.css">
    <link rel="icon" href="../../IMAGENES/Logotipo_sinsombrapng_Mesa de trabajo 1-02.png">
    <link rel="stylesheet" href="../../libs/flag-icons-main/css/flag-icons.min.css">
</head>
<body>
   
  <style>
    body {
      background: linear-gradient(to right, #1CB5E0, #000046);
      font-family: 'Segoe UI', sans-serif;
      color: #fff;
    }

    .contact-section {
      max-width: 800px;
      margin: 50px auto;
      background-color: rgba(255, 255, 255, 0.1);
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }

    .form-label {
      color: black;
    }

    .form-control,
    .form-select {
      background-color: rgba(255, 255, 255, 0.9);
    }

    .btn-custom {
      background-color: #00bcd4;
      border: none;
    }

    .btn-custom:hover {
      background-color: #0199aa;
    }

    .contact-info i {
      font-size: 1.2rem;
      margin-right: 10px;
      color: #00bcd4;
    }
  </style>
</head>

<body>
    <script src="../../libs/SweetAlert2/sweetalert2.all.min.js"></script>
    <script src="../alertas/funcionesalert.js"></script>

     <!-- Botón flotante para regresar -->
     <button onclick="window.location.href='index.php'"
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

  <!-- LOGO centrado arriba -->
<div class="row justify-content-center align-items-center text-center mb-4">
    <!-- Espaciado lateral en pantallas grandes -->
    <div class="col-1"></div>
  
    <!-- Versión para pantallas medianas en adelante -->
    <div class="col-8 d-none d-md-flex flex-column justify-content-center align-items-center">
      <picture>
        <img src="../../IMAGENES/Logotipo_sinsombrapng_Mesa de trabajo 1-02.png" alt="LOGO JYS"
             style="width: 75%; max-width: 500px;" class="img-fluid">
      </picture>
    </div>
  
    <!-- Versión para móviles -->
    <div class="col-12 d-md-none d-flex flex-column justify-content-center align-items-center text-center">
      <picture>
        <img src="../../IMAGENES/Logotipo_sinsombrapng_Mesa de trabajo 1-02.png" alt="LOGO JYS"
             style="width: 100%;" class="img-fluid">
      </picture>
    </div>
  </div>
  
  <section class="contact-section py-5">
    <h2 class="text-center mb-4">Contáctanos</h2>
  
    <div class="container">
      <div class="row">
        <!-- Formulario -->
        <div class="col-md-6 mb-4">
          <div class="card p-4 shadow-sm border-0">
            <form action="../../controlador/atenciones_c.php?accion=registrar" method="POST" autocomplete="on">
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre completo</label>
                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Tu nombre completo" required>
              </div>
              <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" name="correo" class="form-control" id="correo" placeholder="tunombre@correo.com" required>
              </div>
              <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" name="telefono" class="form-control" id="telefono" placeholder="3XX XXX XXXX" required>
              </div>
              <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje</label>
                <textarea class="form-control" name="mensaje" id="mensaje" rows="4" placeholder="Escribe tu mensaje aquí..." required></textarea>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary px-4" >Enviar mensaje</button>
              </div>
            </form>
          </div>
        </div>
  
        <!-- Mapa -->
        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center mb-4">
          <h5 class="text-center mb-3">Nuestra ubicación</h5>
          <div class="shadow-sm" style="width: 100%; height: 250px; border-radius: 10px; overflow: hidden;">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15902.507462969106!2d-75.58234426659398!3d2.195792836457243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e246ce408a8cb27%3A0x6c4c5158d229a7b9!2sTeruel%2C%20Huila!5e0!3m2!1ses!2sco!4v1712953951950!5m2!1ses!2sco"
              width="80%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>
      </div>
  
      <!-- Info de contacto debajo -->
      <div class="text-center mt-4 contact-info">
        <p><i class="bi bi-geo-alt-fill"></i> Teruel, Huila - Colombia</p>
        <p><i class="bi bi-envelope-fill"></i> contacto@jysviajes.com</p>
        <p><i class="bi bi-phone-fill"></i> +57 314 314 4506</p>
      </div>
    </div>
  </section>
  
  
 
  <script src="../../libs/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>