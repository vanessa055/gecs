<?php
include(__DIR__ . '/../../../../database/conexion.php');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $Nombre_Diagnostico = trim($_POST['Comorbilidad']);
    $Necesita_Parametro = $_POST['parametro'];
    $Id_Estado = 1;

    if (!empty($Nombre_Diagnostico) && ($Necesita_Parametro)) {
        try {
            // Verificar existencia
            $sql_check = "SELECT COUNT(*) FROM comorbilidades WHERE Comorbilidad = :nombre";
            $stmt_check = $pdo->prepare($sql_check);
            $stmt_check->execute([':nombre' => $Nombre_Diagnostico]);
            $existe = $stmt_check->fetchColumn();

            if ($existe > 0) {
                // Redirigir con error en la URL
                header("Location: /gecs/src/features/c_comorbilidades/frontend/comorbilidades.php?error=existente");
                exit();
            }

            // Insertar si no existe
            $sql_insert = "INSERT INTO diagnosticos (Comorbilidad, Id_Estado) 
                           VALUES (:Nombre_Diagnostico, :Id_Estado)";
            $stmt_insert = $pdo->prepare($sql_insert);
            $stmt_insert->execute([
                ':Nombre_Diagnostico' => $Nombre_Diagnostico,
                ':Id_Estado' => $Id_Estado
            ]);

            header("Location: /gecs/src/features/c_comorbilidades/frontend/comorbilidades.php?success=1");
            exit();
        } catch (PDOException $e) {
            echo "Error al insertar el comorbilidad: " . $e->getMessage();
        }
    } else {
        header("Location: /gecs/src/features/c_comorbilidades/frontend/comorbilidades.php?error=campos");
        exit();
    }
} else {
    echo "Método no permitido.";
}
?>