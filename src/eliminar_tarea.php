<?php
require __DIR__ . '/vendor/autoload.php';
use App\Basedatos\Conexion;
$pdo = Conexion::obtener();
$sql = "DELETE FROM tareas WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => 1]);
echo "Filas eliminadas: " . $stmt->rowCount() . PHP_EOL;