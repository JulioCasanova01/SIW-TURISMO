<?php

function salir(){
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../vista/login.php");
    exit();
}

function registrar($conn, $data) {
    
    $sql= "INSERT INTO productos VALUES (NULL, '{$data['id_categoria']}', '{$data['nombre']}', '{$data['imagen']}','{$data['descripcion']}','{$data['precio']}')";
    mysqli_query($conn, $sql);
    $_SESSION['nombre'] = $data['nombre'];
    

    header("Location: ../vista/admin/productos.php");
}

function obtenerProductos($conn) {
    $result = mysqli_query($conn, "SELECT * FROM productos");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function eliminar($conn, $id) {
   
    mysqli_query($conn, "DELETE FROM productos WHERE id=$id");
    header("Location: ../vista/admin/productos.php");
}

function actualizar($conn, $data) {
    /*id_categoria='{$data['id_categoria']}', */
    $sql = "UPDATE productos SET  nombre='{$data['nombre']}', imagen='{$data['imagen']}', descripcion='{$data['descripcion']}', precio='{$data['precio']}'  WHERE id={$data['id']}";
    mysqli_query($conn, $sql);
    header("Location: ../vista/admin/productos.php");
}

?>

