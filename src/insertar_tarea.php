<?php
require __DIR__ . '/vendor/autoload.php';
use App\Basedatos\Conexion;
$pdo = Conexion::obtener();
$sql = "INSERT INTO tareas (titulo, estado, urgente)
 VALUES (:titulo, :estado, :urgente)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
 ':titulo' => 'Configurar conexión PDO',
 ':estado' => 'pendiente',
 ':urgente' => 0,
]);
echo "Tarea guardada con ID: " . $pdo->lastInsertId() . PHP_EOL;