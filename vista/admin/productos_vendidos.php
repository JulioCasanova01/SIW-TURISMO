<?php 
    include('header.php');
?>
<body>

  <div class="d-flex">

    <?php include ('sidebar.php'); ?>

    <!-- Contenido principal -->
    <div class="flex-grow-1">
      <nav class="navbar navbar-dark">
        <div class="container-fluid">
          <span class="navbar-brand">Gestión de Productos Vendidos</span>
          <!-- <a href="#" class="btn btn-outline-light"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a> -->
        </div>
      </nav>

      <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="mb-0 mt-4">Productos Vendidos</h2>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPVendidos">
            <i class="fas fa-plus me-2"></i>Nuevo Producto Vendido
          </button>
        </div>

        <!-- Tabla -->
        <div class="table-responsive">
          <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
              <tr>
              <th><i class="fas fa-id-badge"></i> ID</th>
              <th><i class="fas fa-user"></i> Cliente</th>
              <th><i class="fas fa-box-open"></i> Categoría de Producto</th>
              <th><i class="fas fa-tag"></i> Producto Vendido</th>
              <th><i class="fas fa-calendar-alt"></i> Fecha</th>
              <th><i class="fas fa-dollar-sign"></i> Total</th>
              <th><i class="fas fa-store"></i> Tipo de Venta</th>
              <th><i class="fas fa-circle-notch"></i> Estado</th>
                <th><i class="fas fa-cogs"></i> Acciones</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td>1</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>02/05/2025</td>
                <td>3'500.000</td>
                <td>Local</td>
                <td>Atendido</td>
                
                <td>
                  <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal"
                    data-bs-target="#modalEditar"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>3</td>
                <td>02/05/2025</td>
                <td>3'500.000</td>
                <td>Online</td>
                <td>Atendido</td>
                
                <td>
                  <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal"
                    data-bs-target="#modalEditar"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>1</td>
                <td>3</td>
                <td>3</td>
                <td>02/05/2025</td>
                <td>3'500.000</td>
                <td>Local</td>
                <td>Atendido</td>
               
                <td>
                  <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal"
                    data-bs-target="#modalEditar"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                </td>
              </tr>
              <!-- Más PVendidos aquí -->

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de nuevo PVendidos -->
  <div class="modal fade" id="modalPVendidos" tabindex="-1" aria-labelledby="modalPVendidosLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="modalPVendidosLabel">Nuevo Vendido</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <form>
            <!-- <div class="mb-3">
              <label for="contacto1PVendidos" class="form-label">Imagen</label>
              <input type="file" id="imagen" name="imagen" accept="image/*" class="form-control" />
            </div> -->
            <div class="mb-3">
              <label for="clientePVendidos" class="form-label">Cliente</label>
              <input type="number" class="form-control" id="clientePVendidos" />
            </div>
             <div class="mb-3">
              <label for="TipoPVendidos" class="form-label">Tipo_Producto</label>
              <select class="form-select" id="TipoPVendidos">
                <option value="Tour">Tour</option>
                <option value="PI">Plan Individual</option>
                <option value="PT">Paquete Turístico</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="nombrePVendidos" class="form-label">Producto Vendido</label>
              <input type="number" class="form-control" id="nombrePVendidos" />
            </div>
            <!-- <div class="mb-3">
              <label for="correoPVendidos" class="form-label">Correo</label>
              <input type="email" class="form-control" id="correoPVendidos" />
            </div> -->
            <div class="mb-3">
              <label for="fechaPVendidos" class="form-label">Fecha</label>
              <input type="Date" class="form-control" id="fechaPVendidos" />
            </div>
            <div class="mb-3">
              <label for="totalPVendidos" class="form-label">Total</label>
              <input type="number" class="form-control" id="totalPVendidos" />
            </div>
            <div class="mb-3">
              <label for="TipoVPVendidos" class="form-label">Tipo_Venta</label>
              <select class="form-select" id="TipoVPVendidos">
                <option value="Local">Local</option>
                <option value="Online">Online</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="EstadoPVendidos" class="form-label">Estado</label>
              <select class="form-select" id="EstadoVPVendidos">
                <option value="solicitado">Solicitado</option>
                <option value="atendido">Atendido</option>
                <option value="entregado">Entregado</option>
                <option value="rechazado">Rechazado</option>

              </select>
            </div>
           
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>

<!--Modal editar Usuario -->
  <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="modalEditarLabel">Editar Producto Vendido</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <form>
          <div class="mb-3">
              <label for="clientePVendidos" class="form-label">Cliente</label>
              <input type="number" class="form-control" id="clientePVendidos" />
            </div>
             <div class="mb-3">
              <label for="TipoPVendidos" class="form-label">Tipo_Producto</label>
              <select class="form-select" id="TipoPVendidos">
                <option value="Tour">Tour</option>
                <option value="PI">Plan Individual</option>
                <option value="PT">Paquete Turístico</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="nombrePVendidos" class="form-label">Producto Vendido</label>
              <input type="number" class="form-control" id="nombrePVendidos" />
            </div>
            <!-- <div class="mb-3">
              <label for="correoPVendidos" class="form-label">Correo</label>
              <input type="email" class="form-control" id="correoPVendidos" />
            </div> -->
            <div class="mb-3">
              <label for="fechaPVendidos" class="form-label">Fecha</label>
              <input type="Date" class="form-control" id="fechaPVendidos" />
            </div>
            <div class="mb-3">
              <label for="totalPVendidos" class="form-label">Total</label>
              <input type="number" class="form-control" id="totalPVendidos" />
            </div>
            <div class="mb-3">
              <label for="TipoVPVendidos" class="form-label">Tipo_Venta</label>
              <select class="form-select" id="TipoVPVendidos">
                <option value="Local">Local</option>
                <option value="Online">Online</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="EstadoPVendidos" class="form-label">Estado</label>
              <select class="form-select" id="EstadoVPVendidos">
                <option value="solicitado">Solicitado</option>
                <option value="atendido">Atendido</option>
                <option value="entregado">Entregado</option>
                <option value="rechazado">Rechazado</option>

              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <?php include ('footer.php'); ?>

  <script src="../../libs/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>