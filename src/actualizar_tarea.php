<?php
require __DIR__ . '/vendor/autoload.php';
use App\Basedatos\Conexion;
$pdo = Conexion::obtener();
$sql = "UPDATE tareas SET estado = :estado WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':estado' => 'hecho', ':id' => 1]);
echo "Filas actualizadas: " . $stmt->rowCount() . PHP_EOL;