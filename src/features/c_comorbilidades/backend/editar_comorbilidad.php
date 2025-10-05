<?php
header('Content-Type: application/json');
require_once '../../../../database/conexion.php';

$response = ['status' => 'error', 'message' => 'Ocurrió un error inesperado.'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Id_Comorbilidad = intval($_POST['idComorbilidad']);
    $Comorbilidad = trim($_POST['comorbilidad']);
    $Estado = $_POST['estado'];

    if ($Comorbilidad === '') {
        echo json_encode(['status'=>'error','message'=>'El nombre no puede estar vacío.']);
        exit;
    }

    try {
        // Verificar duplicado
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM comorbilidades WHERE Comorbilidad = :Comorbilidad AND Id_Comorbilidad != :Id_Comorbilidad");
        $stmt->execute([':Comorbilidad'=>$Comorbilidad, ':Id_Comorbilidad'=>$Id_Comorbilidad]);
        if ($stmt->fetchColumn() > 0) {
            echo json_encode(['status'=>'exists','message'=>'¡Este elemento ya existe!']);
            exit;
        }

        // Convertir Estado a número (1=activo, 2=inactivo)
        $EstadoNum = ($Estado === 'activo' || $Estado == 1) ? 1 : 2;

        // Actualizar diagnóstico
        $stmt = $pdo->prepare("UPDATE comorbilidades 
                               SET Comorbilidad = :Comorbilidad,
                                   Id_Estado = :Estado
                               WHERE Id_Comorbilidad = :Id_Comorbilidad");

        $stmt->execute([
            ':Comorbilidad'     => $Comorbilidad,
            ':Estado'          => $EstadoNum,
            ':Id_Comorbilidad'  => $Id_Comorbilidad
        ]);

        echo json_encode(['status'=>'success','message'=> '☑ Cambios guardados correctamente.']);
        exit;

    } catch (PDOException $e) {
        echo json_encode(['status'=>'error','message'=>'☒ Error en la base de datos.']);
        exit;
    }
}
echo json_encode($response);
exit;
?>