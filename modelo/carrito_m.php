<?php
function agregar($data) {
    session_start();
    $id = $data['id_producto'];
    $nombre = $data['nombre'];
    $precio = $data['precio'];
    $cantidad = $data['cantidad'];

    $item = [
        'id' => $id,
        'nombre' => $nombre,
        'precio' => $precio,
        'cantidad' => $cantidad
    ];

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Buscar si ya existe
    $existe = false;
    foreach ($_SESSION['carrito'] as &$producto) {
        if ($producto['id'] == $id) {
            $producto['cantidad'] += $cantidad;
            $existe = true;
            break;
        }
    }

    if (!$existe) {
        $_SESSION['carrito'][] = $item;
    }

    header("Location: ../vista/general/productos.php");
    exit();
}

function actualizar($data) {
    session_start();
    $index = $data['index'];
    $cantidad = $data['cantidad'];

    if (isset($_SESSION['carrito'][$index])) {
        $_SESSION['carrito'][$index]['cantidad'] = $cantidad;
    }

    header("Location: ../vista/general/carrito.php");
    exit();
}

function eliminarDelCarrito($index) {
    if (isset($_SESSION['carrito'][$index])) {
        unset($_SESSION['carrito'][$index]);
        $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar
    }
}

function finalizar() {
    session_start();
    unset($_SESSION['carrito']);
    echo "
    <script src='../libs/SweetAlert2/sweetalert2.all.min.js'></script>
    <script src='../vista/alertas/funcionesalert.js'></script>
    <body>
        <script>
            informar('¡Compra finalizada con éxito!', 'Ir al inicio', '../vista/general/Productos.php', 'success');
        </script>
    </body>";
}
?>
