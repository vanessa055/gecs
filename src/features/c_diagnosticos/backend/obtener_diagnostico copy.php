<?php
include(__DIR__ . '../../../../database/conexion.php');

$resultado = $conn->query("SELECT * FROM diagnosticos");

$datos = [];

while ($row = $resultado->fetch_assoc()) {
    $datos[] = $row;
}

echo json_encode($datos);

$conn->close();
?>
