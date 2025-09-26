<?php
$host = 'localhost';
$dbname = 'gecs';
$user = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
    // Conexión exitosa (no imprimir nada en producción)
} catch (PDOException $e) {
    error_log("Error de conexión PDO: " . $e->getMessage());
    die("Ocurrió un error al conectar con la base de datos.");
}
?>
