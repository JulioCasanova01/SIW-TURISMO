<?php
include('header.php');
include '../../conexion.php';
include '../../modelo/abonosAdmin_m.php';
$abonos = obtenerAbonos($conn);
?>

<style>
    .main-content {
        padding: 1rem;
    }

    /* Tabla en desktop */
    .table thead {
        background: #212529;
        color: #fff;
    }

    .table td, .table th {
        vertical-align: middle;
        text-align: center;
        white-space: nowrap;
    }

    /* Badges para los estados */
    .badge-estado {
        display: inline-block;
        padding: 0.4rem 0.6rem;
        font-size: 0.8rem;
        font-weight: 600;
        border-radius: 6px;
    }
    .badge-aceptado { background: #28a745; color: #fff; }
    .badge-rechazado { background: #dc3545; color: #fff; }
    .badge-pendiente { background: #076aff; color: #fff; }

    /* Estilo de tarjetas en móvil */
    @media (max-width: 768px) {
        .table-responsive {
            border: none;
        }

        .table thead {
            display: none;
        }

        .table tbody tr {
            display: block;
            margin-bottom: 1rem;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            background: #fff;
            padding: 0.75rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .table tbody td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: left;
            padding: 0.4rem 0;
            border: none;
            white-space: normal;
        }

        .table tbody td::before {
            content: attr(data-label);
            font-weight: bold;
            color: #495057;
            margin-right: 10px;
            flex: 1;
        }
    }
</style>

<body>
<div class="d-flex flex-column flex-lg-row">
    <?php include('sidebar.php'); ?>

    <div class="flex-grow-1">
        <!-- Barra superior -->
        <nav class="navbar" style="background-color: #0077b6;">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <span class="navbar-brand mb-0" style="color: #fff;">Gestión de Abonos</span>
                <div class="dataTables_filter">
                    <input type="search" id="buscar" class="form-control form-control-sm"
                           placeholder="Buscar...">
                </div>
            </div>
        </nav>

        <!-- Contenido -->
        <div class="main-content">
            <h2 class="mb-4">Listado de Abonos</h2>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th><i class="fas fa-id-badge"></i> ID</th>
                            <th><i class="fas fa-store"></i> ID Venta</th>
                            <th><i class="fas fa-calendar-alt"></i> Fecha</th>
                            <th><i class="fas fa-dollar-sign"></i> Monto</th>
                            <th><i class="fas fa-cash-register"></i> Método</th>
                            <th><i class="fas fa-bank"></i> Transferencia</th>
                            <th><i class="fas fa-comment-alt"></i> Observaciones</th>
                            <th><i class="fas fa-file-alt"></i> Comprobante</th>
                            <th><i class="fas fa-circle-notch"></i> Estado</th>
                            <th><i class="fas fa-cogs"></i> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($abonos as $abono): ?>
                        <tr>
                            <td data-label="ID"><?= $abono['id'] ?></td>
                            <td data-label="ID Venta"><?= $abono['venta_id'] ?></td>
                            <td data-label="Fecha"><?= $abono['fecha'] ?></td>
                            <td data-label="Monto">$<?= number_format($abono['monto'], 0, ',', '.') ?></td>
                            <td data-label="Método"><?= $abono['metodo_pago'] ?></td>
                            <td data-label="Transferencia"><?= $abono['tipo_transferencia'] ?></td>
                            <td data-label="Observaciones"><?= htmlspecialchars($abono['observaciones']) ?></td>
                            <td data-label="Comprobante">
                                <?php if (!empty($abono['comprobante_pago'])): ?>
                                    <a href="../../img/abonos/<?=$abono['comprobante_pago'] ?>" target="_blank"
                                       class="btn btn-sm btn-outline-info">
                                        <i class="fas fa-file-alt"></i> Ver
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted">Sin comprobante</span>
                                <?php endif; ?>
                            </td>

                            <?php $estado = strtolower($abono['estado']); ?>
                            <td data-label="Estado">
                                <span class="badge-estado badge-<?= $estado ?>">
                                    <?= strtoupper($abono['estado']) ?>
                                </span>
                            </td>

                            <td data-label="Acciones">
                                <button class="btn btn-sm btn-outline-primary"
                                        data-bs-toggle="modal" data-bs-target="#modalEditar<?= $abono['id'] ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger"
                                        onclick="eliminarAbono(<?= $abono['id'] ?>)">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Editar -->
                        <div class="modal fade" id="modalEditar<?= $abono['id'] ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title">Editar Abono #<?= $abono['id'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../../controlador/abonosAdmin_c.php?accion=actualizar" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $abono['id'] ?>" />
                                            <div class="mb-3">
                                                <label class="form-label">Estado</label>
                                                <select class="form-select" name="estado">
                                                    <option value="aceptado" <?= $estado == 'aceptado' ? 'selected' : '' ?>>ACEPTADO</option>
                                                    <option value="rechazado" <?= $estado == 'rechazado' ? 'selected' : '' ?>>RECHAZADO</option>
                                                    <option value="pendiente" <?= $estado == 'pendiente' ? 'selected' : '' ?>>PENDIENTE</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Comprobante (opcional)</label>
                                                <input type="file" class="form-control" name="comprobante" accept="image/*,application/pdf">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Observaciones</label>
                                                <textarea class="form-control" name="observaciones" rows="3"><?= htmlspecialchars($abono['observaciones']) ?></textarea>
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

<script>
    // Eliminar con confirmación
    async function eliminarAbono(id) {
        const confirmarSalida = await confirmar(
            '¿Estás seguro de que deseas eliminar esta solicitud?',
            'SÍ', 'No', 'warning'
        );
        if (confirmarSalida) {
            window.location.href = `../../controlador/abonosAdmin_c.php?accion=eliminar&id=${id}`;
        }
    }

    // Buscador
    document.getElementById("buscar").addEventListener("keyup", function() {
        const filtro = this.value.toLowerCase();
        const filas = document.querySelectorAll("tbody tr");
        filas.forEach(fila => {
            const textoFila = fila.textContent.toLowerCase();
            fila.style.display = textoFila.includes(filtro) ? "" : "none";
        });
    });
</script>

<script src="../../libs/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
