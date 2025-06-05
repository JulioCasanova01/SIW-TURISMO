<?php include ('header.php'); ?>
<style>
    .table-responsive {
    overflow-x: auto;
    max-width: 100%;
  }

  .main-content {
    padding: 1rem;
  }

  th, td {
    word-break: break-word;
    min-width: 120px; /* Evita que las columnas se aplasten demasiado en pantallas pequeñas */
  }

  @media (max-width: 576px) {
    .main-content h2 {
      font-size: 1.4rem;
    }

    .table-responsive {
      font-size: 0.9rem;
    }

    .btn {
      font-size: 0.85rem;
    }
  }

  .descripcion-scroll {
  max-height: 80px;       /* Alto máximo antes de hacer scroll vertical */
  max-width: 250px;       /* Ancho máximo antes de hacer scroll horizontal */
  overflow: auto;
  white-space: pre-wrap;  /* Mantiene saltos de línea */
    }
</style>

<body>
    <?php 
        include '../../conexion.php';
        include '../../modelo/productos_m.php'; 
        $productos = obtenerProductos($conn);
    ?>
    <div class="d-flex flex-column flex-lg-row">

        <?php include ('sidebar.php'); ?>

        <!-- Contenido principal -->
        <div class="flex-grow-1">
            <nav class="navbar navbar-dark ">
                <div class="container-fluid">
                    <span class="navbar-brand">Gestión de Productos</span>
                    <!-- <a href="#" class="btn btn-outline-light"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a> -->
                </div>
            </nav>

            <div class="main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-3 mb-md-0 mt-4 ">Productos</h2>
                    <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalproducto">
                        <i class="fas fa-plus me-2"></i>Nuevo producto
                    </button>
                </div>

                <!-- Tabla -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark text-center">
                            <tr>
                                <th><i class="fas fa-id-badge"></i> ID</th>
                                <th><i class="fas fa-tag"></i> Nombre</th>
                                <th><i class="fas fa-folder"></i> ID_Categoría</th>
                                <th><i class="fas fa-dollar-sign"></i> Precio</th>
                                <th><i class="fas fa-align-left"></i> Descripción</th>
                                <th><i class="fas fa-cogs"></i> Acciones</th>
                                

                            </tr>
                        </thead>
                        <?php foreach ($productos as $producto): ?>
                           
                        <tbody class="text-center">

                            <tr>
                                <td><?= $producto['id'] ?></td>
                                <td><?= $producto['nombre'] ?></td>
                                <td><?= $producto['id_categoria'] ?></td>
                                <td>$<?= number_format($producto['precio'], 0, ',', '.') ?></td>
                                <td><div class="overflow-auto" style="max-height: 100px; max-width: 100%; white-space: pre-wrap;"><?= $producto['descripcion'] ?></div></td>
                                
                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal"
                                        data-bs-target="#modalEditar<?= $producto['id'] ?>"><i class="fas fa-edit"></i>
                                    </button>
                                   <a href="../../controlador/productos_c.php?accion=eliminar&id=<?= $producto['id'] ?>" 
                                        class="btn btn-sm btn-outline-danger" 
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este Producto?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        
                            <!-- Modal de edición -->
                            

                            <div class="modal fade" id="modalEditar<?= $producto['id'] ?>" tabindex="-1"
                                aria-labelledby="modalEditarLabel<?= $producto['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title">Editar
                                                Producto</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Cerrar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../../controlador/productos_c.php?accion=actualizar" method="POST">
                                                <input type="hidden" name="id" value="<?= $producto['id'] ?>" />
                                                <div class="mb-3">
                                                    <label for="nombreproducto<?= $producto['id'] ?>"
                                                        class="form-label">Nombre</label>
                                                    <input type="text" class="form-control"
                                                       name="nombre" id="nombreproducto<?= $producto['id'] ?>"
                                                        value="<?= $producto['nombre'] ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="imagenproducto<?= $producto['id'] ?>"
                                                        class="form-label">Imagen</label>
                                                    <input type="file" id="imagenproducto<?= $producto['id'] ?>"
                                                        name="imagen" accept="image/*" class="form-control" />
                                                </div>

                                                <!--Arreglas categoria que es una llave foranea-->

                                                <?php /*
                                                <div class="mb-3">
                                                    <label for="categoriaproducto <?= $producto['id'] ?>" class="form-label">Categoría</label>
                                                    <select class="form-select" id="categoriaproducto<?= $producto['id'] ?>">
                                                        <option value="activo" <?= ($producto['estado'] == 'activo') ? 'selected' : '' ?>>Activo</option>
                                                        <option value="inactivo" <?= ($producto['estado'] == 'inactivo') ? 'selected' : '' ?>>Inactivo</option>
                                                    </select>
                                                </div>
                                                */ ?>

                                                
                                                <div class="mb-3">
                                                    <label for="precioproducto<?= $producto['id'] ?>"
                                                        class="form-label">Precio</label>
                                                    <input type="number" class="form-control"
                                                        name="precio" id="precioproducto<?= $producto['id'] ?>"
                                                        value="<?= $producto['precio'] ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="descripcionproducto<?= $producto['id'] ?>"
                                                       name="descripcion" class="form-label">Descripcion</label>
                                                    <input type="text" class="form-control"
                                                       name="descripcion" id="descripcionproducto<?= $producto['id'] ?>"
                                                        value="<?= $producto['descripcion'] ?>" />
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button class="btn btn-primary">Guardar</button>
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

    <!-- Modal de Crear producto -->
    <div class="modal fade" id="modalproducto" tabindex="-1" aria-labelledby="modalproductoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalproductoLabel">Nuevo Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="../../controlador/productos_c.php?accion=registrar" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="descripcionproducto" class="form-label">Imagen</label>
                            <input type="file" id="imagen" name="imagen" accept="image/*" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="nombreproducto" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombreproducto" />
                        </div>
                        <div class="mb-3">
                            <label for="descripcionproducto" class="form-label">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcionproducto" />
                        </div>
                        <div class="mb-3">
                            <label for="precioproducto" class="form-label">Precio</label>
                            <input type="number" class="form-control" name="precio" id="precioproducto" />
                        </div>
                        
                        <div class="mb-3">
                            <label for="categoriaproducto" class="form-label">ID Categoría</label>
                            <select name="id_categoria" class="form-select" id="categoriaproducto">
                                <option value="1">Tours</option>
                                <option value="2">Paquete</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button class="btn btn-primary">Guardar</button>
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