<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>sidebar</title>
    <!-- Font Awesome CDN para que funcionen los iconos -->
    <link
      href="../../libs/bootstrap-5.3.3-dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link href="../../libs/fontawesome-free-6.7.2-web/css/all.min.css" />
    <!-- Aquí puedes agregar tus estilos CSS o enlaces a Bootstrap si usas -->
     <style>
    /* .sidebar {
        height: 100vh; 
        overflow-y: auto; 
        background-color: #00354D; 
    } */
</style>

</head>

<body>

    <div class="sidebar p-3 text-center d-flex flex-column flex-shrink-0 text-white overflow-auto vh-100">
        <!-- Sidebar -->
        <nav style="min-width: 250px;">
            <!-- Logo -->
            <img src="../../IMAGENES/Logotipo_sinsombrapng_Mesa de trabajo 1-02.png" alt="Logo SIW-TURISMO"
                class="img-fluid mb-3 mx-auto d-block" style="max-height: 80px;" />

            <!-- Título -->
            <h4 class="mb-4">SIW-TURISMO</h4>

            <!-- Menú navegación -->
            <ul class="nav nav-pills flex-column text-start">
                <li class="nav-item">
                    <a href="http://localhost/SIW-TURISMO/vista/admin/vista_general.php" class="nav-link i-vista_general text-white">
                        <i class="fas fa-chart-line me-2"></i>ADMINISTRAR
                    </a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/SIW-TURISMO/vista/admin/paquetes.php" class="nav-link i-paquetes text-white">
                        <i class="fas fa-suitcase-rolling me-2"></i>Paquetes Turísticos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/SIW-TURISMO/vista/admin/planes.php" class="nav-link i-planes text-white">
                        <i class="fas fa-user me-2"></i>Planes Individuales
                    </a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/SIW-TURISMO/vista/admin/tours.php" class="nav-link i-tours text-white">
                        <i class="fas fa-map-marked-alt me-2"></i>Tours
                    </a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/SIW-TURISMO/vista/admin/usuarios.php" class="nav-link i-usuarios text-white">
                        <i class="fas fa-users-cog me-2"></i>Usuarios
                    </a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/SIW-TURISMO/vista/admin/clientes.php" class="nav-link i-clientes text-white">
                        <i class="fas fa-id-card me-2"></i>Clientes
                    </a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/SIW-TURISMO/vista/admin/circulo_viajero.php" class="nav-link i-circulo_viajero text-white">
                        <i class="fas fa-globe me-2"></i>Círculo Viajero
                    </a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/SIW-TURISMO/vista/admin/atencion_cliente.php" class="nav-link i-atencion_cliente text-white">
                        <i class="fas fa-comments me-2"></i>Atención al Cliente
                    </a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/SIW-TURISMO/vista/admin/productos_vendidos.php" class="nav-link i-productos_vendidos text-white">
                        <i class="fas fa-file-invoice-dollar me-2"></i>Productos Vendidos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/SIW-TURISMO/vista/admin/categorias.php" class="nav-link i-categorias text-white">
                        <i class="fas fa-car me-2"></i>Categorías
                    </a>
                </li>

                <hr />

                <li class="nav-item">
                    <a href="../../controlador/usuarios_c.php?accion=salir" class="nav-link i10 text-white" onclick="return confirmarSalida();">
                        <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    

    <script>
        function confirmarSalida() {
            return confirm('¿Estás seguro de que deseas cerrar sesión?');
        }
    </script>
</body>

</html>
