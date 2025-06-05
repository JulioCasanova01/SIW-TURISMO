<?php

function salir(){
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../vista/login.php");
    exit();
}

function registrar($conn, $data) {
    date_default_timezone_set('America/Bogota');
    $fecha = date('Y-m-d H:i:s');
    $estado= 'PE';
    $sql= "INSERT INTO atencion_clientes VALUES (NULL, '{$data['nombre']}', '{$data['mensaje']}','$fecha','$estado', '{$data['correo']}','{$data['telefono']}'  )";
    mysqli_query($conn, $sql);
    $_SESSION['nombre'] = $data['nombre'];
        echo "<script>
                    alert('Atención registrada exitosamente.'); 
                    window.location.href = '../vista/general/contactanos.php';
                </script>";
}

function obtenerAtenciones($conn) {
    $result = mysqli_query($conn, "SELECT * FROM atencion_clientes");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function eliminar($conn, $id) {
   
    mysqli_query($conn, "DELETE FROM atencion_clientes WHERE id=$id");
    header("Location: ../vista/admin/atencion_cliente.php");
}

function actualizar($conn, $data) {
    $sql = "UPDATE atencion_clientes SET estado='{$data['estado']}'  WHERE id={$data['id']}";
    mysqli_query($conn, $sql);
    header("Location: ../vista/admin/atencion_cliente.php");
}

?>

