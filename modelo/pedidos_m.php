<?php
    function obtenerPedidos($conn) {
        $pedidos = [];

        $sql = "SELECT id, fecha, total, id_cliente, estado, detalles FROM ventas ORDER BY id DESC";
        $resultado = $conn->query($sql);

        if ($resultado && $resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $pedidos[] = $fila;
            }
        }

        return $pedidos;
    }

    function cambiarestado($conn, $data) {
        $sql = "UPDATE ventas SET estado='{$data['estado']}'  WHERE id={$data['id']}";
        mysqli_query($conn, $sql);
        header("Location: ../vista/admin/pedidos.php");
    }
    
    function borrar($conn, $id) {
    mysqli_query($conn, "DELETE FROM ventas WHERE ventas . id=$id");
    header("Location: ../vista/admin/pedidos.php");
    }
?>