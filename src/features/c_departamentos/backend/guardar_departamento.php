<?php
include(__DIR__ . '/../../../../database/conexion.php');

header('Content-Type: application/json');

$response = ['status' => 'error', 'message' => 'Ocurrió un error.'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $Departamento = trim($_POST['Departamento']);
    $Id_Estado = 1;

    if (!empty($Departamento)) {
        try {
            // Verificar existencia
            $sql_check = "SELECT COUNT(*) FROM departamentos WHERE Departamento = :Departamento";
            $stmt_check = $pdo->prepare($sql_check);
            $stmt_check->execute([':Departamento' => $Departamento]);
            $existe = $stmt_check->fetchColumn();

            if ($existe > 0) {
                $response = ['status' => 'exists', 'message' => '¡Este elemento ya existe!'];
                echo json_encode($response);
                exit();
            }

            // Insertar si no existe
            $sql_insert = "INSERT INTO departamentos (Departamento,  Id_Estado) 
                           VALUES (:Departamento,  :Id_Estado)";
            $stmt_insert = $pdo->prepare($sql_insert);
            $stmt_insert->execute([
                ':Departamento' => $Departamento,
                ':Id_Estado' => $Id_Estado
            ]);

            $response = ['status' => 'success', 'message' => '☑  guardado correctamente.'];
            echo json_encode($response);
            exit();

        } catch (PDOException $e) {
            $response = ['status' => 'error', 'message' => '☒ Error en la base de datos: '.$e->getMessage()];
            echo json_encode($response);
            exit();
        }
    } else {
        $response = ['status' => 'error', 'message' => 'Por favor completa todos los campos.'];
        echo json_encode($response);
        exit();
    }
} else {
    $response = ['status' => 'error', 'message' => 'Método no permitido.'];
    echo json_encode($response);
    exit();
}
?>