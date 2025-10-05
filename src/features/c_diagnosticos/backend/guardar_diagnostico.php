<?php
include(__DIR__ . '/../../../../database/conexion.php');

header('Content-Type: application/json');

$response = ['status' => 'error', 'message' => 'Ocurrió un error.'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $Nombre_Diagnostico = trim($_POST['Nombre_Diagnostico']);
    $Necesita_Parametro = $_POST['Parametro_Diagnostico'];
    $Id_Estado = 1;

    if (!empty($Nombre_Diagnostico) && isset($Necesita_Parametro)) {
        try {
            // Verificar existencia
            $sql_check = "SELECT COUNT(*) FROM diagnosticos WHERE Nombre_Diagnostico = :Nombre_Diagnostico";
            $stmt_check = $pdo->prepare($sql_check);
            $stmt_check->execute([':Nombre_Diagnostico' => $Nombre_Diagnostico]);
            $existe = $stmt_check->fetchColumn();

            if ($existe > 0) {
                $response = ['status' => 'exists', 'message' => '¡Este diagnóstico ya existe!'];
                echo json_encode($response);
                exit();
            }

            // Insertar si no existe
            $sql_insert = "INSERT INTO diagnosticos (Nombre_Diagnostico, Necesita_Parametro, Id_Estado) 
                           VALUES (:Nombre_Diagnostico, :Parametro_Diagnostico, :Id_Estado)";
            $stmt_insert = $pdo->prepare($sql_insert);
            $stmt_insert->execute([
                ':Nombre_Diagnostico' => $Nombre_Diagnostico,
                ':Parametro_Diagnostico' => $Necesita_Parametro,
                ':Id_Estado' => $Id_Estado
            ]);

            $response = ['status' => 'success', 'message' => '☑ Diagnóstico guardado correctamente.'];
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
