<?php include ('header.php');
 ?>
<body>
  <?php include '../../conexion.php';
  include '../../modelo/usuarios_m.php'; 
  $usuarios = obtenerUsuarios($conn);?>
  <div class="d-flex">

    <?php include ('sidebar.php'); ?>

    <!-- Contenido principal -->
    <div class="flex-grow-1">
      <nav class="navbar navbar-dark">
        <div class="container-fluid">
          <span class="navbar-brand">Gestión de USUARIOS</span>
          <!-- <a href="#" class="btn btn-outline-light"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a> -->
        </div>
      </nav>

      <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="mb-0 mt-4">USUARIOS</h2>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalusuarios">
            <i class="fas fa-plus me-2"></i>Nuevo Usuario
          </button>
        </div>

        <!-- Tabla -->
        <div class="table-responsive">
          <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
              <tr>
                <th><i class="fas fa-id-badge"></i> ID</th>
                <th><i class="fas fa-user"></i> Nombre</th>
                <th><i class="fas fa-envelope"></i> Correo</th>
                <th><i class="fas fa-user-tag"></i> Rol</th>
                <th><i class="fas fa-phone"></i> Contacto_1</th>
                <th><i class="fas fa-mobile-alt"></i> Contacto_2</th>
                <th><i class="fas fa-cogs"></i> Acciones</th>
              </tr>
            </thead>
            
            <?php foreach ($usuarios as $usuario): ?>

            <tbody>

              <tr>
                <td><?= $usuario['id'] ?></td>
                <td><?= $usuario['nombre'] ?></td>
                <td><?= $usuario['correo'] ?></td>
                <td><?= $usuario['rol'] ?></td>
                <td><?= $usuario['contacto_1'] ?></td>
                <td><?= $usuario['contacto_2'] ?></td>
                <td>
                  <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal"
                    data-bs-target="#modalEditar<?= $usuario['id'] ?>"><i class="fas fa-edit"></i></button>
                  <!-- <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button> -->
                  <a href="../../controlador/usuarios_c.php?accion=eliminar&id=<?= $usuario['id'] ?>" 
                    class="btn btn-sm btn-outline-danger" 
                    onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                    <i class="fas fa-trash-alt"></i>
                  </a>

                </td>
              </tr>
              
              <!-- Más usuarios aquí -->

            </tbody>


            <!--Modal editar Usuario -->
            <div class="modal fade" id="modalEditar<?= $usuario['id'] ?>" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalEditarLabel">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                  </div>
                  <div class="modal-body">
                    <form action="../../controlador/usuarios_c.php?accion=actualizar" method="POST">
                      <input type="hidden" name="id" value="<?= $usuario['id'] ?>" />
                      <!-- <div class="mb-3">
                        <label for="contacto1usuarios" class="form-label">Imagen</label>
                        <input type="file" id="imagen" name="imagen" accept="image/*" class="form-control" />
                      </div> -->
                      <div class="mb-3">
                        <label for="nombreusuarios" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombreusuarios" value="<?= $usuario['nombre'] ?>" />
                      </div>

                      <div class="mb-3">
                        <label for="correousuarios" class="form-label">Correo</label>
                        <input type="email" class="form-control" name="UserEmail" id="correousuarios" value="<?= $usuario['correo'] ?>" />
                      </div>

                      <div class="mb-3">
                        <label for="rolusuarios" class="form-label">Rol</label>
                        <select class="form-select" name="rolUsuario" id="rolusuarios">
                          <option value="ADMIN" <?= $usuario['rol'] == "ADMIN" ? 'selected' : '' ?>>Administrador</option>
                          <option value="Agente" <?= $usuario['rol'] == "Agente" ? 'selected' : '' ?>>Agente</option>
                          <option value="Atencion_cliente" <?= $usuario['rol'] == "Atencion_cliente" ? 'selected' : '' ?>>Atención al Cliente</option>
                        </select>
                      </div>


                      <div class="mb-3">
                        <label for="contacto1usuarios" class="form-label">Contacto_1</label>
                        <input type="number" class="form-control" name="contacto1" id="contacto1usuarios" value="<?= $usuario['contacto_1'] ?>" />
                      </div>
                      <div class="mb-3">
                        <label for="contacto2usuarios" class="form-label">Contacto_2</label>
                        <input type="number" class="form-control" name="contacto2" id="contacto2usuarios" value="<?= $usuario['contacto_2'] ?>" />
                      </div>
                      <!-- <div class="mb-3">
                        <label for="estadousuarios" class="form-label">Estado</label>
                        <select class="form-select" id="estadousuarios">
                          <option value="activo">Activo</option>
                          <option value="inactivo">Inactivo</option>
                        </select>
                      </div> -->
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
          </table>
        </div>
      </div>
    </div>
  </div>

 

  <!-- Modal de nuevo usuarios -->

  <div class="modal fade" id="modalusuarios" tabindex="-1" aria-labelledby="modalusuariosLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="modalusuariosLabel">Nuevo Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <form action='../../controlador/usuarios_c.php?accion=registrar' method="POST">
            <!-- <div class="mb-3">
              <label for="contacto1usuarios" class="form-label">Imagen</label>
              <input type="file" id="imagen" name="imagen" accept="image/*" class="form-control" />
            </div> -->
            <div class="mb-3">
              <label for="nombreusuarios" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombreusuarios" />
            </div>
            <div class="mb-3">
              <label for="correousuarios" class="form-label">Correo</label>
              <input type="email" class="form-control" name="UserEmail" id="correousuarios" />
            </div>
            <div class="mb-3">
              <label for="rolusuarios" class="form-label">Rol</label>

              <select class="form-select" name="rolUsuario" id="rolusuarios">
                <option value="ADMIN">Administrador</option>
                <option value="Agente">Agente</option>
                <option value="Atencion_cliente">Atención al Cliente</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="contacto1usuarios" class="form-label">Contacto_1</label>
              <input type="number" name="contacto1" class="form-control" id="contacto1usuarios" />
            </div>
            <div class="mb-3">
              <label for="contacto2usuarios" class="form-label">Contacto_2</label>
              <input type="number" name="contacto2"  class="form-control" id="contacto2usuarios" />
            </div>
            <div class="mb-3">
              <label for="claveusuario" class="form-label">CLAVE</label>
              <input type="password" name="clave"  class="form-control" id="claveusuario" />
            </div>
            
             <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary" type="submit">Guardar</button>
          </div>
          </form>
        </div>
       
      </div>
    </div>
  </div>

  <?php include ('footer.php'); ?>

  <script src="../../libs/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>