<?php
include(__DIR__ . '/../../../../database/conexion.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $Nombre_Diagnostico = trim($_POST['Nombre_Diagnostico']);
    $Necesita_Parametro = $_POST['parametro'];  // 'Si' o 'No'
    $Id_Estado = 1;  // Id_Estado = 1 para "activo"

    if (!empty($Nombre_Diagnostico) && ($Necesita_Parametro === 'Si' || $Necesita_Parametro === 'No')) {
        try {
            $sql = "INSERT INTO diagnosticos (Nombre_Diagnostico, Necesita_Parametro, Id_Estado) 
                    VALUES (:Nombre_Diagnostico, :parametro, :Id_Estado)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':Nombre_Diagnostico' => $Nombre_Diagnostico,
                ':parametro' => $Necesita_Parametro,
                ':Id_Estado' => $Id_Estado
            ]);

            header("Location: /gecs/src/features/c_diagnosticos/frontend/diagnosticos.php?success=1");
            exit();
        } catch (PDOException $e) {
            echo "Error al insertar el diagnóstico: " . $e->getMessage();
        }
    } else {
        echo "Por favor, complete todos los campos correctamente.";
    }
} else {
    echo "Método no permitido.";
}
?>

