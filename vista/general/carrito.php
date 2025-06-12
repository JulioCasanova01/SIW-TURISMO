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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito de Compras - JYS</title>

  <link rel="icon" href="../../IMAGENES/Logotipo_sinsombrapng_Mesa de trabajo 1-02.png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../../libs/bootstrap-5.3.3-dist/css/bootstrap.min.css">

  <!-- Font Awesome (local) -->
  <link rel="stylesheet" href="../../libs/fontawesome-free-6.7.2-web/css/all.min.css">

  <style>
    body {
      background: #1488CC;  /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);  /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #2B32B2, #1488CC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }

    .table thead {
      background-color: #007B8A;
      color: white;
    }

    

    .btn-primary:hover {
      background-color:rgb(0, 55, 255);
    }

    .btn-danger {
      background-color: #ff6b6b;
      border: none;
    }

    .btn-danger:hover {
      background-color: #e74c3c;
    }

    .resumen {
      background-color: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>

  <div class="container py-5">
    <h2 class="mb-4 text-center text-light"><i class="fas fa-shopping-cart me-2"></i>Carrito de compras</h2>

    <div class="row">
      <!-- Tabla de productos -->
      <div class="col-lg-8 mb-4">
        <div class="table-responsive">
          <table class="table align-middle">
            <thead>
              <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $total = 0;
              if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                  foreach ($_SESSION['carrito'] as $index => $item) {
                      $subtotal = $item['precio'] * $item['cantidad'];
                      $total += $subtotal;
                      echo "<tr>
                              <td><strong>{$item['nombre']}</strong></td>
                              <td>$" . number_format($item['precio'], 0, ',', '.') . "</td>
                              <td>
                                  <form method='POST' action='actualizar_carrito.php' class='d-inline'>
                                      <input type='hidden' name='index' value='{$index}'>
                                      <input type='number' name='cantidad' class='form-control w-50 d-inline' value='{$item['cantidad']}' min='1'>
                                      <button type='submit' class='btn btn-sm btn-success ms-1'><i class='fas fa-sync-alt'></i></button>
                                  </form>
                              </td>
                              <td>$" . number_format($subtotal, 0, ',', '.') . "</td>
                              <td>
                                  <form method='POST' action='eliminar_carrito.php'>
                                      <input type='hidden' name='index' value='{$index}'>
                                      <button type='submit' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button>
                                  </form>
                              </td>
                            </tr>";
                  }
              } else {
                  echo "<tr><td colspan='5' class='text-center'>Tu carrito está vacío</td></tr>";
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                <td colspan="2"><strong>$<?php echo number_format($total, 0, ',', '.'); ?></strong></td>
              </tr>
            </tfoot>    

          </table>
        </div>
      </div>

      <!-- Resumen de compra -->
      <div class="col-lg-4">
        <div class="resumen">
          <?php
            $iva = $total * 0.19;
            $totalFinal = $total + $iva;
            ?>
            <h4 class="mb-3">Resumen</h4>
            <ul class="list-unstyled">
                <li class="d-flex justify-content-between">
                    <span>Subtotal:</span>
                    <strong>$<?php echo number_format($total, 0, ',', '.'); ?></strong>
                </li>
                <li class="d-flex justify-content-between">
                    <span>IVA (19%):</span>
                    <strong>$<?php echo number_format($iva, 0, ',', '.'); ?></strong>
                </li>
                <li class="d-flex justify-content-between">
                    <span>Total:</span>
                    <strong>$<?php echo number_format($totalFinal, 0, ',', '.'); ?></strong>
                </li>
            </ul>
            <hr>
            <form method="POST" action="finalizar_compra.php">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-credit-card me-2"></i>Finalizar compra
                </button>
            </form>
        </div>
      </div>
    </div>
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

  <?php include('footer.php'); ?>

  <!-- Bootstrap JS -->
  <script src="../../libs/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
