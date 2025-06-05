<?php include('header.php'); ?>
<style>
  .main-content {
    padding: 1rem;
  }

  .table-container {
    width: 100%;
    overflow-x: auto;
    overflow-y: hidden;
  }

  table {
    min-width: 100%; 
  }

  th, td {
    white-space: nowrap;
    vertical-align: middle;
  }

  @media (max-width: 768px) {
    .table {
      font-size: 0.85rem;
    }

    .btn {
      font-size: 0.75rem;
      padding: 0.25rem 0.5rem;
    }
  }
   @media (min-width: 768px) {
    .table {
      font-size: 0.85rem;
    }

    .btn {
      font-size: 0.75rem;
      padding: 0.25rem 0.5rem;
    }
  }
 

</style>




<body>
<?php 
    include '../../conexion.php';
    include '../../modelo/clientes_m.php';
    $clientes = obtenerClientes($conn);
?>

<div class="d-flex flex-column flex-lg-row">
  <?php include('sidebar.php'); ?>

  <div class="flex-grow-1">
    <nav class="navbar navbar-dark">
      <div class="container-fluid">
        <span class="navbar-brand text-white">Gestión de Clientes</span>
      </div>
    </nav>

    <div class="main-content">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <h2 class="mb-3 mb-md-0 mt-4">Clientes</h2>
        <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalClientes">
          <i class="fas fa-plus me-2"></i>Nuevo Cliente
        </button> -->
      </div>

      <div class="table-container">
        <table class="table table-striped table-hover align-middle">
          <thead class="table-dark text-center">
            <tr>
              <th><i class="fas fa-id-badge"></i> ID</th>
                <th><i class="fas fa-user"></i> Nombre Completo</th>
                <th><i class="fas fa-id-card"></i> Tipo Doc.</th>
                <th><i class="fas fa-hashtag"></i> Número</th>
                <th><i class="fas fa-birthday-cake"></i> Nacimiento</th>
                <th><i class="fas fa-calendar-plus"></i> Registro</th>
                <th><i class="fas fa-envelope"></i> Correo</th>
                <th><i class="fas fa-phone-alt"></i> Contacto 1</th>
                <th><i class="fas fa-mobile-alt"></i> Contacto 2</th>
                <th><i class="fas fa-map-marker-alt"></i> Dirección</th>
                <th><i class="fas fa-cogs"></i> Acciones</th>

            </tr>
          </thead>
          <tbody class="text-center">
            <?php foreach ($clientes as $cliente): ?>
              <tr>
                <td><?= $cliente['id'] ?></td>
                <td><?= $cliente['nombre'] ?></td>
                <td><?= $cliente['tipo_documento'] ?></td>
                <td><?= $cliente['numero_documento'] ?></td>
                <td><?= $cliente['fecha_nacimiento'] ?></td>
                <td><?= $cliente['fecha_registro'] ?></td>
                <td><?= $cliente['correo'] ?></td>
                <td><?= $cliente['contacto_1'] ?></td>
                <td><?= $cliente['contacto_2'] ?></td>
                <td><?= $cliente['direccion'] ?></td>
                
                <td>
                  <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal"
                    data-bs-target="#modalEditar<?= $cliente['id'] ?>">
                    <i class="fas fa-edit"></i>
                  </button>
                  <a href="../../controlador/clientes_c.php?accion=eliminar&id=<?= $cliente['id'] ?>"
                     class="btn btn-sm btn-outline-danger"
                     onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?');">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                </td>
              </tr>

              <!-- Modal Editar Cliente -->
              <div class="modal fade" id="modalEditar<?= $cliente['id'] ?>" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                      <h5 class="modal-title">Editar Cliente</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                      <form action="../../controlador/clientes_c.php?accion=actualizar" method="POST">
                        <input type="hidden" name="id" value="<?= $cliente['id'] ?>" />
                        <div class="mb-3">
                          <label class="form-label">Nombre</label>
                          <input type="text" class="form-control" name="nombre" value="<?= $cliente['nombre'] ?>" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Tipo de Documento</label>
                          <select class="form-select" name="tipo_documento">
                            <?php
                            $tipos = ["CC" => "Cédula de Ciudadanía", "TI" => "Tarjeta de Identidad", "RC" => "Registro Civil", "PASAPORTE" => "Pasaporte", "CE" => "Cédula de Extranjería"];
                            foreach ($tipos as $clave => $texto):
                              $selected = $cliente['tipo_documento'] == $clave ? 'selected' : '';
                              echo "<option value=\"$clave\" $selected>$texto</option>";
                            endforeach;
                            ?>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Número de Documento</label>
                          <input type="number" class="form-control" name="numero_documento" value="<?= $cliente['numero_documento'] ?>" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Fecha de Nacimiento</label>
                          <input type="date" class="form-control" name="fecha_nacimiento" value="<?= $cliente['fecha_nacimiento'] ?>" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Correo</label>
                          <input type="email" class="form-control" name="correo" value="<?= $cliente['correo'] ?>" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Contacto 1</label>
                          <input type="number" class="form-control" name="contacto1" value="<?= $cliente['contacto_1'] ?>" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Contacto 2</label>
                          <input type="number" class="form-control" name="contacto2" value="<?= $cliente['contacto_2'] ?>" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Dirección</label>
                          <input type="text" class="form-control" name="direccion" value="<?= $cliente['direccion'] ?>" />
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

<?php include('footer.php'); ?>
<script src="../../libs/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
