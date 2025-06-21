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
        include '../../modelo/pedidos_m.php';
        $pedidos = obtenerPedidos($conn);
  ?>

  <div class="d-flex flex-column flex-lg-row">

    <?php include ('sidebar.php'); ?>

    <!-- Contenido principal -->
    <div class="flex-grow-1">
      <nav class="navbar navbar-dark">
        <div class="container-fluid">
          <span class="navbar-brand">Gestión de Pedidos</span>
          <!-- <a href="#" class="btn btn-outline-light"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a> -->
           <div class="dataTables_filter">
              <input type="search" id="buscar" class="form-control form-control-sm" placeholder="Buscar...">

            </div>
        </div>
      </nav>

      <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="mb-0 mt-4">PEDIDOS ONLINE</h2>
          
        </div>

        <!-- Tabla -->
        <div class="table-responsive">
          <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
              <tr>
              <th><i class="fas fa-id-badge"></i> ID</th>
              <th><i class="fas fa-user"></i> Cliente</th>
              <th><i class="fas fa-calendar-alt"></i> Fecha</th>
              <th><i class="fas fa-dollar-sign"></i> Total</th>
              <th><i class="fas fa-store"></i> Detalles</th>
              <th><i class="fas fa-circle-notch"></i> Estado</th>
                <th><i class="fas fa-cogs"></i> Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pedidos as $pedido): ?>

                <tr>
                  <td><?= $pedido['id'] ?></td>
                  <td><?= $pedido['id_cliente'] ?></td>
                  <td><?= $pedido['fecha'] ?></td>
                  <td>$<?= number_format($pedido['total'], 0, ',', '.') ?></td>
                  <td><?= htmlspecialchars($pedido['detalles']) ?></td>
                  
                 <?php
                    $colores = [
                        'atendido'   => '#28a745',
                        'rechazado'  => '#dc3545',
                        'solicitado' => '#007bff'
                    ];

                    $estado = strtolower($pedido['estado']);
                    $color = isset($colores[$estado]) ? $colores[$estado] : '#6c757d'; // gris por defecto
                  ?>
                  <td style="background-color:<?= $color ?>;color:#fff;padding:5px;border-radius:4px;text-align:center;">
                      <?= htmlspecialchars($pedido['estado']) ?>
                  </td>
                  
                  <td>
                    <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal"
                        data-bs-target="#modalEditar<?= $pedido['id'] ?>">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger" 
                        onclick="eliminar(event, <?= $pedido['id'] ?>)"><i class="fas fa-trash-alt"></i>
                    </button>
                    </td>
                </tr>

                <!--Modal editar Pedido  -->
                <div class="modal fade" id="modalEditar<?= $pedido['id'] ?>" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">Editar Solicitud de Pedido</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../../controlador/pedidos_c.php?accion=cambiar" method="POST">
                                    <input type="hidden" name="id" value="<?= $pedido['id'] ?>" />
                                    
                                    <div class="mb-3">
                                    <label class="form-label">Estado</label>
                                    <select class="form-select" name="estado">
                                        <option value="atendido" <?= $pedido['estado'] == 'atendido' ? 'selected' : '' ?>>ATENDIDO</option>
                                        <option value="rechazado" <?= $pedido['estado'] == 'rechazado' ? 'selected' : '' ?>>RECHAZADO</option>
                                        <option value="solicitado" <?= $pedido['estado'] == 'solicitado' ? 'selected' : '' ?>>SOLICITADO</option>
                                        
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
            '¿Estás seguro de que deseas eliminar esta SOLICITUD?',
            'SÍ', 'No', 'warning'
        );

        if (confirmarSalida) {
            window.location.href = `../../controlador/pedidos_c.php?accion=eliminar&id=${id}`;
        }
    }
    // Filtro de búsqueda
    document.getElementById("buscar").addEventListener("keyup", function () {
        const filtro = this.value.toLowerCase();
        const filas = document.querySelectorAll(".table-responsive tbody tr");

        filas.forEach(fila => {
            const textoFila = fila.textContent.toLowerCase();
            fila.style.display = textoFila.includes(filtro) ? "" : "none";
        });
        });
  </script>

  <script src="../../libs/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>