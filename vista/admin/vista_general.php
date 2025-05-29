<?php 
    include('header.php');
?>

<body>
    
    <?php 
    include '../../conexion.php';
  include '../../modelo/usuarios_m.php'; ?>
    <div class="d-flex">

        <?php 
            include('sidebar.php');
        ?>
       
        <!-- Main Content -->
        <div class="flex-grow-1">
            <nav class="navbar navbar-dark">
                <div class="container-fluid">
                    <span class="navbar-brand">Bienvenido, <?php echo $_SESSION['nombre'] ; ?> (<?php echo $_SESSION['rol']; ?>)  : </span>
                    <!-- <a href="#" class="btn btn-outline-light"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a> -->
                </div>
            </nav>
            <div class="main-content">
                <h2 class="mt-4">Resumen general</h2>
                <p>Aquí podrás gestionar toda la información de JYS PROMOTORES DE VIAJES Y TURISMO.</p>

                <!-- Cards resumen -->
                <div class="row g-4">
                    <div class="col-md-4">
                        <a href="http://localhost/SIW-TURISMO/vista/admin/clientes.php">
                        <div class="card shadow border-0">
                            <div class="card-body text-center">
                                <i class="fas fa-users fa-2x text-primary"></i>
                                <h5 class="mt-2">Clientes</h5>
                                <p class="mb-0"><!--135--> registrados</p>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col-md-4">
                        <a href="http://localhost/SIW-TURISMO/vista/admin/paquetes.php">
                        <div class="card shadow border-0">
                            <div class="card-body text-center">
                                <i class="fas fa-suitcase fa-2x text-success"></i>
                                <h5 class="mt-2">Paquetes</h5>
                                <p class="mb-0"><!--135--> disponibles</p>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col-md-4">
                        <a href="http://localhost/SIW-TURISMO/vista/admin/usuarios.php">
                        <div class="card shadow border-0">
                            <div class="card-body text-center">
                                <i class="fas fa-users-cog fa-2x text-warning"></i>
                                <h5 class="mt-2">Usuarios</h5>
                                <p class="mb-0"><!--135--> Usuarios registrados</p>
                            </div>
                        </div>
                        </a>
                       
                    </div>
                </div>

            </div>
        </div>
        
    </div>
    <?php include ('footer.php'); ?>
    

    <script src="../../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>