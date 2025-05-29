<?php include ('header.php'); ?>


<body>
    <div class="d-flex">

        <?php include ('sidebar.php'); ?>

        <!-- Contenido principal -->
        <div class="flex-grow-1">
            <nav class="navbar navbar-dark">
                <div class="container-fluid">
                    <span class="navbar-brand">Gestión de Paquetes</span>
                    <!-- <a href="#" class="btn btn-outline-light"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a> -->
                </div>
            </nav>

            <div class="main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 mt-4">Paquetes Turísticos</h2>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPaquete">
                        <i class="fas fa-plus me-2"></i>Nuevo Paquete
                    </button>
                </div>

                <!-- Tabla -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                            <th><i class="fas fa-id-badge"></i> ID</th>
                                <th>Nombre</th>
                                <th>Destino</th>
                                <th>Precio</th>
                                <th>Duración</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Paquete Caribe Azul</td>
                                <td>Cartagena</td>
                                <td>$1.200.000</td>
                                <td>5 días</td>
                                <td><span class="badge bg-success">Activo</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#modalEditar"><i
                                            class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i
                                            class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Aventura en el Eje</td>
                                <td>Salento</td>
                                <td>$950.000</td>
                                <td>3 días</td>
                                <td><span class="badge bg-secondary">Inactivo</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#modalEditar"><i
                                            class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i
                                            class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de editar paquete -->
    <div class="modal fade" id="modalPaquete" tabindex="-1" aria-labelledby="modalPaqueteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalPaqueteLabel">Nuevo Paquete Turístico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="duracionPaquete" class="form-label">Imagen</label>
                            <input type="file" id="imagen" name="imagen" accept="image/*" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="nombrePaquete" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombrePaquete" />
                        </div>
                        <div class="mb-3">
                            <label for="destinoPaquete" class="form-label">Destino</label>
                            <input type="text" class="form-control" id="destinoPaquete" />
                        </div>
                        <div class="mb-3">
                            <label for="precioPaquete" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precioPaquete" />
                        </div>
                        <div class="mb-3">
                            <label for="duracionPaquete" class="form-label">Duración</label>
                            <input type="text" class="form-control" id="duracionPaquete" />
                        </div>
                        <div class="mb-3">
                            <label for="estadoPaquete" class="form-label">Estado</label>
                            <select class="form-select" id="estadoPaquete">
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
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
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalEditarLabel">Editar Paquete Turístico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="duracionPaquete" class="form-label">Imagen</label>
                            <input type="file" id="imagen" name="imagen" accept="image/*" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="nombrePaquete" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombrePaquete" />
                        </div>
                        <div class="mb-3">
                            <label for="destinoPaquete" class="form-label">Destino</label>
                            <input type="text" class="form-control" id="destinoPaquete" />
                        </div>
                        <div class="mb-3">
                            <label for="precioPaquete" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precioPaquete" />
                        </div>
                        <div class="mb-3">
                            <label for="duracionPaquete" class="form-label">Duración</label>
                            <input type="text" class="form-control" id="duracionPaquete" />
                        </div>
                        
                        <div class="mb-3">
                            <label for="estadoPaquete" class="form-label">Estado</label>
                            <select class="form-select" id="estadoPaquete">
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
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

    <script src="../../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>