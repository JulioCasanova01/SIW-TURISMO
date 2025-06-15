<?php
require '../vendor/autoload.php';
use Dompdf\Dompdf;

include '../conexion.php';
session_start();

function agregar($data) {
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
        $_SESSION['carrito'] = array_values($_SESSION['carrito']);
    }
}

function finalizar() {
    global $conn;
    require '../vendor/autoload.php';

    if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
        echo "<script>alert('El carrito está vacío.');window.location.href='../vista/general/Productos.php';</script>";
        return;
    }

    $carrito = $_SESSION['carrito'];
    $total = 0;
    $detallesTexto = "";
    date_default_timezone_set('America/Bogota');
    $fecha = date("Y-m-d H:i:s");
    $estado = "Finalizado";
    $id_cliente = $_SESSION['id_cliente'];

    // Ruta del logotipo
    $logoPath = 'C:\xampp\htdocs\SIW-TURISMO\IMAGENES\Logotipo_sinsombrapng_Mesa de trabajo 1-02.png';

    // Construcción del HTML para el PDF
    $html = '
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; font-size: 12px; }
            h1 { text-align: center; color: #003366; }
            table { width: 100%; border-collapse: collapse; margin-top: 20px; }
            th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
            th { background-color: #f2f2f2; }
            .footer {
                margin-top: 40px;
                font-size: 10px;
                text-align: center;
                color: #555;
            }
            .logo {
                width: 150px;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div style="text-align: center;">
            <img src="' .$logoPath. '" class="logo" alt="JYS PROMOTORES DE VIAJES Y TURISMO">
        </div>

        <h1>Resumen: SOLICITUD DE COMPRA<br>JYS PROMOTORES DE VIAJES Y TURISMO <br> RNT: 1252762</h1>

        <table>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>';

    foreach ($carrito as $item) {
        $subtotal = $item['precio'] * $item['cantidad'];
        $total += $subtotal;

        $precio = number_format($item['precio'], 0, ',', '.');
        $cantidad = $item['cantidad'];
        $sub = number_format($subtotal, 0, ',', '.');

        $html .= "<tr>
            <td>{$item['nombre']}</td>
            <td>$$precio</td>
            <td>$cantidad</td>
            <td>$$sub</td>
        </tr>";

        $detallesTexto .= "{$item['nombre']} (x$cantidad) - $$sub\n ";
    }

    
    $totalFinal = $total;

    $html .= '</table>
        <br>
        <p><strong>Subtotal:</strong> $' . number_format($total, 0, ',', '.') . '</p>
        <p><strong>Total Final:</strong> $' . number_format($totalFinal, 0, ',', '.') . '</p>

        <div class="footer">
            <hr>
            <p><strong>JYS PROMOTORES DE VIAJES Y TURISMO</strong><br>
            Teruel - Huila, Colombia<br>
            +57 314 314 4506<br>
            samyraga1979@gmail.com</p>
        </div>
    </body>
    </html>';

    // Guardar venta en la base de datos
    
    $stmt = $conn->prepare("INSERT INTO ventas (fecha, total, id_cliente, estado, detalles) VALUES (?, ?, ?, ?, ?)");
    $estado= "solicitado";
    $stmt->bind_param("sdiss", $fecha, $totalFinal, $id_cliente, $estado, $detallesTexto);
    $stmt->execute();
    $id_venta = $stmt->insert_id;

    // Generar y guardar PDF
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    $pdf = $dompdf->output();
    $pdfPath = "../vista/general/resumenes/venta_$id_venta.pdf";
    file_put_contents($pdfPath, $pdf);

    // Vaciar el carrito
    unset($_SESSION['carrito']);

    // Generar URL de WhatsApp
    $numero = "573143144506";
    $mensaje = "Hola, acabo de finalizar una compra. Venta N° $id_venta. Total: $" . number_format($totalFinal, 0, ',', '.') . ". Por favor revisar el resumen.";
    $urlWhatsapp = "https://api.whatsapp.com/send?phone=$numero&text=" . urlencode($mensaje);

    // Mostrar alerta y redireccionar
    echo "
    <script src='../libs/SweetAlert2/sweetalert2.all.min.js'></script>
    <body>
        <script>
            // Descargar PDF automáticamente
            const link = document.createElement('a');
            link.href = '$pdfPath';
            link.download = 'SOLICITUD_COMPRA_JYS.pdf';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

            // Mostrar alerta con opción a enviar WhatsApp
            Swal.fire({
                title: '¡Solicitud finalizada con éxito!',
                text: 'ENVÍA UN MENSAJE A WHATSAPP PARA NOTIFICAR LA VENTA.',
                icon: 'success',
                confirmButtonText: 'Sí, enviar',
                confirmButtonColor: '#007BFF', // Color azul institucional
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.open('$urlWhatsapp', '_blank');
                    setTimeout(() => {
                        window.location.href = '../vista/general/Productos.php';
                    }, 200);
                }
            });
        </script>
    </body>";
}

?>