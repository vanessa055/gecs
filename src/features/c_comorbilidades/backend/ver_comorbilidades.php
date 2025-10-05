<?php
// Mostrar errores durante desarrollo 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir conexión PDO
require_once __DIR__ . '/../../../../database/conexion.php';

// Consulta SQL
$sql = "
  SELECT
    C.Id_Comorbilidad,
    C.Comorbilidad,
    E.Estado
  FROM Comorbilidades C
  JOIN Estados E ON E.Id_Estado = C.Id_Estado
";

$stmt = $pdo->query($sql);
$diagnosticos = $stmt->fetchAll();
?>