<?php
header('Content-Type: application/json');
require_once '../../../../database/conexion.php';

$response = ['status' => 'error', 'message' => 'Ocurrió un error inesperado.'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Id_Diagnostico = intval($_POST['Id_Diagnostico']);
    $Nombre_Diagnostico = trim($_POST['Nombre_Diagnostico']);
    $Necesita_Parametro = $_POST['Parametro_Diagnostico'];
    $Estado = $_POST['Estado'];

    if ($Nombre_Diagnostico === '') {
        echo json_encode(['status'=>'error','message'=>'El nombre no puede estar vacío.']);
        exit;
    }

    try {
        // Verificar duplicado
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM diagnosticos WHERE Nombre_Diagnostico = :Nombre_Diagnostico AND Id_Diagnostico != :Id_Diagnostico");
        $stmt->execute([':Nombre_Diagnostico'=>$Nombre_Diagnostico, ':Id_Diagnostico'=>$Id_Diagnostico]);
        if ($stmt->fetchColumn() > 0) {
            echo json_encode(['status'=>'exists','message'=>'¡Este diagnóstico ya existe!']);
            exit;
        }

        // Convertir Estado a número (1=activo, 2=inactivo)
        $EstadoNum = ($Estado === 'activo' || $Estado == 1) ? 1 : 2;

        // Actualizar diagnóstico
        $stmt = $pdo->prepare("UPDATE diagnosticos 
                               SET Nombre_Diagnostico = :Nombre_Diagnostico,
                                   Necesita_Parametro = :Parametro_Diagnostico,
                                   Id_Estado = :Estado
                               WHERE Id_Diagnostico = :Id_Diagnostico");

        $stmt->execute([
            ':Nombre_Diagnostico'=>$Nombre_Diagnostico,
            ':Parametro_Diagnostico'=>$Necesita_Parametro,
            ':Estado'=>$EstadoNum,
            ':Id_Diagnostico'=>$Id_Diagnostico
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

