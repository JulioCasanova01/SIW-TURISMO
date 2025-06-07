<?php 
    include('header.php');
?>
<style>
    .table-responsive {
    overflow-x: auto;
    max-width: 100%;
  }

  .main-content {
    padding: 1rem;
  }

    th, td {
        overflow-wrap: break-word;
        min-width: 120px;
        text-align: left;
        vertical-align: middle;
    }


  @media (max-width: 576px) {
    .main-content h2 {
      font-size: 1.4rem;
    }

    .table-responsive {
      font-size: 0.9rem;
    }

    .btn {
      font-size: 0.85rem;
    }
  }

  .descripcion-scroll {
        max-height: 80px;       /* Alto máximo antes de hacer scroll vertical */
        max-width: 250px;       /* Ancho máximo antes de hacer scroll horizontal */
        overflow: auto;
        white-space: pre-wrap;  /* Mantiene saltos de línea */
    }
    

</style>
<body>
    <?php 
        include '../../conexion.php';
        include '../../modelo/atenciones_m.php';
        $atenciones = obtenerAtenciones($conn);
    ?>

    <div class="d-flex flex-column flex-lg-row">

        <?php include ('sidebar.php'); ?>

        <!-- Contenido principal -->
        <div class="flex-grow-1">
            <nav class="navbar navbar-dark">
                <div class="container-fluid">
                    
                    <span class="navbar-brand">Gestión de Atención Al Cliente</span>
                    <!-- <a href="#" class="btn btn-outline-light"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a> -->
                </div>
            </nav>

            <div class="main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 mt-4">Atención</h2>
                   
                </div>

                <!-- Tabla -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center"><i class="fas fa-id-badge"></i> ID</th>
                                <th class="text-center"><i class="fas fa-user"></i> Nombre Completo</th>
                                <th class="text-center"><i class="fas fa-envelope"></i> Correro</th>
                                <th class="text-center"><i class="fas fa-mobile-alt"></i> Telefono</th>
                                <th class="text-center"><i class="fas fa-comment-alt"></i> Mensaje</th>
                                <th class="text-center"><i class="fas fa-calendar-alt"></i> Fecha</th>
                                <th class="text-center"><i class="fas fa-hourglass-half"></i> Estado</th>
                                <th class="text-center"><i class="fas fa-cogs"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($atenciones as $atencion): ?>
                                <tr>
                                    <td><?= $atencion['id'] ?></td>
                                    <td><?= $atencion['nombre'] ?></td>
                                    <td><?= $atencion['correo'] ?></td>
                                    <td>
                                    <a href="https://wa.me/57<?= preg_replace('/\D/', '', $atencion['telefono']) ?>" target="_blank">
                                        <?= $atencion['telefono'] ?>
                                    </a>
                                    </td>

                                   <td>
                                        <div class="overflow-auto" style="max-height: 100px; max-width: 100%; text-align: left; overflow-wrap: break-word;">
                                            <?= htmlspecialchars($atencion['mensaje']) ?>
                                        </div>
                                    </td>

                                    <td><?= $atencion['fecha'] ?></td>

                                    <td style="<?= $atencion['estado']=='RE' ? 'background-color:#28a745;color:#fff;padding:5px;border-radius:4px;text-align:center;' : ($atencion['estado']=='PE' ? 'background-color:#dc3545;color:#fff;padding:5px;border-radius:4px;text-align:center;' : '') ?>">
                                        <?= htmlspecialchars($atencion['estado']) ?>
                                    </td>


                                    
                                    <td>
                                    <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal"
                                        data-bs-target="#modalEditar<?= $atencion['id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" 
                                        onclick="eliminar(event, <?= $atencion['id'] ?>)"><i class="fas fa-trash-alt"></i>
                                    </button>
                                    </td>
                                </tr>
                                
                                <!--Modal editar Atencion -->
                                <div class="modal fade" id="modalEditar<?= $atencion['id'] ?>" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title">Editar Atención</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="../../controlador/atenciones_c.php?accion=actualizar" method="POST">
                                                    <input type="hidden" name="id" value="<?= $atencion['id'] ?>" />
                                                    
                                                    <div class="mb-3">
                                                    <label class="form-label">Estado</label>
                                                    <select class="form-select" name="estado">
                                                        <option value="PE" <?= $atencion['estado'] == 'PE' ? 'selected' : '' ?>>PENDIENTE</option>
                                                        <option value="RE" <?= $atencion['estado'] == 'RE' ? 'selected' : '' ?>>RESUELTA</option>
                                                        
                                                    </select>
                                                    </div>
                                                
                                                    <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <?php include ('footer.php'); ?>
    <script>
        async function eliminar(event, id) {
            event.preventDefault();
            const confirmarSalida = await confirmar(
                '¿Estás seguro de que deseas eliminar esta ATENCIÓN?',
                'SÍ', 'No', 'warning'
            );

            if (confirmarSalida) {
                window.location.href = `../../controlador/atenciones_c.php?accion=eliminar&id=${id}`;
            }
        }
    </script>

    <script src="../../libs/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>