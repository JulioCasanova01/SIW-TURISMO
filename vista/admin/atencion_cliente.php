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
                    
                    <span class="navbar-brand">Gestión de Atencion Al Cliente</span>
                    <!-- <a href="#" class="btn btn-outline-light"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a> -->
                </div>
            </nav>

            <div class="main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 mt-4">Atención</h2>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAtencion">
                        <i class="fas fa-plus me-2"></i> Nueva Atencion
                    </button>
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

                                <th class="text-center"><i class="fas fa-hourglass-half"></i> Estado</th>
                                <th class="text-center"><i class="fas fa-cogs"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>Camila Velásquez</td>
                                <td>camila@siw-turismo.com</td>
                                <td>1234567899</td>
                                <td>Hola. khejhvdjoggvoeajbvoushjyvbsuryoebey vbhfvbjdfhbvehfbvjhfbfru eyhbrvhsbeur ybeuyvhbyrbhdbvshddubeyvr</td>
                                <td>Activo</td>

                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal"
                                        data-bs-target="#modalEditar"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i
                                            class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Camila Velásquez</td>
                                <td>camila@siw-turismo.com</td>
                                <td>1234567899</td>
                                <td>Hola. khejhvdjoggvoeajbvoushjyvbsuryoebeyvbhf vbjdfhbvehfbvjhfb frueyhbrvhsbeuryb euyvhbyrbhdbvshddubeyvr</td>
                                <td>Activo</td>

                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal"
                                        data-bs-target="#modalEditar"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i
                                            class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Camila Velásquez</td>
                                <td>camila@siw-turismo.com</td>
                                <td>1234567899</td>
                                <td>Hola. khejhvdjoggvoeajbvoushj yvbsuryoebeyvbhfvbjdfhbv ehfbvjhfbfrueyh brvhsbeurybeuyvhbyrbhdbvshddubeyvr</td>
                                <td>Activo</td>

                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal"
                                        data-bs-target="#modalEditar"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i
                                            class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <!-- Más Atencion aquí -->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de EDITAR Atencion -->
    <div class="modal fade" id="modalAtencion" tabindex="-1" aria-labelledby="modalAtencionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalAtencionLabel">Editar Atencion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <!-- <div class="mb-3">
                        <label for="contacto1Atencion" class="form-label">Imagen</label>
                         <input type="file" id="imagen" name="imagen" accept="image/*" class="form-control" />
                         </div> -->
                        <div class="mb-3">
                            <label for="nombreAtencion" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreAtencion" />
                        </div>
                        <div class="mb-3">
                            <label for="tipo_documento_Atencion" class="form-label">ESTADO</label>
                            <select class="form-select" id="tipo_documento_Atencion">
                                <option value="PE">PENDIENTE</option>
                                <option value="RE">RESUELTA</option>
                                <!-- <option value="RC">Registro Civil de Nacimiento</option>
                                <option value="PASAPORTE">PASAPORTE</option>
                                <option value="CE">Cédula de Extranjería</option> -->
                            </select>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="numero_documento_Atencion" class="form-label">Número de Documento</label>
                            <input type="number" class="form-control" id="numero_documento_Atencion" />
                        </div>
                        <div class="mb-3">
                            <label for="fecha_N_Atencion" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_N_Atencion" />
                        </div> -->
                        <div class="mb-3">
                            <label for="correoAtencion" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="correoAtencion" />
                        </div>
                        <!-- <div class="mb-3">
                            <label for="contacto1Atencion" class="form-label">Contacto_1</label>
                            <input type="number" class="form-control" id="contacto1Atencion" />
                        </div>
                        <div class="mb-3">
                            <label for="contacto2Atencion" class="form-label">Contacto_2</label>
                            <input type="number" class="form-control" id="contacto2Atencion" />
                        </div>
                        <div class="mb-3">
                            <label for="Direccion_R_Atencion" class="form-label">Dirección de Residencia</label>
                            <input type="text" class="form-control" id="Direccion_R_Atencion" />
                        </div> -->

                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal editar Atencion -->
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalEditarLabel">Editar Atencion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                <form>
                        <!-- <div class="mb-3">
                        <label for="contacto1Atencion" class="form-label">Imagen</label>
                         <input type="file" id="imagen" name="imagen" accept="image/*" class="form-control" />
                         </div> -->
                        <div class="mb-3">
                            <label for="nombreAtencion" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreAtencion" />
                        </div>
                        <div class="mb-3">
                            <label for="tipo_documento_Atencion" class="form-label">ESTADO</label>
                            <select class="form-select" id="tipo_documento_Atencion">
                                <option value="PE">PENDIENTE</option>
                                <option value="RE">RESUELTA</option>
                                <!-- <option value="RC">Registro Civil de Nacimiento</option>
                                <option value="PASAPORTE">PASAPORTE</option>
                                <option value="CE">Cédula de Extranjería</option> -->
                            </select>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="numero_documento_Atencion" class="form-label">Número de Documento</label>
                            <input type="number" class="form-control" id="numero_documento_Atencion" />
                        </div>
                        <div class="mb-3">
                            <label for="fecha_N_Atencion" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_N_Atencion" />
                        </div> -->
                        <div class="mb-3">
                            <label for="correoAtencion" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="correoAtencion" />
                        </div>
                        <!-- <div class="mb-3">
                            <label for="contacto1Atencion" class="form-label">Contacto_1</label>
                            <input type="number" class="form-control" id="contacto1Atencion" />
                        </div>
                        <div class="mb-3">
                            <label for="contacto2Atencion" class="form-label">Contacto_2</label>
                            <input type="number" class="form-control" id="contacto2Atencion" />
                        </div>
                        <div class="mb-3">
                            <label for="Direccion_R_Atencion" class="form-label">Dirección de Residencia</label>
                            <input type="text" class="form-control" id="Direccion_R_Atencion" />
                        </div> -->

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