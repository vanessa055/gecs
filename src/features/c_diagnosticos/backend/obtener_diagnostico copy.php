<?php
require_once __DIR__ . '/../../../../database/conexion.php';

$sql = "
  SELECT
    Id_Diagnostico,
    Nombre_Diagnostico,
    Necesita_Parametro,
    Estado
  FROM Diagnosticos
";

$stmt = $pdo->query($sql);
$diagnosticos = $stmt->fetchAll();

return $diagnosticos;
