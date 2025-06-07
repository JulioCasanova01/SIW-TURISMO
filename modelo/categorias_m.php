<?php

function registrar($conn, $data) {
    $sql = "INSERT INTO categorias (nombre, descripcion) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    $stmt->bind_param("ss", $data['nombre'], $data['descripcion']);

    try {
        if ($stmt->execute()) {
            $_SESSION['nombre'] = $data['nombre'];
            $_SESSION['descripcion'] = $data['descripcion'];
            echo "<script>
                    alert('Categoría registrada exitosamente.');
                    window.location.href = '../vista/admin/categorias.php';
                </script>";
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() === 1062) {
            echo "<script>
                    alert('El nombre de la categoría ya está registrado.');
                    window.location.href = '../vista/admin/categorias.php';
                </script>";
        } else {
            die("Error al registrar categoría: " . $e->getMessage());
        }
    }

    $stmt->close();
}

function obtenerCategorias($conn) {
    $result = mysqli_query($conn, "SELECT * FROM categorias");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function eliminar($conn, $id) {
    mysqli_query($conn, "DELETE FROM categorias WHERE id=$id");
    header("Location: ../vista/admin/categorias.php");
}

function actualizar($conn, $data) {
    $sql = "UPDATE categorias SET 
        nombre = '{$data['nombre']}',
        descripcion = '{$data['descripcion']}'
        WHERE id = {$data['id']}";

    mysqli_query($conn, $sql);
    header("Location: ../vista/admin/categorias.php");
}
?>
