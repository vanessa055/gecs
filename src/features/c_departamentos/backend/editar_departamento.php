<?php
header('Content-Type: application/json');
require_once '../../../../database/conexion.php';

$response = ['status' => 'error', 'message' => 'Ocurrió un error inesperado.'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Id_Departamento = intval($_POST['idDepartamento']);
    $Departamento = trim($_POST['departamento']);
    $Estado = $_POST['estado'];

    if ($Departamento === '') {
        echo json_encode(['status'=>'error','message'=>'El nombre no puede estar vacío.']);
        exit;
    }

    try {
        // Verificar duplicado
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM departamentos WHERE Departamento = :Departamento AND Id_Departamento != :Id_Departamento");
        $stmt->execute([':Departamento'=>$Departamento, ':Id_Departamento'=>$Id_Departamento]);
        if ($stmt->fetchColumn() > 0) {
            echo json_encode(['status'=>'exists','message'=>'¡Este elemento ya existe!']);
            exit;
        }

        // Convertir Estado a número (1=activo, 2=inactivo)
        $EstadoNum = ($Estado === 'activo' || $Estado == 1) ? 1 : 2;

        // Actualizar diagnóstico
        $stmt = $pdo->prepare("UPDATE Departamentos 
                               SET Departamento = :Departamento,
                                   Id_Estado = :Estado
                               WHERE Id_Departamento = :Id_Departamento");

        $stmt->execute([
            ':Departamento'     => $Departamento,
            ':Estado'          => $EstadoNum,
            ':Id_Departamento'  => $Id_Departamento
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