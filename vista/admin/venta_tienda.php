<?php 
include('header.php');
if ($_SESSION['rol'] !== 'ADMIN') {
  header("Location: vista_general.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Venta</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="d-flex flex-column flex-lg-row">
    <!-- Sidebar -->
    <?php include ('sidebar.php'); ?>

    <!-- Contenido principal -->
    <main class="flex-grow-1 p-3">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-10 col-xl-8">
            
            <div class="card shadow-lg rounded-3">
              <div class="card-header bg-primary text-white">
                <h4 class="mb-0 text-center text-lg-start">Nueva Venta</h4>
              </div>
              <div class="card-body">

                <!-- Selección de cliente -->
                <div class="mb-3">
                  <label for="cliente" class="form-label">Cliente</label>
                  <input type="text" class="form-control" id="cliente" placeholder="Nombre del cliente">
                </div>

                <!-- Selección de productos -->
                <div class="mb-3">
                  <label for="producto" class="form-label">Producto</label>
                  <select id="producto" class="form-select">
                    <option value="">Seleccione un producto</option>
                    <option value="1">Café 500g</option>
                    <option value="2">Café 1kg</option>
                    <option value="3">Chocolate Artesanal</option>
                  </select>
                </div>

                <div class="row g-3 mb-3">
                  <div class="col-12 col-md-6">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" min="1" class="form-control" id="cantidad" placeholder="0">
                  </div>
                  <div class="col-12 col-md-6">
                    <label for="precio" class="form-label">Precio Unitario</label>
                    <input type="text" class="form-control" id="precio" placeholder="$0.00">
                  </div>
                </div>

                <!-- Botón para añadir producto -->
                <div class="d-grid mb-3">
                  <button class="btn btn-success">Añadir Producto</button>
                </div>

                <!-- Tabla de productos -->
                <div class="table-responsive mb-3">
                  <table class="table table-bordered align-middle text-center">
                    <thead class="table-primary">
                      <tr>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Café 500g</td>
                        <td>2</td>
                        <td>$15.000</td>
                        <td>$30.000</td>
                        <td>
                          <button class="btn btn-sm btn-danger">Eliminar</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <!-- Totales -->
                <div class="row justify-content-end">
                  <div class="col-12 col-md-6">
                    <ul class="list-group">
                      <li class="list-group-item d-flex justify-content-between">
                        <span>Subtotal:</span>
                        <strong>$30.000</strong>
                      </li>
                      <li class="list-group-item d-flex justify-content-between">
                        <span>IVA (19%):</span>
                        <strong>$5.700</strong>
                      </li>
                      <li class="list-group-item d-flex justify-content-between">
                        <span>Total:</span>
                        <strong>$35.700</strong>
                      </li>
                    </ul>
                  </div>
                </div>

                <!-- Botón de registrar venta -->
                <div class="d-grid mt-4">
                  <button class="btn btn-primary btn-lg">Registrar Venta</button>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
